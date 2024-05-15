<?php $krowd_options = krowd_get_options(); ?>

<div class="header-mobile d-xl-none d-lg-none d-md-block d-sm-block d-xs-block">
  <?php if( krowd_get_option('hm_topbar', 'disable') == 'enable'){ ?>

    <div class="topbar-mobile clearfix">

      <div class="topbar-user">
        <?php
          $url_profile = wp_login_url();
          if(get_option('woocommerce_myaccount_page_id')){
            $url_profile = get_permalink( get_option('woocommerce_myaccount_page_id') );
          }
          $url_profile = empty(krowd_get_option('hm_text_login_url', '')) ? $url_profile : krowd_get_option('hm_text_login_url', '');
        ?>

      <?php if(is_user_logged_in()){ 
          $user = wp_get_current_user();
      ?>
          <div class="login-account">
            <div class="profile">
              <div class="avata">
                <?php echo get_avatar( $user->ID, 64 ); ?>
              </div>
              <div class="name">
                <span class="user-text">
                  <?php echo esc_html($user->display_name) ?>
                  <?php if( krowd_get_option('hm_my_account_menu', '') ){ ?>
                    <i class="icon fas fa-angle-down"></i>
                  <?php } ?>
                </span>
              </div>
            </div>  
            
            <?php if( krowd_get_option('hm_my_account_menu', '') ){ ?>
              <div class="user-account">
                <?php
                  $args = [
                    'echo'        => false,
                    'menu'        => krowd_get_option('hm_my_account_menu', '' ),  
                    'menu_class'  => 'gva-nav-menu gva-user-menu',
                    'menu_id'     => 'menu-mobile',
                    'container'   => 'div'
                  ];
                  if(class_exists('Krowd_Walker')){
                    $args['walker' ]  = new Krowd_Walker();
                  }
                
                  echo wp_nav_menu($args); 
                ?>
              </div> 
            <?php } ?>  

          </div>

        <?php }else{ ?>

          <div class="login-register">
            <a href="<?php echo esc_url($url_profile) ?>">
              <i class="icon far fa-user-circle"></i>
              <span class="user-text"><?php echo krowd_get_option('hm_text_login', 'Sign in or Register'); ?></span>
            </a>
          </div>
               
        <?php } ?>
      </div>  

      <?php if(krowd_get_option('hm_create_project_url', '')){ ?>
        <div class="create-a-project">
          <a href="<?php echo esc_url(krowd_get_option('hm_create_project_url', '')) ?>">
            <i class="icon fi flaticon-plus"></i>
            <?php echo esc_html( krowd_get_option('hm_text_create_project', 'Create a Project') ) ?>
          </a>
        </div>
      <?php } ?>

    </div>

  <?php } ?>

  <div class="header-mobile-content">
    <div class="container">
      <div class="row"> 
       
        <div class="left col-md-3 col-sm-3 col-xs-3">
          <?php get_template_part('templates/parts/canvas-mobile'); ?>
        </div>

        <div class="center text-center col-md-6 col-sm-6 col-xs-6 mobile-logo">
          <div class="logo-menu">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img src="<?php echo ((isset($krowd_options['hm_logo']['url']) && $krowd_options['hm_logo']['url']) ? $krowd_options['hm_logo']['url'] : get_template_directory_uri().'/images/logo-mobile.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
          </div>
        </div>

        <div class="right col-md-3 col-sm-3 col-xs-3">
          <div class="main-search gva-search">
            <a class="control-search">
              <i class="icon fi flaticon-search-1"></i>
            </a>
            <div class="gva-search-content search-content">
              <div class="search-content-inner">
                <div class="content-inner"><?php get_search_form(); ?></div>  
              </div>  
            </div>
          </div>
        </div> 

      </div>  
    </div>  
  </div>

</div>