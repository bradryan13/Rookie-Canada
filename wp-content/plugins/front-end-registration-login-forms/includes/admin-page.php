<?php

function feralf_settings_menu() {
	global $feralf_admin_page;
	// add settings page
	$feralf_admin_page = add_options_page(__('Front End Register', 'feralf'), __('Front End Register', 'feralf'), 'manage_options', 'feralf-settings', 'feralf_admin_page');
}
add_action('admin_menu', 'feralf_settings_menu');

function feralf_admin_page() {
	global $feralf_settings;
	ob_start(); ?>
	<div class="wrap">
		<h2><?php _e('Front end Register and Login Settings', 'feralf'); ?></h2>
				<form method="post" action="options.php">

			<?php settings_fields('feralf_settings_group'); ?>

			<?php $pages = get_pages(array('post_status' => array('publish', 'private'))); ?>

			<h4><?php _e('Disable CSS', 'feralf'); ?></h4>
			<p>
				<input id="feralf_settings[disable_css]" name="feralf_settings[disable_css]" type="checkbox" value="1" <?php checked(1, isset( $feralf_settings['disable_css'] ) ); ?> />
				<label class="description" for="feralf_settings[disable_css]"><?php _e('Check this if you want to disable all included CSS styling', 'feralf'); ?></label>
			</p>

			<h4><?php _e('Disable Icons', 'feralf'); ?></h4>
			<p>
				<input id="feralf_settings[disable_icons]" name="feralf_settings[disable_icons]" type="checkbox" value="1" <?php checked(1, isset( $feralf_settings['disable_icons'] ) ); ?> />
				<label class="description" for="feralf_settings[disable_icons]"><?php _e('Check this if you want to disable icons on the login form', 'feralf'); ?></label>
			</p>

			<h4><?php _e('Theme', 'feralf'); ?></h4>
			<p>
				<?php $styles = array('light', 'dark', 'blue', 'red', 'green'); ?>
				<select name="feralf_settings[theme]" id="feralf_settings[theme]">
					<?php foreach($styles as $style) { ?>
						<option value="<?php echo $style; ?>" <?php selected($feralf_settings['theme'], $style); ?>><?php echo $style; ?></option>
					<?php } ?>
				</select>
				<div class="description"><?php _e('Choose the theme you wish to use for the forms', 'feralf'); ?></div>
			</p>

			<h4><?php _e('Redirect', 'feralf'); ?></h4>
			<p>
				<select id="feralf_settings[redirect]" name="feralf_settings[redirect]">
					<?php
					if($pages) :
						foreach ( $pages as $page ) {
						  	$option = '<option value="' . $page->ID . '" ' . selected($page->ID, $feralf_settings['redirect'], false) . '>';
							$option .= $page->post_title;
							$option .= '</option>';
							echo $option;
						}
					else :
						echo '<option>' . __('No pages found', 'feralf') . '</option>';
					endif;
					?>
				</select>
				<div class="description"><?php _e('This is the page users are sent after a successful registration', 'feralf'); ?></div>
			</p>

			<h4><?php _e('License Key', 'feralf'); ?></h4>
			<p>
				<input id="feralf_settings[license]" name="feralf_settings[license]" type="text" value="<?php echo isset( $feralf_settings['license'] ) ? $feralf_settings['license'] : ''; ?>"/>
				<label class="description" for="feralf_settings[license]"><?php _e('Enter your license key to receive automatic updates to this plugin', 'feralf'); ?></label>
			</p>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'feralf'); ?>" />
			</p>

		</form>

	</div>
	<?php
	echo ob_get_clean();
}

function feralf_register_settings() {
	// creates our settings in the options table
	register_setting('feralf_settings_group', 'feralf_settings');
}
add_action('admin_init', 'feralf_register_settings');


function feralf_activate_license() {
	global $edd_options;

	if ( ! isset( $_POST['feralf_settings'] ) )
		return;
	if ( ! isset( $_POST['feralf_settings']['license'] ) )
		return;

	if ( get_option( 'feralf_license_key' ) == 'valid' )
		return;

	$license = sanitize_text_field( $_POST['feralf_settings']['license'] );

	// data to send in our API request
	$api_params = array(
		'edd_action'=> 'activate_license',
		'license'  	=> $license,
		'item_name' => urlencode( FERALF_PRODUCT_NAME ) // the name of our product in EDD
	);

	// Call the custom API.
	$response = wp_remote_get( add_query_arg( $api_params, FERALF_STORE_API_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

	// make sure the response came back okay
	if ( is_wp_error( $response ) )
		return false;

	// decode the license data
	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	update_option( 'feralf_license_key', $license_data->license );

}
add_action( 'admin_init', 'feralf_activate_license' );