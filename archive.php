<?php
/**
 *  Archive Template for tags, Category, date
 *
 * @package storyHub-alter
 */
get_header();
?>
<main role="main">
    <div class="container-xl main__body mt-10">
        <div class="container mx-auto lg:px-0 px-3 grid grid-cols-1 md:grid-cols-2 lg:gap-x-10 md:gap-x-5 lg:gap-y-5">
            <?php
            if (have_posts()):
                while (have_posts()): the_post();
                    get_template_part('template-parts/content');
                endwhile;
            else:
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
        <div class="container mx-auto">
            <div class="pagination">
                <?php
                // Global Variable
                global $wp_query;
                // don't display the button if there are not enough posts
                if ($wp_query->max_num_pages > 1) {
                    ?>
                    <button type="submit"
                            class="loadMore__btn btn"><?php echo esc_html__('Load More', 'storyHub-alter'); ?>
                    </button>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>
