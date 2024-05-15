<?php
  	$this->add_render_attribute( 'block', 'class', [ 'widget gsc-cart-box' ] );
?>
<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
	<div class="content-inner">
		
		<?php if(class_exists('WooCommerce')){ ?>
		 	<div class="mini-cart-header">
			 	<div class="cart mini-cart-inner">
					<a class="mini-cart" href="#" title="<?php echo esc_html__('View your shopping cart', 'krowd-themer'); ?>">
						<span class="title-cart"><i class="fas fa-shopping-cart"></i></span>
						<span class="mini-cart-items">
							<?php 
								if(!is_admin()){
							 		//echo WC()->cart->get_cart_contents_count(); 
							 		 echo count( WC()->cart->get_cart() );
							 	}else{
							 		echo '1';
							 	}
							?>
						</span>
					</a>
					<div class="minicart-content">
						<?php if(!is_admin()){
							woocommerce_mini_cart(); 
						} ?>
					</div>
					<div class="minicart-overlay"></div>
				</div>
		 	</div>
	  <?php } ?>
		
	</div>
</div>
