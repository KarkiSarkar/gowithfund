<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   use Elementor\Group_Control_Image_Size;
   $col = $settings['column'];

   $this->add_render_attribute('wrapper', 'class', ['gva-content-horizontal', 'column-' . $col]);
   $this->add_render_attribute('wrapper', 'data-col', $col);

   $i = 0;
?>

<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
   <?php foreach ($settings['content_items'] as $item): $i++; 
      $image = (isset($item['image']['url']) && $item['image']['url']) ? $item['image']['url'] : '';
   ?>
      <?php if( $i % $col == 1 ){ ?> <div class="clearfix"><div class="content-hover-horizontal"><?php } ?>
         <div class="content-item <?php echo ($i % $col == 1) ? 'active' : ''; ?>">
            <div class="content-inner">
               <div class="image"><img src="<?php echo $image ?>" /></div>
               <div class="content">
                  <h3><?php echo $item['title'] ?></h3>
                  <div class="desc"><?php echo $item['content'] ?></div>
                  
                  <?php if($item['link']['url']){ ?>
                     <div class="action">
                        <?php
                           $svg_html = '<svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m37.379 12.552c-.799-.761-2.066-.731-2.827.069-.762.8-.73 2.066.069 2.828l15.342 14.551h-39.963c-1.104 0-2 .896-2 2s.896 2 2 2h39.899l-15.278 14.552c-.8.762-.831 2.028-.069 2.828.393.412.92.62 1.448.62.496 0 .992-.183 1.379-.552l17.449-16.62c.756-.755 1.172-1.759 1.172-2.828s-.416-2.073-1.207-2.862z"/></svg>';
                           $this->gva_render_link_html($svg_html, $item['link'], 'link-action');
                        ?>
                     </div>
                  <?php } ?>   
                  
               </div>
            </div>
         </div>
      <?php if( $i % $col == 0 || $i == count($settings['content_items']) ){ ?> <div class="clearfix"><div class="content-hover-horizontal"><?php } ?>

   <?php endforeach; ?>
</div>