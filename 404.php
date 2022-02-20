<?php

/**
 * 404 Page For the Theme
 * @package storyHub-alter
 */
get_header();
?>
<main>
    <div class="container-xl main__body my-10">
        <div class="container error-404 mx-auto md:grid md:grid-cols-2 lg:grid-cols-3 md:px-0 px-5">
            <div class="left__section_404 flex items-left justify-center flex-col text-left md:pl-5 lg:pl-10">
                <h1><?php esc_html_e('This Page Was Lost', 'storyHub-alter'); ?></h1>
                <p>
                    <?php esc_html_e('The Page You are looking for isn’t available. Try to search again or use the Go Back button
                    below.', 'storyHub-alter'); ?>
                </p>
                <div class="bottom_bar">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <div class="flex items-center">
                            <div class="back__arrow">
                                <i class="fa-solid fa-left-long"></i>
                            </div>
                            <div class="go_back">
                                <span><?php esc_html_e('Go Back', 'storyHub-alter'); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="right__section_404 hidden md:block lg:col-span-2 object-cover md:pr-5 lg:pr-10">
                <?php
                get_template_part('template-parts/svg/404');
                ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>