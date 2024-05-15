<?php
defined( 'ABSPATH' ) || exit;


if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
global $post, $product;
$percent = wpcf_function()->get_raised_percent(); if( $percent >= 100 ){ $percent = 100; }
$funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);
$raised = 0;
$total_raised = wpcf_function()->get_total_fund();
if ($total_raised){
   $raised = $total_raised;
}

$days_remaining = apply_filters('date_expired_msg', esc_html__('0', 'krowd'));
if (wpcf_function()->get_date_remaining()){
   $days_remaining = apply_filters('date_remaining_msg', esc_html__(wpcf_function()->get_date_remaining() . '', 'krowd'));
}

$end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);
do_action( 'wpcf_before_single_campaign' );

?>

<div class="wpneo-list-details">
    <div itemscope itemtype="http://schema.org/ItemList">
     <div class="campaign-top">
        <div class="container">
           <div class="row">
              
              <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <?php do_action( 'wpcf_before_single_campaign_summary' ); ?>
              </div> 

              <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="campaign-single-summary campaign-single-right">
                    <div class="wpneo-campaign-summary-inner" itemscope itemtype="http://schema.org/DonateAction">
                       
                       <div class="campaign-meta clearfix">
                          <div class="campaign-categories">
                             <?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'krowd' ) . ' ', '</span>' ); ?>
                          </div>
                          <?php wpcf_function()->template('include/location'); ?>
                       </div>
                          
                       <h2 class="wpneo-campaign-title"><?php the_title(); ?></h2>
                       
                       <div class="campaign-info">
                          <div class="campaign-pledged info-item">
                             <span class="info-value"><?php echo wc_price($raised); ?></span>
                             <span class="info-label"><?php echo esc_html__( 'Pledged', 'krowd' ) ?></span>
                          </div>
                          <div class="campaign-backers info-item">
                             <span class="info-value"><?php echo wpcf_function()->get_total_backers(); ?></span>
                             <span class="info-label"><?php echo esc_html__( 'Backers', 'krowd' ) ?></span>
                          </div>
                          <div class="camapign-time_remaining info-item"><?php wpcf_function()->template('include/loop/time_remaining'); ?></div>
                       </div>

                       <!-- Campaign Raised -->
                       <div class="campaign-raised clearfix">
                          <div class="campaign-raised-label"><?php echo esc_html__('Raised: ', 'krowd') ?></div>
                          <div class="campaign-percent_raised"><?php echo number_format($percent, 1); ?>%</div>
                       </div>
                       <div class="campaign-progress clearfix">
                          <div class="progress">
                             <div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
                                <span class="percentage"><span></span></span>
                             </div>
                          </div>
                       </div>
                       <!-- End Campaign Raised -->

                       <div class="campaign-goal">
                          <span class="label-goal"><?php echo esc_html__('Goal:', 'krowd'); ?></span>
                          <span class="value-goal"><?php echo wc_price( $funding_goal ); ?></span>
                       </div> 

                       <?php wpcf_function()->template('include/fund-campaign-btn'); ?>

                       <?php wpcf_function()->template('include/creator-info'); ?>
                    </div>
                 </div>
              </div>  

           </div>

        </div>
     </div>         
     
     <div class="campaign-bottom">
        <div class="container">
           <div class="row">

              <!-- Main content -->
              <div class="<?php echo esc_attr($main_content_config['class']); ?>">
                 <?php do_action( 'wpcf_after_single_campaign_summary' ); ?>
                 <meta itemprop="url" content="<?php the_permalink(); ?>" />
              </div>  
              <!-- End Main content -->
           </div>   
        </div>   
     </div> 
  </div>

    <?php do_action( 'wpcf_after_single_campaign' ); ?>
    <?php do_action( 'wpcf_after_main_content' ); ?>
</div>    