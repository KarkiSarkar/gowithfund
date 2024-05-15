<?php
Redux::setSection($opt_name, array(
   'icon' => 'el-icon-th-list',
   'title' => esc_html__('Page Options', 'krowd'),
   'fields' => array(
      array(
         'id' => 'default_show_page_heading',
         'type' => 'button_set',
         'title' => esc_html__('Default Show Page Heading', 'krowd'),
         'subtitle' => esc_html__('Choose the default state for the page heading, shown/hidden.', 'krowd'),
         'desc' => '',
         'options' => array('1' => 'On','0' => 'Off'),
         'default' => '1'
      ),
      array(
         'id' => 'default_sidebar_config',
         'type' => 'select',
         'title' => esc_html__('Default Page Sidebar Config', 'krowd'),
         'subtitle' => "Choose the default sidebar config for pages",
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
         'id' => 'default_left_sidebar',
         'type' => 'select',
         'title' => esc_html__('Default Page Left Sidebar', 'krowd'),
         'subtitle' => "Choose the default left sidebar for pages",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'sidebar-1'
      ),
      array(
         'id' => 'default_right_sidebar',
         'type' => 'select',
         'title' => esc_html__('Default Page Right Sidebar', 'krowd'),
         'subtitle' => "Choose the default right sidebar for pages",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'sidebar-1'
      ),
   )
));  