<?php
   global $product;
   $percent_display = $percent = wpcf_function()->get_raised_percent(); if( $percent >= 100 ){ $percent = 100; }

   $total = wpcf_function()->get_total_fund($post->ID);
   $goal = wpcf_function()->get_total_goal($post->ID);
   if ($total > 0 && $goal > 0  ) {
      $percent_display =  number_format($total / $goal * 100, 2, '.', '');
   }
   $funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);
   $raised = 0;
   $total_raised = wpcf_function()->get_total_fund();
   if ($total_raised){
      $raised = $total_raised;
   }
   $thumbnail = 'krowd_medium';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }
?>
<div class="campaign-block">
   <div class="campaign-image">
      <a href="<?php echo get_permalink(); ?>" title="<?php  echo get_the_title(); ?>"> <?php echo woocommerce_get_product_thumbnail($thumbnail); ?></a>
      <a href="<?php echo get_permalink(); ?>" class="overlay"></a>
      <div class="campaign_loved_html">
         <?php echo str_replace(' id=', ' class=', wpcf_function()->campaign_loved(false)); ?>
      </div>
   </div>
   <div class="campaign-content">
      <div class="campaign-meta clearfix">
         <div class="campaign-categories">
            <?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">', '</span>' ); ?>
         </div>
         <div class="camapign-time_remaining">
            <?php get_template_part( 'wpcftemplate/woocommerce/basic/include/loop/time_remaining'); ?>
         </div>
      </div>

      <div class="campaign-title clearfix">
         <h4 class="title">
            <a href="<?php  echo get_permalink(); ?> "><?php echo get_the_title(); ?></a>
         </h4>
      </div>
      
      <div class="campaign-raised clearfix">
         <div class="campaign-total_raised">
            <span class="label-raised"><?php echo esc_html__('Raised: ', 'krowd') ?></span>
            <span class="value-raised"><?php echo wc_price($raised); ?></span>
         </div>
         <div class="campaign-percent_raised"><?php echo esc_html($percent_display); ?>%</div>
      </div>
      <div class="campaign-progress clearfix">
         <div class="progress">
            <div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
               <span class="percentage"><span></span></span>
            </div>
         </div>
      </div>   

      <div class="campaign-goal">
         <span class="label-goal"><?php echo esc_html__('Goal:', 'krowd'); ?></span>
         <span class="value-goal"><?php echo wc_price( $funding_goal ); ?></span>
      </div>   
   </div>   
</div>   