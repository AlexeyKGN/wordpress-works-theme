<!--/**-->
<!--* add_setup_theme_taxonomies-->
<!--*/-->
<!--if(! function_exists('add_setup_in_theme')){-->
<!---->
<!--function add_setup_in_theme(){-->
<!--?>-->
<!---->
<!--<div class="wrap">-->
<!--    <hr/>-->
<!--    <h2>--><?php //echo get_admin_page_title() ?><!--</h2>-->
<!--    -->
<!--    -->
<!--    <form enctype="multipart/form-data" method="post" action="options.php">-->
<!--        --><?php //wp_nonce_field('update-options'); ?>
<!--        <table class="form-table">-->
<!--            <tr valign="top">-->
<!--                <th scope="row">Add your logo-text in header</th>-->
<!--                <td>;<input type="text" name="add_your_logo_text_in_header" value="--><?php //echo get_option('add_your_logo_text_in_header') ?><!--" /></td>-->
<!--            </tr>-->
<!--            -->
<!--            <tr valign="top">-->
<!--                <th scope="row">Add your image in header</th>-->
<!--                <td><input type="file" name="add_your_image_in_header" value="--><?php //echo get_option('add_your_image_in_header'); ?><!--" /></td>-->
<!--            </tr>-->
<!--        -->
<!--        </table >-->
<!--        <p class="submit">-->
<!--            <input type="submit" class="button-primary" value="--><?php //_e('Save Changes') ?><!--" />-->
<!--        </p>-->
<!--    </form>-->
<!--    <hr/>-->
<!--</div>-->
<!---->
<?php
//}
//
////    add_action( 'admin_menu', 'add_setup_theme' );
//add_action( 'admin_menu', function (){
//    add_menu_page(
//        'Customize the theme',
//        'Custom Customize Theme',
//        'manage_options',
//        'theme-options',
//        'add_setup_in_theme',
//        '',
//        80 );
//});
//
//
//}