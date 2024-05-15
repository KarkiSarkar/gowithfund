<?php
defined( 'ABSPATH' ) || exit;
global $post;
$saved_campaign_update = get_post_meta($post->ID, 'wpneo_campaign_updates', true);
$saved_campaign_update_a = json_decode($saved_campaign_update, true);
?>
<div class='campaign_update_wrapper'>
<?php if (is_array($saved_campaign_update_a)) {
    if (count($saved_campaign_update_a) > 0) {
        ?>
        <ul class="wpneo-crowdfunding-update">
            <?php  foreach ($saved_campaign_update_a as $key => $value) { ?>
                <li>
                    <span class="round-circle"></span>
                    <div class="update-date"><?php echo stripslashes($value['date']); ?></div>
                    <p class="wpneo-crowdfunding-update-title"><?php echo stripslashes($value['title']); ?></p>
                    <?php if( isset($value['details']) && $value['details'] ){ ?>
                        <div>
                            <?php
                                $update_content = $value['details'];
                                $update_content = str_replace('\"', '"', $update_content);
                                echo html_entity_decode($update_content); 
                            ?>
                        </div>
                    <?php } ?>    
                </li>
            <?php }  //the_content(); ?>
        </ul>
        <?php
    }
} ?>
</div>
