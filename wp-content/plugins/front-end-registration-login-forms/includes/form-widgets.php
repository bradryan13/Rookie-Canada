<?php

class feralf_login_widget extends WP_Widget {
    /** constructor */
    function feralf_login_widget() {
        parent::WP_Widget(false, $name = __('Login Form', 'feralf'), array('description' => __('Display a login form', 'feralf')));	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
			
		global $feralf_load_css, $feralf_settings, $post;

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
		
		if(strlen(trim($instance['redirect'])) > 0) {
			$redirect = $instance['redirect'];
		} else {
			$redirect = $current_page;
		}
		
		if(!isset($feralf_settings['disable_css'])) {
			// set this to true so the CSS is loaded
			$feralf_load_css = true;
		}
		
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
	
		echo $before_widget; 
		if ( $title )
			echo $before_title . $title . $after_title;
		if(!is_user_logged_in()) {
			echo feralf_login_form_fields($redirect);
		} else {
			echo '<p>' . __('You are already logged in.', 'feralf') . ' <a href="' . wp_logout_url(home_url()) . '">' . __('Logout', 'feralf') . '</a></p>';
		}
		echo $after_widget;
		
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['redirect'] = strip_tags($new_instance['redirect']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {		
        $title = esc_attr($instance['title']); 
        $redirect = esc_attr($instance['redirect']); ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('redirect'); ?>"><?php _e('Redirect:', 'feralf'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('redirect'); ?>" name="<?php echo $this->get_field_name('redirect'); ?>" type="text" value="<?php echo $redirect; ?>" />
        </p>
        <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("feralf_login_widget");'));

class feralf_register_widget extends WP_Widget {
    /** constructor */
    function feralf_register_widget() {
        parent::WP_Widget(false, $name = __('Register Form', 'feralf'), array('description' => __('Display a registration form', 'feralf')));	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        
		if(!is_user_logged_in()) {
			global $feralf_load_css, $feralf_settings;

			if(!isset($feralf_settings['disable_css'])) {
				// set this to true so the CSS is loaded
				$feralf_load_css = true;
			}

			extract( $args );
	        $title = apply_filters('widget_title', $instance['title']);
		
			echo $before_widget; 
			if ( $title )
	            echo $before_title . $title . $after_title;
		
			echo feralf_registration_form_fields();
	        echo $after_widget;
		}
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {		
        $title = esc_attr($instance['title']); ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("feralf_register_widget");'));

class feralf_password_widget extends WP_Widget {
    /** constructor */
    function feralf_password_widget() {
        parent::WP_Widget(false, $name = __('Change Password Form', 'feralf'), array('description' => __('Display a change password form', 'feralf')));	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        
		if(is_user_logged_in()) {
			global $feralf_load_css, $feralf_settings;

			if(!isset($feralf_settings['disable_css'])) {
				// set this to true so the CSS is loaded
				$feralf_load_css = true;
			}

			extract( $args );
	        $title = apply_filters('widget_title', $instance['title']);
		
			echo $before_widget; 
			if ( $title )
	            echo $before_title . $title . $after_title;
		
			echo feralf_change_password_form();
	        echo $after_widget;
		}
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {		
        $title = esc_attr($instance['title']); ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("feralf_password_widget");'));
