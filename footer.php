<?php

/**
 *  Footer Template
 * @package storyHub-alter
 */
$menu_class = \STORYHUB_ALTER\Inc\Menus::get_instance();
$menu_arr = get_nav_menu_locations();
if (array_key_exists('storyHub_alter_footer_menu', $menu_arr)) {
    $footer_menus_id = $menu_class->get_menu_id('storyHub_alter_footer_menu');
    $footer_menus = wp_get_nav_menu_items($footer_menus_id);
}

?>

<footer>
    <div class="container-xl">
        <div class="container mx-auto">
            <div class="footer__area p-5 flex items-center justify-between">
                <div class="left__footer">
                    <?php
                    //                    echo esc_html__(get_theme_mod('set_copyright', 'Copyright x - All rights reserved'),'storyHub-alter');
                    esc_html(printf(__('%s', 'storyHub-alter'), get_theme_mod('set_copyright', 'Copyright x - All rights reserved')));
                    ?>
                </div>
                <div class="right__footer">
                    <?php
                    if (!empty($footer_menus) && is_array($footer_menus)) {
                        ?>
                        <ul class="footer__nav_menu flex items-center">
                            <?php
                            foreach ($footer_menus as $menu) {
                                ?>
                                <li class="<?php echo check_active_class_in_menu($menu); ?>">
                                    <a href="<?php echo esc_url($menu->url); ?>"><?php printf(__('%s', 'storyHub-alter'), $menu->title); ?></a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</footer>
<!--    Overlay-->
<div class="overlay hide"></div>
</div>
<?php wp_footer(); ?>
</body>

</html>