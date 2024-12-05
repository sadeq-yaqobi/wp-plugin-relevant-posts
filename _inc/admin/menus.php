<?php
add_action('admin_menu','rp_register_menu');

function rp_register_menu()
{
    add_menu_page(
        'تنظیمات پلاگین مطالب مرتبط',
        'مطالب مرتبط',
        'manage_options',
        'relevant_post_setting',
        'rp_relevant_post_admin_layout' //it was implemented in setting file
    );
}
include_once RP_PLUGIN_VIEW . 'admin/setting.php';