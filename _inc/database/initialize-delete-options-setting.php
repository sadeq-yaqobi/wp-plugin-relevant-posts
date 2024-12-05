<?php
function rp_initialize_options_setting()
{
    $options = [
        '_rp_title' => 'مطالب مرتبط',
        '_rp_number' => '4',
        '_rp_term' => 'category',
        '_rp_order_by' => 'rand',
        '_rp_display_type' => 'list',
        '_rp_number_item_slider'=>'3'
    ];

    foreach ($options as $option => $default_value) update_option($option, $default_value);
}

function rp_delete_options_setting()
{
    $options = ['_rp_title', '_rp_number', '_rp_term', '_rp_order_by', '_rp_display_type','_rp_number_item_slider'];

    foreach ($options as $option) delete_option($option);
}
