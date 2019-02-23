<?php
/* 
Plugin Name: Theme Styles
Plugin URI: http://quanticalabs.com
Description: CSS theme styles for QuanticaLabs themes.
Author: QuanticaLabs
Version: 3.5
Author URI: http://quanticalabs.com
*/

require_once(plugin_dir_path(__FILE__).'include.php');

load_plugin_textdomain(PLUGIN_THEME_STYLE_DOMAIN,false,dirname(plugin_basename(__FILE__)).'/languages/');

/******************************************************************************/

$ThemeStyle=new TSThemeStyle();

$ThemeStyle->prepareLibrary();

register_activation_hook(__FILE__,array($ThemeStyle,'pluginActivation'));

if(is_admin())
{
	add_action('admin_init',array($ThemeStyle,'adminInit'));
	add_action('admin_menu',array($ThemeStyle,'adminMenuInit'));
	
	add_action('wp_ajax_'.PLUGIN_THEME_STYLE_CONTEXT.'_save',array($ThemeStyle,'adminSavePanel'));
	add_action('wp_ajax_'.PLUGIN_THEME_STYLE_CONTEXT.'_restore',array($ThemeStyle,'adminRestorePanel'));
	
	add_action('admin_notices',array($ThemeStyle,'adminNotice'));
}
else 	 
{	
	add_action('wp_enqueue_scripts',array($ThemeStyle,'publicInit'));
}