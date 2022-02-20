<?php

/**
 *  Entry Head Template within the loop
 * @package storyHub-alter
 */
?>
<?php
if (has_post_thumbnail()) {
    // An attachment/image ID is all that's needed to retrieve its alt and title attributes.
//    $image_id = get_post_thumbnail_id();
//
//    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
    ?>
    <a href="<?php the_permalink(); ?>">
        <!--        <img src="--><?php //the_post_thumbnail_url(); ?><!--" alt="--><?php //echo $image_alt; ?><!--">-->
        <?php the_post_custom_thumbnail(get_the_ID(), 'post-thumbnail', []); ?>
    </a>
    <div class="posted__on">
        <p><?php echo get_the_date('d') ?></p>
        <span><?php echo get_the_date('F') ?></span>
    </div>
    <?php
}
?>