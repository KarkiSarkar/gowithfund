<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */ 
?>
<?php 
	$thumbnail = 'post-thumbnail';
	if(isset($thumbnail_size) && $thumbnail_size){
		$thumbnail = $thumbnail_size;
	}
	if(is_single()){
		$thumbnail = 'full';
	}
	if(!isset($excerpt_words)){
    	$excerpt_words = krowd_get_option('blog_excerpt_limit', 20);
  	}
?>
<article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class(); ?>>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
	</div>

   <?php if ( is_single() ){ ?>
      <div class="entry-meta">
         <?php krowd_posted_on(); ?>
      </div>
      <h1 class="entry-title"><?php echo the_title() ?></h1>
   <?php } ?>

	<div class="entry-content">
		<div class="content-inner">
         <?php if(!is_single()){ ?>
            <div class="entry-meta">
               <?php krowd_posted_on(); ?>
           </div> 
            <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
         <?php } ?>

			<?php if(is_single()){
				the_content( sprintf(
					esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'krowd' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'krowd' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			
			}else{
				echo krowd_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() );
			}
			?>
         <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
	      <?php if(!is_single()){ ?>
            <div class="read-more">
               <a href="<?php echo esc_url( get_permalink() ) ?>">
                  <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m37.379 12.552c-.799-.761-2.066-.731-2.827.069-.762.8-.73 2.066.069 2.828l15.342 14.551h-39.963c-1.104 0-2 .896-2 2s.896 2 2 2h39.899l-15.278 14.552c-.8.762-.831 2.028-.069 2.828.393.412.92.62 1.448.62.496 0 .992-.183 1.379-.552l17.449-16.62c.756-.755 1.172-1.759 1.172-2.828s-.416-2.073-1.207-2.862z"/></svg>
               </a>
            </div>
         <?php } ?>
      </div>
      
	</div><!-- .entry-content -->	

</article><!-- #post-## -->
