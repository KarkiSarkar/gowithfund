<?php
defined( 'ABSPATH' ) || exit;
$days_remaining = apply_filters('date_expired_msg', esc_html__('0', 'krowd'));
if (wpcf_function()->get_date_remaining()){
    $days_remaining = apply_filters('date_remaining_msg', esc_html__(wpcf_function()->get_date_remaining() . ' ', 'krowd'));
}

$end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);
if ($end_method != 'never_end'){ ?>
    <div class="campaign-time-remaining">
        <?php if (wpcf_function()->is_campaign_started()){ ?>
            <?php $date_remaining = wpcf_function()->get_date_remaining(); ?>
            <span class="info-value time-remaining-desc"><?php echo wpcf_function()->get_date_remaining(); ?></span>
            
            <?php if(trim($date_remaining) == '1'){ ?>
                <span class="info-label time-remaining-name"><?php echo esc_html__( 'Day Left','krowd' ); ?></span>
            <?php }else{ ?>     
                <span class="info-label time-remaining-name"><?php echo esc_html__( 'Days Left','krowd' ); ?></span>
            <?php } ?>  

        <?php } else { ?>
            <span class="info-value time-remaining-desc"><?php echo wpcf_function()->days_until_launch(); ?></span>
            <span class="info-label time-remaining-name"><?php echo esc_html__( 'Days Until Launch','krowd' ); ?></span>
        <?php } ?>
    </div>
<?php } ?>