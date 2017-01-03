<?php
/**
 * @package Weiss Custom
 * @version 1.1
 */
/*
Plugin Name: Weiss Custom Plugin
Plugin URI: http://weissinc.com
Description: A plugin for custom setup for Weiss
Author: Li-Shann Tomchik
Version: 1.0
Author URI: http://weissinc.com
*/

/**
* Prefix
* weisscp_
*/

// check wordpress version before install
register_activation_hook( __FILE__, 'weisscp_install' );

function weisscp_install() {
  if ( version_compare( get_bloginfo( 'version' ), '3.1', '<' ) ) {
    deactivate_plugins( basename( __FILE__ ) ); // Deactivate our plugin
  }
}

add_action( 'admin_menu', 'weisscp_add_admin_menu' );
add_action( 'admin_init', 'weisscp_settings_init' );


function weisscp_add_admin_menu(  ) {

 add_options_page( 'Weiss Custom Plugin',
                   'Weiss Custom Plugin',
                   'manage_options',
                   'weiss_custom_plugin',
                   'weisscp__options_page'
                 );

}


function weisscp_settings_init(  ) {

 register_setting( 'pluginPage', 'weisscp_settings' );

 add_settings_section(
   'weisscp_pluginPage_section',
   __( 'Section description', 'weisscp_' ),
   'weisscp_settings_section_callback',
   'pluginPage'
 );

 add_settings_field(
   'weisscp_text_field_0',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp_text_field_0_render',
   'pluginPage',
   'weisscp_pluginPage_section'
 );

 add_settings_field(
   'weisscp_checkbox_field_1',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp_checkbox_field_1_render',
   'pluginPage',
   'weisscp_pluginPage_section'
 );

 add_settings_field(
   'weisscp__radio_field_2',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp_radio_field_2_render',
   'pluginPage',
   'weisscp_pluginPage_section'
 );

 add_settings_field(
   'weisscp_textarea_field_3',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp_textarea_field_3_render',
   'pluginPage',
   'weisscp_pluginPage_section'
 );

 add_settings_field(
   'weisscp_select_field_4',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp_select_field_4_render',
   'pluginPage',
   'weisscp_pluginPage_section'
 );


}


function weisscp_text_field_0_render(  ) {

 $options = get_option( 'weisscp_settings' );
 ?>
 <input type='text' name='weisscp_settings[weisscp_text_field_0]' value='<?php echo $options['weisscp_text_field_0']; ?>'>
 <?php

}


function weisscp_checkbox_field_1_render(  ) {

 $options = get_option( 'weisscp_settings' );
 ?>
 <input type='checkbox' name='weisscp_settings[weisscp_checkbox_field_1]' <?php checked( $options['weisscp_checkbox_field_1'], 1 ); ?> value='1'>
 <?php

}


function weisscp_radio_field_2_render(  ) {

 $options = get_option( 'weisscp_settings' );
 ?>
 <input type='radio' name='weisscp_settings[weisscp_radio_field_2]' <?php checked( $options['weisscp_radio_field_2'], 1 ); ?> value='1'>
 <?php

}


function weisscp_textarea_field_3_render(  ) {

 $options = get_option( 'weisscp_settings' );
 ?>
 <textarea cols='40' rows='5' name='weisscp__settings[weisscp_textarea_field_3]'>
   <?php echo $options['weisscp_textarea_field_3']; ?>
 </textarea>
 <?php

}


function weisscp_select_field_4_render(  ) {

 $options = get_option( 'weisscp_settings' );
 ?>
 <select name='weisscp_settings[weisscp_select_field_4]'>
   <option value='1' <?php selected( $options['weisscp_select_field_4'], 1 ); ?>>Option 1</option>
   <option value='2' <?php selected( $options['weisscp_select_field_4'], 2 ); ?>>Option 2</option>
 </select>

<?php

}


function weisscp_settings_section_callback(  ) {

 echo __( 'This section description', 'weisscp_' );

}


function weisscp__options_page(  ) {

 ?>
 <form action='options.php' method='post'>

   <h2>Weiss Custom Plugin</h2>

   <?php
   settings_fields( 'pluginPage' );
   do_settings_sections( 'pluginPage' );
   submit_button();
   ?>

 </form>
 <?php

}
