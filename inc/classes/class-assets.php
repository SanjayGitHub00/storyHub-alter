<?php
/**
 *  Enqueue All Assets Here
 * @package storyHub-alter
 */

namespace STORYHUB_ALTER\Inc;

use STORYHUB_ALTER\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        /**
         *  Load Classes
         */
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         *  Actions
         */
        add_action('wp_enqueue_scripts', [$this, 'register_style']);
        add_action('wp_enqueue_scripts', [$this, 'register_script']);
        add_action('wp_enqueue_script', [$this, 'storyHub_alter_enqueue_comments_reply']);
    }

    public function register_style()
    {
        // Register Styles
        wp_register_style('main-css', STORYHUB_ALTER_BUILD_CSS_URI . '/main.css', [], filemtime(STORYHUB_ALTER_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
        wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], true, 'all');

        // Enqueue Style
        wp_enqueue_style('main-css');
        wp_enqueue_style('font-awesome');

    }

    public function register_script()
    {
        // Register Js
        wp_register_script('main-js', STORYHUB_ALTER_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(STORYHUB_ALTER_BUILD_JS_DIR_PATH . '/main.js'), true);

        // Enqueue Script
        global $wp_query;
        wp_localize_script('main-js', 'storyHub_alter_loadmore_params',
            [
                'ajaxUrl' => admin_url('admin-ajax.php'), // WordPress AJAX
                'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
                'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
                'max_page' => $wp_query->max_num_pages
            ]
        );
        wp_enqueue_script('main-js');

    }

    /**
     * Add .js script if "Enable threaded comments" is activated in Admin
     * Codex: {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
     */
    public function storyHub_alter_enqueue_comments_reply()
    {

        if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
            // Load comment-reply.js (into footer)
            wp_enqueue_script('comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true);
        }
    }
}