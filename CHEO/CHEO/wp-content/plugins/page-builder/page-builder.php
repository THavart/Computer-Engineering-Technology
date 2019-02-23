<?php
/* 
Plugin Name: Page Builder
Plugin URI: http://quanticalabs.com
Description: Visual page builder for QuanticaLabs themes
Author: QuanticaLabs
Version: 3.4
Author URI: http://quanticalabs.com
*/

require_once(plugin_dir_path(__FILE__).'include.php');

load_plugin_textdomain(PLUGIN_PAGE_BUILDER_DOMAIN,false,dirname(plugin_basename(__FILE__)).'/languages/');

/******************************************************************************/

$PageBuilder=new PBPageBuilder();

$PageBuilder->initComponent();

register_activation_hook(__FILE__,array($PageBuilder,'pluginActivation'));

add_filter('attachment_fields_to_edit',array($PageBuilder,'mediaLibraryAdd'),10,2);
add_filter('attachment_fields_to_save',array($PageBuilder,'mediaLibrarySave'),10,2);
add_filter('body_class',array($PageBuilder,'bodyClassAdd'));

$Session=new PBSession();
$FontAwesome=new PBFontAwesome();

add_shortcode(PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'builder',array($PageBuilder,'processPageBuilder'));	

if(is_admin())
{
	add_action('admin_init',array($PageBuilder,'adminInit'));
	add_action('admin_menu',array($PageBuilder,'adminMenuInit'));
	add_action('add_meta_boxes',array($PageBuilder,'adminInitMetaBox'));

	add_action('media_buttons_context',array($PageBuilder,'adminCreateSwitchButton'));
	
	add_action('wp_ajax_page_builder_line_add',array($PageBuilder,'lineAddAjax'));
	add_action('wp_ajax_page_builder_line_clone',array($PageBuilder,'lineCloneAjax'));
	add_action('wp_ajax_page_builder_line_remove',array($PageBuilder,'lineRemoveAjax'));
	add_action('wp_ajax_page_builder_line_reorder',array($PageBuilder,'lineReorderAjax'));
	
	add_action('wp_ajax_page_builder_line_edit',array($PageBuilder,'lineEditAjax'));
	add_action('wp_ajax_page_builder_line_save',array($PageBuilder,'lineSaveAjax'));

	add_action('wp_ajax_page_builder_component_add',array($PageBuilder,'componentAddAjax'));
	add_action('wp_ajax_page_builder_component_clone',array($PageBuilder,'componentCloneAjax'));
	add_action('wp_ajax_page_builder_component_move',array($PageBuilder,'componentMoveAjax'));

	add_action('wp_ajax_page_builder_component_remove',array($PageBuilder,'componentRemoveAjax'));
	add_action('wp_ajax_page_builder_component_all_in_column_remove',array($PageBuilder,'componentAllInColumnRemoveAjax'));

	add_action('wp_ajax_page_builder_component_edit',array($PageBuilder,'componentEditAjax'));
	add_action('wp_ajax_page_builder_component_save',array($PageBuilder,'componentSaveAjax'));

	add_action('wp_ajax_page_builder_component_shortcode_edit',array($PageBuilder,'componentShortcodeEditAjax'));
	add_action('wp_ajax_page_builder_component_shortcode_build',array($PageBuilder,'componentShortcodeBuildAjax'));
	
	add_action('wp_ajax_page_builder_switch',array($PageBuilder,'pageBuilderSwitch'));
	
	add_action('wp_ajax_page_builder_option_save',array($PageBuilder,'adminPluginOptionSave'));
	
	add_action('wp_ajax_page_builder_get_fa',array($FontAwesome,'getFontByString'));
	
	add_action('admin_notices',array($PageBuilder,'adminNotice'));
}
else 	 
{	
	add_action('init',array($Session,'create'));
	add_action('wp_enqueue_scripts',array($PageBuilder,'publicInit'));
}