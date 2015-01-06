<?php

// login form fields
function feralf_login_form_fields($redirect) {
	global $feralf_settings;

	$theme = isset( $feralf_settings['theme'] ) ? $feralf_settings['theme'] : 'light';

	ob_start();
	
		// show any error messages after form submission
		feralf_show_error_messages('login'); ?>

		<form id="feralf_login_form"  action="" method="post">

				<p>
					<label for="feralf_user_Login" class="user no-show"><?php _e('Username', 'feralf'); ?></label>
					<span class="icon-user"></span>
					<input name="feralf_user_login" id="feralf_user_login" class="required" type="text" placeholder="<?php _e( 'Username', 'feralf' ); ?>"/>
				</p>
				<p >
					<label for="feralf_user_pass" class="password no-show"><?php _e('Password', 'feralf'); ?></label>
					<span class="icon-key"></span>
					<input name="feralf_user_pass" id="feralf_user_pass" placeholder="<?php _e( 'Password', 'feralf' ); ?>" class="password required" type="password"/>
				</p>
				<p class="remember">
					<label class="feralf_remember_me" for="feralf_remember">
						<input name="feralf_remember" id="feralf_remember" class="checkbox" type="checkbox"/>
						<?php _e('Remember Me', 'feralf'); ?>
					</label>
				</p>
				<p>
					<input type="hidden" name="feralf_redirect" value="<?php echo $redirect; ?>"/>
					<input type="hidden" name="feralf_login_nonce" value="<?php echo wp_create_nonce('feralf-login-nonce'); ?>"/>
					<input id="feralf_login_submit" type="submit" class="btn feralf_submit" value="<?php _e('Log me in', 'feralf'); ?>"/>
				</p>
			</fieldset>
		</form>

		<p class="lost-password"><a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" title="<?php _e('Lost Password', 'feralf'); ?>"><?php _e('Lost Password?', 'feralf'); ?></a>
	<?php
	return ob_get_clean();
}

// registration form fields
function feralf_registration_form_fields() {
	global $feralf_settings;

	$theme = isset( $feralf_settings['theme'] ) ? $feralf_settings['theme'] : 'light';

	ob_start();
		// show any error messages after form submission
		feralf_show_error_messages('register'); ?>

		<form id="feralf_registration_form" class="feralf_form feralf_<?php echo $theme; ?>" action="" method="POST">
				<p>
					<label for="feralf_user_Login" class="no-show"><?php _e('Username', 'feralf'); ?></label>
					<span class="icon-user"></span>
					<input name="feralf_user_login" id="feralf_user_login" class="required" type="text" placeholder="<?php _e('Username', 'feralf'); ?>"/>
				</p>

				<p>
					<label for="feralf_user_email" class="no-show"><?php _e('Email', 'feralf'); ?></label>
					<span class="icon-email"></span>
					<input name="feralf_user_email" id="feralf_user_email" class="required" type="text" placeholder="<?php _e('email@domain.com', 'feralf'); ?>"/>
				</p>
	
				<p>
					<label for="password" class="no-show"><?php _e('Password', 'feralf'); ?></label>
					<span class="icon-key"></span>
					<input name="feralf_user_pass" id="feralf_user_pass" class="required" placeholder="<?php _e( 'Password', 'feralf' ); ?>" type="password"/>
				</p>
				<p>
					<input type="hidden" name="feralf_register_nonce" value="<?php echo wp_create_nonce('feralf-register-nonce'); ?>"/>
					<input type="submit" class="feralf_submit" value="<?php _e('Register Account', 'feralf'); ?>"/>
				</p>
		</form>
	<?php
	return ob_get_clean();
}

function feralf_change_password_form() {
	global $post, $feralf_settings;
   	if (is_singular()) :
   		$current_url = get_permalink($post->ID);
   	else :
   		$pageURL = 'http';
   		if ($_SERVER["HTTPS"] == "on") $pageURL .= "s";
   		$pageURL .= "://";
   		if ($_SERVER["SERVER_PORT"] != "80") $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
   		else $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
   		$current_url = $pageURL;
   	endif;
	$redirect = $current_url;

	ob_start();

		// show any error messages after form submission
		feralf_show_error_messages('password'); ?>

		<?php if(isset($_GET['password-updated']) && $_GET['password-updated'] == 'true') { ?>
			<div class="feralf_message success">
				<span><?php _e('Password changed successfully', 'rcp'); ?></span>
			</div>
		<?php } ?>
		<form id="feralf_password_form" class="feralf_form feralf_<?php echo $feralf_settings['theme']; ?>" method="POST" action="<?php echo $current_url; ?>">
			<fieldset>
				<legend><?php _e('Change Your Password', 'feralf'); ?></legend>
				<p>
					<label for="feralf_user_pass"><?php _e('New Password', 'rcp'); ?></label>
					<input name="feralf_user_pass" id="feralf_user_pass" class="required" placeholder="<?php _e( 'Password', 'feralf' ); ?>" type="password"/>
				</p>
				<p>
					<label for="feralf_user_pass_confirm"><?php _e('Password Confirm', 'rcp'); ?></label>
					<input name="feralf_user_pass_confirm" id="feralf_user_pass_confirm" placeholder="<?php _e( 'Password Confirm', 'feralf' ); ?>" class="required" type="password"/>
				</p>
				<p>
					<input type="hidden" name="feralf_action" value="change-password"/>
					<input type="hidden" name="feralf_redirect" value="<?php echo $redirect; ?>"/>
					<input type="hidden" name="feralf_password_nonce" value="<?php echo wp_create_nonce('rcp-password-nonce'); ?>"/>
					<input id="feralf_password_submit" class="feralf_submit" type="submit" value="<?php _e('Change Password', 'feralf'); ?>"/>
				</p>
			</fieldset>
		</form>
	<?php
	return ob_get_clean();
}
