<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
  get_header(); 

  $sidebar_layout_config = krowd_get_option('archive_post_sidebar', ''); 
  $left_sidebar = krowd_get_option('archive_post_left_sidebar', '');  
  $right_sidebar = krowd_get_option('archive_post_right_sidebar', ''); 

   $left_sidebar_config  = array('active' => false);
   $right_sidebar_config = array('active' => false);
   $main_content_config  = array('class' => 'col-lg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12');
    
   $sidebar_config = krowd_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
    extract($sidebar_config);

?>

<section id="wp-main-content" class="clearfix main-page title-layout-standard">
  <?php do_action( 'krowd_before_page_content' ); ?>
  <div class="container">
    <div class="row main-page-content">
      <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>"> 
        <div id="wp-content" class="wp-content">
          <?php  if ( have_posts() ) : ?>
            <div class="post-area posts-grids results-search clearfix post-items">
              <div class="lg-block-grid-2 md-block-grid-2 sm-block-grid-2 xs-block-grid-1 post-masonry-style">
                <?php  while ( have_posts() ) : the_post(); ?>
                  <div class="item-columns item-masory">
                    <div class="post post-block clearfix">

                      <?php if(has_post_thumbnail()){ ?>
                        <div class="post-thumbnail">
                          <?php the_post_thumbnail(); ?>
                        </div>
                      <?php } ?>    

                      <div class="entry-content">
                        <div class="content-inner">
                          <div class="entry-meta">
                            <?php krowd_posted_on(); ?>
                          </div> 
                          <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
                          <div class="desc"><?php echo krowd_limit_words( 16, get_the_excerpt(), '' );?></div>
                          <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
                          <div class="read-more">
                            <a href="<?php echo esc_url( get_permalink() ) ?>">
                              <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m37.379 12.552c-.799-.761-2.066-.731-2.827.069-.762.8-.73 2.066.069 2.828l15.342 14.551h-39.963c-1.104 0-2 .896-2 2s.896 2 2 2h39.899l-15.278 14.552c-.8.762-.831 2.028-.069 2.828.393.412.92.62 1.448.62.496 0 .992-.183 1.379-.552l17.449-16.62c.756-.755 1.172-1.759 1.172-2.828s-.416-2.073-1.207-2.862z"/></svg>
                            </a>
                          </div>
                        </div>
                      
                      </div><!-- .entry-content -->   
                    </div>
                  </div>    
                <?php endwhile; ?> 
              </div>       
            </div>                    
          <?php else: ?>
            <div class="alert alert-danger"><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'krowd' ); ?></div>
          <?php endif ?>
          <div class="pagination">
            <?php echo krowd_pagination(); ?>
           </div>
        </div>
      </div>

         <!-- Left sidebar -->
      <?php if($left_sidebar_config['active']): ?>
        <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
          <?php do_action( 'krowd_before_sidebar' ); ?>
          <div class="sidebar-inner">
            <?php dynamic_sidebar($left_sidebar_config['name'] ); ?>
          </div>
          <?php do_action( 'krowd_after_sidebar' ); ?>
        </div>
      <?php endif ?>

      <!-- Right Sidebar -->
      <?php if($right_sidebar_config['active']): ?>
        <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
          <?php do_action( 'krowd_before_sidebar' ); ?>
            <div class="sidebar-inner">
              <?php dynamic_sidebar($right_sidebar_config['name'] ); ?>
            </div>
          <?php do_action( 'krowd_after_sidebar' ); ?>
        </div>
      <?php endif ?>

    </div>
  </div>
  <?php do_action( 'krowd_after_page_content' ); ?>
</section>
<?php get_footer(); ?>
