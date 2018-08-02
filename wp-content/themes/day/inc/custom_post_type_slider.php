<?php
/**
 * add my custom post type
 */
function my_custom_post_type_for_slider() {
    $labels = array(
        'name'               => 'sliders',
        'singular_name'      => 'sliders',
        'add_new'            => 'Add Post For Slider',
        'add_new_item'       => 'Add Post Slider',
        'edit_item'          => 'Update Post Slider',
        'new_item'           => 'New Post Slider',
        'all_items'          => 'All Post Slider',
        'view_item'          => 'View Post Slider',
        'search_items'       => 'Search Post Slider',
        'not_found'          => 'Post Slider Not Found.',
        'not_found_in_trash' => 'Post Slider not found in trash',
        'menu_name'          => 'Custom Post Slider',
    );
    $args   = array(
        'labels'           => $labels,
        'public'           => true,
        'public_queryable' => true,
        'show_ui'          => true,
        'has_archive'      => true,
        'menu_icon'        => 'dashicons-media-code',
        'menu_position'    => 60,
        'supports'         => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' )
    );
    register_post_type( 'sliders', $args );
}
add_action( 'init', 'my_custom_post_type_for_slider' );


/**
 * add my custom taxonomies
 */
function my_custom_taxonomies_for_slider() {
    register_taxonomy('taxonomy', array('sliders'), array(
        'label'                 => '',
        'labels'                => array(
            'name'              => 'Custom Taxonomies Slider',
            'singular_name'     => 'Custom Taxonomies Slider',
            'search_items'      => 'Search Custom Taxonomies Slider',
            'all_items'         => 'All Custom Taxonomies Slider',
            'view_item '        => 'View Custom Taxonomies Slider',
            'parent_item'       => 'Parent Custom Taxonomies Slider',
            'parent_item_colon' => 'Parent Custom Taxonomies Slider:',
            'edit_item'         => 'Edit Custom Taxonomies Slider',
            'update_item'       => 'Update Custom Taxonomies Slider',
            'add_new_item'      => 'Add New Custom Taxonomies Slider',
            'new_item_name'     => 'New Genre Custom Taxonomies Slider',
            'menu_name'         => 'Custom Taxonomies Slider',
        ),
        'description'           => '',
        'public'                => true,
        'publicly_queryable'    => null,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_tagcloud'         => true,
        'show_in_rest'          => null,
        'rest_base'             => null,
        'hierarchical'          => false,
        'update_count_callback' => '',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        '_builtin'              => false,
        'show_in_quick_edit'    => null,
    ) );
}
add_action( 'init', 'my_custom_taxonomies_for_slider' );
