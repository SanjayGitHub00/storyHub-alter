<?php

function get_the_post_custom_thumbnails($post_id, $size = "post-thumbnail", $additional_attr = [])
{
    $custom_thumbnail = '';

    if (null === $post_id) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_attr = [
            'loading' => 'lazy'
        ];

        $attr = array_merge($additional_attr, $default_attr);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $additional_attr
        );

        return $custom_thumbnail;
    }
}

function the_post_custom_thumbnail($post_id, $size = "post-thumbnail", $additional_attr = [])
{
    echo get_the_post_custom_thumbnails($post_id, $size, $additional_attr);
}

function storyHub_alter_excerpt($trim_count = 0)
{
    if (!has_excerpt() || 0 === $trim_count) {
        the_excerpt();
        return;
    }
    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $trim_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . '[...]';
}

/**
 * Prints HTML with meta information for the current author.
 *
 * @return void
 */
function storyHub_alter_posted_by()
{
    $byLine = sprintf(
        esc_html_x(' By %s', 'Post Author', 'storyHub-alter'),
        '<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );
    echo '<span class="byLine ml-5">' . $byLine . '</span>';
}

$textdomain = 'storyHub-alter';
load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages/');
load_theme_textdomain($textdomain, STORYHUB_ALTER_DIR_PATH . '/languages/');
