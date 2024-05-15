<?php
  $query = $this->query_posts();
  $_random = gaviasthemer_random_id();
  if ( ! $query->found_posts ) {
    return;
  }

   $this->add_render_attribute('wrapper', 'class', ['gva-posts-ziczac clearfix gva-posts']);

   //add_render_attribute grid
   $this->get_grid_settings();
?>
  
  <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      
      <div class="gva-content-items"> 
        <?php
          global $post;
          $i = 0;
          while ( $query->have_posts() ) { 
            $i ++;
            $query->the_post();
            $post->post_count = $query->post_count;
            $data = array(
              'thumbnail_size'  => $settings['image_size'],
            );
            if($i % 2 == 1){ echo '<div class="posts-row clearfix">';}
              $this->krowd_get_template_part('templates/content/item', 'post-style-ziczac', $data );
            if($i % 2 == 0 || $i == $query->post_count){ echo '</div>'; } 
          }
        ?>
      </div>

      <?php if($settings['pagination'] == 'yes'): ?>
          <div class="pagination">
              <?php echo $this->pagination($query); ?>
          </div>
      <?php endif; ?>

  </div>
  <?php

  wp_reset_postdata();