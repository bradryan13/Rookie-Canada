<?php


// register our form css
function feralf_register_scripts() {
	wp_register_style('feralf-form-css', FERALF_PLUGIN_DIR . 'css/forms.css');
	wp_enqueue_script('jquery');
	wp_enqueue_script('feralf-form-js', FERALF_PLUGIN_DIR . 'js/feralf-scripts.js');
}
add_action('init', 'feralf_register_scripts');
 
// load our form css
function feralf_print_css() {
	global $feralf_load_css, $feralf_settings;
 
	// this variable is set to TRUE if the short code is used on a page/post
	if ( ! $feralf_load_css )
		return; // this means that neither short code is present, so we get out of here

	if(!isset($feralf_settings['disable_css'])) {
		wp_print_styles('feralf-form-css');
	}
	
}
add_action('wp_footer', 'feralf_print_css');