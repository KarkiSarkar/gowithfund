<?php

class Hostinger_Ai_Assistant_Amplitude {
	private const AMPLITUDE_ENDPOINT = '/v3/wordpress/plugin/trigger-event';
	private const PLUGIN_INSTALL_TYPE = 'hostinger_ai_plugin_installation_type';

	private Hostinger_Ai_Assistant_Config $config_handler;
	private Hostinger_Ai_Assistant_Requests_Client $client;
	private Hostinger_Ai_Assistant_Helper $helper;

	public function __construct() {
		$this->helper         = new Hostinger_Ai_Assistant_Helper();
		$this->config_handler = new Hostinger_Ai_Assistant_Config();
		$this->client         = new Hostinger_Ai_Assistant_Requests_Client( $this->config_handler->get_config_value( 'base_rest_uri', HOSTINGER_AI_ASSISTANT_REST_URI ), [
			Hostinger_Ai_Assistant_Config::TOKEN_HEADER  => $this->helper::get_api_token(),
			Hostinger_Ai_Assistant_Config::DOMAIN_HEADER => $this->helper->get_host_info()
		] );
		add_action( 'transition_post_status', [ $this, 'track_published_post' ], 10, 3 );
		add_action( 'transition_post_status', [ $this, 'track_published_post_updates' ], 10, 3 );
		add_action( 'transition_post_status', [ $this, 'track_published_product' ], 10, 3 );
		add_action( 'activate_hostinger_ai_assistant', [ $this, 'track_installed_plugin' ], 10, 3 );
	}

	private function send_request( string $endpoint, array $params ): void {
		try {
			$this->client->post( $endpoint, [ 'params' => $params ] );
		} catch ( Exception $exception ) {
			$this->helper->error_log( 'Error sending request: ' . $exception->getMessage() );
		}
	}

	public function ai_content_created( string $post_type, string $location = 'ai_assistant_ui' ): void {
		$endpoint = self::AMPLITUDE_ENDPOINT;
		$params   = array(
			'action' => Hostinger_Ai_Assistant_Amplitude_Actions::AI_CONTENT_CREATE,
			'content_type' => $post_type,
			'location' => $location,
		);

		$this->send_request( $endpoint, $params );
	}

	public function ai_content_saved( string $post_type, int $post_id, string $location = 'ai_assistant_ui' ): void {
		$endpoint = self::AMPLITUDE_ENDPOINT;
		$params   = array(
			'action'       => Hostinger_Ai_Assistant_Amplitude_Actions::AI_CONTENT_CREATED,
			'content_type' => $post_type,
			'content_id'   => $post_id,
			'location'     => $location,
		);

		$this->send_request( $endpoint, $params );
	}

	public function ai_content_published( string $post_type, int $post_id, string $location = 'ai_assistant_ui' ): void {
		$endpoint = self::AMPLITUDE_ENDPOINT;
		$params   = array(
			'action'       => Hostinger_Ai_Assistant_Amplitude_Actions::AI_CONTENT_CREATED_PUBLISHED,
			'content_type' => $post_type,
			'content_id'   => $post_id,
			'location'     => $location,
		);
		update_option( 'hostinger_content_published', true );
		$this->send_request( $endpoint, $params );
	}

	public function track_published_post( string $new_status, string $old_status, WP_Post $post ): void {

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		$post_id              = $post->ID;
		$ai_content_generated = get_post_meta( $post_id, 'hostinger_ai_generated', true );
		static $is_action_executed = array();

		if ( isset( $is_action_executed[ $post_id ] ) ) {
			return;
		}

		if ( ( 'draft' === $old_status || 'auto-draft' === $old_status ) && $new_status === 'publish' ) {

			if ( $ai_content_generated && ! wp_is_post_revision( $post_id ) ) {
				$post_type = get_post_type( $post_id );
				$this->ai_content_published( $post_type, $post_id );
				$is_action_executed[ $post_id ] = true;
			}
		}
	}

	public function track_published_post_updates( string $new_status, string $old_status, WP_Post $post ): void {

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		// Fix issue with hook running twice.
		if ( ! empty( $_REQUEST['meta-box-loader'] ) ) {
			return;
		}

		$post_id              = $post->ID;
		static $is_action_executed = array();

		if ( isset( $is_action_executed[ $post_id ] ) ) {
			return;
		}

		if ( $new_status === 'publish' ) {

			$has_ai_block = has_block( 'hostinger-ai-plugin/block', $post );

			if ( $has_ai_block && ! wp_is_post_revision( $post_id ) ) {
				$post_type = get_post_type( $post_id );
				$this->ai_content_published( $post_type, $post_id, 'ai_assistant_block' );
				$is_action_executed[ $post_id ] = true;
			}
		}
	}

	public function track_published_product( string $new_status, string $old_status, WP_Post $post ): void {

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		$post_id              = $post->ID;
		$ai_content_generated = get_option( 'hts_woo_product_description_created', array() );
		$location             = 'woocommerce_ui';
		static $is_action_executed = array();

		if ( isset( $is_action_executed[ $post_id ] ) ) {
			return;
		}

		if ( $post->post_type === 'product' && $new_status === 'publish' && $old_status !== 'publish' ) {

			if ( in_array( $post_id, $ai_content_generated ) && ! wp_is_post_revision( $post_id ) ) {
				$post_type = get_post_type( $post_id );
				$this->ai_content_published( $post_type, $post_id, $location );
				$index = array_search( $post_id, $ai_content_generated );

				// If $post_id exists in $ai_content_generated, remove it
				if ( $index !== false ) {
					unset( $ai_content_generated[ $index ] );
					update_option( 'hts_woo_product_description_created', $ai_content_generated );
				}

				$is_action_executed[ $post_id ] = true;
			}
		}
	}

	public function track_installed_plugin(): void {
		$endpoint            = self::AMPLITUDE_ENDPOINT;
		$plugin_install_type = get_option( self::PLUGIN_INSTALL_TYPE, 'wordpress' );
		static $is_action_executed = false;

		if ( $is_action_executed ) {
			return;
		}

		$params = array(
			'action'         => Hostinger_Ai_Assistant_Amplitude_Actions::AI_PLUGIN_INSTALLED,
			'location'       => $plugin_install_type,
			'plugin_name'    => basename( plugin_dir_path( dirname( __FILE__, 2 ) ) ),
			'plugin_version' => HOSTINGER_AI_ASSISTANT_VERSION,
		);

		$is_action_executed = true;
		$this->send_request( $endpoint, $params );
		delete_option( self::PLUGIN_INSTALL_TYPE );
	}


}

new Hostinger_Ai_Assistant_Amplitude();
