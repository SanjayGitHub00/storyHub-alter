<nav id="comment-nav-top" class="comment__navigation my-5" role="navigation">
    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-96">
        <div class="left_navigation">
            <?php previous_comments_link('<span aria-hidden="true"><i class="fas fa-chevron-left mr-3"></i></span>' . esc_html__('Older Comments', 'storyHub-alter')); ?>
        </div>
        <div class="right_navigation" style="text-align: right">
            <?php
            if (function_exists('next_comments_link')) {
                next_comments_link(esc_html__('Latest Comments', 'storyHub-alter') . '<span aria-hidden="true"><i class="fas fa-chevron-right ml-3"></i></span>');
                ?>
                <?php
            }
            ?>

        </div>
    </div>
</nav>