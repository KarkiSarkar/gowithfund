<?php 
  get_header(); 
?>
<section id="wp-main-content" class="clearfix main-page">
  <?php do_action( 'krowd_before_page_content' ); ?>
  <div class="container">  
    <div class="main-page-content row padding-top-60 padding-bottom-60">
      <!-- Main content -->
      <div class="content-page col-12">
        <div class="gallery-single" style="width: 100%;">      
          <?php while ( have_posts() ) : the_post(); ?>
            <?php $gallery = get_post_meta(get_the_ID(), 'krowd_gallery_images', false ); ?>
            <div class="init-carousel-owl-theme owl-carousel" data-items="1" data-items_lg="1" data-items_md="1" data-items_sm="1" data-items_xs="1" data-loop="1" data-speed="1000" data-auto_play="1" data-auto_play_speed="1000" data-auto_play_timeout="3000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="1" data-pagination="1" data-mouse_drag="1" data-touch_drag="1">
              <?php foreach ($gallery as $image) { 
                $img = wp_get_attachment_image_src($image, 'full');
                $img_thumb = wp_get_attachment_image_src($image, 'thumbnail');
              ?>
              <div class="item">
                <img src="<?php echo esc_url($img[0]) ?>" />
              </div>
              <?php } ?>
            </div>
          <?php endwhile; ?> 
        </div>  
      </div>      
    </div>   
    
  <?php do_action( 'krowd_after_page_content' ); ?>
</section>

<?php get_footer(); ?>