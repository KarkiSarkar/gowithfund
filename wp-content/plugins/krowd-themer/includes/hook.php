<?php
 function krowd_themer_build_meta_box() {
   echo'<div class="gva-meta-tabs"><div id="gva-meta-tabs-boxes"></div></div>';
}
   
function krowd_themer_register_meta_box_holder() {
   add_meta_box( 'gaviasthemer_meta_box', esc_html__( 'Meta Options', 'krowd-themer' ), 'krowd_themer_build_meta_box', '', 'normal', 'low' );
}

add_action( 'add_meta_boxes', 'krowd_themer_register_meta_box_holder' );

function krowd_themer_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'krowd_themer_mime_types');

add_action( 'init', 'krowd_init_options', 1 );
function krowd_init_options(){
   if( empty(get_option( 'tribeEventsTemplate', '' )) ){
      update_option('tribeEventsTemplate', 'default');
   }
   if( empty(get_option( 'views_v2_enabled', '' )) ){
      update_option('views_v2_enabled', '0');
   }
   if( empty(get_option( 'wpneo_crowdfunding_dashboard_page_id', '' )) ){
      update_option('wpneo_crowdfunding_dashboard_page_id', '8394');
   }
   if( empty(get_option( 'wpneo_form_page_id', '' )) ){
      update_option('wpneo_form_page_id', '8395');
   }
}

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

add_filter('wpcf7_autop_or_not', '__return_false');
