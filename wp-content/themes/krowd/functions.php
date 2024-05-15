<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

define( 'KROWD_THEME_DIR', get_template_directory() );
define( 'KROWD_THEME_URL', get_template_directory_uri() );

/*
 * Include list of files from Gavias Framework.
 */
require_once(KROWD_THEME_DIR . '/includes/theme-functions.php'); 
require_once(KROWD_THEME_DIR . '/includes/template.php'); 
require_once(KROWD_THEME_DIR . '/includes/theme-hook.php'); 
require_once(KROWD_THEME_DIR . '/includes/theme-layout.php'); 
require_once(KROWD_THEME_DIR . '/includes/metaboxes.php'); 
require_once(KROWD_THEME_DIR . '/includes/menu/megamenu.php'); 
require_once(KROWD_THEME_DIR . '/includes/elementor/hooks.php');
require_once(KROWD_THEME_DIR . '/includes/customize/custom-typo.php'); 
require_once(KROWD_THEME_DIR . '/includes/customize/custom-color.php'); 

//Load Woocommerce
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
  add_theme_support( "woocommerce" );
  require_once(KROWD_THEME_DIR . '/includes/woocommerce/functions.php'); 
  require_once(KROWD_THEME_DIR . '/includes/woocommerce/hooks.php'); 
}

// Load Redux - Theme options framework
if( class_exists( 'Redux' ) ){
  require( KROWD_THEME_DIR . '/includes/options/init.php' );
  require_once(KROWD_THEME_DIR . '/includes/options/opts-general.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-header.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-breadcrumb.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-footer.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-styling.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-typography.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-blog.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-page.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-woo.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-portfolio.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-event.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-service.php'); 
  require_once(KROWD_THEME_DIR . '/includes/options/opts-socials.php'); 
} 

// TGM plugin activation
if ( is_admin() ) {
  require_once( KROWD_THEME_DIR . '/includes/tgmpa/class-tgm-plugin-activation.php' );
  require( KROWD_THEME_DIR . '/includes/tgmpa/config.php' );
}
load_theme_textdomain( 'krowd', get_template_directory() . '/languages' );

//-------- Register sidebar default in theme -----------
//------------------------------------------------------
function krowd_widgets_init() {
    
    register_sidebar( array(
        'name' => esc_html__( 'Default Sidebar', 'krowd' ),
        'id' => 'default_sidebar',
        'description' => esc_html__( 'Appears in the Default Sidebar section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'WooCommerce Sidebar', 'krowd' ),
        'id' => 'woocommerce_sidebar',
        'description' => esc_html__( 'Appears in the Plugin WooCommerce section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'WooCommerce Single', 'krowd' ),
        'id' => 'woocommerce_single_summary',
        'description' => esc_html__( 'Appears in the WooCommerce Single Page like social, description text ...', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Portfolio Sidebar', 'krowd' ),
        'id' => 'portfolio_sidebar',
        'description' => esc_html__( 'Appears in the Portfolio Page section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'After Offcanvas Mobile', 'krowd' ),
        'id' => 'offcanvas_sidebar_mobile',
        'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Service Sidebar', 'krowd' ),
        'id' => 'service_sidebar',
        'description' => esc_html__( 'Appears in the Sidebar section of the Service Page.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'krowd' ),
        'id' => 'blog_sidebar',
        'description' => esc_html__( 'Appears in the Blog sidebar section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Page Sidebar', 'krowd' ),
        'id' => 'other_sidebar',
        'description' => esc_html__( 'Appears in the Page Sidebar section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer first', 'krowd' ),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__( 'Appears in the Footer first section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer second', 'krowd' ),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__( 'Appears in the Footer second section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer third', 'krowd' ),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__( 'Appears in the Footer third section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer four', 'krowd' ),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__( 'Appears in the Footer four section of the site.', 'krowd' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'krowd_widgets_init' );


if ( ! function_exists( 'krowd_fonts_url' ) ) :
/**
 *
 * @return string Google fonts URL for the theme.
 */
function krowd_fonts_url() {
  $fonts_url = '';
  $fonts     = array();
  $subsets   = '';
  $protocol = is_ssl() ? 'https' : 'http';
  /*
   * Translators: If there are characters in your language that are not supported
   * by Noto Sans, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'krowd' ) ) {
    $fonts[] = 'Poppins:400,500,600,700,900';
  }

  /*
   * Translators: To add an additional character subset specific to your language,
   * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
   */
  $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'krowd' );

  if ( 'cyrillic' == $subset ) {
    $subsets .= ',cyrillic,cyrillic-ext';
  } elseif ( 'greek' == $subset ) {
    $subsets .= ',greek,greek-ext';
  } elseif ( 'devanagari' == $subset ) {
    $subsets .= ',devanagari';
  } elseif ( 'vietnamese' == $subset ) {
    $subsets .= ',vietnamese';
  }

  if ( $fonts ) {
    $fonts_url = add_query_arg( array(
      'family' => ( implode( '%7C', $fonts ) ),
      'subset' => ( $subsets ),
    ),  $protocol.'://fonts.googleapis.com/css' );
  }

  return $fonts_url;
}
endif;

function krowd_custom_styles() {
  $custom_css = get_option( 'krowd_theme_custom_styles' );
  if($custom_css){
    wp_enqueue_style(
      'krowd-custom-style',
      KROWD_THEME_URL . '/css/custom_script.css'
    );
    wp_add_inline_style( 'krowd-custom-style', $custom_css );
  }
}
add_action( 'wp_enqueue_scripts', 'krowd_custom_styles', 9999 );

function krowd_init_scripts(){
  global $post;
  $protocol = is_ssl() ? 'https' : 'http';
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    wp_enqueue_script( 'comment-reply' );
  }

  $theme = wp_get_theme();
  $theme_version = $theme['Version'];

  wp_enqueue_style( 'krowd-fonts', krowd_fonts_url(), array(), null );
  wp_enqueue_script('popper', KROWD_THEME_URL . '/js/popper.min.js', array('jquery') );
  wp_enqueue_script('bootstrap', KROWD_THEME_URL . '/js/bootstrap.js', array('jquery') );
  wp_enqueue_script('scrollbar', KROWD_THEME_URL . '/js/perfect-scrollbar.jquery.min.js');
  wp_enqueue_script('magnific', KROWD_THEME_URL . '/js/magnific/jquery.magnific-popup.min.js');
  wp_enqueue_script('cookie', KROWD_THEME_URL . '/js/jquery.cookie.js', array('jquery'));
  wp_enqueue_script('lightgallery', KROWD_THEME_URL . '/js/lightgallery/js/lightgallery.min.js' );
  wp_enqueue_script('sticky', KROWD_THEME_URL . '/js/sticky.js', array('elementor-waypoints'));
  wp_enqueue_script('owl-carousel', KROWD_THEME_URL . '/js/owl-carousel/owl.carousel.min.js');
  wp_enqueue_script('jquery.appear', KROWD_THEME_URL . '/js/jquery.appear.js');
  wp_enqueue_script('krowd-main', KROWD_THEME_URL . '/js/main.js', array('imagesloaded', 'jquery-masonry'));
  wp_enqueue_script('krowd-woocommerce', KROWD_THEME_URL . '/js/woocommerce.js');

  if(krowd_woocommerce_activated() ){
    wp_dequeue_script('wc-add-to-cart');
    wp_register_script( 'wc-add-to-cart', KROWD_THEME_URL . '/js/add-to-cart.js' , array( 'jquery' ) );
    wp_enqueue_script('wc-add-to-cart');
    $register_html = esc_html__("New here?", 'krowd');
    $register_link = apply_filters('krowd_register_link', wc_get_page_permalink('myaccount'));
    $register_html .= '<a class="text-theme" href="' . $register_link . '">&nbsp;' . esc_html__('Create an Account', 'krowd') . '</a>';
    wp_localize_script('krowd-main', 'krowd_data', array( 'my_account_link' => $register_html));
  }

  if(class_exists('WPCF\Crowdfunding')){
    wp_dequeue_style('neo-crowdfunding-css-front');
    wp_dequeue_style('wpcf_style');
    wp_enqueue_style('krowd-crowdfunding-css', KROWD_THEME_URL . '/css/wpcf.css' );
  }

  wp_enqueue_style('lightgallery', KROWD_THEME_URL . '/js/lightgallery/css/lightgallery.min.css');
  wp_enqueue_style('lightgallery', KROWD_THEME_URL . '/js/lightgallery/css/lg-transitions.min.css');
  wp_enqueue_style('owl-carousel', KROWD_THEME_URL .'/js/owl-carousel/assets/owl.carousel.css');
  wp_enqueue_style('magnific', KROWD_THEME_URL .'/js/magnific/magnific-popup.css');
  wp_enqueue_style('fontawesome', KROWD_THEME_URL . '/css/fontawesome/css/all.css');

  wp_enqueue_style('krowd-style', KROWD_THEME_URL . '/style.css');

  $skin = krowd_get_option('skin_color', '');
  if(!empty($skin)){
    $skin = 'skins/' . $skin . '/'; 
  }

  wp_enqueue_style('krowd-bootstrap', KROWD_THEME_URL . '/css/' . $skin . 'bootstrap.css', array(), $theme_version, 'all'); 
  wp_enqueue_style('krowd-woocoomerce', KROWD_THEME_URL . '/css/' . $skin . 'woocommerce.css', array(), $theme_version, 'all'); 
  wp_enqueue_style('krowd-template', KROWD_THEME_URL . '/css/' . $skin . 'template.css', array(), $theme_version, 'all');
}
add_action('wp_enqueue_scripts', 'krowd_init_scripts', 999);


//update
function krowd_crowdfunding_scripts(){
  $dashboard_url = get_home_url();
  if(get_option('wpneo_crowdfunding_dashboard_page_id')){
    $dashboard_page_id = get_option('wpneo_crowdfunding_dashboard_page_id');
    $dashboard_url = get_permalink($dashboard_page_id) . '?page_type=campaign';
  }
  if(class_exists('WPCF\Crowdfunding')){
    wp_dequeue_script('wp-neo-jquery-scripts-front');
    wp_enqueue_script('wp-neo-jquery-scripts-front-theme', KROWD_THEME_URL .'/js/crowdfunding-front.js', array('jquery'), '1.0.3', true);
    wp_localize_script('wp-neo-jquery-scripts-front-theme', 'wpcf_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php')));
    wp_localize_script('wp-neo-jquery-scripts-front-theme', 'krowd_wpcf_data', array( 
      'dashboard_url' => $dashboard_url
    ));
  }
}

add_action('wp_enqueue_scripts', 'krowd_crowdfunding_scripts', 999);


add_action( 'template_redirect', 'krowd_login_failed_notice' );
function krowd_login_failed_notice(){
  if( isset($_GET['login']) && ($_GET['login'] == 'failed' || strpos($_GET['login'], 'failed') !== false ) ){
    wc_add_notice( esc_html__( 'The password or the username are incorrect.', 'krowd' ), 'error' );
  }
}

