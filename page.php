<?php
/**
 *  Page Template
 * @package storyHub-alter
 */
get_header();
?>
<main>
    <div class="container-xl mt-10 page__content">
        <div class="container mx-auto">
            <h1 class="page__header">
                <?php
                single_post_title();
                ?>
                <?php
                bloginfo('title');
                ?>
            </h1>
            <?php
            if (have_posts()):
                while (have_posts()):the_post();
                    ?>
                    <div class="featured__image">
                        <?php the_post_custom_thumbnail(get_the_ID(), 'post-thumbnail', []); ?>
                    </div>
                    <div class="content__Page mx-auto">
                        <?php
                        the_content();
                        ?>
                    </div>
                <?php
                endwhile;
            endif;
            ?>

        </div>
    </div>
</main>
<?php
get_footer();
?>
