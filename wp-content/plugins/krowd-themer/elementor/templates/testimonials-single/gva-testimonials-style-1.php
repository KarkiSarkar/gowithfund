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
            <?php 
               $image_url = $testimonial['testimonial_image']['url']; 
            ?>
            <div class="item testimonial-item <?php echo (!$image_url ?'no-image':'') ?>">
               <div class="testimonial-content clearfix">
                  
                  <div class="testimonial-left">
                     <h3 class="testimonial-name"><?php echo $testimonial['testimonial_name']; ?></h3>
                     <div class="testimonial-quote"><?php echo $testimonial['testimonial_content']; ?></div>
                  </div>
                  
                  <?php if($image_url){ ?>
                     <div class="testimonial-right">
                        <div class="testimonial-image">
                           <div class="bg-testimonial"><img src="<?php echo $image_url ?>" alt="<?php echo $testimonial['testimonial_name']; ?>"/></div>
                           <div class="icon-quote"></div>
                           <?php if($testimonial['testimonial_video']){ ?>
                              <a class="video-link" href="<?php echo $testimonial['testimonial_video']; ?>"><i class="fa fa-play"></i></a>
                           <?php } ?>
                        </div>   
                     </div>  
                  <?php } ?>   

               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>

