<?php
  function krowd_get_all_menus(){
     $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
     $results = array();
     foreach ($menus as $key => $menu) {
      $results[$menu->slug] = $menu->name;
     }
     return $results;
  }

  Redux::setSection( $opt_name, array(
    'title' => esc_html__('Header Options', 'krowd'),
    'desc' => '',
    'icon' => 'el-icon-compass',
    'fields' => array(
      array(
        'id' => 'header_layout',
        'type' => 'select',
        'title' => esc_html__('Header Layout', 'krowd'),
        'subtitle' => esc_html__('Select a header layout option from the examples.', 'krowd'),
        'desc' => '',
        'options' => krowd_get_headers(false),
        'default' => 'header-1'
      ),
      array(
        'id' => 'header_logo', 
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Logo in header default', 'krowd'), 
        'default' => ''
      ),  
      array(
        'id'  => 'header_mobile_settings',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Header Mobile settings', 'krowd' ) . '</h3>'
      ),
      array(
        'id' => 'hm_logo',
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Header Mobile | Logo', 'krowd'),
        'default' => ''
      ),
      array(
        'id' => 'hm_topbar',
        'type' => 'button_set',
        'title' => esc_html__('Header Mobile | Topbar', 'krowd'),
        'options' => array('enable' => 'Enable', 'disable' => 'Disable'),
        'default' => 'enable'
      ),
      array(
        'id' => 'hm_my_account_menu',
        'type' => 'select',
        'title' => esc_html__('Header Mobile | My Account Menu', 'krowd'),
        'options' => krowd_get_all_menus(),
        'default' => 'my-account'
      ),
      array(
        'id' => 'hm_text_login',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Text Sign in or Register', 'krowd'),
        'default' => esc_html__('Sign in or Register', 'krowd')
      ),
      array(
        'id' => 'hm_text_login_url',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Link Login', 'krowd'),
        'default' => ''
      ),
      array(
        'id' => 'hm_text_create_project',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Text Create A Project', 'krowd'),
        'default' => esc_html__('Create A Project', 'krowd')
      ),
      array(
        'id' => 'hm_create_project_url',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Link Create A Project', 'krowd'),
        'default' => ''
      ),
    )
  ));