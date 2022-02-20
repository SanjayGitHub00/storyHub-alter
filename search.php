<?php

/**
 *  Search File Template
 * @package storyHub-alter
 */
get_header();
global $wp_query;


?>
<main>
    <div class="container-xl main__body mt-10">
        <div class="container mx-auto search_result_page">
            <header>
                <h1 class="page-title">
                    <?php
                    echo $wp_query->found_posts;
                    ?>
                    <?php _e('Search Results Found For', 'storyHub-alter'); ?>: "<span><?php the_search_query(); ?></span>"
                </h1>
            </header>
            <div class="main__content_search my-5">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $post_id = get_the_ID();
                ?>
                        <div class="single_search_term mb-5">
                            <div class="featured__image_search">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    the_post_custom_thumbnail($post_id, 'post-thumbnail', []);
                                    ?>
                                </a>
                            </div>
                            <div class="content_search_term">
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                                <p>
                                    <?php
                                    storyHub_alter_excerpt(200);
                                    ?>
                                </p>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>

            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>