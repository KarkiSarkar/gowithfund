<?php
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10 );
add_action('woocommerce_after_single_product_summary', 'krowd_woocommerce_output_product_data', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'krowd_woocommerce_breadcrumb', 20 );

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_filter( 'loop_shop_per_page', 'krowd_woocommerce_shop_pre_page', 20 );

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title',  'krowd_swap_images', 10);

// Add save percent next to sale item prices.
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'krowd_woocommerce_custom_sales_price', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


if(!function_exists('krowd_woocommerce_custom_sales_price')){
  function krowd_woocommerce_custom_sales_price() {
    global $product;
    if($product->get_sale_price()){
      $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
      echo ( '<span class="onsale">-' . $percentage . '%</span>' );
    }
  }
}

if(!function_exists('krowd_woocommerce_shop_pre_page')){
   function krowd_woocommerce_shop_pre_page(){
      return krowd_get_option('products_per_page', 16);
   }
}

add_theme_support( 'woocommerce', array(
  'gallery_thumbnail_image_width' => 180,
));

if(!function_exists('krowd_woocommerce_breadcrumb')){
  function krowd_woocommerce_breadcrumb(){
      $result = krowd_style_breadcrumb();
      extract($result);
      if(isset($no_breadcrumbs) && $no_breadcrumbs == true) return;
    ?>
    <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
      <?php if($styles_overlay){ ?>
         <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
      <?php } ?>
      <div class="breadcrumb-main">
        <div class="container">
          <div class="breadcrumb-container-inner" <?php echo(count($styles_inner) > 0 ? 'style="' . implode(';', $styles_inner) . '"' : ''); ?>>
            <?php krowd_general_breadcrumbs(); ?>
            <?php if($title && $show_page_title){  
              echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
            } ?>
          </div>  
        </div>   
      </div>  
    </div>
    <?php
  }
}

if ( ! function_exists( 'krowd_woocommerce_output_product_data_accordions' ) ) {
   function krowd_woocommerce_output_product_data_accordions() {
      wc_get_template( 'single-product/tabs/accordions.php' );
   }
}

if(!function_exists('krowd_woocommerce_output_product_data')){
   function krowd_woocommerce_output_product_data(){
      global $post;
      $tab_style = get_post_meta($post->ID, 'krowd_product_tab_style', true);
      $tab_style = 'tabs';
      if($tab_style == 'accordion'){
         krowd_woocommerce_output_product_data_accordions();
      }else{
         woocommerce_output_product_data_tabs();
      }
   }
}      


function krowd_swap_images(){
  global $post, $product, $woocommerce;
  $output = '';
  $class = 'image';
  if(has_post_thumbnail()){
      $attachment_ids = $product->get_gallery_image_ids();
      if($attachment_ids && isset($attachment_ids[0])) {
        $output .= '<div class="swap-thumbnail">';
        $output .= '<a href="' . get_the_permalink() . '">';
        $class = 'image-second';
        $output .= wp_get_attachment_image($attachment_ids[0],'shop_catalog', false, array('class'=>$class));
      }

      $output .= '<span class="attachment-shop_catalog">' . get_the_post_thumbnail( $post->ID,'shop_catalog', array('class'=>'') ) . '</span>';

      if($attachment_ids && isset($attachment_ids[0])) {
         $output .= '</a>';
         $output .= '</div>';
          
      }
  }else{
      $output .= '<a href="' . get_the_permalink() . '">';
        $output .= '<img src="'.wc_placeholder_img_src().'" alt="'. $post->title .'" class="'.$class.'" />';
      $output .= '</a>';
  }
 
  echo trim($output);
}


/*
 * Load product ajax (Quick view)
*/
if ( ! function_exists('krowd_ajax_load_product')){
   function krowd_ajax_load_product() {
      global $woocommerce, $product, $post;
      $product = wc_get_product( $_POST['product_id'] );
      $post = $product->post;
      $output = '';
      
      setup_postdata( $post );
         
      ob_start();
      wc_get_template_part( 'quickview/content', 'quickview' );
      $output = ob_get_clean();
      
      wp_reset_postdata();
            
      echo trim($output);
            
      exit;
   }
}   

add_action( 'wp_ajax_krowd_ajax_load_product' , 'krowd_ajax_load_product' );
add_action( 'wp_ajax_nopriv_krowd_ajax_load_product', 'krowd_ajax_load_product' );
add_action( 'wc_ajax_krowd_ajax_load_product', 'krowd_ajax_load_product' );

/*
 * Load product ajax (Quick view)
*/
if ( ! function_exists('krowd_ajax_load_product_tab')){
   function krowd_ajax_load_product_tab() {
      global $woocommerce, $product, $post;
      $output = '';
      
      $columns_count = $_POST['columns'];
      $carousel_row = $_POST['row'];
      $style = $_POST['style'];
      $product_cat = $_POST['categories'];
      $number = $_POST['number'];
      $product_type = $_POST['product_type'];
      $class_column = krowd_calc_class_grid($columns_count);
      $loop = krowd_woocommerce_query($product_type, $number, $product_cat);
         
      ob_start();
      
      if($loop->have_posts()){
        wc_get_template( 'display/'.$style.'.php' , array( 'loop'=>$loop, 'columns_count'=>$columns_count, 'class_column'=>$class_column, 'carousel_row' => $carousel_row  ) );
      }

      $output = ob_get_clean();
      
      wp_reset_postdata();
            
      echo trim($output);
            
      exit;
   }
}   

add_action( 'wp_ajax_krowd_ajax_load_product_tab' , 'krowd_ajax_load_product_tab' );
add_action( 'wp_ajax_nopriv_krowd_ajax_load_product_tab', 'krowd_ajax_load_product_tab' );
add_action( 'wc_ajax_krowd_ajax_load_product_tab', 'krowd_ajax_load_product_tab' );

function krowd_redirect_login( $redirect, $user ) {
  $url = '';
  $redirect_page_id = url_to_postid( $redirect );
  
  if(get_option('wpneo_crowdfunding_dashboard_page_id')){
    $redirect_page_id = get_option('wpneo_crowdfunding_dashboard_page_id');
    $url = get_permalink($redirect_page_id);
  }

  $checkout_page_id = wc_get_page_id( 'checkout' );
  if( $redirect_page_id == $checkout_page_id ) {
    $url = $redirect;
  }
  if(empty($url)){
    $url = wc_get_page_permalink( 'shop' );
  }
  $url_redirect = apply_filters('krowd_redirect_login', $url);
  return $url_redirect;
}

add_filter( 'woocommerce_login_redirect', 'krowd_redirect_login', 10, 2 );


function krowd_redirect_after_registration(){
  if(get_option('wpneo_crowdfunding_dashboard_page_id')){
    $redirect_page_id = get_option('wpneo_crowdfunding_dashboard_page_id');
    $url = get_permalink($redirect_page_id);
    wp_redirect($url);
    exit();
  }
}
add_action('woocommerce_registration_redirect', 'krowd_redirect_after_registration', 2);


function krowd_single_page_published_and_draft_posts($query){
  $uid = get_current_user_id();
  if(is_single()){
      $pid = isset($query->query['p']) ? $query->query['p'] : '';
      if($pid){
        $post = get_post($pid);
        if($post){
          $author_id = $post->post_author;
          if($uid == $author_id){
            $query->set('post_status', 'publish,draft');
          }
        }
      }
  }
}
add_action('pre_get_posts', 'krowd_single_page_published_and_draft_posts'); 

