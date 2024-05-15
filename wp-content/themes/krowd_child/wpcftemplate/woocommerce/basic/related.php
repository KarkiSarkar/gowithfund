<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
$posts_per_page = 5;
$related = wc_get_related_products( $product->get_id(), $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'posts_per_page' 		=> $posts_per_page,
	'post__in' 				=> $related,
	'post__not_in'			=> array( $product->get_id() ),
	'tax_query'				=> array(
      'taxonomy' => 'product_type',
      'field' => 'slug',
      'terms' => 'crowdfunding',
	)
) );
$show = 3;
$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>
	<div class="project-related">
		<div class="content-inner">
	      <div class="container">
	         <div class="row">
	            <div class="col-12">
						<div class="related project">
							<div class="widget-heading margin-bottom-10">
								<div class="widget-subtitle"><?php echo esc_html(krowd_get_option('related_subheading_text', 'Businesses You Can Back' )) ?></div>
								<h2 class="widget-title"><?php echo esc_html(krowd_get_option('related_heading_text', 'Similar Projects' )) ?></h2>
							</div>	
							<div class="carousel-view">
								<div class="init-carousel-owl-theme owl-carousel" data-items="<?php echo esc_attr($show); ?>"data-items_lg="<?php echo esc_attr($show); ?>" data-items_md="3" data-items_sm="2" data-items_xs="1" data-items_xx="1" data-loop="1" data-speed="800" data-auto_play="1" data-auto_play_speed="800" data-auto_play_timeout="6000" data-auto_play_hover="1" data-navigation="1" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
									<?php while ( $products->have_posts() ) : $products->the_post(); ?>
										<?php get_template_part('wpcftemplate/content', 'style-1' ); ?>
									<?php endwhile; // end of the loop. ?>
								</div>	
							</div>	
						</div>
					</div>
	         </div>      
	      </div>
	   </div>
   </div>   

<?php endif;

wp_reset_postdata();
