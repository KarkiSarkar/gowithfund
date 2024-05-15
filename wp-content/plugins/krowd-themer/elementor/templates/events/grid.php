<?php
  $events = $this->query_posts();
  $_random = gaviasthemer_random_id();
   if ( ! $events ) {
     return;
   }

   $this->add_render_attribute('wrapper', 'class', ['gva-give-form-grid clearfix', 'grid-' . $_random]);

   //add_render_attribute grid
   $this->get_grid_settings();
?>
  
  <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div class="gva-content-items"> 
        <div <?php echo $this->get_render_attribute_string('grid') ?>>
          <?php
            global $post;
            $count = 0;
            foreach ($events as $post ) {
              setup_postdata( $post );
              $post->loop = $count++;
              echo '<div class="item-columns">';
                $data = array(
                  'image_size'  => $settings['image_size'],
                  'date_format' => $settings['date_format']
                );
                $this->krowd_get_template_part('tribe-events/list/single', $settings['style'], $data );
              echo '</div>';
            }
          ?>
        </div>
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