<?php
if($settings['alias_slider']){
   echo '<div class="wp-block-themepunch-revslider">';
      echo do_shortcode( '[rev_slider ' . $settings['alias_slider'] . ']' );
   echo '</div>';
}else{
   echo '<div class="no-slides-text text-center" style="padding: 30px 0;border: 1px solid #ccc;">' . esc_html__('No slides found, please choose slider', 'krowd-themer') . '</div>';
}