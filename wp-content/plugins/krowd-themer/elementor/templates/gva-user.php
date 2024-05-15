<?php
   $this->add_render_attribute( 'block', 'class', [ 'gva-user', ' text-' . $settings['align'] ] );
   $url_profile = wp_login_url();

   if(get_option('woocommerce_myaccount_page_id')){
      $url_profile = get_permalink( get_option('woocommerce_myaccount_page_id') );
   }
   
   if(empty($settings['text_login_url']['url'])) $settings['text_login_url']['url'] = $url_profile;


?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>

   <?php if(is_user_logged_in()){ ?>

      <?php
         $user = wp_get_current_user();
         $_random = gaviasthemer_random_id();
         $args = [
            'echo'        => false,
            'menu'        => $settings['menu'],  
            'menu_class'  => 'gva-nav-menu gva-user-menu',
            'menu_id'     => 'menu-' . $_random,
            'container'   => 'div'
         ];
         if(class_exists('Krowd_Walker')){
            $args['walker' ]     = new Krowd_Walker();
         }
         $menu_html = wp_nav_menu($args);
      ?>
 
      <div class="login-account">
         <div class="profile">
            <div class="avata">
               <?php if ($user->ID){
                  $img_src    = '';
                  $image_id = get_user_meta( $user->ID,'profile_image_id', true );
                  if( $image_id != '' ){
                     $image_src_tmp = wp_get_attachment_image_src( $image_id, 'backer-portfo' );
                     $img_src = isset($image_src_tmp[0]) ?  $image_src_tmp[0] : '';
                  }
                  
                  if( $img_src ){ ?>
                     <img width="80" height="80" src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_html__('Avatar', 'krowd') ?>">
                  <?php } else { ?>
                     <?php  echo get_avatar($user->ID, 80); ?>
                  <?php } ?>

               <?php } ?>
            </div>
            <div class="name">
               <span class="user-text">
                  <?php echo esc_html($user->display_name) ?><i class="icon fas fa-angle-down"></i>
               </span>
            </div>
         </div>  
         <div class="user-account">
            <?php echo $menu_html; ?>
         </div> 
      </div>

   <?php }else{ ?>

      <div class="login-register">
         <?php $this->gva_render_link_begin($settings['text_login_url']); ?>
            <i class="icon far fa-user-circle"></i>
            <span class="user-text"><?php echo ($settings['text_login'] ? $settings['text_login'] : "Sign in or Register"); ?></span>
         <?php $this->gva_render_link_end($settings['text_login_url']); ?>
      </div>
         
   <?php } ?>
</div>