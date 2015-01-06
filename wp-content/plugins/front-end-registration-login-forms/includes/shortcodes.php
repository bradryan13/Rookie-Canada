<?php

// user registration login form
function feralf_registration_form() {
	
	// only show the registration form to non-logged-in members
	if(!is_user_logged_in()) {
	
		global $feralf_load_css;
		
		// set this to true so the CSS is loaded
		$feralf_load_css = true;
		
		// check to make sure user registration is enabled
		$registration_enabled = get_option('users_can_register');
	
		// only show the registration form if allowed
		if($registration_enabled) {
			$output = feralf_registration_form_fields();
		} else {
			$output = __('User registration is not enabled', 'feralf');
		}
	} else {
		$output = __('You are already registered and logged in.', 'feralf');
	}
	return $output;
}
add_shortcode('register_form', 'feralf_registration_form');

// user login form
function feralf_login_form($atts, $content = null ) {

	global $post;

	if (is_singular()) :
		$current_page = get_permalink($post->ID);
	else :
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") $pageURL .= "s";
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		else $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		$current_page = $pageURL;
	endif;

	extract( shortcode_atts( array(
		'redirect' => $current_page
	), $atts ) );
	
	
	if(!is_user_logged_in()) {
		
		global $feralf_load_css;
		
		// set this to true so the CSS is loaded
		$feralf_load_css = true;
		
		$output = feralf_login_form_fields($redirect);
		
	} else {
		 $output = '<p>' . __('You are already logged in.', 'feralf') . ' <a href="' . wp_logout_url(home_url()) . '">' . __('Logout', 'feralf') . '</a></p>';
	}
	return $output;
}
add_shortcode('login_form', 'feralf_login_form');

// password reset form
function feralf_reset_password_form() {
	if(is_user_logged_in()) {
		global $feralf_load_css;
		
		// set this to true so the CSS is loaded
		$feralf_load_css = true;
		return feralf_change_password_form();
	}
}
add_shortcode('password_form', 'feralf_reset_password_form');