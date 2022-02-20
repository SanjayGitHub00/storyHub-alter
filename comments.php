<?php
/**
 *  Comment Template
 * @package storyHub-alter
 */

if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comment-area">
    <?php
    if (have_comments()):
        //we Have Comment
        ?>
        <h4 class="comment-title">
            <?php
            printf(
                esc_html(_nx('One comment on &ldquo;%2$s&rdquo;', '%1$s comment on &ldquo;%2$s&rdquo;', get_comments_number(), 'comment title', 'storyHub-alter')),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h4>
        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')):
            ?>
            <nav id="comment-nav-top" class="comment__navigation my-10" role="navigation">
                <div class="grid grid-cols-2 md:gap-x-44 lg:gap-x-72">
                    <div class="left_navigation">
                        <?php previous_comments_link('<span aria-hidden="true"><i class="fas fa-chevron-left mr-1"></i></span>' . esc_html__('Older Comments', 'storyHub-alter')); ?>
                    </div>
                    <div class="right_navigation" style="text-align: right">
                        <?php
                        if (function_exists('next_comments_link')) {
                            next_comments_link(esc_html__('Latest Comments', 'storyHub-alter') . '<span aria-hidden="true"><i class="fas fa-chevron-right ml-1"></i></span>');
                            ?>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </nav>
        <?php
        endif;
        ?>
        <ol class="comment-list">
            <?php
            $arg = [
                'walker' => null,
                'max_depth' => 5,
                'style' => 'ol',
                'callback' => null,
                'end-callback' => null,
                'type' => 'all',
                'page' => '',
                'per_page' => '',
                'avatar_size' => 52,
                'reverse_top_level' => null,
                'reverse_children' => '',
                'reply_text' => 'Reply',
                'format' => 'html5',
                'short_ping' => false,
                'echo' => true
            ];
            wp_list_comments($arg);
            ?>
        </ol>
        <?php
        if (get_comment_pages_count() > 1 && get_option('page_comments')):
            ?>
            <nav id="comment-nav-bottom" class="comment__navigation my-10" role="navigation">
                <div class="grid grid-cols-2 gap-x-2 md:gap-x-44 lg:gap-x-72">
                    <div class="left_navigation ">
                        <?php previous_comments_link('<span aria-hidden="true"><i class="fas fa-chevron-left mr-1"></i></span>' . esc_html__('Older Comments', 'storyHub-alter')); ?>
                    </div>
                    <div class="right_navigation" style="text-align: right">
                        <?php
                        if (function_exists('next_comments_link')) {
                            next_comments_link(esc_html__('Latest Comments', 'storyHub-alter') . '<span aria-hidden="true"><i class="fas fa-chevron-right ml-1"></i></span>');
                            ?>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </nav>
        <?php
        endif;
        ?>
        <?php
        if (!comments_open() && get_comments_number()):
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'storyHub-alter'); ?></p>
        <?php
        endif;
    endif;
    ?>
    <?php
    $argv = [
        'class_submit' => 'btn mt-5',
        'label_submit' => __('Submit Comment', 'storyHub-alter'),
    ];
    comment_form($argv);
    ?>
</div><!--comment area-->
