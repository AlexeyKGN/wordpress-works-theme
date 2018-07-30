<?php

add_action('admin_menu','setup_theme_admin_menus');

function setup_theme_admin_menus(){

   add_menu_page(
   'Theme Settings',
   'Day Theme',
   'manage_options',
   'day_theme_settings',
   'day_theme_settings_page');
   
   add_action('admin_init','settings_function_group');
}

function settings_function_group(){
    register_setting('settings_function_group','options1');
//    register_setting('settings_function_group','options2');
}

function day_theme_settings_page() {
//    if ( current_user_can( 'manage_options' ) ) {
//        wp_die( 'Yoy do not  have sufficient permissions to access this page' );
//    }
    
    $options1_value = esc_attr( get_option( 'options1' ) );
    //$options2_value = esc_attr(get_option('options2'));
    
    if ( $options1_value == "" ) {
        $options1_value = "Your text logo";
    }
    ?>
    
    <div class="wrap">
        <h2>Example options Page</h2>
        <p>This is settings example page</p>
        <form method="post" action="options.php" name="theme_options">
            <?php settings_fields( 'settings_function_group' ) ?>
            <?php do_settings_sections( 'settings_function_group' ) ?>
            <table>
                <tr valign="top">
                    <th scope="row">Text for header logo</th>
                </tr>
                <td>
                    <input type="text" id="options1" name="options1" value="<?php echo $options1_value; ?>">
                </td>
                <tr>
                    <td></td>
                    <td><?php submit_button( 'Save' ) ?></td>
                </tr>
            </table>
        
        </form>
    </div>
    <?php
}

