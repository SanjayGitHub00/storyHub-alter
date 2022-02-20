<?php

/**
 *  For Register theme Sidebar
 * @package storyHub-alter
 */

namespace STORYHUB_ALTER\Inc;

use STORYHUB_ALTER\Inc\Traits\Singleton;

class Sidebar
{
    use Singleton;

    protected function __construct()
    {
        /**
         * load classes
         */
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Action And Filter Hook
         */
        add_action('widgets_init', [$this, 'register_sidebar']);
    }

    public function register_sidebar()
    {
        register_sidebar(
            [
                'name' => __('Sidebar', 'storyHub-alter'),
                'id' => 'sidebar-1',
                'description' => __('Post Template Sidebar Widget.', 'storyHub-alter'),
                'before_widget' => '<div id="%1$s" class="widget widget__sidebar %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
            ]
        );

        register_sidebar(
            [
                'name' => __('Footer Widget', 'storyHub-alter'),
                'id' => 'sidebar-2',
                'description' => __('Footer Widget.', 'storyHub-alter'),
                'before_widget' => '<div id="%1$s" class="widget widget__footer %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widgettitle">',
                'after_title' => '</h2>',
            ]
        );
    }
}
