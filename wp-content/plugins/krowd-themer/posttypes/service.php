<?php
if(!function_exists('gavias_post_type_service')  ){
    function gavias_post_type_service(){
      $labels = array(
          'name'               => __( 'Services', "krowd-themer" ),
          'singular_name'      => __( 'Service', "krowd-themer" ),
          'add_new'            => __( 'Add New', "krowd-themer" ),
          'add_new_item'       => __( 'Add New Service', "krowd-themer" ),
          'edit_item'          => __( 'Edit Service', "krowd-themer" ),
          'new_item'           => __( 'New Service', "krowd-themer" ),
          'view_item'          => __( 'View Service', "krowd-themer" ),
          'search_items'       => __( 'Search Services', "krowd-themer" ),
          'not_found'          => __( 'No Services found', "krowd-themer" ),
          'not_found_in_trash' => __( 'No Services found in Trash', "krowd-themer" ),
          'parent_item_colon'  => __( 'Parent Service:', "krowd-themer" ),
          'menu_name'          => __( 'Services', "krowd-themer" ),
      );

      $args = array(
        'labels'              => $labels,
        'hierarchical'        => true,
        'description'         => 'List Service',
        'supports'            => array( 'title', 'editor', 'author', 'excerpt', 'post-formats'  ), 
        'taxonomies'          => array( 'service_category','post_tag' ),
        'post-formats'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => array(
          'slug'  => 'service'
        ),
        'capability_type'     => 'post'
      );

      $slug = apply_filters('gavias-post-type/slug-service', '');
      if($slug){
        $args['rewrite']['slug'] = $slug;
      }
      //print_r($args);

      register_post_type( 'service', $args );

      $labels = array(
        'name'              => __( 'Categories', "krowd-themer" ),
        'singular_name'     => __( 'Category', "krowd-themer" ),
        'search_items'      => __( 'Search Category', "krowd-themer" ),
        'all_items'         => __( 'All Categories', "krowd-themer" ),
        'parent_item'       => __( 'Parent Category', "krowd-themer" ),
        'parent_item_colon' => __( 'Parent Category:', "krowd-themer" ),
        'edit_item'         => __( 'Edit Category', "krowd-themer" ),
        'update_item'       => __( 'Update Category', "krowd-themer" ),
        'add_new_item'      => __( 'Add New Category', "krowd-themer" ),
        'new_item_name'     => __( 'New Category Name', "krowd-themer" ),
        'menu_name'         => __( 'Categories', "krowd-themer" ),
      );
      // Now register the taxonomy
      register_taxonomy('category_service',array('service'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' =>false,
              'rewrite'           => array( 'slug' => 'category-service'
          ),
      ));
  }
  add_action( 'init','gavias_post_type_service' );
  add_action( 'init', 'gavias_service_remove_post_type_support', 10 );
  function gavias_service_remove_post_type_support() {
    remove_post_type_support( 'service', 'post-formats' );
  }
}

  function gaviasframeworkServiceAutocompleteSuggester( $query ) {
    global $wpdb;
    $id = (int) $query;
    $query = trim( $query );
    $post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title, post_type 
            FROM {$wpdb->posts}   
            WHERE post_type = 'service' AND (ID = '%d' OR post_title LIKE '%%%s%%' )", $id > 0 ? $id : - 1, stripslashes( $query ) ), ARRAY_A );
    if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
      foreach ( $post_meta_infos as $value ) {
        $data = array();
        $data['value'] = $value['ID'];
        $data['label'] = __( 'Id', 'krowd-themer' ) . ': ' . $value['ID']  . __( ' - Title', 'krowd-themer' ) . ': ' . $value['post_title'];
        $result[] = $data;
      }
    }
    return $result;
  }

   function gaviasframeworkServiceAutocompleteRender( $query ) {
    $query = trim( $query['value'] ); 
    if ( ! empty( $query ) ) {
      $post_object = get_post( (int) $query );
      if ( is_object( $post_object ) ) {
        $post_title = $post_object->post_title;
        $post_id = $post_object->ID;
        $post_title_display = '';
        if ( ! empty( $post_title ) ) {
          $post_title_display = ' - ' . __( 'Title', 'krowd-themer' ) . ': ' . $post_title;
        }
        $post_id_display = __( 'Id', 'krowd-themer' ) . ': ' . $post_id;
        $data = array();
        $data['value'] = $post_id;
        $data['label'] = $post_id_display . $post_title_display;
        return ! empty( $data ) ? $data : false;
      }
      return false;
    }
    return false;
  }

  function gaviasthemer_service_query( $args ){
    $ds = array(
      'post_type'   => 'service',
      'posts_per_page'  =>  12
    );

    $args = array_merge( $ds , $args );
    $loop = new WP_Query($args);

    return $loop;
  }
 
  function gaviasthemer_service_terms(){
    return get_terms( 'category_service',array('orderby'=>'id') );
  }

  function gaviasthemer_service_terms_related( $postId ){
    $output = array();
    
    $item_cats = get_the_terms( $postId, 'category_service' );

    foreach((array)$item_cats as $item_cat){
      if( !empty($item_cats) && !is_wp_error($item_cats) ){
        $output[] = $item_cat->slug;
      }
    }
      
    return $output;
  }

  if(!function_exists('gaviasthemer_related_service')){
    function gaviasthemer_related_service($per_page){
      $terms = get_the_terms( get_the_ID(),  'category_service' );
      $termids =array();
     
      if(!empty($terms) && !is_wp_error($terms)){
          foreach($terms as $term){
              if( is_object($term) ){
                 $termids[] = $term->term_id;
              }
          }
      }

      $args = array(
          'post_type' => 'service',
          'posts_per_page' => $per_page,
          'post__not_in' => array( get_the_ID() ),
          'tax_query' => array(
              'relation' => 'AND',
              array(
                  'taxonomy' => 'category_service',
                  'field' => 'id',
                  'terms' => $termids,
                  'operator' => 'IN'
              )
          )
      );
      $results = new WP_Query( $args );
      return $results;
    }
  }

