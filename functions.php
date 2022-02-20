<?php
/**
 *  Functions Template
 * @package storyHub-alter
 */

if (!defined('STORYHUB_ALTER_DIR_PATH')) {
    define('STORYHUB_ALTER_DIR_PATH', untrailingslashit(get_template_directory()));
}
if (!defined('STORYHUB_ALTER_DIR_URI')) {
    define('STORYHUB_ALTER_DIR_URI', untrailingslashit(get_template_directory_uri()));
}
if (!defined('STORYHUB_ALTER_BUILD_URI')) {
    define('STORYHUB_ALTER_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build');
}

if (!defined('STORYHUB_ALTER_BUILD_PATH')) {
    define('STORYHUB_ALTER_BUILD_PATH', untrailingslashit(get_template_directory()) . '/assets/build');
}
if (!defined('STORYHUB_ALTER_BUILD_JS_URI')) {
    define('STORYHUB_ALTER_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/js');
}

if (!defined('STORYHUB_ALTER_BUILD_JS_DIR_PATH')) {
    define('STORYHUB_ALTER_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/js');
}
if (!defined('STORYHUB_ALTER_BUILD_CSS_URI')) {
    define('STORYHUB_ALTER_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/css');
}

if (!defined('STORYHUB_ALTER_BUILD_CSS_DIR_PATH')) {
    define('STORYHUB_ALTER_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/css');
}
include_once(STORYHUB_ALTER_DIR_PATH . '/inc/helpers/autoloader.php');
include_once(STORYHUB_ALTER_DIR_PATH . '/inc/helpers/template-tags.php');

//require_once STORYHUB_ALTER_DIR_PATH . '/inc/helpers/autoloader.php';
//require_once STORYHUB_ALTER_DIR_PATH . '/inc/helpers/template-tags.php';


\STORYHUB_ALTER\Inc\storyHub::get_instance();

function check_active_class_in_menu($menu_item)
{
    $actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($actual_link == $menu_item->url) {
        return 'active';
    }
    return '';
}