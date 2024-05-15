<?php
/* Save custom theme styles */
if ( ! function_exists( 'krowd_custom_styles_save' ) ) :
function krowd_custom_styles_save() {

	$main_font = false;
	$main_font_enabled = ( krowd_get_option('main_font_source', 0) == 0 ) ? false : true;
	if ( $main_font_enabled ) {
		$font_main = krowd_get_option('main_font', '');
		if(isset($font_main['font-family']) && $font_main['font-family']){
			$main_font = $font_main['font-family'];
		}
	}

	$secondary_font = false;
	$secondary_font_enabled = ( krowd_get_option('secondary_font_source', 0) == 0 ) ? false : true;
	if ( $secondary_font_enabled ) {
		$font_second = krowd_get_option('secondary_font', '');
		if(isset($font_second['font-family']) && $font_second['font-family']){
			$secondary_font = $font_second['font-family'];
		}
	}

	ob_start();
?>


/* Typography */
<?php if ( $main_font_enabled && isset($main_font) && $main_font ) : ?>
body, 
.elementor-accordion .elementor-accordion-item .elementor-tab-title a span, .gsc-icon-box-group.style-1 .icon-box-item-content .icon-box-item-inner .title,
.milestone-block.style-2 .box-content .milestone-content .milestone-number-inner, .gva-testimonial-carousel.style-1 .testimonial-item .testimonial-content .quote-icon,
.gva-testimonial-carousel.style-1 .testimonial-item .testimonial-content .testimonial-information span.testimonial-name, .gva-locations-map .gm-style-iw div .marker .info,
.gsc-work-process .box-content .number-text, .post-type-archive-tribe_events table.tribe-events-calendar tbody td .tribe-events-month-event-title,
.wpneo-list-details .campaign-top .campaign-single-right .campaign-info .info-item .info-value, #comments ol.comment-list > li #respond #reply-title #cancel-comment-reply-link,
tooltip, popover, h1, h2, h3, h4, h5, h6,.h1, .h2, .h3, .h4, .h5, .h6
{
	font-family:<?php echo esc_attr( $main_font ); ?>,sans-serif;
}
<?php endif; ?>

<?php if ( $secondary_font_enabled && isset($secondary_font) && $secondary_font ) : ?>
h1, h2, h3, h4, h5, h6,.h1, .h2, .h3, .h4, .h5, .h6
{
	font-family:<?php echo esc_attr( $secondary_font ); ?>,sans-serif;
}
<?php endif; ?>

/* ----- Main Color ----- */
<?php if($style = krowd_get_option('main_color', '')){ ?>
	body{
		color:<?php echo esc_attr($style) ?>;
	}
<?php } ?>

/* ----- Background body ----- */
<?php 
	$main_background = krowd_get_option('main_background_image', '');
	if(isset($main_background['url']) && $main_background['url']){
?>
body{
	<?php if ( strlen( $main_background['url'] ) > 0 ) : ?>
	background-image:url("<?php echo esc_url( $main_background['url'] ); ?>");
	<?php if ( krowd_get_option('main_background_image_type', '') == 'fixed' ) : ?>
	background-attachment:fixed;
	background-size:cover;
	<?php else : ?>
	background-repeat:repeat;
	background-position:0 0;
	<?php endif; endif; ?>
	background-color:<?php echo esc_attr( krowd_get_option('main_background_color', '') ); ?>;
}
<?php } ?>

/* ----- Main content ----- */
<?php if(krowd_get_option('content_background_color', '')){ ?>
div.page {
	background: <?php echo esc_attr( krowd_get_option('content_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(krowd_get_option('content_font_color', '')){ ?>
div.page {
	color: <?php echo esc_attr( krowd_get_option('content_font_color', '') ); ?>;
}
<?php } ?>

<?php if(krowd_get_option('content_font_color_link', '')){ ?>
div.page a{
	color: <?php echo esc_attr( krowd_get_option('content_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(krowd_get_option('content_font_color_link_hover', '')){ ?>
div.page a:hover, div.page a:active, div.page a:focus {
	background: <?php echo esc_attr( krowd_get_option('content_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Footer content ----- */
<?php if(krowd_get_option('footer_background_color', '')){ ?>
#wp-footer {
	background: <?php echo esc_attr( krowd_get_option('footer_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(krowd_get_option('footer_font_color', '')){ ?>
#wp-footer {
	color: <?php echo esc_attr( krowd_get_option('footer_font_color', '') ); ?>;
}
<?php } ?>

<?php if(krowd_get_option('footer_font_color_link', '')){ ?>
#wp-footer a{
	color: <?php echo esc_attr( krowd_get_option('footer_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(krowd_get_option('footer_font_color_link_hover', '')){ ?>
#wp-footer a:hover, #wp-footer a:active, #wp-footer a:focus {
	background: <?php echo esc_attr( krowd_get_option('footer_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Breacrumb Style ----- */

<?php
	$styles = ob_get_clean();
	
    $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
	
	$styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
		
	update_option( 'krowd_theme_custom_styles', $styles, true );
}
endif;

add_action( 'redux/options/krowd_theme_options/saved', 'krowd_custom_styles_save' );


/* Make sure custom theme styles are saved */
function krowd_custom_styles_install() {
	if ( ! get_option( 'krowd_theme_custom_styles' ) && get_option( 'krowd_theme_options' ) ) {
		krowd_custom_styles_save();
	}
}

add_action( 'redux/options/krowd_theme_options/register', 'krowd_custom_styles_install' );
