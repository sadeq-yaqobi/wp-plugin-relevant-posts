<?php
/*Plugin Name: پست‌های مرتبط
Plugin URI: http://siteyar.net/plugins/
Description: پلاگین پست‌های مرتبط
Author: sadeq yaqobi
Version: 1.0.0
License: GPLv2 or later
Author URI: http://siteyar.net/sadeq-yaqobi/ */

#for security
defined('ABSPATH') || exit();

//defined required const
define('RP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('RP_PLUGIN_URL', plugin_dir_url(__FILE__));
const RP_PLUGIN_INC = RP_PLUGIN_DIR . '_inc/';
const RP_PLUGIN_VIEW = RP_PLUGIN_DIR . 'view/';
const RP_PLUGIN_ASSETS_DIR = RP_PLUGIN_DIR . 'assets/';
const RP_PLUGIN_ASSETS_URL = RP_PLUGIN_URL . 'assets/';

/**
 * Register and enqueue frontend assets
 */

function rp_register_assets_front() {
    // Register and enqueue CSS
    wp_register_style('rp-owl-style',RP_PLUGIN_ASSETS_URL . 'css/front/owl.carousel.min.css',[],'2.3.4');
    wp_enqueue_style('rp-owl-style');
    wp_register_style('rp-owl-theme-default-style',RP_PLUGIN_ASSETS_URL . 'css/front/owl.theme.default.min.css',[],'2.3.4');
    wp_enqueue_style('rp-owl-theme-default-style');
    wp_register_style('rp-style',RP_PLUGIN_ASSETS_URL . 'css/front/style.css',[],'1.0.0');
    wp_enqueue_style('rp-style');

    // Register and enqueue JavaScript
    wp_register_script('rp-owl-js', RP_PLUGIN_ASSETS_URL . 'js/front/owl.carousel.min.js', ['jquery'], '2.3.4', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('rp-owl-js');
    wp_register_script('rp-main-js',RP_PLUGIN_ASSETS_URL . 'js/front/main.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('rp-main-js');

    // localize script
    wp_localize_script('rp-main-js', 'rp_variable', [
        'rp_number_item_slider'=>get_option('_rp_number_item_slider')
    ]);
}

function rp_register_assets_admin() {
    // Register and enqueue CSS
    wp_register_style('rp-admin-style',RP_PLUGIN_ASSETS_URL . 'css/admin/admin-style.css',[],'1.0.0');
    wp_enqueue_style('rp-admin-style');

    // Register and enqueue JavaScript
    wp_register_script('rp-admin-js',RP_PLUGIN_ASSETS_URL . 'js/admin/admin-js.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('rp-admin-js');

}
add_action('wp_enqueue_scripts', 'rp_register_assets_front');
add_action('admin_enqueue_scripts', 'rp_register_assets_admin');


//activation and deactivation plugin hooks
function rp_activation_functions()
{
    rp_initialize_options_setting();
}

function rp_deactivation_functions()
{
    rp_delete_options_setting();
}
register_activation_hook(__FILE__,'rp_activation_functions');
register_deactivation_hook(__FILE__,'rp_deactivation_functions');


//including
if (is_admin()) {
    include RP_PLUGIN_INC . 'admin/menus.php';

}
    include_once RP_PLUGIN_VIEW . 'front/relevant-posts.php';
    include_once RP_PLUGIN_INC . 'database/initialize-delete-options-setting.php';


