<?php
defined( 'ABSPATH' ) || exit;
global $post;
$campaign_rewards   = get_post_meta($post->ID, 'wpneo_reward', true);
$campaign_rewards_a = json_decode($campaign_rewards, true);
if (is_array($campaign_rewards_a)) {
	if (count($campaign_rewards_a) > 0) {

		$i      = 0;
		$amount = array();

		echo '<h2>' . esc_html__('Rewards', 'krowd') . '</h2>';
		foreach ($campaign_rewards_a as $key => $row) {
			$amount[$key] = $row['wpneo_rewards_pladge_amount'];
		}
		array_multisort($amount, SORT_ASC, $campaign_rewards_a);

		foreach ($campaign_rewards_a as $key => $value) {
			$key++;
			$i++;
			$quantity = '';

			$post_id    = get_the_ID();
			$min_data   = $value['wpneo_rewards_pladge_amount'];
			$max_data   = '';
			$orders     = 0;
			( ! empty($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount']))? ( $max_data = $campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'] - 1 ) : ($max_data = 9000000000);
			if( $min_data != '' ){
				$orders = wpcf_campaign_order_number_data( $min_data,$max_data,$post_id );
			}
			if( $value['wpneo_rewards_item_limit'] ){
				$quantity = 0;
				if( $value['wpneo_rewards_item_limit'] >= $orders ){
					$quantity = $value['wpneo_rewards_item_limit'] - $orders;
				}
			}
			?>
				<div class="tab-rewards-wrapper<?php echo esc_attr( $quantity === 0  ? ' disable' : ''); ?>">
					 <div class="rewards-item">
						<div class="reward-title">
							<?php if (function_exists('wc_price')) {
								echo wc_price($value['wpneo_rewards_pladge_amount']);
								if( 'true' != get_option('wpneo_reward_fixed_price','') ){
									echo ( ! empty($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount']))? ' - '. wc_price($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'] - 1) : esc_html__(" or more", 'krowd');
								}
							} ?>
						</div>
						<?php if( $value['wpneo_rewards_image_field'] ){ ?>
							<div class="wpneo-rewards-image">
							  <?php echo '<img src="'.wp_get_attachment_url( $value["wpneo_rewards_image_field"] ).'"/>'; ?>
							</div>
						<?php } ?>

						<div><?php echo html_entity_decode($value['wpneo_rewards_description']); ?></div>


					<?php
					if ( ! empty($value['wpneo_rewards_endmonth']) || ! empty($value['wpneo_rewards_endyear'])){
						$month = date_i18n("F", strtotime($value['wpneo_rewards_endmonth']));
						$year = date_i18n("Y", strtotime($value['wpneo_rewards_endyear'].'-'.$month.'-15'));
						//$year = date_i18n("Y", mktime(0, 0, 0, 1, 1, $value['wpneo_rewards_endyear'].'-'.$month.'-15'));

						echo "<div class=\"rewards-date\">{$month}, {$year}</div>";
						echo '<div class=\"rewards-delivery\">' . esc_html__('Estimated Delivery', 'krowd') . '</div>';
					}
					?>

					<?php if( $min_data != '' ){
						echo '<div class="reward-meta reward-backers"><i class="far fa-user-circle"></i>' . $orders . ' ' . esc_html__('backers','krowd').'</div>';
					} ?>

					<?php if( $value['wpneo_rewards_item_limit'] ){ ?>
						<div class="reward-meta reward-left">
							<i class="fas fa-award"></i><?php echo esc_html($quantity); echo esc_html__(' rewards left','krowd'); ?>
						</div>
					<?php } ?>

					<!-- Campaign Valid -->
					<?php if (wpcf_function()->is_campaign_valid()) { ?>
						<?php if (wpcf_function()->is_campaign_started()) {
							if (get_option('wpneo_single_page_reward_design') == 1) { ?>
										  <div class="overlay-form">
												<div>
													 <div>
											<?php if( $quantity === 0 ){ ?>
																<span class="wpneo-error"><?php echo esc_html__( 'Reward no longer available.', 'krowd' ); ?></span>
											<?php } else { ?>
																<form enctype="multipart/form-data" method="post" class="cart">
																	 <input type="hidden" value="<?php echo esc_attr($value['wpneo_rewards_pladge_amount']); ?>" name="wpneo_donate_amount_field" />
																	 <input type="hidden" value='<?php echo json_encode($value); ?>' name="wpneo_selected_rewards_checkout" />
																	 <input type="hidden" value="<?php echo esc_attr($key); ?>" name="wpneo_rewards_index" />
																	 <input type="hidden" value="<?php echo esc_attr($post->post_author); ?>" name="_cf_product_author_id">
																	 <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
																	 <button type="submit" class="btn-theme-2 btn-reward-select"><span><?php echo esc_html__('Select Reward','krowd'); ?></span></button>
																</form>
											<?php } ?>
													 </div>
												</div>
										  </div>
							<?php } else if (get_option('wpneo_single_page_reward_design') == 2){ ?>
										  <div class="tab-rewards-submit-form-style1">
									<?php if( $quantity === 0 ): ?>
													 <span class="wpneo-error"><?php echo esc_html__( 'Reward no longer available.', 'krowd' ); ?></span>
									<?php else: ?>
													 <form enctype="multipart/form-data" method="post" class="cart">
														  <input type="hidden" value="<?php echo esc_attr($value['wpneo_rewards_pladge_amount']); ?>" name="wpneo_donate_amount_field" />
														  <input type="hidden" value='<?php echo json_encode($value); ?>' name="wpneo_selected_rewards_checkout" />
														  <input type="hidden" value="<?php echo esc_attr($key); ?>" name="wpneo_rewards_index" />
														  <input type="hidden" value="<?php echo esc_attr($post->post_author); ?>" name="_cf_product_author_id">
														  <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
														  <button type="submit" class="btn-theme-2 btn-reward-select"><span><?php echo esc_html__('Select Reward','krowd'); ?></span></button>
													 </form>
									<?php endif; ?>
										  </div>
							<?php } ?>
						<?php } ?>
					<?php } else { ?>
								<div class="overlay-form until-date">
									<div>
										<div>
											<span class="info-text">
												<?php 
												if (!wpcf_function()->is_campaign_started()){ 
													echo esc_html__('Campaign is not started.', 'krowd');
												}else{
													if( wpcf_function()->is_reach_target_goal() ){
														echo esc_html__('Campaign already completed.', 'krowd'); 
												  	}else{ 
														if (wpcf_function()->is_campaign_started()){ 
															echo esc_html__('Reward is not valid.', 'krowd'); 
														}else{ 
															echo esc_html__('Campaign is not started.', 'krowd');
														} 
													} 
												}
												?>
											</span>
										</div>
									</div>
								</div>
					<?php } ?>
						  <!-- Campaign Over -->
					 </div>
				</div>
			<?php
		}
	}
}
?>
<div style="clear: both"></div>