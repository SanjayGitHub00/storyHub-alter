<?php

/**
 *  Nav Bar
 * @package storyHub-alter
 */
$menu_class = \STORYHUB_ALTER\Inc\Menus::get_instance();
$menu_arr = get_nav_menu_locations();
if (array_key_exists('storyHub_alter_header_menu', $menu_arr)) {
    $header_menu_id = $menu_class->get_menu_id('storyHub_alter_header_menu');
    $header_menus = wp_get_nav_menu_items($header_menu_id);
}

$home_url = esc_url(home_url('/'));
?>
<header class="container-xl mx-auto nav__header border-2">
    <nav class="nav_bar ">
        <div class="flex justify-between items-center">
            <div class="hamburger lg:hidden block">
                <i class="fas fa-bars"></i>
            </div>
            <?php
            if (has_custom_logo()) {
                ?>
                <div class="logo">
                    <?php the_custom_logo(); ?>
                </div>
                <?php
            } else {
                ?>
                <div class="logo">
                    <a href="<?php echo $home_url; ?>"><?php esc_html(bloginfo('title')); ?></a>
                    <p><?php esc_html(bloginfo('description')); ?></p>
                </div>
                <?php
            }
            ?>

            <div class="menu_items flex justify-between items-center">
                <?php
                if (!empty($header_menus) && is_array($header_menus)) {
                    ?>
                    <ul class="justify-between items-center lg:flex hidden">
                        <?php
                        foreach ($header_menus as $header_menu) {
                            if (!$header_menu->menu_item_parent) {
                                $child_menu_items = $menu_class->get_child_menu_item($header_menus, $header_menu->ID);
                                $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                                if (!$has_children) {
                                    ?>
                                    <li class="<?php echo check_active_class_in_menu($header_menu); ?>">
                                        <a href="<?php echo esc_url($header_menu->url); ?>"><?php esc_html(printf(__('%s', 'storyHub-alter'), $header_menu->title)); ?></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($header_menu->url); ?>"><?php esc_html(printf(__('%s', 'storyHub-alter'), $header_menu->title)); ?></a>
                                        <ul class="dropdown absolute">
                                            <?php
                                            foreach ($child_menu_items as $child_menu) {
                                                $grand_children = $menu_class->get_grand_children($header_menus, $child_menu->ID);
                                                $has_grandChild = !empty($grand_children) && is_array($grand_children);

                                                if (!$has_grandChild) {
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($child_menu->url); ?>"><?php printf(esc_html__('%s', 'storyHub-alter'), $child_menu->title) ?></a>
                                                    </li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($child_menu->url); ?>"><?php printf(esc_html__('%s', 'storyHub-alter'), $child_menu->title); ?></a>
                                                        <ul class="sub-dropdown absolute">
                                                            <?php
                                                            foreach ($grand_children as $grand_child) {
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url($grand_child->url); ?>"><?php printf(esc_html__('%s', 'storyHub-alter'), $grand_child->title); ?></a>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>

                                                        </ul>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
                <div class="searchBtn">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </nav>
    <!--    Mobile Navigation Menu-->
    <div class="mobile__sidebar_menu hide">
        <div class="mobile__sidebar_head flex justify-between items-center">
            <div class="left__section">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('title'); ?></a>
                    <?php
                }
                ?>
            </div>
            <div class="right__section closeBtn"><i class="fas fa-times"></i></div>
        </div>
        <div class="mobile__menu flex items-center">
            <?php
            if (!empty($header_menus) && is_array($header_menus)) {
                ?>
                <ul>
                    <?php
                    foreach ($header_menus as $menu) {
                        if (!$menu->menu_item_parent) {
                            $child_menus = $menu_class->get_child_menu_item($header_menus, $menu->ID);
                            $has_children = !empty($child_menus) && is_array($child_menus);
                            if (!$has_children) {
                                ?>
                                <li class="<?php echo check_active_class_in_menu($menu); ?>">
                                    <a href="<?php echo esc_url($menu->url); ?>"><?php printf(esc_html__('%s', 'storyHub-alter'), $menu->title); ?></a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="<?php echo check_active_class_in_menu($menu); ?>">
                                    <a href="<?php echo esc_url($menu->url); ?>"><?php printf(esc_html__('%s', 'storyHub-alter'), $menu->title); ?></a>
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
                <?php
            }
            ?>

        </div>
    </div>
</header>
<!--    Search form-->
<div class="search__form_bar hide" id="search-form-bar">
    <div class="container search__wrapper mx-auto w-full flex items-center justify-betweenl̥">
        <div class="search__form_container">
            <?php get_search_form(); ?>
        </div>
        <div class="close__btn h-full flex items-center justify-center" role="button" id="close-btn">
            <i class="fas fa-times"></i>
        </div>
    </div>
</div>