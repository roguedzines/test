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


 class weisscp_options_page {

 	function __construct() {
 		add_action( 'admin_menu', array( $this, 'weisscp_admin_settings' ) );
 	}

 	function weisscp_admin_settings() {
 		add_options_page(
 			'Weiss Settings Page',
 			'Weiss Settings',
 			'manage_options',
 			'weisscp_admin_settings',
 			array(
 				$this,
 				'weisscp_admin_settings_page'
 			)
 		);
 	}

 	function  weisscp_admin_settings_page() {
 		echo 'This is the page content';
 	}
 }

 new weisscp_options_page;
