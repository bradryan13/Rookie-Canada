<?php
/*
Plugin Name: Front End Registration and Login Forms
Plugin URI: http://pippinsplugins.com/front-end-registration-and-login-forms-plugins
Description: Provides simple front end registration and login forms
Version: 1.2
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
*/

/*******************************************
* Globals and Constants
*******************************************/

if(!defined('FERALF_PLUGIN_DIR')) {
	define('FERALF_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

define( 'FERALF_STORE_API_URL', 'http://pippinsplugins.com' );
define( 'FERALF_PRODUCT_NAME', 'Front End Registration and Login Forms Plugin' );
define( 'FERALF_VERSION', '1.2' );

// the plugin base directory
global $feralf_base_dir;
$feralf_base_dir = dirname(__FILE__);

$feralf_settings = get_option('feralf_settings');

/*******************************************
* plugin text domain for translations
*******************************************/

function feralf_text_domain() {
	load_plugin_textdomain( 'feralf', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'feralf_text_domain' );


/*******************************************
* includes
*******************************************/

include($feralf_base_dir . '/includes/shortcodes.php');
include($feralf_base_dir . '/includes/forms.php');
include($feralf_base_dir . '/includes/scripts.php');
include($feralf_base_dir . '/includes/form-widgets.php');
include($feralf_base_dir . '/includes/handle-register-and-login.php');
if(is_admin()) {
	include($feralf_base_dir . '/includes/admin-page.php');
}


function feralf_plugin_updater() {

	if ( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {
		// load our custom updater
		include dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php';
	}

	$feralf_settings = get_option('feralf_settings');

	// retrieve our license key from the DB
	$license_key = isset( $feralf_settings['license_key'] ) ? trim( $feralf_settings['license_key'] ) : '';

	if( ! empty( $license_key ) ) {

		// setup the updater
		$edd_stripe_updater = new EDD_SL_Plugin_Updater( FERALF_STORE_API_URL, __FILE__, array(
				'version'  	=> FERALF_VERSION,      // current version number
				'license'  	=> $license_key,        // license key (used get_option above to retrieve from DB)
				'item_name' => FERALF_PRODUCT_NAME, // name of this plugin
				'author'  	=> 'Pippin Williamson'  // author of this plugin
			)
		);

	}
}
add_action( 'admin_init', 'feralf_plugin_updater' );