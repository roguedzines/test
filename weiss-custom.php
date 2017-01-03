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
// add_action( 'admin_menu', 'weisscp_admin_settings_page' );
// function weisscp_admin_settings_page() {
//   add_options_page(
//     'Weiss Settings',
//     'Weiss Settings',
//     'manage_options',
//     'weisscp_admin_settings',
//     'weisscp_admin_settings_page'
//    );
//  }


add_action( 'admin_menu', 'weisscp__add_admin_menu' );
add_action( 'admin_init', 'weisscp__settings_init' );


function weisscp__add_admin_menu(  ) {

 add_options_page( 'Weiss Custom Plugin',
                   'Weiss Custom Plugin',
                   'manage_options',
                   'weiss_custom_plugin',
                   'weisscp__options_page'
                 );

}


function weisscp__settings_init(  ) {

 register_setting( 'pluginPage', 'weisscp__settings' );

 add_settings_section(
   'weisscp__pluginPage_section',
   __( 'Your section description', 'weisscp_' ),
   'weisscp__settings_section_callback',
   'pluginPage'
 );

 add_settings_field(
   'weisscp__text_field_0',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp__text_field_0_render',
   'pluginPage',
   'weisscp__pluginPage_section'
 );

 add_settings_field(
   'weisscp__checkbox_field_1',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp__checkbox_field_1_render',
   'pluginPage',
   'weisscp__pluginPage_section'
 );

 add_settings_field(
   'weisscp__radio_field_2',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp__radio_field_2_render',
   'pluginPage',
   'weisscp__pluginPage_section'
 );

 add_settings_field(
   'weisscp__textarea_field_3',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp__textarea_field_3_render',
   'pluginPage',
   'weisscp__pluginPage_section'
 );

 add_settings_field(
   'weisscp__select_field_4',
   __( 'Settings field description', 'weisscp_' ),
   'weisscp__select_field_4_render',
   'pluginPage',
   'weisscp__pluginPage_section'
 );


}


function weisscp__text_field_0_render(  ) {

 $options = get_option( 'weisscp__settings' );
 ?>
 <input type='text' name='weisscp__settings[weisscp__text_field_0]' value='<?php echo $options['weisscp__text_field_0']; ?>'>
 <?php

}


function weisscp__checkbox_field_1_render(  ) {

 $options = get_option( 'weisscp__settings' );
 ?>
 <input type='checkbox' name='weisscp__settings[weisscp__checkbox_field_1]' <?php checked( $options['weisscp__checkbox_field_1'], 1 ); ?> value='1'>
 <?php

}


function weisscp__radio_field_2_render(  ) {

 $options = get_option( 'weisscp__settings' );
 ?>
 <input type='radio' name='weisscp__settings[weisscp__radio_field_2]' <?php checked( $options['weisscp__radio_field_2'], 1 ); ?> value='1'>
 <?php

}


function weisscp__textarea_field_3_render(  ) {

 $options = get_option( 'weisscp__settings' );
 ?>
 <textarea cols='40' rows='5' name='weisscp__settings[weisscp__textarea_field_3]'>
   <?php echo $options['weisscp__textarea_field_3']; ?>
 </textarea>
 <?php

}


function weisscp__select_field_4_render(  ) {

 $options = get_option( 'weisscp__settings' );
 ?>
 <select name='weisscp__settings[weisscp__select_field_4]'>
   <option value='1' <?php selected( $options['weisscp__select_field_4'], 1 ); ?>>Option 1</option>
   <option value='2' <?php selected( $options['weisscp__select_field_4'], 2 ); ?>>Option 2</option>
 </select>

<?php

}


function weisscp__settings_section_callback(  ) {

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
