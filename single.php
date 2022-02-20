<?php

/**
 *  Single Template file
 * @package storyHub-alter
 */
get_header();
?>
    <main>
        <div class="container-xl main__body mt-10">
            <div class="container post_content mx-auto grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-x-0 lg:gap-x-5">
                <div class="post_content_wrapper md:col-span-2">
                    <?php

                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            ?>
                            <div class="post__title">
                                <h1><?php echo get_the_title(); ?></h1>
                            </div>
                            <div class="posted_on"><?php echo get_the_date(); ?>
                                - <?php storyHub_alter_posted_by(); ?></div>
                            <div class="main__content">
                                <?php
                                if (has_post_thumbnail()) {
                                    ?>
                                    <div class="featured__image">
                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', ['style' => 'width:100%;margin-right:0']); ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="content">
                                    <?php
                                    the_content();
                                    ?>
                                    <div class="flex items-center">
                                        <?php
                                        wp_link_pages(
                                            [
                                                'before' => '<div class="single__post_pagination my-5">' . sprintf(__('%s', 'storyHub-alter'), 'Pages :'),
                                                'after' => '</div>'
                                            ]
                                        );
                                        ?>
                                    </div>
                                </div>
                                <div class="tags flex items-center">
                                    <?php
                                    $tags = get_the_tags(get_the_ID());
                                    if (!empty($tags) && is_array($tags)) {
                                        foreach ($tags as $tag) {
                                            ?>
                                            <p>#<a href="<?php echo get_term_link($tag->term_id) ?>"
                                                   class="mr-5"><?php printf(__('%s', 'storyHub-alter'), $tag->name); ?></a>
                                            </p>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="comment__form mt-5">
                                <?php
                                if (comments_open() || get_comments_number()) {
                                    comments_template();
                                }else{
                                    echo 'Comments are closed.';
                                }
                                ?>
                            </div>

                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>

                <div class="sidebar">

                    <div class="latest__post mar-8 br-3 pad-8 border-2">
                        <div class="section__heading">
                            <h2><?php printf(__('%s', 'storyHub-alter'), 'Latest Posts'); ?></h2>
                        </div>
                        <div class="main__section_sidebar">
                            <?php
                            $arg = [
                                'post_per_page' => 5,
                                'orderby' => 'post_date',
                                'post_type' => 'post',
                                'order' => 'DESC',
                            ];
                            $query = new WP_Query($arg);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="single_latest_post flex items-center justify-between">
                                        <div class="sidebar__featured_image" style="height: 100%">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_custom_thumbnail(get_the_ID(), 'featured-image', []); ?>
                                            </a>
                                        </div>
                                        <div class="sidebar_content_wrapper flex-1">
                                            <div class="sidebar_title">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            </div>
                                            <div class="sidebar__tags flex items-center">
                                                <?php
                                                $tags = get_the_tags(get_the_ID());
                                                if (!empty($tags) && is_array($tags)) {
                                                    for ($i = 0; $i < 2; $i++) {
                                                        ?>
                                                        <a href="<?php echo esc_url(get_term_link($tags[$i]->term_id)); ?>">#<?php printf(__('%s', 'storyHub-alter'), $tags[$i]->name); ?></a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                            endif;
                            ?>

                        </div>
                    </div>
                    <div class="widget mar-8 br-3 pad-8 border-2">
                        <?php
                        get_sidebar();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>