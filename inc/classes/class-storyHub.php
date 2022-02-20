<?php

/**
 * Bootstrap the theme
 * @package storyHub-alter
 */

namespace STORYHUB_ALTER\Inc;

use STORYHUB_ALTER\Inc\Traits\Singleton;

class storyHub
{
    use Singleton;

    protected function __construct()
    {
        // Load Classes
        Assets::get_instance();
        Menus::get_instance();
        Sidebar::get_instance();
        Customizer::get_instance();
        Loadmore::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         *  Actions
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        // For Title
        add_theme_support('title-tag');

        // Custom Logo
        add_theme_support('custom-logo', [
            'height' => 100,
            'width' => 250,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => ['site-title', 'site-description'],
            'unlink-homepage-logo' => true,
        ]);

        add_theme_support('post-thumbnails');

        add_theme_support('automatic-feed-links');

        add_theme_support('responsive-embeds');

        add_theme_support( "align-wide" );
        /*
           This feature allows the use of HTML5 markup for the search forms,
                 comment forms, comment lists, gallery, and caption.
        */
        add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);


        add_theme_support('customize-selective-refresh-widgets');

        //To support Gutenberg
        add_theme_support('wp-block-styles');

        // if you don't add this line, your stylesheet won't be added
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
    }
}
