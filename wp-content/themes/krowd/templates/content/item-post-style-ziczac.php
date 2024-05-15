<?php 

   $thumbnail = 'post-thumbnail';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }

   if(!isset($excerpt_words)){
      $excerpt_words = krowd_get_option('blog_excerpt_limit', 20);
   }
?>

<article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class('post post-ziczac'); ?>>
   <div class="post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), $thumbnail) ?>');">
      <a class="overlay" href="<?php echo esc_url( get_permalink() ) ?>"></a>   
   </div>   

   <div class="entry-content">
      <div class="content-inner">
         <div class="entry-meta">
            <?php krowd_posted_on(); ?>
         </div> 
         <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
         <div class="read-more">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
               <i class="icon fi flaticon-left-arrow"></i>
            </a>
         </div>
      </div>
   </div>
</article>   

  