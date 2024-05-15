<?php
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

add_theme_support( 'wp-block-styles' );

/**
 * Hook to before breadcrumb
 */
function krowd_style_breadcrumb(){
  global $post;
  $post_id = krowd_id();
  $result['title'] = get_the_title();
  $result['styles'] = '';
  $result['styles_overlay'] = '';
  $result['classes'] = '';

  $show_no_breadcrumbs = krowd_get_option('enable_breadcrumb', 'enable') == 'disable' ? true : false;
  if(get_post_meta($post_id, 'krowd_no_breadcrumbs', true) == true){
    $show_no_breadcrumbs = true;
  }
  $breadcrumb_padding_top = krowd_get_option('breadcrumb_padding_top', '100'); //275
  $breadcrumb_padding_bottom = krowd_get_option('breadcrumb_padding_bottom', '100');
  $breadcrumb_show_title = krowd_get_option('breadcrumb_show_title', '1');
  $breadcrumb_bg_color = krowd_get_option('breadcrumb_background_color', '1');;
  $breadcrumb_bg_color_opacity = krowd_get_option('breadcrumb_background_opacity', '1');
  $breadcrumb_enable_image = krowd_get_option('breadcrumb_image', '1');
  $breadcrumb_image = krowd_get_option('breadcrumb_background_image', array('id'=> 0));
  $breadcrumb_text_style = krowd_get_option('breadcrumb_text_stype', 'text-light');
  $breadcrumb_text_align = krowd_get_option('breadcrumb_text_align', 'text-left');
  $breadcrumb_page_title_one = '';
  if(get_post_meta($post_id, 'krowd_breadcrumb_layout', true) == 'page_options'){
    $breadcrumb_padding_top = get_post_meta($post_id, 'krowd_breadcrumb_padding_top', true);
    $breadcrumb_padding_bottom = get_post_meta($post_id, 'krowd_breadcrumb_padding_bottom', true);
    $breadcrumb_show_title = get_post_meta($post_id, 'krowd_page_title', true);
    $breadcrumb_bg_color = get_post_meta($post_id, 'krowd_bg_color_title', true);
    $breadcrumb_bg_color_opacity = get_post_meta($post_id, 'krowd_bg_opacity_title', true);
    $breadcrumb_enable_image = get_post_meta($post_id, 'krowd_image_breadcrumbs', true);
    $breadcrumb_image = get_post_meta($post_id, 'krowd_page_title_image', true);
    $breadcrumb_text_style = get_post_meta($post_id, 'krowd_page_title_text_style', true);
    $breadcrumb_text_align = get_post_meta($post_id, 'krowd_page_title_text_align', true);
    $breadcrumb_page_title_one = get_post_meta($post_id, 'krowd_page_title_one', true);
  }
  if ( metadata_exists( 'post', $post_id, 'krowd_page_title' ) || is_archive()) {
    $breadcrumb_show_title = true;
  }

  //Breadcrumb category and tag products
  if(krowd_woocommerce_activated() && (is_product_tag() || is_product_category() || is_shop() || is_product()) ){
    $breadcrumb_padding_top = $breadcrumb_padding_top ?: krowd_get_option('woo_breadcrumb_padding_top', '100');
    $breadcrumb_padding_bottom = $breadcrumb_padding_bottom ?: krowd_get_option('woo_breadcrumb_padding_bottom', '100');
    
    $breadcrumb_show_title =  krowd_get_option('woo_breadcrumb_show_title', '0');
    if ( metadata_exists( 'post', $post_id, 'krowd_page_title' )) {
      $breadcrumb_show_title = get_post_meta($post_id, 'krowd_page_title', true);
    }
    $breadcrumb_bg_color = $breadcrumb_bg_color ?: krowd_get_option('woo_breadcrumb_background_color', '1');;
    $breadcrumb_bg_color_opacity = $breadcrumb_bg_color_opacity ?: krowd_get_option('woo_breadcrumb_background_opacity', '1');
    $breadcrumb_image = $breadcrumb_image ?: krowd_get_option('woo_breadcrumb_background_image', array('id'=> 0));
    $breadcrumb_text_style = $breadcrumb_text_style ?: krowd_get_option('woo_breadcrumb_text_stype', 'text-light');
    $breadcrumb_text_align = $breadcrumb_text_align ?: krowd_get_option('woo_breadcrumb_text_align', 'text-left');
  }

  $result = array();
  $styles = array();
  $styles_inner = array();
  $styles_overlay = '';
  $classes = array();
  $title = '';
  if($show_no_breadcrumbs){
    $result['no_breadcrumbs'] = true;
  }

  if(!isset($breadcrumb_show_title) || empty($breadcrumb_show_title) || $breadcrumb_show_title){
    $title = get_the_title();
    if(is_archive()) $title = single_cat_title('', false);
    if(krowd_woocommerce_activated() && is_shop()){
      $title = woocommerce_page_title(false);
    }
  }

  if(is_home()) { // Home Index
    $breadcrumb_show_title = true;
    $title = esc_html__( 'Latest posts', 'krowd' );
    $breadcrumb_padding_top = '100';
    $breadcrumb_padding_bottom = '100';
    $breadcrumb_text_align = 'text-left';
    $breadcrumb_text_style = 'text-light';
    $breadcrumb_enable_image = krowd_get_option('breadcrumb_image', false);
  }
  
  if($breadcrumb_bg_color){
    $rgba_color = krowd_convert_hextorgb($breadcrumb_bg_color);
    $styles_overlay = 'background-color: rgba(' . esc_attr($rgba_color['r']) . ',' . esc_attr($rgba_color['g']) . ',' . esc_attr($rgba_color['b']) . ', ' . ($breadcrumb_bg_color_opacity/100) . ')';
  }
  //Tmp
  //Classes
  $classes[] = $breadcrumb_text_style;
  $classes[] = $breadcrumb_text_align;

  if($breadcrumb_enable_image){
    $image_background_breadcrumb = '';
    if($breadcrumb_image){

      if(is_array($breadcrumb_image)){
        if(isset($breadcrumb_image['id']) && $breadcrumb_image['id']){
          $image = wp_get_attachment_image_src( $breadcrumb_image['id'], 'full');
          if(isset($image[0]) && $image[0]){
            $image_background_breadcrumb = esc_url($image[0]);
          }
        }
      }else{
        if(is_numeric($breadcrumb_image)){
          $image = wp_get_attachment_image_src( $breadcrumb_image, 'full');
          if(isset($image[0]) && $image[0]){
            $image_background_breadcrumb = esc_url($image[0]);
          }
        }else{
          $image_background_breadcrumb = $breadcrumb_image;
        }
      }
    }
    if($image_background_breadcrumb) {
      $styles[] = 'background-image: url(\'' . $image_background_breadcrumb . '\')';
    }
  }
  
  if(is_single() && empty($breadcrumb_page_title_one)){
    $title = get_the_title();
  }

  if($breadcrumb_padding_top){
    $styles_inner[] = "padding-top:{$breadcrumb_padding_top}px";
  }
  if($breadcrumb_padding_bottom){
    $styles_inner[] = "padding-bottom:{$breadcrumb_padding_bottom}px";
  }

  if( function_exists('tribe_is_month') && tribe_is_month() ){
   // $title = esc_html__( 'Events', 'krowd' );
  }

  if(is_single() && get_post_type() == 'post'){
    $title = esc_html__( 'News', 'krowd' );
  }

  if( get_post_type() == 'service'){
    $title = esc_html__( 'Service', 'krowd' );
  }

    if( get_post_type() == 'gva_event'){
    $title = esc_html__( 'Event', 'krowd' );
  }

  if( get_post_type() == 'portfolio'){
    $title = esc_html__( 'Portfolio', 'krowd' );
  }
 
  if(is_search()){
    $title = esc_html__('Search', 'krowd');
  }

  if(function_exists('is_product') && is_product()){
    $title = esc_html__('Product', 'krowd');
    if( class_exists( 'WC_Product_Factory' ) && WC_Product_Factory::get_product_type( $post_id ) == 'crowdfunding'){ 
      $title = esc_html__('Project', 'krowd');
    }
    $title = get_the_title();
  }

  if($breadcrumb_page_title_one){
    $title = $breadcrumb_page_title_one;
  }  

  $result['title'] = apply_filters('breadcrumb_title', $title);
  $result['styles'] = $styles;
  $result['styles_inner'] = $styles_inner;
  $result['styles_overlay'] = $styles_overlay;
  $result['classes'] = $classes;
  $result['show_page_title'] = $breadcrumb_show_title;
  return $result;
}

function krowd_breadcrumb(){
   $result = krowd_style_breadcrumb();
   extract($result);
   if(isset($no_breadcrumbs) && $no_breadcrumbs == true){
    echo '<div class="disable-breadcrumb clearfix"></div>';
    return false;
   }
    $image_breadcumb_standard = krowd_get_option('image_breadcumb_standard', 'show-bg');
    $classes[] = $image_breadcumb_standard;
   ?>
   
   <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>

      <?php if($styles_overlay){ ?>
         <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
      <?php } ?>
      <div class="breadcrumb-main">
        <div class="container">
          <div class="breadcrumb-container-inner" <?php echo(count($styles_inner) > 0 ? 'style="' . implode(';', $styles_inner) . '"' : ''); ?>>
            <?php if($title && $show_page_title){ 
              echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
            } ?>
            <?php krowd_general_breadcrumbs(); ?>
          </div>  
        </div>   
      </div>  
   </div>
   <?php
}

add_action( 'krowd_before_page_content', 'krowd_breadcrumb', '10' );

/**
 * Hook to select footer of page
 */
function krowd_get_footer_layout( $footer = '' ){
  $post = get_post();
  
  $footer = ($post && get_post_meta( $post->ID, 'krowd_page_footer', true )) ? get_post_meta( $post->ID, 'krowd_page_footer', true ) : '__default_option_theme';
  
  if ( $footer == '__default_option_theme'){
    $footer = krowd_get_option('footer_layout', '');
  }else{
    return trim( $footer );
  }

  return $footer;
} 
add_filter( 'krowd_get_footer_layout', 'krowd_get_footer_layout' );

/**
 * Hook to select footer of page
 */
function krowd_get_header_layout( $header = '' ){
  $post = get_post();
  $header = ($post && get_post_meta( $post->ID, 'krowd_page_header', true )) ? get_post_meta( $post->ID, 'krowd_page_header', true ) : '__default_option_theme';
  if ( $header == '__default_option_theme'){
    $header = krowd_get_option('header_layout', '');
  }
  if(empty($header)){
    $header = 'main-menu';
  }
  if( is_search() ) {
    $header = krowd_get_option('header_layout', '');
  }
  return $header;
} 
add_filter( 'krowd_get_header_layout', 'krowd_get_header_layout' );

function krowd_main_menu(){
  if(has_nav_menu( 'primary' )){
    $krowd_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-main-menu',
      'menu_class'        => ' gva-nav-menu gva-main-menu',
      'walker'            => new krowd_Walker()
    );
    wp_nav_menu($krowd_menu);
  }  
}
add_action( 'krowd_main_menu', 'krowd_main_menu', 10 );
 
function krowd_mobile_menu(){
  if(has_nav_menu( 'primary' )){
    $krowd_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-mobile-menu',
      'menu_class'        => 'gva-nav-menu gva-mobile-menu',
      'walker'            => new krowd_Walker()
    );
    wp_nav_menu($krowd_menu);
  }  
}
add_action( 'krowd_mobile_menu', 'krowd_mobile_menu', 10 );

function krowd_my_account_menu(){
  if(has_nav_menu( 'my_account' )){
    $krowd_menu = array(
      'theme_location'    => 'my_account',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-my-account-menu',
      'menu_class'        => 'gva-my-account-menu',
      'walker'            => new krowd_Walker()
    );
    wp_nav_menu($krowd_menu);
  }  
}
add_action( 'krowd_my_account_menu', 'krowd_my_account_menu', 11 );

function krowd_header_mobile(){
  get_template_part('templates/parts/header', 'mobile');
}
add_action('krowd_header_mobile', 'krowd_header_mobile', 10);


if ( !function_exists( 'krowd_style_footer' ) ) {
  function krowd_style_footer(){
    $footer = krowd_get_footer_layout(''); 
    
    if($footer!='default'){
      $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
          '.$shortcodes_custom_css.'
          </style>';
      }
    }
  }
  add_action('wp_head','krowd_style_footer', 18);
}

add_filter('gavias-elements/map-api', 'krowd_googlemap_api');
if(!function_exists('krowd_googlemap_api')){
  function krowd_googlemap_api( $key = '' ){
    return krowd_get_option('map_api_key', '');
  }
}

add_filter('gavias-post-type/slug-service', 'krowd_slug_service');
if(!function_exists('krowd_slug_service')){
  function krowd_slug_service( $key = '' ){
    return krowd_get_option('slug_service', '');
  }
}

add_filter('gavias-post-type/slug-portfolio', 'krowd_slug_portfolio');
if(!function_exists('krowd_slug_portfolio')){
  function krowd_slug_portfolio( $key = '' ){
    return krowd_get_option('slug_portfolio', '');
  }
}

function krowd_load_posttypes_default(){
  return array('megamenu');
}
add_filter( 'gaviasthemer_load_posttypes_default', 'krowd_load_posttypes_default', 11, 2 );

function krowd_setup_admin_setting(){
  global $pagenow; 
  if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    update_option( 'gaviasthemer_active_post_types', array() );
    update_option( 'thumbnail_size_w', 180 );  
    update_option( 'thumbnail_size_h', 180 );  
    update_option( 'thumbnail_crop', 1 );  
    update_option( 'medium_size_w', 600 );  
    update_option( 'medium_size_h', 600 ); 
    update_option( 'medium_crop', 1 );  
  }
}
add_action( 'init', 'krowd_setup_admin_setting'  );

if ( !function_exists( 'krowd_page_class_names' ) ) {
  function krowd_page_class_names( $classes ) {
    $class_el = get_post_meta( krowd_id(), 'krowd_extra_page_class', true  );
    if($class_el) $classes[] = $class_el;
    return $classes;
  }
}
add_filter( 'body_class', 'krowd_page_class_names' );

if ( ! function_exists( 'wp_body_open' ) ){
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

function krowd_lost_password_redirect() {
  wp_redirect( home_url() ); 
  exit;
}
add_action('after_password_reset', 'krowd_lost_password_redirect');

function krowd_logout_redirect() {
  wp_redirect( home_url() ); 
  exit;
}
add_action('wp_logout', 'krowd_logout_redirect');

function krowd_logout_url( $url ) {
   $redirect = home_url();
   return $url.'&redirect_to='.$redirect;
}
add_filter( 'logout_url', 'krowd_logout_url' );


function krowd_nav_items( $items, $menu, $args ) {
  if( is_admin() ){
    return $items;
  }
  foreach( $items as $item ) {
    if( $item->attr_title == 'logout' ){
      $item->url = wp_logout_url(home_url('/'));
    }
  }
   return $items;
}
add_filter( 'wp_get_nav_menu_items', 'krowd_nav_items', 11, 3 );
