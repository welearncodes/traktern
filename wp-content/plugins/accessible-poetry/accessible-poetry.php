<?php
/**
 * Plugin Name: Accessible Poetry
 * Plugin URI: http://www.amitmoreno.com/acp/
 * Description: Enriches your WordPress with better accessibility options, such as nicely Skiplinks, Font-Sizer, Constrast changer, Custom Toolbar & and many other options.
 * Version: 1.3.4
 * Author: Amit Moreno
 * Author URI: http://www.amitmoreno.com/
 * Text Domain: acp
 * Domain Path: /lang
 * License: GPL2
 */

function acp_admin_style($hook) {
	wp_register_style( 'acp-admin-style', plugins_url('css/admin-style.css', __FILE__) );
	wp_enqueue_style( 'acp-admin-style' );
}
add_action( 'admin_enqueue_scripts', 'acp_admin_style' );

function acp_localization() {
   load_plugin_textdomain( 'acp', false, plugin_basename( dirname( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'acp_localization' );


require_once('inc/acp_panel.php');
require_once('inc/acp_toolbar.php');
require_once('inc/acp_contrast.php');
require_once('inc/acp_imagealt.php');
require_once('inc/acp_skiplinks.php');