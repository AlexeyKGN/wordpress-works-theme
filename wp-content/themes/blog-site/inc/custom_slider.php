<?php
function slider_posts() {
    $labels = array(
        'name'               => 'sliders',
        'singular_name'      => 'sliders',
        'add_new'            => 'Add Post For Slider',
        'add_new_item'       => 'Add Post Slider',
        'edit_item'          => 'Update Post Slider',
        'new_item'           => 'New Slider',
        'all_items'          => 'All Slider',
        'view_item'          => 'View Post Slider',
        'search_items'       => 'Search Post Slider',
        'not_found'          => 'Post Slider Not Found.',
        'not_found_in_trash' => 'Post Slider not found in trash',
        'menu_name'          => 'Custom Slider',
    );
    $args   = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-media-code',
        'menu_position'      => 20,
        'supports'           => array( 'title', 'thumbnail','editor' )
    );
    register_post_type( 'custom_slider', $args );
}

add_action( 'init', 'slider_posts' );