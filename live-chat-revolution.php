<?php
defined( 'ABSPATH' ) or die( 'Nope, not accessing this' );

/*
Plugin Name:  Live Chat Revolution
Plugin URI:   http://koder.hr
Description:  Live Chat Revolution gives visitiors more ways to reach you.
Version:      1.0.0.
Author:       Davor Zec
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

// menu setup
add_action('admin_menu', 'admin_menu_lcr');

//register menu
function admin_menu_lcr(){
	add_menu_page(
		'Live Chat Revolution', 
		'Live Chat Revolution', 
		'administrator', 
		'live_chat_revolution', 
		'lcr_settings_page',
		'dashicons-media-code'
		);
}

//display settings page
function lcr_settings_page(){ ?>
	<div class="wrap">
		<h1>Live Chat Revolution</h1>

		<form method="post" action="options.php">
				<?php 
				settings_fields('lcr_settings');
				do_settings_sections('lcr_settings'); 
				?>
			<table class="form-table">
				<tbody>
					<tr valign="top"><th scope="row"><h2>Widget settings</h2></th></tr>
					<tr>
						<th><label for="lcr_dwp">Widget position</label></th>
						<td>
							<select name="desktop_widget_position" id="lcr_dwp">
				        		<option value="desktop-bottom-right" <?php selected(get_option('desktop_widget_position'), "desktop-bottom-right"); ?>>Bottom Right</option>
				        		<option value="desktop-bottom-left" <?php selected(get_option('desktop_widget_position'), "desktop-bottom-left"); ?>>Bottom Left</option>
				       		</select>
						</td>
					</tr>
					<tr>
						<th><label for="lcr_dwt">Widget button text</label></th>
						<td>
							<input type="text" name="desktop_widget_text" value="<?php echo esc_attr(get_option('desktop_widget_text')); ?>" id="lcr_dwt"/>
						</td>
					</tr>
					<tr>
						<th><label for="lcr_dwbt">Widget body text</label></th>
						<td>
							<input type="text" name="desktop_widget_body_text" value="<?php echo esc_attr(get_option('desktop_widget_body_text')); ?>" id="lcr_dwbt"/>
						</td>
					</tr>
					<tr>
						<th><label for="lcr_wc">Widget color</label></th>
						<td>
							<input type="text" name="lcr_widget_color" value="<?php echo get_option('lcr_widget_color');?>" class="my-color-field" id="lcr_wc"/></br>
						</td>
					</tr>
					<tr>
						<th><label for="lcr_wtc">Widget text color</label></th>
						<td>
							<input type="text" name="lcr_widget_text_color" value="<?php echo get_option('lcr_widget_text_color');?>" class="my-color-field" id="lcr_wtc"/></br>
						</td>
					</tr>

					<tr valign="top"><th scope="row"><h2>Call settings</h2></th></tr>
					<tr>
						<th><label for="lcr_cspn">Phone number</label></th>
						<td>
							<input type="tel" name="call_settings_phone_number" value="<?php echo esc_attr(get_option('call_settings_phone_number')); ?>" id="lcr_cspn"/>
							Use your country code (+385 XXX XXX)
						</td>
					</tr>
					<tr>
						<th><label for="lcr_so">Show on</label></th>
						<td>
							<input type="checkbox" name="call_settings_show_desktop" value="1"<?php checked(1, get_option('call_settings_show_desktop')); ?> id="lcr_so"/>Desktop</br>
							<input type="checkbox" name="call_settings_show_mobile" value="1"<?php checked(1, get_option('call_settings_show_mobile')); ?> id="lcr_so"/>Mobile
						</td>
					</tr>
					<tr>
						<th><label for="lcr_csbt">Button text</label></th>
						<td>
							<input type="text" name="call_settings_button_text" value="<?php echo esc_attr(get_option('call_settings_button_text')); ?>" id="lcr_csbt"/>
						</td>
					</tr>

					<tr valign="top"><th scope="row"><h2>Facebook messenger settings</h2></th></tr>
					<tr>
						<th><label for="lcr_fms">Facebook profile id:</label></th>
						<td>
							<input type="text" name="facebook_settings_profile_id" value="<?php echo esc_attr(get_option('facebook_settings_profile_id')); ?>" id="lcr_fms"/>
							facebook.com/your.id or facebook.com/profile.php?id=your.id
						</td>
					</tr>
					<tr>
						<th><label for="lcr_fbso">Show on:</label></th>
						<td>
							<input type="checkbox" name="facebook_settings_show_desktop" value="1"<?php checked(1, get_option('facebook_settings_show_desktop')); ?> id="lcr_fbso"/>Desktop</br>
							<input type="checkbox" name="facebook_settings_show_mobile" value="1"<?php checked(1, get_option('facebook_settings_show_mobile')); ?> id="lcr_fbso"/>Mobile
						</td>
					</tr>
					<tr>
						<th><label for="lcr_fbbt">Button text</label></th>
						<td>
							<input type="text" name="facebook_settings_button_text" value="<?php echo esc_attr(get_option('facebook_settings_button_text')); ?>" id="lcr_fbbt"/>
						</td>
					</tr>

					<tr valign="top"><th scope="row"><h2>Whatsapp settings</h2></th></tr>
					<tr>
						<th><label for="lcr_wapn">Phone number</label></th>
						<td>
							<input type="text" name="whatsapp_settings_phone_number" value="<?php echo esc_attr(get_option('whatsapp_settings_phone_number')); ?>" id="lcr_wapn"/>
							Use your country code (+385 XXX XXX)
						</td>
					</tr>
					<tr>
						<th><label for="lcr_waso"></label>Show on</th>
						<td>
							<input type="checkbox" name="whatsapp_settings_show_desktop" value="1"<?php checked(1, get_option('whatsapp_settings_show_desktop')); ?> id="lcr_waso"/>Desktop</br>
							<input type="checkbox" name="whatsapp_settings_show_mobile" value="1"<?php checked(1, get_option('whatsapp_settings_show_mobile')); ?> id="lcr_waso"/>Mobile
						</td>
					</tr>
					<tr>
						<th><label for="lcr_wabt">Button text</label></th>
						<td>
							<input type="text" name="whatsapp_settings_button_text" value="<?php echo esc_attr(get_option('whatsapp_settings_button_text')); ?>" id="lcr_wabt"/>
						</td>
					</tr>

					<tr valign="top"><th scope="row"><h2>Email settings</h2></th></tr>
					<tr>
						<th><label for="lcr_ye">Your email</label></th>
						<td>
							<input type="text" name="email_settings_email" value="<?php echo esc_attr(get_option('email_settings_email')); ?>" id="lcr_ye"/>
						</td>
					</tr>
					<tr>
						<th><label for="lcr_emso">Shown on</label></th>
						<td>
							<input type="checkbox" name="email_settings_show_desktop" value="1"<?php checked(1, get_option('email_settings_show_desktop')); ?> id="lcr_emso"/>Desktop</br>
							<input type="checkbox" name="email_settings_show_mobile" value="1"<?php checked(1, get_option('email_settings_show_mobile')); ?> id="lcr_emso"/>Mobile
						</td>
					</tr>
					<tr>
						<th><label for="lcr_esbt">Button text</label></th>
						<td>
							<input type="text" name="email_settings_button_text" value="<?php echo esc_attr(get_option('email_settings_button_text')); ?>" id="lcr_esbt"/>
						</td>
					</tr>

					<tr valign="top"><th scope="row"><h2>Custom redirect settings</h2></th></tr>
					<tr>
						<th><label for="lcr_crsru">Redirect URL</label></th>
						<td>
							<input type="text" name="custom_redirect_settings_url" value="<?php echo esc_attr(get_option('custom_redirect_settings_url')); ?>" id="lcr_crsru"/>
							Use this to redirect to Help or FAQ page. Use full URL
						</td>
					</tr>
					<tr>
						<th><label for="lcr_crso"></label>Show on</th>
						<td>
							<input type="checkbox" name="custom_redirect_settings_show_desktop" value="1"<?php checked(1, get_option('custom_redirect_settings_show_desktop')); ?> id="lcr_crso"/>Desktop</br>
							<input type="checkbox" name="custom_redirect_settings_show_mobile" value="1"<?php checked(1, get_option('custom_redirect_settings_show_mobile')); ?> id="lcr_crso"/>Mobile
						</td>
					</tr>
					<tr>
						<th><label for="lcr_srbt">Button text</label></th>
						<td>
							<input type="text" name="custom_redirect_settings_button_text" value="<?php echo esc_attr(get_option('custom_redirect_settings_button_text')); ?>" id="lcr_srbt"/>
						</td>
					</tr>
					
					<tr>
						<th><label for=""></label></th>
						<td>
							<?php submit_button(); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</form> 
	</div>

 <?php }

add_action('wp_footer', 'lcr_widget');
function lcr_widget(){
	//desktop widget
	if(!wp_is_mobile()){
		?>
			<aside class="lcr-desktop-widget lcr-widget-position" id="lcr-hide-widget">
	    	<div class="lcr-widget-top-text"><?php echo get_option('desktop_widget_body_text')?></div>
	    		<span id="lcr_close_widget">
	    			<i class="fa fa-times" aria-hidden="true"></i>
	    		</span></br>
	    		<?php
	    		if(get_option('call_settings_show_desktop') == 1){
	    			echo lcr_phone_call();
				}
				if(get_option('facebook_settings_show_desktop') == 1){
	    			echo lcr_fb_messenger();
				}
				if(get_option('whatsapp_settings_show_desktop') == 1){
	    			echo lcr_whatsapp();
				}
				if(get_option('email_settings_show_desktop') == 1){
	    			echo lcr_email();
				}
				if(get_option('custom_redirect_settings_show_desktop') == 1){
	    			echo lcr_custom_redirect();
				}
	    		?>
		    </br><br/>
		</aside>

		<div class="lcr-desktop-button lcr-widget-button-color lcr-widget-position"><?php echo get_option('desktop_widget_text')?></div>		   		
	<?php	}

	if(wp_is_mobile()){
		?>
		<aside class="lcr-desktop-widget lcr-widget-position" id="lcr-hide-widget">
	    	<div class="lcr-widget-top-text"><?php echo get_option('desktop_widget_body_text')?></div>
	    		<span id="lcr_close_widget">
	    			<i class="fa fa-times" aria-hidden="true"></i>
	    		</span></br>
	    		<?php
	    		if(get_option('call_settings_show_mobile') == 1){
	    			echo lcr_phone_call();
				}
				if(get_option('facebook_settings_show_mobile') == 1){
	    			echo lcr_fb_messenger();
				}
				if(get_option('whatsapp_settings_show_mobile') == 1){
	    			echo lcr_whatsapp();
				}
				if(get_option('email_settings_show_mobile') == 1){
	    			echo lcr_email();
				}
				if(get_option('custom_redirect_settings_show_mobile') == 1){
	    			echo lcr_custom_redirect();
				}
	    		?>
		    </br><br/>
		</aside>

		<div class="lcr-desktop-button lcr-widget-button-color lcr-widget-position"><?php echo get_option('desktop_widget_text')?></div>
		
	<?php
	}   	
}

function lcr_phone_call(){
	$call_button  = '<a href="tel:'.get_option('call_settings_phone_number').'" target="_blank">';
	$call_button .= '<div class="lcr-button lcr-phone">'.get_option('call_settings_button_text').'</div><br/>';
	$call_button .= '</a>';

	return $call_button;
}

function lcr_fb_messenger(){
	$face_button  = '<a href="https://m.me/'.get_option('facebook_settings_profile_id').'" target="_blank">';
	$face_button .= '<div class="lcr-button lcr-facebook">'.get_option('facebook_settings_button_text').'</div><br/>';
	$face_button .= '</a>';

	return $face_button;
}

function lcr_whatsapp(){
	//desktop or mobile
	if(!wp_is_mobile()){
		$whatsapp_device_type = 'https://web.whatsapp.com/send?phone=';
	}elseif(wp_is_mobile()){
		$whatsapp_device_type = 'https://api.whatsapp.com/send?phone=';
	}
	$whatsapp_button  = '<a href="'.$whatsapp_device_type.get_option('whatsapp_settings_phone_number').'" target="_blank">';
	$whatsapp_button .= '<div class="lcr-button lcr-whatsapp">'.get_option('whatsapp_settings_button_text').'</div><br/>';
	$whatsapp_button .= '</a>';

	return $whatsapp_button;
}

function lcr_email(){
	$email_button  = '<a href="mailto:'.get_option('email_settings_email').'" target="_blank">';
	$email_button .= '<div class="lcr-button lcr-email">'.get_option('email_settings_button_text').'</div><br/>';
	$email_button .= '</a>';

	return $email_button;
}

function lcr_custom_redirect(){
	$custom_redirect_button  = '<a href="'.get_option('custom_redirect_settings_url').'" target="_blank">';
	$custom_redirect_button .= '<div class="lcr-button lcr-custom">'.get_option('custom_redirect_settings_button_text').'</div><br/>';
	$custom_redirect_button .= '</a>';

	return $custom_redirect_button;
}

function lcr_custom_button_colors(){
	$lcr_button_custom_color = 'background: #303036;';

	if(get_option('lcr_widget_color') != 'background: #303036;'){
		$lcr_button_custom_color = 'background: '.get_option('lcr_widget_color').';';
	}

	return $lcr_button_custom_color;
}

function lcr_custom_button_text_color(){
	$lcr_button_text_custom_color = 'color: #ffffff;';

	if(get_option('lcr_widget_text_color') != 'color: #ffffff;'){
		$lcr_button_text_custom_color = 'color: '.get_option('lcr_widget_text_color').';';
	}

	return $lcr_button_text_custom_color;
}

function lcr_widget_position(){
	$lcr_widget_position = 'bottom: 0px; left: 7%;';

		if(get_option('desktop_widget_position') == 'desktop-bottom-left'){
			$lcr_widget_position = 'bottom: 0px; left: 7%;';
		}
		if(get_option('desktop_widget_position') == 'desktop-bottom-right'){
			$lcr_widget_position = 'bottom: 0px; right: 7%;';
		}

	return $lcr_widget_position;
}

add_action('wp_print_styles', 'lcr_widget_customization');
function lcr_widget_customization(){
	?>
		<style type="text/css">
			.lcr-widget-button-color{
				<?php 
				echo lcr_custom_button_colors(); 
				echo lcr_custom_button_text_color();				
				?>
			}
			.lcr-widget-position{
				<?php
				echo lcr_widget_position();
				?>
			}

		</style>
	<?php
}

add_action('admin_init', 'lcr_settings');
function lcr_settings(){
	//widget settings
	register_setting('lcr_settings', 'desktop_widget_position');
	register_setting('lcr_settings', 'desktop_widget_text');
	register_setting('lcr_settings', 'desktop_widget_body_text');
	register_setting('lcr_settings', 'mobile_widget_position');
	register_setting('lcr_settings', 'mobile_widget_text');
	register_setting('lcr_settings', 'lcr_widget_color');
	register_setting('lcr_settings', 'lcr_widget_text_color');

	//call settings
	register_setting('lcr_settings', 'call_settings_phone_number', 'lcr_sanitize_phone_number');
	register_setting('lcr_settings', 'call_settings_show_desktop');
	register_setting('lcr_settings', 'call_settings_show_mobile');
	register_setting('lcr_settings', 'call_settings_button_text', 'lcr_sanitize_text');

	//facebook messenger settings
	register_setting('lcr_settings', 'facebook_settings_profile_id', 'lcr_sanitize_text');
	register_setting('lcr_settings', 'facebook_settings_show_desktop');
	register_setting('lcr_settings', 'facebook_settings_show_mobile');
	register_setting('lcr_settings', 'facebook_settings_button_text', 'lcr_sanitize_text');

	//whatsapp settings
	register_setting('lcr_settings', 'whatsapp_settings_phone_number', 'lcr_sanitize_phone_number');
	register_setting('lcr_settings', 'whatsapp_settings_show_desktop');
	register_setting('lcr_settings', 'whatsapp_settings_show_mobile');
	register_setting('lcr_settings', 'whatsapp_settings_button_text', 'lcr_sanitize_text');

	//email settings
	register_setting('lcr_settings', 'email_settings_email', 'lcr_sanitize_email');
	register_setting('lcr_settings', 'email_settings_show_desktop');
	register_setting('lcr_settings', 'email_settings_show_mobile');
	register_setting('lcr_settings', 'email_settings_button_text', 'lcr_sanitize_text');

	//custom redirect settings
	register_setting('lcr_settings', 'custom_redirect_settings_url');
	register_setting('lcr_settings', 'custom_redirect_settings_show_desktop');
	register_setting('lcr_settings', 'custom_redirect_settings_show_mobile');
	register_setting('lcr_settings', 'custom_redirect_settings_button_text', 'lcr_sanitize_text');
}

function lcr_sanitize_phone_number($phone){
	$phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

	return $phone;
}

function lcr_sanitize_text($text){
	$text = sanitize_text_field($text);

	return $text;
}

function lcr_sanitize_email($email){
	$email = sanitize_email($email);

	return $email;
}

//color picker
add_action( 'admin_enqueue_scripts', 'lcr_color_picker' );
function lcr_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('/js/lcr-cp-script.js', __FILE__ ), array('wp-color-picker'), false, true );
}

//widget jquery
add_action( 'wp_enqueue_scripts', 'lcr_widget_jq' );
function lcr_widget_jq() {
    wp_register_script( 'lcr-widget-jq', plugins_url('/js/lcr-widget-jq.js', __FILE__), array(), false, true);
    wp_enqueue_script( 'lcr-widget-jq');
}

//register fontawesome
add_action('wp_enqueue_scripts', 'lcr_add_fontawesome');
function lcr_add_fontawesome(){
	wp_register_style('lcr-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style( 'lcr-fontawesome' );
}


//register style sheet
add_action( 'wp_enqueue_scripts', 'lcr_plugin_styles', 999 );
function lcr_plugin_styles(){
	wp_register_style('live_chat_revolution', plugins_url('/css/lcr-style.css', __FILE__ ));
	wp_enqueue_style('live_chat_revolution');
}

