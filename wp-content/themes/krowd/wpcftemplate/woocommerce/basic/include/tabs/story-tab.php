<?php
defined( 'ABSPATH' ) || exit;
global $post;
$campaign_rewards = get_post_meta($post->ID, 'wpneo_reward', true);
$campaign_rewards = stripslashes($campaign_rewards);
$campaign_rewards_a = json_decode($campaign_rewards, true);
$has_rewards = (is_array($campaign_rewards_a) && count($campaign_rewards_a) > 0) ? 'has-rewards' : 'no-rewards';
$description_col = (is_array($campaign_rewards_a) && count($campaign_rewards_a) > 0) ? 'col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12' : 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12';
$rewards_col = (is_array($campaign_rewards_a) && count($campaign_rewards_a) > 0) ? 'col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12' : 'col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12';
?>
<div class="row">
   <?php if($post->post_content) { ?>
       <div class="tab-description tab-campaign-story-left <?php echo esc_attr($description_col) ?>">
           <h2><?php echo esc_html__('Story', 'krowd') ?></h2>
           <?php the_content(); ?>
       </div>
   <?php } ?>

   <div class="tab-rewards tab-campaign-story-right <?php echo esc_attr($rewards_col) ?>">
      <?php do_action('wpcf_campaign_story_right_sidebar'); ?>
   	<div style="clear: both"></div>
   </div>
</div>