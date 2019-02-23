<?php

/******************************************************************************/
/******************************************************************************/

$Theme=new Theme();
$GoogleFont=new ThemeGoogleFont();

$GoogleFont->scheduleDownload();

add_action('admin_init',array($Theme,'adminInit'));
add_action('admin_menu',array($Theme,'adminMenuInit'));
add_action('wp_ajax_autocomplete_google_font',array($GoogleFont,'getFontByName'));

add_action('wp_ajax_theme_admin_option_page_save',array($Theme,'adminOptionPanelSave'));
add_action('wp_ajax_theme_admin_option_page_import_google_font',array($GoogleFont,'import'));

/******************************************************************************/
/******************************************************************************/