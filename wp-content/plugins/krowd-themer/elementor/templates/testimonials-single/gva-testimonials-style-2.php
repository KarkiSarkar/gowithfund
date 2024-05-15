<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   use Elementor\Group_Control_Image_Size;
?>
   
<?php 
   $this->add_render_attribute('wrapper', 'class', ['gva-testimonial-single' , $settings['style'] ]);
   $this->add_render_attribute('carousel', 'class', 'init-carousel-owl owl-carousel');
?>
   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div <?php echo $this->get_render_attribute_string('carousel') ?> <?php echo $this->get_carousel_settings() ?>>   
         <?php foreach ($settings['testimonials'] as $testimonial): ?>
            <div class="item testimonial-item">
               <div class="testimonial-content">
                  <div class="icon-quote"></div>
                  <div class="testimonial-quote"><?php echo $testimonial['testimonial_content']; ?></div>
                  <div class="testimonial-name"><?php echo $testimonial['testimonial_name']; ?></div>
                  <?php if($testimonial['testimonial_video']){ ?>
                     <div class="testimonial-video">
                        <a class="video-link" href="<?php echo $testimonial['testimonial_video']; ?>"><i class="fa fa-play"></i></a>
                        <span class="video-title"><?php echo esc_html__('Watch Campaigns', 'krowd'); ?></span>
                     </div>   
                  <?php } ?>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
   