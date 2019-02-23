<?php
/* 
Plugin Name: Theme Demo Data Installer
Plugin URI: http://quanticalabs.com
Description: Theme Demo Data Installer helps install dummy content (posts, pages, images etc.), widget settings and setup theme options in QuanticaLabs themes.
Author: QuanticaLabs
Version: 3.5
Author URI: http://quanticalabs.com
*/

require_once(plugin_dir_path(__FILE__).'include.php');

load_plugin_textdomain(PLUGIN_THEME_INSTALLER_DOMAIN,false,dirname(plugin_basename(__FILE__)).'/languages/');

/******************************************************************************/

$ThemeInstaller=new TIThemeInstaller();

register_activation_hook(__FILE__,array($ThemeInstaller,'pluginActivation'));

if(is_admin())
{
	add_action('admin_init',array($ThemeInstaller,'adminInit'));
	add_action('admin_menu',array($ThemeInstaller,'adminMenuInit'));
	
	add_action('wp_ajax_'.PLUGIN_THEME_INSTALLER_CONTEXT.'_install',array($ThemeInstaller,'installSampleData'));
}

/******************************************************************************/
/******************************************************************************/