<?php
defined( 'ABSPATH' ) || exit;

global $post;
$user_info = get_user_meta($post->post_author);
$creator = get_user_by('id', $post->post_author);

?>

<div class="wpneo-campaign-creator-info-wrapper">
    <div class="wpneo-campaign-creator-avatar">
        <?php if ( $post->post_author ) {
            $img_src = '';
            $image_id = get_user_meta( $post->post_author,'profile_image_id', true );
            if( $image_id){
                $img_src = wp_get_attachment_image_src( $image_id, 'backer-portfo' )[0];
            } ?>
            <?php if( $img_src ){ ?>
                <img width="80" height="80" src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_html__('Creator', 'krowd') ?>">
            <?php } else { ?>
                <?php  echo get_avatar($post->post_author, 80); ?>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="wpneo-campaign-creator-details">
        <div><span><?php echo esc_html__( 'By', 'krowd' ) ?></span>&nbsp;<a href="javascript:;" data-author="<?php echo esc_attr($post->post_author); ?>" class="wpneo-fund-modal-btn" ><?php echo wpcf_function()->get_author_name(); ?></a> </div>
        <div><?php echo wpcf_function()->author_campaigns($post->post_author)->post_count; ?> <?php echo esc_html__("Campaigns","krowd"); ?> | <?php echo wpcf_function()->loved_count(); ?> <?php echo esc_html__('Loved campaigns', 'krowd'); ?> </div>
        <?php if ( ! empty($user_info['profile_website'][0])){ ?>
            <div><a href="<?php echo wpcf_function()->url($user_info['profile_website'][0]); ?>"><strong> <?php echo wpcf_function()->url($user_info['profile_website'][0]); ?></strong></a></div>
        <?php } ?>
    </div>
</div>