<?php


/**
 * requires my css and js files
 */

function add_scripts_theme() {
    
    //css files
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.min.css' );
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style( 'style-css', get_stylesheet_uri() );
    
    //js files
    wp_enqueue_script( 'jquery.js', get_template_directory_uri() . '/js/jquery.js' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
    wp_enqueue_script( 'wow-min-js', get_template_directory_uri() . '/js/wow.min.js' );
    wp_enqueue_script( 'contact-form-js', get_template_directory_uri() . 'contactform/contactform.js' );
    
}

add_action( 'wp_enqueue_scripts', 'add_scripts_theme' );


/**
 * automatic download of my settings during the installation of the theme
 */

if ( ! function_exists( 'day_theme_setup' ) ) {
    
    function day_theme_setup() {
        add_theme_support( 'title-tag' );
    
        add_theme_support( 'post-thumbnails' );
        
        
        // add_custom_logo
        add_theme_support( 'custom_logo', array(
            'height'      => 31,
            'width'       => 134,
            'flex-height' => true
        ) );
        
        // require support menus
        add_theme_support( 'menus' );
        
        
        add_theme_support( 'html5', array(
            'search_form',
            'comment_form',
            'comment_list',
            'gallery',
            'caption',
            'image',
        ) );
        
        add_theme_support( 'post-formats', array(
            'aside',
            'video',
            'gallery',
            'post-thumbnails'
        
        ) );
        
        register_nav_menus( array(
            'header-menu' => 'Header-menu',
            'footer-menu' => 'Footer-menu'
        ) );
    }
}
add_action( 'after_setup_theme', 'day_theme_setup' );

// nav-menu arguments
$menu_args = array(
    'theme_location' => 'header-menu',
    'container'      => 'div',
    'menu_class'     => 'nav nav-tabs',
    'menu_id'        => '',
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);

/**
 * <-------- add_setup_theme
 */
$option_theme_php = __DIR__ . '\inc\theme_options.php';
if (file_exists($option_theme_php)) {
    require $option_theme_php;
} else return;


$custom_post_type_slider = __DIR__ . '\inc\custom_post_type_slider.php';
    if(file_exists($custom_post_type_slider)){
        require $custom_post_type_slider;
    } else return;
    
/**
 * slider block start <-----------------
 */



?>