<?php

/**
 *  For Register theme Menu
 * @package storyHub-alter
 */

namespace STORYHUB_ALTER\Inc;

use STORYHUB_ALTER\Inc\Traits\Singleton;

class Menus
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
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus(
            [
                'storyHub_alter_header_menu' => esc_html__('Header Menu', 'storyHub-alter'),
                'storyHub_alter_footer_menu' => esc_html__('Footer Menu', 'storyHub-alter')
            ]
        );
    }

    public function get_menu_id($location)
    {
        // Get All the Menu Locations
        $locations = get_nav_menu_locations();

        // Get Object ID by location
        $menu_id = $locations[$location];

        return !empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_item($menu_array, $parent_id)
    {
        $child_menus = [];

        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menus, $menu);
                }
            }
        }
        return $child_menus;
    }

    public function get_grand_children($menu, $parent_id)
    {
        $grand_children = [];
        if (!empty($menu) && is_array($menu)) {
            foreach ($menu as $item) {
                if (intval($item->menu_item_parent) === $parent_id) {
                    array_push($grand_children, $item);
                }
            }
        }
        return $grand_children;
    }
}
