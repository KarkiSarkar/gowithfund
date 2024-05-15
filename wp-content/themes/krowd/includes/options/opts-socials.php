<?php
Redux::setSection( $opt_name, array(
   'title'     => esc_html__( 'Social Profiles', 'krowd' ),
   'icon'      => 'el-icon-share',
   'fields' => array(
      array(
         'id'     => 'social_facebook',
         'type'      => 'text',
         'title'  => esc_html__( 'Facebook', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Facebook profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_instagram',
         'type'      => 'text',
         'title'     => esc_html__( 'Instagram', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Instagram profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_twitter',
         'type'      => 'text',
         'title'     => esc_html__( 'Twitter', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Twitter profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_googleplus',
         'type'      => 'text',
         'title'     => esc_html__( 'Google+', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Google+ profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_linkedin',
         'type'      => 'text',
         'title'     => esc_html__( 'LinedIn', 'krowd' ),
         'desc'      => esc_html__( 'Enter your LinkedIn profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_pinterest',
         'type'      => 'text',
         'title'     => esc_html__( 'Pinterest', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Pinterest profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_rss',
         'type'      => 'text',
         'title'     => esc_html__( 'RSS', 'krowd' ),
         'desc'      => esc_html__( 'Enter your RSS feed URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_tumblr',
         'type'      => 'text',
         'title'     => esc_html__( 'Tumblr', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Tumblr profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_vimeo',
         'type'      => 'text',
         'title'     => esc_html__( 'Vimeo', 'krowd' ),
         'desc'      => esc_html__( 'Enter your Vimeo profile URL.', 'krowd' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_youtube',
         'type'      => 'text',
         'title'     => esc_html__( 'YouTube', 'krowd' ),
         'desc'      => esc_html__( 'Enter your YouTube profile URL.', 'krowd' ),
         'default'   => ''
      )
   )
));