<?php

// register a new user
function feralf_add_new_member() {

	if ( ! isset( $_POST['feralf_register_nonce'] ) )
		return;

	if ( ! wp_verify_nonce( $_POST['feralf_register_nonce'], 'feralf-register-nonce' ) )
		return;

	global $feralf_settings;

	$user_login    = sanitize_text_field( $_POST["feralf_user_login"] );
	$user_email    = sanitize_email( $_POST["feralf_user_email"] );
	$user_first    = sanitize_text_field( $_POST["feralf_user_first"] );
	$user_last     = sanitize_text_field( $_POST["feralf_user_last"] );
	$user_pass     = sanitize_text_field( $_POST["feralf_user_pass"] );
	$pass_confirm  = sanitize_text_field( $_POST["feralf_user_pass_confirm"] );

	if ( username_exists( $user_login ) ) {
		// Username already registered
		feralf_errors()->add( 'username_unavailable', __( 'Username already taken', 'feralf' ), 'register' );
	}
	if ( !validate_username( $user_login ) ) {
		// invalid username
		feralf_errors()->add( 'username_invalid', __( 'Invalid username', 'feralf' ), 'register' );
	}
	if ( $user_login == '' || $user_login == 'Usernane' ) {
		// empty username
		feralf_errors()->add( 'username_empty', __( 'Enter a username', 'feralf' ), 'register' );
	}
	if ( !is_email( $user_email ) || $user_email == 'email@domain.com' ) {
		//invalid email
		feralf_errors()->add( 'email_invalid', __( 'Invalid email', 'feralf' ), 'register' );
	}
	if ( email_exists( $user_email ) ) {
		//Email address already registered
		feralf_errors()->add( 'email_used', __( 'Email already used', 'feralf' ), 'register' );
	}

	$errors = feralf_errors()->get_error_messages();

	// only create the user in if there are no errors
	if ( empty( $errors ) ) {

		$new_user_id = wp_insert_user( array(
				'user_login'      => $user_login,
				'user_pass'       => $user_pass,
				'user_email'      => $user_email,
				'first_name'      => $user_first,
				'last_name'       => $user_last,
				'user_registered' => date( 'Y-m-d H:i:s' ),
				'role'            => 'subscriber'
			)
		);
		if ( $new_user_id ) {
			// send an email to the admin alerting them of the registration
			wp_new_user_notification( $new_user_id );

			// log the new user in
			wp_set_auth_cookie( $new_user_id );
			wp_set_current_user( $new_user_id, $user_login );

			do_action( 'wp_login', $user_login, get_userdata( $new_user_id ) );

			// send the newly created user to the home page after logging them in
			wp_redirect( get_permalink( $feralf_settings['redirect'] ) ); exit;
		}

	}
}
add_action( 'init', 'feralf_add_new_member' );

// logs a member in after submitting a form
function feralf_login_member() {

	if ( ! isset( $_POST['feralf_user_login'] ) )
		return;

	$login_name = sanitize_text_field( $_POST['feralf_user_login'] );

	// this returns the user ID and other info from the user name
	$user = get_user_by( 'login', $login_name );

	if ( !$user ) {
		// if the user name doesn't exist
		feralf_errors()->add( 'empty_username', __( 'Invalid username', 'feralf' ), 'login' );
	}

	if ( !isset( $_POST['feralf_user_pass'] ) || $_POST['feralf_user_pass'] == '' ) {
		// if no password was entered
		feralf_errors()->add( 'empty_password', __( 'Enter a password', 'feralf' ), 'login' );
	}

	if ( $user ) {
		// check the user's login with their password
		if ( !wp_check_password( $_POST['feralf_user_pass'], $user->user_pass, $user->ID ) ) {
			// if the password is incorrect for the specified user
			feralf_errors()->add( 'empty_password', __( 'Incorrect password', 'feralf' ), 'login' );
		}
	}
	// retrieve all error messages
	$errors = feralf_errors()->get_error_messages();

	// only log the user in if there are no errors
	if ( empty( $errors ) ) {

		wp_set_auth_cookie( $user->ID, isset( $_POST['feralf_remember'] ) );
		wp_set_current_user( $user->ID, $login_name );

		do_action( 'wp_login', $login_name );

		wp_redirect( $_POST['feralf_redirect'] ); exit;
	}
}
add_action( 'init', 'feralf_login_member' );

function feralf_change_password() {
	// reset a users password
	if ( isset( $_POST['feralf_action'] ) && $_POST['feralf_action'] == 'change-password' ) {

		global $user_ID;

		if ( !is_user_logged_in() )
			return;

		if ( wp_verify_nonce( $_POST['feralf_password_nonce'], 'rcp-password-nonce' ) ) {

			if ( $_POST['feralf_user_pass'] == '' || $_POST['feralf_user_pass_confirm'] == '' ) {
				// password(s) field empty
				feralf_errors()->add( 'password_empty', __( 'Enter a password', 'feralf' ), 'password' );
			}
			if ( $_POST['feralf_user_pass'] != $_POST['feralf_user_pass_confirm'] ) {
				// passwords do not match
				feralf_errors()->add( 'password_mismatch', __( 'Passwords don\'t match', 'feralf' ), 'password' );
			}

			// retrieve all error messages, if any
			$errors = feralf_errors()->get_error_messages();

			if ( empty( $errors ) ) {
				// change the password here
				$user_data = array(
					'ID' => $user_ID,
					'user_pass' => $_POST['feralf_user_pass']
				);
				wp_update_user( $user_data );
				// send password change email here (if WP doesn't)
				wp_redirect( add_query_arg( 'password-updated', 'true', $_POST['feralf_redirect'] ) );
				exit;
			}
		}
	}
}
add_action( 'init', 'feralf_change_password' );

// used for tracking error messages
function feralf_errors() {
	static $wp_error; // Will hold global variable safely
	return isset( $wp_error ) ? $wp_error : ( $wp_error = new WP_Error( null, null, null ) );
}

// displays error messages from form submissions
function feralf_show_error_messages( $data = '' ) {
	if ( $codes = feralf_errors()->get_error_codes() ) {
		echo '<div class="feralf_errors">';
		// Loop error codes and display errors
		foreach ( $codes as $code ) {
			if ( feralf_errors()->get_error_data( $code ) == $data ) {
				$message = feralf_errors()->get_error_message( $code );
				echo '<p class="' . $code . ' feralf_error"><span>' . $message . '</span></p>';
			}
		}
		echo '</div>';
	}
}
