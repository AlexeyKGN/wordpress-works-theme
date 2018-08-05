<?php


/**
 * require all scripts and styles
 */
function load_style_script() {
    wp_enqueue_script( 'jquery_my', get_template_directory_uri() . '/js/jquery-1.10.1.min.js' );
    wp_enqueue_script( 'jqFancyTransitions.1.8.min', get_template_directory_uri() . '/js/jqFancyTransitions.1.8.min.js' );
    
    
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'load_style_script' );


/**
 * add sidebars in theme
 */
register_sidebar( array(
    'name'          => 'Menu',
    'id'            => 'menu_header',
    'before_widget' => '',
    'after_widget'  => ''
) );


register_sidebar( array(
    'name'          => 'Social links',
    'id'            => 'social_header',
    'before_widget' => '',
    'after_widget'  => ''
) );

register_sidebar( array(
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<div class="sidebar-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
) );

register_sidebar( array(
    'name'          => 'Footer',
    'id'            => 'footer',
    'before_widget' => '<div class="footer-info %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
) );


add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 180, 180 );

/**
 * Template for comments and pingbacks
 */
$twenty_comment = __DIR__ . '\inc\twenty_comment.php';
if ( file_exists( $twenty_comment ) ) {
    require $twenty_comment;
} else {
    echo "file not found";
    return;
}

/**
 * banner
 */

$custom_banner = __DIR__ . '\inc\custom_banner.php';
if ( file_exists( $custom_banner ) ) {
    require $custom_banner;
} else {
    echo "file not found";
    return;
}

/**
 * slider
 */

$custom_slider = __DIR__ . '\inc\custom_slider.php';
if ( file_exists( $custom_slider ) ) {
    require $custom_slider;
} else {
    echo "file not found";
    return;
}



