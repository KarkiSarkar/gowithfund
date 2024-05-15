<?php

//=== Rate comment metabox
add_filter( 'comment_edit_redirect',  'krowd_themer_save_comment_rate', 10, 2 );
add_action( 'add_meta_boxes', 'krowd_themer_add_comment_rate' );
function krowd_themer_save_comment_rate( $location, $comment_id ){
  if( !wp_verify_nonce( $_POST['noncename_comment_rate'], plugin_basename( __FILE__ ) ) && !isset( $_POST['rate'] ) ){
    return $location;
  }
  update_comment_meta( $comment_id, 'rate', sanitize_text_field( $_POST['rate'] ) );
  return $location;
}

function krowd_themer_add_comment_rate() {
  add_meta_box( 
    'section_id_wpse_82317',
    esc_html__( 'Rating for course', 'krowd' ),
    'krowd_themer_inner_comment_rate',
    'comment',
    'normal'
  );
}

function krowd_themer_inner_comment_rate( $comment ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'noncename_comment_rate' );
  $c_meta = get_comment_meta( $comment->comment_ID, 'rate', true );
 
  echo '<select id="rate" name="rate">';
    echo '<option value="1"'.(esc_attr($c_meta)==1?'selected':'').'>1</option>';
    echo '<option value="2"'.(esc_attr($c_meta)==2?'selected':'').'>2</option>';
    echo '<option value="3"'.(esc_attr($c_meta)==3?'selected':'').'>3</option>';
    echo '<option value="4"'.(esc_attr($c_meta)==4?'selected':'').'>4</option>';
    echo '<option value="5"'.(esc_attr($c_meta)==5?'selected':'').'>5</option>';
  echo '</select>';  
}