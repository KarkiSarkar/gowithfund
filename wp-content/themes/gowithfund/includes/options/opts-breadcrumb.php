<?php
Redux::setSection( $opt_name, array(
   'title' => esc_html__('Breadcrumb Options', 'krowd'),
   'desc' => '',
   'icon' => 'el-icon-compass',
   'fields' => array(
    
    array(
        'id' => 'enable_breadcrumb',
        'type' => 'button_set',
        'title' => esc_html__('Show Breadcrumb', 'krowd'),
        'desc' => '',
        'options' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'default' => 'enable'
      ),
      array(
        'id' => 'breadcrumb_show_title',
        'type' => 'button_set',
        'title' => esc_html__('Breadcrumb Display Title Page', 'krowd'),
        'desc' => '',
        'options' => array(1 => 'Enable', 0 => 'Disable'),
        'default' => 1
      ),
      array(
        'id'        => 'breadcrumb_padding_top',
        'type'      => 'slider',
        'title'     => esc_html__( 'Breadcrumb Padding Top', 'krowd' ),
        'default'   => 135,
        'min'       => 50,
        'max'       => 500,
        'step'      => 1,
        'display_value' => 'text',
      ),
      array(
        'id'        => 'breadcrumb_padding_bottom',
        'type'      => 'slider',
        'title'     => esc_html__( 'Breadcrumb Padding Top', 'krowd' ),
        'default'   => 135,
        'min'       => 50,
        'max'       => 500,
        'step'      => 1,
        'display_value' => 'text',
      ),
      array(
        'id' => 'breadcrumb_background_color',
        'type' => 'color',
        'title' => esc_html__('Background Overlay Color', 'krowd'),
        'default' => '#1B1F2E'
      ),
      array(
        'id'        => 'breadcrumb_background_opacity',
        'type'      => 'slider',
        'title'     => esc_html__( 'Breadcrumb Ovelay Color Opacity', 'krowd' ),
        'default'   => 50,
        'min'       => 0,
        'max'       => 100,
        'step'      => 1,
        'display_value' => 'text',
      ),
      array(
        'id' => 'breadcrumb_image',
        'type' => 'button_set',
        'title' => esc_html__('Enable Breadcrumb Image', 'krowd'),
        'desc' => '',
        'options' => array(1 => 'Enable', 0 => 'Disable'),
        'default' => 1
      ),
      array(
        'id' => 'breadcrumb_background_image',
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Breadcrumb Background Image', 'krowd'),
        'default' => '',
        'required'  => array( 'breadcrumb_image', '=', 1 )
      ),
      array(
        'id'    => 'breadcrumb_text_stype',
        'type'    => 'select',
        'title'   => esc_html__( 'Breadcrumb Text Stype', 'krowd' ),
        'options' => 
        array(
          'text-light'     => esc_html__('Light', 'krowd'),
          'text-dark'      => esc_html__('Dark', 'krowd')
        ),
        'default' => 'text-light'
      ),
      array(
        'id'    => 'breadcrumb_text_align',
        'type'    => 'select',
        'title'   => esc_html__( 'Breadcrumb Text Align', 'krowd' ),
        'options' => 
        array(
          'text-left'      => esc_html__('Left', 'krowd'),
          'text-center'    => esc_html__('Center', 'krowd'),
          'text-right'     => esc_html__('Right', 'krowd')
        ),
        'default' => 'text-left'
      )
   )
) );