<?php
  $events = $this->query_posts();
  $_random = gaviasthemer_random_id();
   if ( ! $events ) {
     return;
   }

   $this->add_render_attribute('wrapper', 'class', ['event-layout-list clearfix']);

   //add_render_attribute grid
   $this->get_grid_settings();
?>
  
  <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div class="gva-content-items"> 
          <?php
            global $post;
            $count = 0;
            foreach ($events as $post ) {
              setup_postdata( $post );
              $post->loop = $count++;
              echo '<div class="event-list-item">';
                $data = array(
                  'image_size'  => $settings['image_size']
                );
                $this->krowd_get_template_part('tribe-events/list/single', $settings['style'], $data );
              echo '</div>';
            }
          ?>
      </div>
      <?php 
        if($settings['pagination'] == 'yes'){
          $query = new WP_Query($this->get_query_args( $this->get_settings()));
          echo '<div class="pagination">';
            echo $this->pagination($query);
          echo '</div>';
        }
      ?>
  </div>
  <?php

  wp_reset_postdata();