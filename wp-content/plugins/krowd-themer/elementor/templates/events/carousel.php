<?php
  $events = $this->query_posts();
   $_random = gaviasthemer_random_id();
   if ( ! $events ) {
     return;
   }

   $this->add_render_attribute('wrapper', 'class', ['give-forms-carousel']);

   //$this->add_render_attribute('wrapper', 'data-filter', $_random);

   $this->add_render_attribute('carousel', 'class', 'init-carousel-owl owl-carousel');
  ?>

   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div <?php echo $this->get_render_attribute_string('carousel') ?> <?php echo $this->get_carousel_settings() ?>>
          <?php
              global $post;
              $count = 0;
              foreach ($events as $post ) {
              setup_postdata( $post );
                $post->loop = $count++;
                echo '<div class="item">';
                  $this->krowd_get_template_part('tribe-events/list/single', $settings['style'], array('image_size' => $settings['image_size']) );
                echo '</div>';
              }
          ?>
      </div>
   </div>
  <?php
  wp_reset_postdata();