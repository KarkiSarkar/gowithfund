<?php
Redux::setSection( $opt_name, array(
  'title'     => esc_html__( 'Styling', 'krowd' ),
  'icon'      => 'el-icon-pencil',
  'fields' => array(
    array(
      'id'  => 'colors_info_styling',
      'type'   => 'info',
      'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Colors', 'krowd' ) . '</h3>'
    ),
    array(
      'id'        => 'main_color',
      'type'         => 'color',
      'title'        => esc_html__( 'Main Color', 'krowd' ),
      'desc'         => esc_html__( 'Used for the body text.', 'krowd' ),
      'default'      => '',
      'transparent'  => false,
      'validate'     => 'color'
    ),
    array(
      'id'  => 'info_background',
      'type'   => 'info',
      'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Background', 'krowd' ) . '</h3>'
    ),
    array(
      'id'        => 'main_background_color',
      'type'         => 'color',
      'title'        => esc_html__( 'Background Color', 'krowd' ),
      'desc'         => esc_html__( 'Used for the main site background.', 'krowd' ),
      'default'      => '',
      'transparent'  => false,
      'validate'     => 'color'
    ),
    array(
      'id'  => 'main_background_image',
      'type'   => 'media', 
      'url' => true,
      'title'  => esc_html__( 'Background Image', 'krowd' ),
      'desc'   => esc_html__( 'Upload a background image or specify a URL (boxed layout).', 'krowd' )
    ),
    array(
      'id'     => 'main_background_image_type',
      'type'      => 'select',
      'title'     => esc_html__( 'Background Type', 'krowd' ),
      'desc'      => esc_html__( 'Select the background-image type (fixed image or repeat pattern/texture).', 'krowd' ),
      'options'   => array( 'fixed' => 'Fixed (Full)', 'repeat' => 'Repeat (Pattern)' ),
      'default'   => 'fixed'
    ),
    array(
      'id'  => 'main_content_info_styling',
      'type'  => 'info',
      'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Main Content', 'krowd' ) . '</h3>'
    ),
    array(
      'id'    => 'content_background_color',
      'type'    => 'color',
      'title'   => esc_html__( 'Background Color', 'krowd' ),
      'desc'    => esc_html__( 'Used for the header background.', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),
    array(
      'id'    => 'content_font_color',
      'type'    => 'color',
      'title'   => esc_html__( 'Text Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),
    array(
      'id'    => 'content_font_color_link',
      'type'    => 'color',
      'title'   => esc_html__( 'Link Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),
     array(
      'id'    => 'content_font_color_link_hover',
      'type'    => 'color',
      'title'   => esc_html__( 'Link Hover Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),

    array(
      'id'  => 'footer_info_styling',
      'type'  => 'info',
      'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Footer Default Styling', 'krowd' ) . '</h3>'
    ),
    array(
      'id'    => 'footer_background_color',
      'type'    => 'color',
      'title'   => esc_html__( 'Background Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),
    array(
      'id'    => 'footer_font_color',
      'type'    => 'color',
      'title'   => esc_html__( 'Text Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),
    array(
      'id'    => 'footer_font_color_link',
      'type'    => 'color',
      'title'   => esc_html__( 'Link Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    ),
     array(
      'id'    => 'footer_font_color_link_hover',
      'type'    => 'color',
      'title'   => esc_html__( 'Link Hover Color', 'krowd' ),
      'default' => '',
      'validate'  => 'color'
    )
  )
));