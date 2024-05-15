<?php
defined( 'ABSPATH' ) || exit;
$col_num = get_option('number_of_collumn_in_row', 3);
$number = array( 
    "2"=>"lg-block-grid-2 md-block-grid-2 sm-block-grid-1 xs-block-grid-1",
    "3"=>"lg-block-grid-3 md-block-grid-3 sm-block-grid-2 xs-block-grid-1",
    "4"=>"lg-block-grid-4 md-block-grid-3 sm-block-grid-2 xs-block-grid-1" 
    );
?>

<div class="campaign-wrapper">
    <div class="campaign-container">
        <?php do_action('wpcf_campaign_listing_before_loop'); ?>
        <div class="campaign-wrapper-inner">
            <div class="campaign-listings clearfix <?php echo esc_attr($number[$col_num]); ?>">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="item-columns">
                            <div class="campaign-listing-content">
                                <?php get_template_part( 'wpcftemplate/content', 'style-1' ); ?>
                            </div>
                        </div>    
                <?php endwhile; ?>
            </div>
            <?php
            else:
                wpcf_function()->template('include/loop/no-campaigns-found');
            endif;
            ?>
        </div>
        <?php 
            do_action('wpcf_campaign_listing_after_loop');
            wpcf_function()->template('include/pagination');
        ?>
    </div>
</div>