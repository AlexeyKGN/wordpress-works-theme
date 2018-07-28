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
        //Loads the translation file of the theme (.mo) into memory, for further work with it.
        
        add_theme_support( 'title-tag' );
        
        
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
            'caption'
        ) );
        
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'gallery'
        
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
$url_page = 'my_parameters.php'; // This is part of the URL of the page, I recommend using a string value, because in this case there will be no dependence on what file you will insert it into.

/**
 * Function that adds a page to the Settings menu item
 */
function theme_options() {
    global $url_page;
    
    add_menu_page(
        'Custom settings theme',
        'Custom settings theme',
        'manage_options',
        $url_page,
        'theme_option_page',
        '',
        80 );
    
}

add_action( 'admin_menu', 'theme_options' );

/**
 * Callback function
 */
function theme_option_page() {
    global $url_page; ?>
    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>
        <form method="post" enctype="multipart/form-data" action="options.php">
            <?php
                settings_fields( 'theme_options' );
                do_settings_sections( $url_page );
                $text_section_logo = esc_attr(get_option('text_section_logo'));
//              update_option('theme_options', 'MiroTex');
//                if($text_section_logo == "" || $text_section_logo == null){
//                    $text_section_logo = "default";
//                    return $text_section_logo;
//                }
            ?>
                <input type="submit" name="form_submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>"/>
        </form>
    </div>
    <?php
}
/**
 *Register the settings.
 *My settings will be stored in the database called theme_options
 */
function register_settings_in_theme() {
    global $url_page;
    
    register_setting( 'theme_options', 'theme_options' );
    add_settings_section( 'text_section_logo', '', '', $url_page );
    
    $theme_field_params = array(
        'type'      => 'text', // type
        'id'        => 'my_text',
        'desc'      => 'Example of a regular text field.', // description
        'label_for' => 'my_text' // allows you to make the name of the setting a label (if you do not understand what it is, you can not use it), in theory it should be the same with the id parameter)
    );
    add_settings_field( 'my_logo_text_field', 'Add your text for header', 'theme_option_display_settings', $url_page, 'text_section_logo', $theme_field_params );
    
    
    add_settings_section( 'image_section_upload', '', '', $url_page );
    
    $theme_field_params = array(
        'type'      => 'file',
        'id'        => 'my_file',
        'desc'      => 'Require Logo.',
        'label_for' => 'my_file'
    );
    add_settings_field( 'my_logo_field', 'Upload image for header', 'theme_option_display_settings', $url_page, 'image_section_upload', $theme_field_params );
}

add_action( 'admin_init', 'register_settings_in_theme' );


function theme_option_display_settings($args) {
    
    $type       = $args['type'];
    $id         = $args['id'];
    $desciption = $args['desc'];
    
    ?>
    <?php
    
    switch ($type ) {
        case 'text':
            ?>
              <input  id="<?php echo $id?>" type="text" name="<?= $desciption;?>" value="" />
            <?php
        break;
        case 'file':
            ?>
             <input  id='$id' type="file" name= "<?= $desciption;?>\" />";
            <?php
            break;
    }
    ?>
    <?php
}


/**
 * THE END BLOCK add_setup_theme -------->
 */


?>