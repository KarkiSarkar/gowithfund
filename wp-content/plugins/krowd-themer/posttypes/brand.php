<?php

if(!function_exists('gavias_post_type_brands')  ){ 
  function gavias_post_type_brands(){
    $labels = array(
      'name' => __( 'Brand Logos', 'krowd-themer' ),
      'singular_name' => __( 'Brand', 'krowd-themer' ),
      'add_new' => __( 'Add New Brand', 'krowd-themer' ),
      'add_new_item' => __( 'Add New Brand', 'krowd-themer' ),
      'edit_item' => __( 'Edit Brand', 'krowd-themer' ),
      'new_item' => __( 'New Brand', 'krowd-themer' ),
      'view_item' => __( 'View Brand', 'krowd-themer' ),
      'search_items' => __( 'Search Brands', 'krowd-themer' ),
      'not_found' => __( 'No Brands found', 'krowd-themer' ),
      'not_found_in_trash' => __( 'No Brands found in Trash', 'krowd-themer' ),
      'parent_item_colon' => __( 'Parent Brand:', 'krowd-themer' ),
      'menu_name' => __( 'Brands', 'krowd-themer' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Brand',
        'supports' => array( 'title', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'brands', $args );
  }

  add_action('init','gavias_post_type_brands');
}