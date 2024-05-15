<?php
Redux::setSection( $opt_name, array(
   'title'   => esc_html__( 'Event Options', 'krowd' ),
   'icon'    => 'el-icon-website',
   'fields'  => array(
      array(
        'id'  => 'event_single_post_info',
        'type'  => 'info',
        'icon'  => true,
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Single Event', 'krowd' ) . '</h3>',
      ),
      array(
        'id' => 'single_event_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Sidebar Config', 'krowd'),
        'subtitle' => "Choose single Event layout.",
        'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'no-sidebars'
      ),
      array(
        'id' => 'single_event_left_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Left Sidebar', 'krowd'),
        'subtitle' => "Choose the default left sidebar for Single Event.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'event_sidebar'
      ),
       array(
        'id' => 'single_event_right_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Right Sidebar', 'krowd'),
        'subtitle' => "Choose the default right sidebar for Single Event.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'event_sidebar'
      )
   )
));