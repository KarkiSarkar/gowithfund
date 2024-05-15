<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

/**
 * Elementor heading widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class GVAElement_Heading_Block extends GVAElement_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'gva-heading-block';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'GVA Heading Block', 'krowd-themer' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-t-letter';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'heading', 'title', 'text' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'krowd-themer' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'krowd-themer' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'krowd-themer' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'krowd-themer' ),
				'default' => __( 'Add Your Heading Text Here', 'krowd-themer' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => __( 'Description', 'krowd-themer' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter Your Description', 'krowd-themer' ),
				'condition' => [
					'style' => 'style-1'
				]
			]
		);
		
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Style I: Default', 'krowd-themer'),
				],
				'default' => 'style-1',
			]
		);


		$this->add_control(
			'header_tag',
			[
				'label' => __( 'HTML Tag', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'align',
			[
				'label' => __( 'Alignment Text', 'krowd-themer' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'krowd-themer' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'krowd-themer' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'krowd-themer' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'condition' => [
					'style' => 'style-1'
				]
			]
		);

		$this->add_control(
			'box_align',
			[
				'label' => __( 'Alignment Box', 'krowd-themer' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'krowd-themer' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'krowd-themer' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'krowd-themer' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'condition' => [
					'style' => 'style-1'
				]
			]
		);

		$this->add_responsive_control(
			'max_width',
			[
				'label' => __( 'Max Width (px)', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 800,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1170,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .content-inner' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( //** Section Icon
			'section_icon',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'krowd-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'placeholder' => __( 'Enable/Disable Icon Heading', 'krowd-themer' ),
				'default' => 'no'
			]
		);

		$this->add_control(
			'icon_image',
			[
				'label' => __( 'Icon Image', 'krowd-themer' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'condition' => [
					'icon' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section( //** Section Icon
			'section_video',
			[
				'label' => __( 'Video Top', 'krowd-themer' ),
			]
		);
		$this->add_control(
			'video',
			[
				'label' => __( 'Video', 'krowd-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'placeholder' => __( 'Enable/Disable Video Heading', 'krowd-themer' ),
				'default' => 'no'
			]
		);
		$this->add_control(
			'video_url',
			[
				'label' => __( 'Video Youtube or Vimeo URL', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'video' => 'yes',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section( //** Section Button
			'section_button',
			[
				'label' => __( 'Button', 'krowd-themer' ),
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' => __( 'Button URL', 'krowd-themer' ),
				'type' => Controls_Manager::URL,
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'krowd-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Read More'
			]
		);
		$this->add_control(
			'button_style',
			[
				'label' => __( 'Button Style', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'btn-theme' 		=> esc_html__('Button Theme', 'krowd-themer'),
					'btn-theme-2' 		=> esc_html__('Button Theme Second', 'krowd-themer'),
					'btn-black' 		=> esc_html__('Button Black', 'krowd-themer')
				],
				'default' => 'btn-theme',
			]
		);
		$this->add_control(
			'button_size',
			[
				'label' => __( 'Button Size', 'krowd-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' 					=> esc_html__('Button Size Default', 'krowd-themer'),
					'btn-size-small' 	=> esc_html__('Button Size Small', 'krowd-themer')
				],
				'default' => '',
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Text Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .heading-action .btn-cta' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background',
			[
				'label' => __( 'Button Background', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .heading-action .btn-cta' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_color_hover',
			[
				'label' => __( 'Button Color Hover', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .heading-action .btn-cta:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_background_hover',
			[
				'label' => __( 'Button Background Hover', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .heading-action .btn-cta:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .gsc-heading .heading-action .btn-cta:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_video_style',
			[
				'label' => __( 'Video Button', 'krowd-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'video' => 'yes',
				],
			]
		);
		$this->add_control(
			'video_background_primary',
			[
				'label' => __( 'Primary Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .heading-video .video-link' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'video_background_second',
			[
				'label' => __( 'Primary Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .heading-video .video-link:after' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'video_color',
			[
				'label' => __( 'Text Button Video Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading  .heading-video .video-link' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'video_size',
			[
				'label' => __( 'Video Button Size', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 92,
				],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading  .heading-video .video-link' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'krowd-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading  .heading-video .video-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Box', 'krowd-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_space',
			[
				'label' => __( 'Heading Element Space Bottom', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'krowd-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .gsc-heading .title',
			]
		);
		$this->add_responsive_control(
			'title_space',
			[
				'label' => __( 'Title Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => __( 'Sub Title', 'krowd-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Text Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .sub-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'sub_title_space',
			[
				'label' => __( 'Sub Title Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_sub_title',
				'selector' => '{{WRAPPER}} .gsc-heading .sub-title',
			]
		);

		$this->add_control(
			'sub_title_highlight',
			[
				'label' => __( 'Enable Dot Highlight', 'krowd-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'sub_title_highlight_color',
			[
				'label' => __( 'Highlight Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .sub-title:after' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'sub_title_highlight' => 'yes',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => __( 'Description', 'krowd-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Text Color', 'krowd-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .title-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_desc',
				'selector' => '{{WRAPPER}} .gsc-heading .title-desc',
			]
		);

		$this->add_responsive_control(
			'description_space',
			[
				'label' => __( 'Description Spacing', 'krowd-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 45,
				], 
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-heading .title-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template('gva-heading-block.php');
      print '</div>';
	}

}
