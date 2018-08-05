<?php
function banner_posts() {
    $labels = array(
        'name'               => 'Banners',
        'singular_name'      => 'Banner',
        'add_new'            => 'Add new Banner',
        'add_new_item'       => 'Add new Banner',
        'edit_item'          => 'Update Banner',
        'new_item'           => 'New banner',
        'view_item'          => 'View Banner',
        'all_items'          => 'All  Banners',
        'search_items'       => 'Search Banner',
        'not_found'          => 'Banner not found',
        'not_found_in_trash' => 'Banner not found in trash',
        'menu_name'          => 'Banners'
    );
    $args   = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 60,
        'supports'           => array( 'title', 'thumbnail' )
    );
    register_post_type( 'custom_banner', $args );
}

add_action( 'init', 'banner_posts' );