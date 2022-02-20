<?php
/**
 *  Template For The Loop
 * @package storyHub-alter
 */

?>
<article <?php post_class('single__post'); ?> id="post-<?php the_ID(); ?>">
    <div class="top__header mb-6">
        <?php get_template_part('template-parts/loop/entry', 'header') ?>
    </div>
    <div class="body_content">
        <?php get_template_part('template-parts/loop/entry', 'body') ?>
    </div>
</article>
