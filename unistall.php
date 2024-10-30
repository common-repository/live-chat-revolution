<?php
if(!defined('WP_UNINSTALL_PLUGIN')){
	exit;
}

$options = array(
	'desktop_widget_text',
	'desktop_widget_body_text',
	'mobile_widget_position',
	'mobile_widget_text',
	'lcr_widget_color',
	'lcr_widget_text_color',
	'call_settings_phone_number',
	'call_settings_show_desktop',
	'call_settings_show_mobile',
	'call_settings_button_text',
	'facebook_settings_profile_id',
	'facebook_settings_show_desktop',
	'facebook_settings_show_mobile',
	'facebook_settings_button_text',
	'whatsapp_settings_phone_number',
	'whatsapp_settings_show_desktop',
	'whatsapp_settings_show_mobile',
	'whatsapp_settings_button_text',
	'email_settings_email',
	'email_settings_show_desktop',
	'email_settings_show_mobile',
	'email_settings_button_text',
	'custom_redirect_settings_url',
	'custom_redirect_settings_show_desktop',
	'custom_redirect_settings_show_mobile',
	'custom_redirect_settings_button_text',
	);

foreach($options as $option){
	if(get_option($option)){
		delete_option($option);
	}
}