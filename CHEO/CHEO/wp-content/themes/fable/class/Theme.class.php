<?php

/******************************************************************************/
/******************************************************************************/

class Theme
{
	/**************************************************************************/
	
	var $themeDefaultOption=array
	(
		'widget_area_sidebar'													=>	'',
		'widget_area_sidebar_location'											=>	'',
		'widget_area_footer'													=>	'',
		'menu_top'																=>	'',
		'header_enable'															=>	'1',
		'header_background_image_src'											=>	'',
		'header_background_image_repeat'										=>	'repeat',
		'header_background_image_position'										=>	'0px 0px',
		'header_background_image_size_1'										=>	'auto',
		'header_background_image_size_2'										=>	'',
		'blog_category_post_id'													=>	'0',
		'blog_archive_post_id'													=>	'0',
		'blog_search_post_id'													=>	'0',
		'blog_author_post_id'													=>	'0',
		'blog_sort_field'														=>	'post_date',
		'blog_sort_direction'													=>	'desc',		
		'blog_automatic_excerpt_length'											=>	'20',
		'post_category_visible'													=>	'1',
		'post_author_visible'													=>	'1',
		'post_tag_visible'														=>	'1',
		'post_comment_count_visible'											=>	'1',
		'post_navigation_visible'												=>	'1',
		'page_404_page_id'														=>	'0',
		'menu_logo_src'															=>	'',
		'menu_responsive_mode'													=>	'768',
		'menu_sticky_enable'													=>	'1',
		'menu_hide_scroll_enable'												=>	'0',
		'menu_animation_enable'													=>	'1',
		'menu_animation_speed_open'												=>	'400',
		'menu_animation_speed_close'											=>	'200',
		'menu_animation_delay'													=>	'0',
		'menu_scroll_animation_enable'											=>	'1',
		'menu_scroll_animation_speed'											=>	'1000',
		'menu_scroll_animation_easing'											=>	'easeOutQuint',
		'footer_enable'															=>	'1',
		'footer_sticky_enable'													=>	'1',
		'footer_top_enable'														=>	'1',
		'footer_bottom_enable'													=>	'1',
		'footer_bottom_content'													=>	'',
		'footer_top_background_image_src'										=>	'',
		'footer_top_background_image_repeat'									=>	'repeat',
		'footer_top_background_image_position'									=>	'0px 0px',
		'footer_top_background_image_size_1'									=>	'auto',
		'footer_top_background_image_size_2'									=>	'',
		'favicon_url'															=>	'',
		'comment_automatic_excerpt_length'										=>	'25',
		'custom_js_code'														=>	'',
		'right_click_enable'													=>	'1',
		'copy_selection_enable'													=>	'1',
		'go_to_page_top_enable'													=>	'1',
		'go_to_page_top_hash'													=>	'up',
		'go_to_page_top_animation_enable'										=>	'1',
		'go_to_page_top_animation_duration'										=>	'500',
		'go_to_page_top_animation_easing'										=>	'easeInCubic',
		'responsive_mode_enable'												=>	'1',
		'font_base_family_google'												=>	'Open Sans',
		'font_base_family_system'												=>	'',
		'font_base_size_1'														=>	'16',
		'font_base_size_2'														=>	'16',
		'font_base_size_3'														=>	'14',
		'font_base_size_4'														=>	'14',
		'font_base_size_5'														=>	'14',
		'font_base_style'														=>	'normal',
		'font_base_weight'														=>	'normal',
		'font_base_line_height'													=>	'1.5em',
		'font_h1_family_google'													=>	'Lato',
		'font_h1_family_system'													=>	'',
		'font_h1_size_1'														=>	'55',
		'font_h1_size_2'														=>	'55',
		'font_h1_size_3'														=>	'55',
		'font_h1_size_4'														=>	'55',
		'font_h1_size_5'														=>	'48',
		'font_h1_style'															=>	'normal',
		'font_h1_weight'														=>	'300',	
		'font_h1_line_height'													=>	'1em',
		'font_h2_family_google'													=>	'Lato',
		'font_h2_family_system'													=>	'',
		'font_h2_size_1'														=>	'50',
		'font_h2_size_2'														=>	'50',
		'font_h2_size_3'														=>	'50',
		'font_h2_size_4'														=>	'48',
		'font_h2_size_5'														=>	'40',
		'font_h2_style'															=>	'normal',
		'font_h2_weight'														=>	'300',	
		'font_h2_line_height'													=>	'1em',
		'font_h3_family_google'													=>	'Lato',
		'font_h3_family_system'													=>	'',
		'font_h3_size_1'														=>	'38',
		'font_h3_size_2'														=>	'38',
		'font_h3_size_3'														=>	'38',
		'font_h3_size_4'														=>	'28',
		'font_h3_size_5'														=>	'28',
		'font_h3_style'															=>	'normal',
		'font_h3_weight'														=>	'300',
		'font_h3_line_height'													=>	'1.2em',
		'font_h4_family_google'													=>	'Lato',
		'font_h4_family_system'													=>	'',
		'font_h4_size_1'														=>	'30',
		'font_h4_size_2'														=>	'30',
		'font_h4_size_3'														=>	'30',
		'font_h4_size_4'														=>	'24',
		'font_h4_size_5'														=>	'24',
		'font_h4_style'															=>	'normal',
		'font_h4_weight'														=>	'400',		
		'font_h4_line_height'													=>	'1.2em',
		'font_h5_family_google'													=>	'Lato',
		'font_h5_family_system'													=>	'',
		'font_h5_size_1'														=>	'24',
		'font_h5_size_2'														=>	'24',
		'font_h5_size_3'														=>	'24',
		'font_h5_size_4'														=>	'20',
		'font_h5_size_5'														=>	'20',
		'font_h5_style'															=>	'normal',
		'font_h5_weight'														=>	'400',	
		'font_h5_line_height'													=>	'1.2em',
		'font_h6_family_google'													=>	'Lato',
		'font_h6_family_system'													=>	'',
		'font_h6_size_1'														=>	'18',
		'font_h6_size_2'														=>	'18',
		'font_h6_size_3'														=>	'18',
		'font_h6_size_4'														=>	'16',
		'font_h6_size_5'														=>	'16',
		'font_h6_style'															=>	'normal',
		'font_h6_weight'														=>	'400',
		'font_h6_line_height'													=>	'1.4em',
		'fancybox_image_padding'												=>	'10',
		'fancybox_image_margin'													=>	'20',
		'fancybox_image_min_width'												=>	'100',
		'fancybox_image_min_height'												=>	'100',
		'fancybox_image_max_width'												=>	'9999',
		'fancybox_image_max_height'												=>	'9999',
		'fancybox_image_helper_button_enable'									=>	'1',
		'fancybox_image_autoresize'												=>	'1',
		'fancybox_image_autocenter'												=>	'1',
		'fancybox_image_fittoview'												=>	'1',
		'fancybox_image_arrow'													=>	'1',
		'fancybox_image_close_button'											=>	'1',
		'fancybox_image_close_click'											=>	'0',
		'fancybox_image_next_click'												=>	'0',
		'fancybox_image_mouse_wheel'											=>	'1',
		'fancybox_image_autoplay'												=>	'0',
		'fancybox_image_loop'													=>	'1',
		'fancybox_image_playspeed'												=>	'3000',
		'fancybox_image_animation_effect_open'									=>	'fade',
		'fancybox_image_animation_effect_close'									=>	'fade',
		'fancybox_image_animation_effect_next'									=>	'elastic',
		'fancybox_image_animation_effect_previous'								=>	'elastic',
		'fancybox_image_easing_open'											=>	'swing',
		'fancybox_image_easing_close'											=>	'swing',
		'fancybox_image_easing_next'											=>	'swing',
		'fancybox_image_easing_previous'										=>	'swing',
		'fancybox_image_speed_open'												=>	'250',
		'fancybox_image_speed_close'											=>	'250',
		'fancybox_image_speed_next'												=>	'250',
		'fancybox_image_speed_previous'											=>	'250',
		'fancybox_video_padding'												=>	'10',
		'fancybox_video_margin'													=>	'20',
		'fancybox_video_min_width'												=>	'100',
		'fancybox_video_min_height'												=>	'100',
		'fancybox_video_max_width'												=>	'9999',
		'fancybox_video_max_height'												=>	'9999',
		'fancybox_video_autoresize'												=>	'1',
		'fancybox_video_autocenter'												=>	'1',
		'fancybox_video_fittoview'												=>	'1',
		'fancybox_video_close_button'											=>	'1',
		'maintenance_mode_enable'												=>	'0',
		'maintenance_mode_post_id'												=>	'0',
		'maintenance_mode_user_id'												=>	'0',
		'maintenance_mode_ip_address'											=>	'',
		'widget_area_sidebar_woocommerce'										=>	'',
		'widget_area_sidebar_location_woocommerce'								=>	'2',
		'widget_area_footer_woocommerce'										=>	'',
		'menu_top_woocommerce'													=>	'',
		'install'																=>	'1'
	);	

	/**************************************************************************/
	/**************************************************************************/
	
	function __construct()
	{
		$this->responsiveMode=array(1050,960,768,480);
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	THEME_URL_SCRIPT,
				'file'															=>	'',
				'in_footer'														=>	true,				
				'dependencies'													=>	array('jquery')
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	THEME_URL_STYLE,
				'file'															=>	'',
				'dependencies'													=>	array()
			)			
		);
		
		$this->library=array
		(
			'script'															=>	array
			(
				'jquery'														=>	array
				(
					'use'														=>	3,
					'path'														=>	'',
					'in_footer'													=>	false,
					'dependencies'												=>	array()
				),
				'jquery-ui-core'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-button'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-slider'												=>	array
				(
					'path'														=>	''
				),
				'jquery-ui-autocomplete'										=>	array
				(
					'path'														=>	''
				),
				'jquery-bbq'													=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.bbq.min.js'
				),
				'jquery-easing'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.easing.js'
				),	
				'jquery-mousewheel'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.mousewheel.js'
				),	
				'jquery-touchswipe'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.touchSwipe.min.js'
				),
				'jquery-scrollTo'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.scrollTo.min.js'
				),	
				'jquery-blockUI'												=>	array
				(
					'file'														=>	'jquery.blockUI.js'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.js'
				),
				'jquery-dropkick'												=>	array
				(
					'file'														=>	'jquery.dropkick.min.js'
				),
				'jquery-dropkick-rtl'											=>	array
				(
					'use'														=>	1,
					'inc'														=>	false,
					'file'														=>	'jquery.dropkick.rtl.css',
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.js'
				),
				'jquery-infieldlabel'											=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.infieldlabel.min.js'
				),
				'jquery-actual'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.actual.min.js'
				),
				'jquery-responsiveTable'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.responsiveTable.js'
				), 
				'jquery-responsiveElement'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.responsiveElement.js'
				),
				'jquery-windowDimensionListener'								=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.windowDimensionListener.js'
				),				
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.js'
				),
				'jquery-themeOptionElement'										=>	array
				(
					'file'														=>	'jquery.themeOptionElement.js'
				),
				'jquery-waypoint'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.waypoints.min.js'
				),				
				'jquery-waypoint-sticky'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.waypoints-sticky.min.js'
				),									
				'pb-component-superfish'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'superfish.js'
				),				
				'pb-component-responsive-nav'									=>	array
				(
					'use'														=>	2,
					'file'														=>	'responsive-nav.min.js'
				),		
				'pb-component-menu'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.menu.js'
				),						
				'jquery-comment'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.comment.js'
				),
				'jquery-carouFredSel'											=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.carouFredSel.packed.js'
				),
				'linkify'														=>	array
				(
					'use'														=>	2,
					'file'														=>	'linkify.js'
				),								
				'public'														=>	array
				(
					'use'														=>	2,
					'file'														=>	'public.js'
				)	
			),
			'style'																=>	array
			(
				'jquery-ui'														=>	array
				(
					'file'														=>	'jquery.ui.min.css'
				),
				'google-font-open-sans'											=>	array
				(
					'path'														=>	'',
					'file'														=>	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
				),
				'jquery-dropkick'												=>	array
				(
					'file'														=>	'jquery.dropkick.css'
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.css'
				),	
				'jquery-qtip'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.qtip.min.css'
				),
				'pb-component-menu'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'menu.css'
				),	
				'pb-component-menu-rtl'											=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'menu.rtl.css',
				),
				'pb-component-responsive-nav'									=>	array
				(
					'use'														=>	2,
					'file'														=>	'responsive-nav.css'
				),					
				'admin'															=>	array
				(
					'file'														=>	'admin.css'
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.css'
				),
				'jquery-themeOption-rtl'										=>	array
				(
					'use'														=>	1,
					'inc'														=>	false,
					'file'														=>	'jquery.themeOption.rtl.css',
				),
				'jquery-themeOption-overwrite'									=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css'
				),	
				'widget'														=>	array
				(
					'use'														=>	2,
					'file'														=>	'widget.css',
					'dependencies'												=>	array('style')
				),
				'widget-rtl'													=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'widget.rtl.css',
					'dependencies'												=>	array('style')
				),
				'theme-woocommerce'												=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'woocommerce.css',
					'dependencies'												=>	array()
				),
				'theme-woocommerce-core-rtl'									=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'woocommerce.core.rtl.css',
					'dependencies'												=>	array()
				),
				'theme-woocommerce-rtl'												=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'woocommerce.rtl.css',
					'dependencies'												=>	array()
				),
				'theme-timetable'												=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'timetable.css',
					'dependencies'												=>	array()
				),	
				'responsive'													=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'responsive.css',
					'dependencies'												=>	array('style')
				),
				'responsive-rtl'												=>	array
				(				
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'responsive.rtl.css',
					'dependencies'												=>	array('style')
				),
				'responsive-disable'											=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'responsive-disable.css',
					'dependencies'												=>	array('style')
				),
				'ts-frontend'													=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'TS.Frontend.css'
				),	
				'pb-frontend'													=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'PB.Frontend.css'
				),
				'pb-frontend-main'												=>	array
				(
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'PB.Frontend.main.css'
				),	
				'pb-frontend-main-rtl'												=>	array
				(				
					'use'														=>	2,
					'inc'														=>	false,
					'file'														=>	'PB.Frontend.main.rtl.css'
				),
				'style'															=>	array
				(
					'use'														=>	2,
					'path'														=>	null,
					'file'														=>	get_stylesheet_uri()
				),
				'style-custom'													=>	array
				(
					'use'														=>	2,
					'path'														=>	THEME_URL_MULTISITE_SITE_STYLE,
					'file'														=>	'style.css',
					'dependencies'												=>	array('style')
				),
				'retina'														=>	array
				(
					'use'														=>	2,
					'file'														=>	'retina.css',
					'dependencies'												=>	array('style')
				)
			)
		);
		
		foreach($this->library as $libraryType=>$libraryTypeData)
		{
			$library=array_keys($libraryTypeData);
			
			foreach($library as $libraryName)
				$this->library[$libraryType][$libraryName]=array_merge($this->libraryDefault[$libraryType],$this->library[$libraryType][$libraryName]);
		}
	}
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
		foreach($this->library[$type] as $index=>$data)
		{
			if(!$data['inc']) continue;
			
			if($data['use']!=3)
			{
				if($data['use']!=$use) continue;
			}
			
			if($type=='script')
			{
				wp_enqueue_script($index,$data['path'].$data['file'],$data['dependencies'],false,$data['in_footer']);
			}
			else 
			{
				wp_enqueue_style($index,$data['path'].$data['file'],$data['dependencies'],false);
			}
		}
	}
	
	/**************************************************************************/
	
	function includeLibrary($test,$script=array(),$style=array())
	{
		if($test!=1) return;

		foreach((array)$script as $value)
		{
			if(array_key_exists($value,$this->library['script']))
				$this->library['script'][$value]['inc']=true;
		}
		foreach((array)$style as $value)
		{
			if(array_key_exists($value,$this->library['style']))
				$this->library['style'][$value]['inc']=true;	
		}
	}
	
	/**************************************************************************/

	function adminInit()
	{
		$this->prepareLibrary();
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
		
		if(function_exists('set_revslider_as_theme'))
			set_revslider_as_theme();
	}
	
	/**************************************************************************/
	
	function adminPrintScript()
	{

	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_action('admin_print_scripts',array($this,'adminPrintScript'));
		add_theme_page(__('Theme Options',THEME_DOMAIN),__('Theme Options',THEME_DOMAIN),'edit_theme_options','ThemeOptions',array($this,'adminOptionPanelCreate'));
	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{
		$postType=get_post_types(array('public'=>true));
		foreach($postType as $data) 
		{
			if($data==='attachment') continue;
			
			add_meta_box('meta_box_general',__('General options',THEME_DOMAIN),array($this,'adminCreateMetaBoxGeneral'),$data,'normal','low');
			add_meta_box('meta_box_header',__('Header options',THEME_DOMAIN),array($this,'adminCreateMetaBoxHeader'),$data,'normal','low');			
        }	
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxGeneral()
	{
		global $post;
		
		$Menu=new ThemeMenu();
		$WidgetArea=new ThemeWidgetArea();
		
		$data=array();
	
		$data['option']=ThemeOption::getPostMeta($post);
		$data['nonce']=wp_nonce_field('adminSaveMetaBox',THEME_CONTEXT.'_meta_box_noncename',false,false);
		
		$data['dictionary']['widgetArea']=$WidgetArea->getWidgetAreaDictionary();
		$data['dictionary']['widgetAreaLocation']=$WidgetArea->getWidgetAreaLocationDictionary(false);
		
		$data['dictionary']['menu']=$Menu->getMenuDictionary(true,true,false);
		
		$data['dictionary']['postCategory']=ThemeHelper::createTermDictionary('category',array(),array(),array(),'id');
		
		$this->setPostMetaDefault($data['option'],'general');
		
		$Template=new ThemeTemplate($data,THEME_PATH_TEMPLATE.'admin/meta_box_general.php');
		echo $Template->output();					
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxHeader()
	{
		global $post;
		
		$Background=new ThemeBackground();
		
		$data=array();
	
		$data['option']=ThemeOption::getPostMeta($post);
		$data['dictionary']['backgroundSize']=$Background->backgroundSize;
		$data['dictionary']['backgroundRepeat']=$Background->backgroundRepeat;
		
		$this->setPostMetaDefault($data['option'],'header');
		
		$Template=new ThemeTemplate($data,THEME_PATH_TEMPLATE.'admin/meta_box_header.php');
		echo $Template->output();			
	}
	
	/**************************************************************************/
	
	function adminSaveMetaBox($postId)
	{
		if($_POST)
		{
			if(ThemeHelper::checkSavePost($postId,THEME_CONTEXT.'_meta_box_noncename','adminSaveMetaBox')===false) return(false);
			
			$option=ThemeHelper::getPostOption();
			update_post_meta($postId,THEME_OPTION_PREFIX,$option);
		}		
	}

	/**************************************************************************/
	
	function adminOptionPanelCreate()
	{
		$data=array();
		
		$CSS=new ThemeCSS();
		$Menu=new ThemeMenu();
		$Blog=new ThemeBlog();
		$Easing=new ThemeEasing();
		$Fancybox=new ThemeFancybox();
		$GoogleFont=new ThemeGoogleFont();
		$WidgetArea=new ThemeWidgetArea();
		$Background=new ThemeBackground();
		
		$ResponsiveMode=new ThemeResponsiveMode($this->responsiveMode);
		
		$data['option']=ThemeOption::getOptionObject();
				
		$data['dictionary']['easingType']=$Easing->easingType;
		$data['dictionary']['fancyboxTransitionType']=$Fancybox->transitionType;
		
		$data['dictionary']['googleFont']=$GoogleFont->unpack();
		
		$data['dictionary']['fontStyle']=$CSS->fontStyle;
		$data['dictionary']['fontWeight']=$CSS->fontWeight;
		
		$data['dictionary']['page']=get_pages(array('hierarchical'=>0));
		
		$data['dictionary']['sortDirection']=$Blog->sortDirection;
		$data['dictionary']['sortPostBlogField']=$Blog->sortPostBlogField;

		$data['dictionary']['widgetArea-1']=$WidgetArea->getWidgetAreaDictionary(true,false,false);
		$data['dictionary']['widgetAreaLocation-1']=$WidgetArea->getWidgetAreaLocationDictionary(true,false,false);
		
		$data['dictionary']['widgetArea-2']=$WidgetArea->getWidgetAreaDictionary(true,true,true);
		$data['dictionary']['widgetAreaLocation-2']=$WidgetArea->getWidgetAreaLocationDictionary(true,true,true);
		
		$data['dictionary']['menu-1']=$Menu->getMenuDictionary(true,false,false);
		$data['dictionary']['menu-2']=$Menu->getMenuDictionary(true,true,true);
		
		$data['dictionary']['backgroundSize']=$Background->backgroundSize;
		$data['dictionary']['backgroundRepeat']=$Background->backgroundRepeat;
		
		$data['dictionary']['responsive']=$ResponsiveMode->getDictionary();
		$data['dictionary']['responsiveMedia']=$ResponsiveMode->getMedia();
		
		$data['dictionary']['user']=get_users();
		
		$Template=new ThemeTemplate($data,THEME_PATH_TEMPLATE.'admin/admin.php');
		echo $Template->output();			
	}
	
	/**************************************************************************/

	function setupTheme()
	{	
		global $content_width;
		if(!isset($content_width)) $content_width=1050;
		
		/***/
		
		$Menu=new ThemeMenu();
		$Post=new ThemePost();
		$Page=new ThemePage();
		$Image=new ThemeImage();
		$Comment=new ThemeComment();
		$WidgetArea=new ThemeWidgetArea();
		$MaintenanceMode=new ThemeMaintenanceMode();
		
		$WidgetPostRecent=new ThemeWidgetPostRecent();
		$WidgetPostMostComment=new ThemeWidgetPostMostComment();
		
		/***/
		
		$Image->register();
		$WidgetArea->register();
		
		/***/
		
		add_theme_support('menus');
		add_theme_support('post-thumbnails'); 
		add_theme_support('automatic-feed-links');
		
		add_theme_support('woocommerce');
		
		/***/
		
		if(function_exists('register_nav_menu')) register_nav_menu('menu_top','Menu Top');
		
		/***/
		
		add_filter('widget_text','do_shortcode');
		add_filter('wp_title',array($Page,'displayTitle'));	
		add_filter('image_size_names_choose',array($Image,'addImageSupport'));
		
		add_filter('excerpt_more',array($this,'filterExcerptMore'));
		add_filter('excerpt_length',array($this,'automaticExcerptLength'),999);

		$WooCommerce=new ThemeWooCommerce();
		
		$WooCommerce->addFilter();
		$WooCommerce->addAction();
		
		/***/
		
		add_editor_style('editor-style.css');
		
		/***/
		
		if(!class_exists('PBComponentMenu'))
		{	
			add_filter('wp_setup_nav_menu_item',array($Menu,'setupNavigationMenuItemField'));
			add_action('wp_update_nav_menu_item',array($Menu,'updateNavigationMenuItemField'),10,3);
			add_filter('wp_edit_nav_menu_walker',array($Menu,'editNavigationMenuWalker'),10,2);
		}
		
		/***/

		add_action('save_post',array($this,'adminSaveMetaBox'));
		add_action('add_meta_boxes',array($Page,'adminInitMetaBox'));
		add_action('add_meta_boxes',array($Post,'adminInitMetaBox'));
		add_action('add_meta_boxes',array($this,'adminInitMetaBox'));

		add_action('init',array($WidgetArea,'init')); 
		add_action('save_post',array($WidgetArea,'adminSaveMetaBox'));
		add_action('add_meta_boxes',array($WidgetArea,'adminInitMetaBox'));
		add_filter('manage_edit-'.THEME_CONTEXT.'_widget_area_columns',array($WidgetArea,'adminManageEditColumn')); 
		add_action('manage_'.THEME_CONTEXT.'_widget_area_posts_custom_column',array($WidgetArea,'adminManageColumn'));
		add_filter('manage_edit-'.THEME_CONTEXT.'_widget_area_sortable_columns',array($WidgetArea,'adminManageEditSortableColumn'));

		add_action('wp_ajax_comment_add',array($Comment,'addComment'));
		add_action('wp_ajax_nopriv_comment_add',array($Comment,'addComment'));
		add_action('wp_ajax_comment_get',array($Comment,'getComment'));
		add_action('wp_ajax_nopriv_comment_get',array($Comment,'getComment'));

		add_action('tgmpa_register',array($this,'addPlugin'));
		
		add_action('admin_notices',array($this,'adminNotice'));
		
		add_action('init',array($MaintenanceMode,'init'));
		
		/***/
		
		$WidgetPostRecent->register();
		$WidgetPostMostComment->register();

		/***/
		
		$install=(int)Themeoption::getOption('install');
		if($install==1) return;
		
		$data=array();
		$option=$this->themeDefaultOption;
		
		$Template=new ThemeTemplate($data,THEME_PATH_TEMPLATE.'footer_bottom_content.php');
		$option['footer_bottom_content']=$Template->output();	
		
		$ResponsiveMode=new ThemeResponsiveMode($this->responsiveMode);
		
		$media=$ResponsiveMode->getMedia();
		foreach($media as $index=>$value)
			$option['custom_css_responsive_'.$index]='';
		
		$optionCurrent=ThemeOption::getOptionObject();
		
		$optionSave=array();
		foreach($option as $index=>$value)
		{
			if(!array_key_exists($index,$optionCurrent))
				$optionSave[$index]=$value;
		}
		
		$optionSave=array_merge($optionSave,$optionCurrent);
		foreach($optionSave as $index=>$value)
		{
			if(!array_key_exists($index,$option))
				unset($optionSave[$index]);
		}

		$optionSave['install']=1;

		ThemeOption::resetOption();
		ThemeOption::updateOption($optionSave);
		
		$GoogleFont=new ThemeGoogleFont();
		$GoogleFont->download();
	
		$this->createCSSFile();
		
		/***/
		
		$argument=array
		(
			'post_type'							=>	array('post','page'),
			'post_status'						=>	'any',
			'posts_per_page'					=>	-1
		);
		
		$query=new WP_Query($argument);		
		if($query===false) return;
		
		foreach($query->posts as $value)
		{
			$meta=ThemeOption::getPostMeta($value);
			if(is_array($meta)) continue;
			
			update_post_meta($value->ID,THEME_OPTION_PREFIX,$meta);
		}
	}
	
	/**************************************************************************/
	
	function switchTheme()
	{
		ThemeOption::updateOption(array('install'=>0));
	}
	
	/**************************************************************************/
	
	function adminOptionPanelSave()
	{
		$option=ThemeHelper::getPostOption();
		
		ThemeHelper::removeUIndex($option,'maintenance_mode_user_id');

		$response=array('global'=>array('error'=>1));
		
		$CSS=new ThemeCSS();
		$Blog=new ThemeBlog();
		$Notice=new ThemeNotice();
		$Easing=new ThemeEasing();
		$FancyBox=new ThemeFancybox();
		$Background=new ThemeBackground();
		$Validation=new ThemeValidation($Notice);
		$ResponsiveMode=new ThemeResponsiveMode($this->responsiveMode);
		
		$media=$ResponsiveMode->getMedia();
		$invalidValue=esc_html__('Invalid value',THEME_DOMAIN);
		
		/* Main */
		$Validation->notice('isNumber',array($option['header_enable'],0,1),array(ThemeHelper::getFormName('header_enable',false),$invalidValue));
		if(!array_key_exists($option['header_background_image_repeat'],$Background->backgroundRepeat))
			$Notice->addError(ThemeHelper::getFormName('header_background_image_repeat',false),$invalidValue);	
		if(!array_key_exists($option['header_background_image_size_1'],$Background->backgroundSize))
			$Notice->addError(ThemeHelper::getFormName('header_background_image_size_1',false),$invalidValue);			
		
		/* Blog */
		if(!in_array($option['blog_sort_field'],array_keys($Blog->sortPostBlogField)))
			$Notice->addError(ThemeHelper::getFormName('blog_sort_field',false),$invalidValue);		
		if(!in_array($option['blog_sort_direction'],array_keys($Blog->sortDirection)))
			$Notice->addError(ThemeHelper::getFormName('blog_sort_direction',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['blog_automatic_excerpt_length'],0,999),array(ThemeHelper::getFormName('blog_automatic_excerpt_length',false),$invalidValue));
		
		/* Post */
		$Validation->notice('isNumber',array($option['post_category_visible'],0,1),array(ThemeHelper::getFormName('post_category_visible',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_author_visible'],0,1),array(ThemeHelper::getFormName('post_author_visible',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_tag_visible'],0,1),array(ThemeHelper::getFormName('post_tag_visible',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_comment_count_visible'],0,1),array(ThemeHelper::getFormName('post_comment_count_visible',false),$invalidValue));
		$Validation->notice('isNumber',array($option['post_navigation_visible'],0,1),array(ThemeHelper::getFormName('post_navigation_visible',false),$invalidValue));

		/* Plugins / Menu top */
		if(!in_array($option['menu_responsive_mode'],$this->responsiveMode))
			$Notice->addError(ThemeHelper::getFormName('menu_responsive_mode',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['menu_sticky_enable'],0,1),array(ThemeHelper::getFormName('menu_sticky_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_hide_scroll_enable'],0,1),array(ThemeHelper::getFormName('menu_hide_scroll_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_enable'],0,1),array(ThemeHelper::getFormName('menu_animation_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_speed_open'],0,99999),array(ThemeHelper::getFormName('menu_animation_speed_open',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_speed_close'],0,99999),array(ThemeHelper::getFormName('menu_animation_speed_close',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_animation_delay'],0,99999),array(ThemeHelper::getFormName('menu_animation_delay',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_scroll_animation_enable'],0,1),array(ThemeHelper::getFormName('menu_scroll_animation_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['menu_scroll_animation_speed'],0,99999),array(ThemeHelper::getFormName('menu_scroll_animation_speed',false),$invalidValue));
		if(!in_array($option['menu_scroll_animation_easing'],array_keys($Easing->easingType)))
			$Notice->addError(ThemeHelper::getFormName('menu_scroll_animation_easing',false),$invalidValue);			

		/* Footer */
		$Validation->notice('isNumber',array($option['footer_enable'],0,1),array(ThemeHelper::getFormName('footer_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['footer_sticky_enable'],0,1),array(ThemeHelper::getFormName('footer_sticky_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['footer_top_enable'],0,1),array(ThemeHelper::getFormName('footer_top_enable',false),$invalidValue));
		if(!array_key_exists($option['footer_top_background_image_repeat'],$Background->backgroundRepeat))
			$Notice->addError(ThemeHelper::getFormName('footer_top_background_image_repeat',false),$invalidValue);	
		if(!array_key_exists($option['footer_top_background_image_size_1'],$Background->backgroundSize))
			$Notice->addError(ThemeHelper::getFormName('footer_top_background_image_size_1',false),$invalidValue);			
		$Validation->notice('isNumber',array($option['footer_bottom_enable'],0,1),array(ThemeHelper::getFormName('footer_bottom_enable',false),$invalidValue));

		/* Comment */
		$Validation->notice('isNumber',array($option['comment_automatic_excerpt_length'],0,999),array(ThemeHelper::getFormName('comment_automatic_excerpt_length',false),$invalidValue));
		
		/* Content copying */
		$Validation->notice('isNumber',array($option['right_click_enable'],0,1),array(ThemeHelper::getFormName('right_click_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['copy_selection_enable'],0,1),array(ThemeHelper::getFormName('copy_selection_enable',false),$invalidValue));
		
		/* Responsive mode */
		$Validation->notice('isNumber',array($option['responsive_mode_enable'],0,1),array(ThemeHelper::getFormName('responsive_mode_enable',false),$invalidValue));
		
		/* Go to page to */
		$Validation->notice('isNumber',array($option['go_to_page_top_enable'],0,1),array(ThemeHelper::getFormName('go_to_page_top_enable',false),$invalidValue));
		$Validation->notice('isNotEmpty',array($option['go_to_page_top_hash']),array(ThemeHelper::getFormName('go_to_page_top_hash',false),$invalidValue));
		$Validation->notice('isNumber',array($option['go_to_page_top_animation_enable'],0,1),array(ThemeHelper::getFormName('go_to_page_top_animation_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['go_to_page_top_animation_duration'],0,99999),array(ThemeHelper::getFormName('go_to_page_top_animation_duration',false),$invalidValue));
		if(!in_array($option['go_to_page_top_animation_easing'],array_keys($Easing->easingType)))
			$Notice->addError(ThemeHelper::getFormName('go_to_page_top_animation_easing',false),$invalidValue);			
		
		/* Font */
		$font=array('base','h1','h2','h3','h4','h5','h6');
		foreach($font as $value)
		{
			foreach($media as $mediaIndex=>$mediaValue)
				$Validation->notice('isNumber',array($option['font_'.$value.'_size_'.$mediaIndex],1,100),array(ThemeHelper::getFormName('font_'.$value.'_size_'.$mediaIndex,false),$invalidValue));
			
			if(!in_array($option['font_'.$value.'_style'],array_keys($CSS->fontStyle)))
				$Notice->addError(ThemeHelper::getFormName('font_'.$value.'_style',false),$invalidValue);	
			if(!in_array($option['font_'.$value.'_weight'],array_keys($CSS->fontWeight)))
				$Notice->addError(ThemeHelper::getFormName('font_'.$value.'_weight',false),$invalidValue);	
		}
		
		/* WooCommerce */
		
		/* Plugin / Fancybox for images */
		$Validation->notice('isNumber',array($option['fancybox_image_padding'],0,999),array(ThemeHelper::getFormName('fancybox_image_padding',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_margin'],0,999),array(ThemeHelper::getFormName('fancybox_image_margin',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_min_width'],1,9999),array(ThemeHelper::getFormName('fancybox_image_min_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_min_height'],1,9999),array(ThemeHelper::getFormName('fancybox_image_min_height',false),$invalidValue));		
		$Validation->notice('isNumber',array($option['fancybox_image_max_width'],1,9999),array(ThemeHelper::getFormName('fancybox_image_max_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_max_height'],1,9999),array(ThemeHelper::getFormName('fancybox_image_max_height',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_helper_button_enable'],0,1),array(ThemeHelper::getFormName('fancybox_image_helper_button_enable',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autoresize'],0,1),array(ThemeHelper::getFormName('fancybox_image_autoresize',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autocenter'],0,1),array(ThemeHelper::getFormName('fancybox_image_autocenter',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_fittoview'],0,1),array(ThemeHelper::getFormName('fancybox_image_fittoview',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_arrow'],0,1),array(ThemeHelper::getFormName('fancybox_image_arrow',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_close_button'],0,1),array(ThemeHelper::getFormName('fancybox_image_close_button',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_close_click'],0,1),array(ThemeHelper::getFormName('fancybox_image_close_click',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_next_click'],0,1),array(ThemeHelper::getFormName('fancybox_image_next_click',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_mouse_wheel'],0,1),array(ThemeHelper::getFormName('fancybox_image_mouse_wheel',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_autoplay'],0,1),array(ThemeHelper::getFormName('fancybox_image_autoplay',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_loop'],0,1),array(ThemeHelper::getFormName('fancybox_image_loop',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_playspeed'],1,99999),array(ThemeHelper::getFormName('fancybox_image_playspeed',false),$invalidValue));
		if(!in_array($option['fancybox_image_animation_effect_open'],array_keys($FancyBox->transitionType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_animation_effect_open',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_close'],array_keys($FancyBox->transitionType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_animation_effect_close',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_next'],array_keys($FancyBox->transitionType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_animation_effect_next',false),$invalidValue);	
		if(!in_array($option['fancybox_image_animation_effect_previous'],array_keys($FancyBox->transitionType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_animation_effect_previous',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_open'],array_keys($Easing->easingType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_easing_open',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_close'],array_keys($Easing->easingType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_easing_close',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_next'],array_keys($Easing->easingType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_easing_next',false),$invalidValue);	
		if(!in_array($option['fancybox_image_easing_previous'],array_keys($Easing->easingType)))
			$Notice->addError(ThemeHelper::getFormName('fancybox_image_easing_previous',false),$invalidValue);	
		$Validation->notice('isNumber',array($option['fancybox_image_speed_open'],1,99999),array(ThemeHelper::getFormName('fancybox_image_speed_open',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_close'],1,99999),array(ThemeHelper::getFormName('fancybox_image_speed_close',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_next'],1,99999),array(ThemeHelper::getFormName('fancybox_image_speed_next',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_image_speed_previous'],1,99999),array(ThemeHelper::getFormName('fancybox_image_speed_previous',false),$invalidValue));
		
		/* Plugin / Fancybox for videos */
		$Validation->notice('isNumber',array($option['fancybox_video_padding'],0,999),array(ThemeHelper::getFormName('fancybox_video_padding',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_margin'],0,999),array(ThemeHelper::getFormName('fancybox_video_margin',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_min_width'],1,9999),array(ThemeHelper::getFormName('fancybox_video_min_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_min_height'],1,9999),array(ThemeHelper::getFormName('fancybox_video_min_height',false),$invalidValue));		
		$Validation->notice('isNumber',array($option['fancybox_video_max_width'],1,9999),array(ThemeHelper::getFormName('fancybox_video_max_width',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_max_height'],1,9999),array(ThemeHelper::getFormName('fancybox_video_max_height',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_autoresize'],0,1),array(ThemeHelper::getFormName('fancybox_video_autoresize',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_autocenter'],0,1),array(ThemeHelper::getFormName('fancybox_video_autocenter',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_fittoview'],0,1),array(ThemeHelper::getFormName('fancybox_video_fittoview',false),$invalidValue));
		$Validation->notice('isNumber',array($option['fancybox_video_close_button'],0,1),array(ThemeHelper::getFormName('fancybox_video_close_button',false),$invalidValue));

		/* Plugin / Maintenance mode */
		$Validation->notice('isNumber',array($option['maintenance_mode_enable'],0,1),array(ThemeHelper::getFormName('maintenance_mode_enable',false),$invalidValue));
		
		if($Notice->isError())
		{
			$response['local']=$Notice->getError();
		}
		else
		{
			$response['global']['error']=0;
			ThemeOption::updateOption($option);
			
			$this->createCSSFile();
		}

		$response['global']['notice']=$Notice->createHTML(THEME_PATH_TEMPLATE.'notice.php');

		echo json_encode($response);
		exit;
	}
	
	/**************************************************************************/
	
	function publicInit()
	{
		require_once(ABSPATH.'wp-admin/includes/plugin.php');
		
		$this->prepareLibrary();
		
		$GoogleFont=new ThemeGoogleFont();
		$GoogleFont->setToStyle($this->library['style']);
		
		$this->includeLibrary(ThemeOption::getOption('responsive_mode_enable'),null,array('responsive'));
		$this->includeLibrary(ThemeOption::getOption('responsive_mode_enable') && is_rtl(),null,array('responsive-rtl'));
		$this->includeLibrary(!ThemeOption::getOption('responsive_mode_enable'),null,array('responsive-disable'));
		
		$this->includeLibrary(is_rtl(),null,array('jquery-themeOption-rtl','jquery-dropkick-rtl','widget-rtl','pb-component-menu-rtl'));
		
		$this->includeLibrary(ThemePlugin::isActive('timetable/timetable.php'),null,array('theme-timetable'));
		$this->includeLibrary(ThemePlugin::isActive('woocommerce/woocommerce.php'),null,array('theme-woocommerce'));
		$this->includeLibrary(ThemePlugin::isActive('woocommerce/woocommerce.php') && is_rtl(),null,array('theme-woocommerce-core-rtl'));
		$this->includeLibrary(ThemePlugin::isActive('woocommerce/woocommerce.php') && is_rtl(),null,array('theme-woocommerce-rtl'));
		
		$this->includeLibrary(!class_exists('TSThemeStyle'),null,array('ts-frontend'));
		$this->includeLibrary(!class_exists('PBPageBuilder'),null,array('pb-frontend','pb-frontend-main'));
		
		$this->includeLibrary(!class_exists('PBPageBuilder') && is_rtl(),null,array('pb-frontend-main-rtl'));
		
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);
		
		$aPattern=array
		(
			'rightClick'			=>	'/^right_click_/',
			'selection'				=>	'/^copy_selection_/',
			'fancyboxImage'			=>	'/^fancybox_image_/',
			'fancyboxVideo'			=>	'/^fancybox_video_/',
			'goToPageTop'			=>	'/^go_to_page_top_/'
		);
		
		$option=ThemeOption::getOptionObject();
		
		foreach($aPattern as $indexPattern=>$valuePattern)
		{
			foreach($option as $index=>$value)
			{
				if(preg_match($valuePattern,$index,$result))
				{
					$nIndex=preg_replace($valuePattern,'',$index);
					$data[$indexPattern][$nIndex]=$value;
				}
			}
		}
		
		$data['config']['theme_url']=THEME_URL;
		$data['config']['is_rtl']=is_rtl() ? 1 : 0;
		$data['config']['woocommerce_enable']=(int)ThemePlugin::isActive('woocommerce/woocommerce.php');
		
		$param=array
		(
			'l10n_print_after'=>'themeOption='.json_encode($data).';'
		);
			
		wp_localize_script('public','themeOption',$param);
	}
		
	/**************************************************************************/

	function automaticExcerptLength()
	{
		global $post;
		
		$length=55;

		switch($post->post_type)
		{
			case 'post':
				$length=ThemeOption::getOption('blog_automatic_excerpt_length');
			break;
		}
		
		return($length);
	}
	
	/**************************************************************************/
	
	function filterExcerptMore()
	{
		$Theme=new Theme();
		$length=$Theme->automaticExcerptLength();
		
		if($length>0) return('<span class="excerpt-more"> <a href="'.get_the_permalink().'" title="'.sprintf(esc_attr('Continue reading post "%s"',THEME_DOMAIN),get_the_title()).'">[...]</a></span>');
		
		return('');
	}
	
	/**************************************************************************/
	
	function addPlugin()
	{
		$plugin=array
		(
			array
			(
				'name'								=>	'Page Builder',
				'slug'								=>	'page-builder',
				'source'							=>	THEME_PATH_SOURCE.'page-builder.zip',
				'required'							=>	true,
				'version'							=>	'3.4',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Theme Styles',
				'slug'								=>	'theme-style',
				'source'							=>	THEME_PATH_SOURCE.'theme-style.zip',
				'required'							=>	true,
				'version'							=>	'3.5',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Theme Demo Data Installer',
				'slug'								=>	'theme-demo-data-installer',
				'source'							=>	THEME_PATH_SOURCE.'theme-demo-data-installer.zip',
				'required'							=>	false,
				'version'							=>	'3.5',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Better WordPress Minify',
				'slug'								=>	'bwp-minify',
				'required'							=>	false,
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			),
			array
			(
				'name'								=>	'Timetable Responsive Schedule For WordPress',
				'slug'								=>	'timetable',
				'source'							=>	THEME_PATH_SOURCE.'timetable.zip',
				'required'							=>	false,
				'version'							=>	'4.0',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'Slider Revolution Responsive WordPress Plugin',
				'slug'								=>	'revslider',
				'source'							=>	THEME_PATH_SOURCE.'revslider.zip',
				'required'							=>	false,
				'version'							=>	'5.4.5.2',
				'force_activation'					=>	false,
				'force_deactivation'				=>	true
			),
			array
			(
				'name'								=>	'WooCommerce',
				'slug'								=>	'woocommerce',
				'required'							=>	false,
				'force_activation'					=>	false,
				'force_deactivation'				=>	false
			)      			
		);
	
		$config=array
		(
			'default_path'							=>	'',                      
			'menu'									=>	'tgmpa-install-plugins', 
			'has_notices'							=>	true,
			'dismissable'							=>	true,
			'dismiss_msg'							=>	'',
			'is_automatic'							=>	true,
			'message'								=>	'', 
			'strings'								=>	array
			(
				'page_title'						=>	__('Install Required Plugins','tgmpa'),
				'menu_title'						=>	__('Install Plugins','tgmpa'),
				'installing'						=>	__('Installing Plugin: %s','tgmpa'),
				'oops'								=>	__('Something went wrong with the plugin API.','tgmpa'),
				'notice_can_install_required'		=>	_n_noop('This theme requires the following plugin: %1$s.','This theme requires the following plugins: %1$s.','tgmpa'),
				'notice_can_install_recommended'	=>	_n_noop('This theme recommends the following plugin: %1$s.','This theme recommends the following plugins: %1$s.', 'tgmpa' ),
				'notice_cannot_install'				=>	_n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','tgmpa'),
				'notice_can_activate_required'		=>	_n_noop('The following required plugin is currently inactive: %1$s.','The following required plugins are currently inactive: %1$s.', 'tgmpa' ),
				'notice_can_activate_recommended'	=>	_n_noop('The following recommended plugin is currently inactive: %1$s.','The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ),
				'notice_cannot_activate'			=>	_n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','tgmpa'),
				'notice_ask_to_update'				=>	_n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ),
				'notice_cannot_update'				=>	_n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','tgmpa'),
				'install_link'						=>	_n_noop('Begin installing plugin','Begin installing plugins','tgmpa'),
				'activate_link'						=>	_n_noop('Begin activating plugin','Begin activating plugins','tgmpa'),
				'return'							=>	__('Return to Required Plugins Installer','tgmpa'),
				'plugin_activated'					=>	__('Plugin activated successfully.','tgmpa' ),
				'complete'							=>	__('All plugins installed and activated successfully. %s','tgmpa'),
				'nag_type'							=>	'updated'
			)
		);

		tgmpa($plugin,$config);
	}
	
	/**************************************************************************/
	
	function createCSSFile()
	{
		if($this->createMultisitePath()===false) return;
		
		$content=null;
		
		$CSS=new ThemeCSS();
		$Validation=new ThemeValidation();
		$ResponsiveMode=new ThemeResponsiveMode($this->responsiveMode);
		
		ThemeOption::refreshOption();

		$media=$ResponsiveMode->getMedia();

		if(ThemeOption::getOption('responsive_mode_enable')!=1) $media=$media[1];
		
		$selector=array
		(
			'base'		=>	array
			(
				'a',
				'body',
				'input',
				'select',
				'textarea',
				'label'
			),
			'h1'		=>	array
			(
				'h1',
				'h1 a'
			),
			'h2'		=>	array
			(
				'h2',
				'h2 a',
				'.pb-counter-box ul>li>div>div.pb-counter-box-text-counter',
				'.pb-pricing-plan>ul>li>div .pb-pricing-plan-item-price-box .pb-pricing-plan-item-price-box-value'
			),
			'h3'		=>	array
			(
				'h3',
				'h3 a',
				'.pb-testimonial ul.pb-layout-100>li>div>p',
				'.pb-twitter-user-timeline .pb-twitter-user-timeline-text',
				'.pb-twitter-user-timeline .pb-twitter-user-timeline-text a'
			),
			'h4'		=>	array
			(
				'h4',
				'h4 a'
			),
			'h5'		=>	array
			(
				'h5',
				'h5 a',
				'h5 label',
				'h3.comment-reply-title',
				'.pb-zaccordion .pb-zaccordion-caption-box .pb-zaccordion-caption-box-title',
				'.woocommerce-checkout .woocommerce h2'
			),
			'h6'		=>	array
			(
				'h6',
				'h6 a',
				'h6 label',
				'.pb-testimonial ul.pb-layout-50x50>li>div>p',
				'.pb-testimonial ul.pb-layout-33x33x33>li>div>p',
				'.pb-testimonial ul.pb-layout-25x25x25x25>li>div>p',
				'div.pb-counter-list>ul>li>span.pb-counter-list-label',
				'div.pb-counter-list>ul>li>span.pb-counter-list-value',
				'.pb-blockquote blockquote',
				'.pb-blockquote blockquote p',
				'.woocommerce.widget_products>ul>li>a',
				'.woocommerce.widget_recent_reviews>ul>li>a',
				'.woocommerce.widget_top_rated_products>ul>li>a',
				'.woocommerce.widget_recently_viewed_products>ul>li>a',
				'.woocommerce.widget_shopping_cart>div.widget_shopping_cart_content>ul>li>a',
				'.woocommerce-checkout .woocommerce h3'
			)
		);

		foreach($selector as $index=>$value)
		{
			$content.=$CSS->create(array
			(
				'selector'	=>	$value,
				'property'	=>	array
				(
					'font-family'	=>	array(ThemeOption::getOption('font_'.$index.'_family_google'),ThemeOption::getOption('font_'.$index.'_family_system')),
					'font-size'		=>	ThemeOption::getOption('font_'.$index.'_size'),
					'font-style'	=>	ThemeOption::getOption('font_'.$index.'_style'),
					'font-weight'	=>	ThemeOption::getOption('font_'.$index.'_weight'),
					'line-height'	=>	ThemeOption::getOption('font_'.$index.'_line_height'),
				)
			));	
		}
		
		$content.=$CSS->create(array
		(
			'selector'	=>	array
			(
				'.pb-header-subheader .pb-subheader span'
			),
			'property'	=>	array
			(
				'font-family'	=>	array(ThemeOption::getOption('font_base_family_google'),ThemeOption::getOption('font_base_family_system'))
			)
		));			

		if(count($media))
		{
			foreach($media as $mediaIndex=>$mediaValue)
			{
				foreach($selector as $selectorIndex=>$selectorValue)
				{
					$content.=$CSS->create(array
					(
						'media'		=>	$mediaValue,
						'selector'	=>	$selectorValue,
						'property'	=>	array
						(
							'font-size'	=>	ThemeOption::getOption('font_'.$selectorIndex.'_size_'.$mediaIndex)
						)
					));		
				}
			}
		}
		else
		{
			foreach($selector as $selectorIndex=>$selectorValue)
			{
				$content.=$CSS->create(array
				(
					'selector'	=>	$selectorValue,
					'property'	=>	array
					(
						'font-size'	=>	ThemeOption::getOption('font_'.$selectorIndex.'_size_1')
					)
				));		
			}			
		}

		if(ThemeOption::getOption('responsive_mode_enable')==1)
		{
			$maxWidth=ThemeOption::getOption('menu_responsive_level')-1;
			$content.=$CSS->create(array
			(
				'media'		=>	array('min-width'=>0,'max-width'=>$maxWidth),
				'selector'	=>	array
				(
					'ul.sf-menu',
				),
				'property'	=>	array
				(
					'display'		=> 'none'
				)
			));

			$content.=$CSS->create(array
			(
				'media'		=>	array('min-width'=>0,'max-width'=>$maxWidth),
				'selector'	=>	array
				(
					'select.dp-menu',
				),
				'property'	=>	array
				(
					'display'		=> 'block'
				)
			));	
		}
		
		foreach($media as $index=>$value)
		{
			if($Validation->isNotEmpty(ThemeOption::getOption('custom_css_responsive_'.$index)))
			{
				if((array_key_exists('min-width',$value)) && (array_key_exists('max-width',$value)))
				{
					$content.=
					'
					@media only screen  and (min-width:'.$value['min-width'].'px) and (max-width:'.$value['max-width'].'px)
					{
					'.ThemeOption::getOption('custom_css_responsive_'.$index).'
					}
					';
				}
				else
				{
					$content.=ThemeOption::getOption('custom_css_responsive_'.$index);
				}
			}
		}
		
		$file=THEME_PATH_MULTISITE_SITE_STYLE.'style.css';
		
		$ThemeWPFileSystem=new ThemeWPFileSystem();
		if($ThemeWPFileSystem->put_contents($file,$content,0755)===false) return(false);
		
		return(true);		
	}
	
	/**************************************************************************/
	
	function getFooterStickyClass()
	{
		$mobileDetect=new Mobile_Detect();
		
		if($mobileDetect->isMobile()) return(null);
		if(ThemeOption::getOption('footer_sticky_enable')==1) return('theme-footer-sticky');
		
		return(null);
	}
	
	/**************************************************************************/
	
	function createMultisitePath()
	{
		$data=array
		(
			THEME_PATH_MULTISITE_SITE,
			THEME_PATH_MULTISITE_SITE_STYLE
		);
		
		foreach($data as $path)
		{
			if(!ThemeFile::dirExist($path)) @mkdir($path);			
			if(!ThemeFile::dirExist($path)) return(false);
		}
		
		return(true);
	}
	
	/**************************************************************************/
	
	function adminNotice()
	{
		/***/
		
		$compare=version_compare(phpversion(),'5.3.0','>=');
		if($compare<0)
		{
			echo 
			'
				<div class="error">
					<p>'.sprintf(__('<b>You use old PHP version (%s) which is not compatible with at least one plugin provided to use in this theme. <u>It is highly recommended, to update PHP to version (at least) 5.3 before activating plugins.</u></b>',THEME_DOMAIN),phpversion()).'</p>
				</div>				
			';
		}
		
		/***/
		
		$file=array(THEME_PATH_MULTISITE_SITE_STYLE.'style.css');
		foreach($file as $path)
		{
			if(!is_writable($path))
			{
				echo 
				'
					<div class="error">
						<p>'.sprintf(__('<b>File %s cannot be created. Please make sure that this location is writable.</b>',THEME_DOMAIN),str_replace('\\','/',$path)).'</p>
					</div>				
				';				
			}
		}
		
		/***/
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta,$part='all')
	{
		if(in_array($part,array('general','all')))
		{
			ThemeHelper::setDefaultOption($meta,'widget_area_sidebar',-1);
			ThemeHelper::setDefaultOption($meta,'widget_area_sidebar_location',-1);
			ThemeHelper::setDefaultOption($meta,'widget_area_footer',-1);
			ThemeHelper::setDefaultOption($meta,'menu_top',-1);
			ThemeHelper::setDefaultOption($meta,'footer_bottom_enable',-1);
			ThemeHelper::setDefaultOption($meta,'page_background_color','');	
		}

		if(in_array($part,array('header','all')))
		{
			ThemeHelper::setDefaultOption($meta,'header_enable',-1);
			ThemeHelper::setDefaultOption($meta,'header_text_color','');
			ThemeHelper::setDefaultOption($meta,'header_background_color','');
			ThemeHelper::setDefaultOption($meta,'header_background_image_src','');
			ThemeHelper::setDefaultOption($meta,'header_background_image_repeat',-1);
			ThemeHelper::setDefaultOption($meta,'header_background_image_position','');
			ThemeHelper::setDefaultOption($meta,'header_background_image_size_1',-1);
			ThemeHelper::setDefaultOption($meta,'header_background_image_size_2','');
			ThemeHelper::setDefaultOption($meta,'header_subheader','');
			ThemeHelper::setDefaultOption($meta,'header_subheader_text_color','');		
		}
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/