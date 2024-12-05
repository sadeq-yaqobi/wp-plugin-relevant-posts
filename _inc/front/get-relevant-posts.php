<?php
global $post; //$post is an object of WP_Query class. get it global, if $post isn't global already
$total_posts = !empty(get_option('_rp_number')) ? get_option('_rp_number') : '4';
$term = !empty(get_option('_rp_term')) ? get_option('_rp_term') : 'category';
$order_by = !empty(get_option('_rp_order_by')) ? get_option('_rp_order_by') : 'rand';
$current_post_id = $post->ID;

if ($term == 'category') {
    $cats = get_the_category($current_post_id);
    $cats_id = [];
    foreach ($cats as $cat) $cats_id[] = $cat->cat_ID;

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $total_posts,
        'category__in' => $cats_id,
        'orderby' => $order_by,
        'post__not_in' => [$current_post_id],
        'status' => 'publish'
    ];
} elseif ($term = 'tag') {
    $tags = wp_get_post_tags($current_post_id);
    $tags_id = [];
    foreach ($tags as $tag) $tags_id[] = $tag->term_id;
    $args = [
        'post_type' => 'post',
        'posts_per_page' => $total_posts,
        'tag__in' => $tags_id,
        'orderby' => $order_by,
        'post__not_in' => [$current_post_id],
        'status' => 'publish'
    ];
}