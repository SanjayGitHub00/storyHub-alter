<?php

/**
 *  Entry Content Template within the loop
 * @package storyHub-alter
 */
?>
<div class="tags my-7">
    <?php
    $tags = get_the_tags();

    if (!empty($tags) && is_array($tags)) {
        foreach ($tags as $tag) {
    ?>
            <a href="<?php echo get_term_link($tag->term_id); ?>">#<?php printf(__('%s', 'storyHub-alter'), $tag->name); ?></a>
    <?php
        }
    }
    ?>
</div>
<div class="post__title">
    <a href="<?php the_permalink(); ?>">
        <h2><?php echo get_the_title(); ?></h2>
    </a>
</div>
<div class="excerpt">
    <?php
    if (has_excerpt()) {
        storyHub_alter_excerpt(250);
    }
    ?>
</div>
<!-- echo esc_html__(, 'storyHub-alter'); -->