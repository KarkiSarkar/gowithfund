<?php

  if(!function_exists('gavias_post_type_gallery')   ){
    function gavias_post_type_gallery(){
      $labels = array(
        'name' => __( 'Gallery', 'krowd-themer' ),
        'singular_name' => __( 'Gallery', 'krowd-themer' ),
        'add_new' => __( 'Add New Gallery', 'krowd-themer' ),
        'add_new_item' => __( 'Add New Gallery', 'krowd-themer' ),
        'edit_item' => __( 'Edit Gallery', 'krowd-themer' ),
        'new_item' => __( 'New Gallery', 'krowd-themer' ),
        'view_item' => __( 'View Gallery', 'krowd-themer' ),
        'search_items' => __( 'Search Gallery', 'krowd-themer' ),
        'not_found' => __( 'No Gallery found', 'krowd-themer' ),
        'not_found_in_trash' => __( 'No Gallery found in Trash', 'krowd-themer' ),
        'parent_item_colon' => __( 'Parent Gallery:', 'krowd-themer' ),
        'menu_name' => __( 'Gallery', 'krowd-themer' ),
      );

      $args = array(
          'labels' => $labels,
          'hierarchical' => true,
          'description' => 'List Gallery',
          'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
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
          'rewrite'    => array( 'slug' => 'gallery' ),
          'capability_type' => 'post'
      );
      $slug = apply_filters('gavias-post-type/slug-gallery', '');
      if($slug){
        $args['rewrite']['slug'] = $slug;
      }
      register_post_type( 'gallery', $args );
    }
   add_action( 'init','gavias_post_type_gallery' ); 
  }

if(!function_exists('gavias_gallery_register_taxonomy')){
  function gavias_gallery_register_taxonomy(){
    $args = array(
        'labels' => array(
              'name'                => esc_html_x( 'Categories', 'taxonomy general name', 'krowd-themer' ),
              'singular_name'       => esc_html_x( 'Category', 'taxonomy singular name', 'krowd-themer' ),
              'search_items'        => esc_html__( 'Search Categories', 'krowd-themer' ),
              'all_items'           => esc_html__( 'All Categories', 'krowd-themer' ),
              'parent_item'         => esc_html__( 'Parent Category', 'krowd-themer' ),
              'parent_item_colon'   => esc_html__( 'Parent Category:', 'krowd-themer' ),
              'edit_item'           => esc_html__( 'Edit Category', 'krowd-themer' ),
              'update_item'         => esc_html__( 'Update Category', 'krowd-themer' ),
              'add_new_item'        => esc_html__( 'Add New Category', 'krowd-themer' ),
              'new_item_name'       => esc_html__( 'New Category Name', 'krowd-themer' ),
              'menu_name'           => esc_html__( 'Categories', 'krowd-themer' ),
          ),
        'public'         => true,
        'hierarchical'     => true,
        'show_ui'        => true,
        'show_admin_column'  => true,
        'query_var'      => true,
        'show_in_nav_menus'  => false,
        'show_tagcloud'    => false
      );
    register_taxonomy('gallery_cat', 'gallery', $args);
  }
  add_action( 'init','gavias_gallery_register_taxonomy' );
}