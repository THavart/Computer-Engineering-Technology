<?php

/******************************************************************************/
/******************************************************************************/

class PBPageBuilder
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_PAGE_BUILDER_SCRIPT_URL,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_PAGE_BUILDER_STYLE_URL,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);
		
		$this->pluginOptionDeafult=array
		(
			'enable_post'														=>	0,
			'enable_page'														=>	1,
			'google_map_api_key'												=>	''
		);
		
		$this->lineProperty=array
		(
			'css_class'															=>	'',
			'css_group'															=>	'',
			'layout_line'														=>	'',
			'bg_position'														=>	'',
			'bg_repeat'															=>	'',
			'bg_image'															=>	'',
			'bg_size_a'															=>	'',
			'bg_size_b'															=>	'',
			'bg_parallax_enable'												=>	'0',
			'bg_parallax_mobile_enable'											=>	'0',
			'bg_parallax_speed'													=>	'30',
			'video_format_webm'													=>	'',
			'video_format_ogg'													=>	'',
			'video_format_mp4'													=>	'',
			'video_poster'														=>	'',
			'video_autoplay'													=>	'',
			'video_loop'														=>	'',
			'video_muted'														=>	'',
			'video_control'														=>	'',
			'video_mobile_enable'												=>	'0',
			'bg_color'															=>	'',
			'overlay_color'														=>	'',
			'padding_top'														=>	'',
			'padding_right'														=>	'',
			'padding_bottom'													=>	'',
			'padding_left'														=>	'',
			'border_top_style'													=>	'',
			'border_top_width'													=>	'',
			'border_top_color'													=>	'',
			'border_right_style'												=>	'',
			'border_right_width'												=>	'',
			'border_right_color'												=>	'',
			'border_bottom_style'												=>	'',
			'border_bottom_width'												=>	'',
			'border_bottom_color'												=>	'',
			'border_left_style'													=>	'',
			'border_left_width'													=>	'',
			'border_left_color'													=>	'',
			'waypoint_type'														=>	'',
			'waypoint_offset_initial'											=>	'',
			'waypoint_duration'													=>	'',
			'waypoint_easing'													=>	'',
		);
		
		PBInclude::includeFile(get_template_directory().'/pb_config.php');
		
		$this->prepareLibrary();
	}
	
	/**************************************************************************/
	
	function prepareLibrary()
	{
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
				'error-handler'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'errorHandler.js',
					'in_footer'													=>	false
				),
				'jquery-ui-core'												=>	array
				(
					'use'														=>	3,
					'path'														=>	''
				),
				'jquery-ui-tabs'												=>	array
				(
					'use'														=>	3,
					'path'														=>	''
				),
				'jquery-ui-accordion'											=>	array
				(
					'use'														=>	3,
					'path'														=>	''
				),
				'jquery-ui-dialog'												=>	array
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
				'jquery-ui-sortable'											=>	array
				(
					'path'														=>	''
				),				
				'jquery-ui-draggable-old'										=>	array
				(
					'path'														=>	PLUGIN_PAGE_BUILDER_SCRIPT_URL,
					'file'														=>	'jquery.ui.draggable.min.js',
				),
				'jquery-ui-droppable'											=>	array
				(
					'path'														=>	''
				),
				'jquery-effects-core'											=>	array
				(
					'use'														=>	2,
					'path'														=>	''
				),	
				'jquery-effects-fade'											=>	array
				(
					'use'														=>	2,
					'path'														=>	''
				),	
				'jquery-effects-blind'											=>	array
				(
					'use'														=>	2,
					'path'														=>	''
				),	
				'jquery-effects-slide'											=>	array
				(
					'use'														=>	2,
					'path'														=>	''
				),	
				'jquery-effects-drop'											=>	array
				(
					'use'														=>	2,
					'path'														=>	''
				),
				'jquery-bbq'													=>	array
				(
					'use'														=>	2,
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
					'use'														=>	3,
					'file'														=>	'jquery.scrollTo.min.js'
				),
				'jquery-blockUI'												=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.blockUI.js'
				),
				'jquery-qtip'													=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.qtip.min.js'
				),	
				'jquery-dropkick'												=>	array
				(
					'file'														=>	'jquery.dropkick.min.js'
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.js'
				),
				'jquery-actual'													=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.actual.min.js'
				),
				'jquery-responsiveElement'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.responsiveElement.js'
				),
				'jquery-imagePreloader'											=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.imagePreloader.js'
				),
				'jquery-imageHover'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.imageHover.js'
				),
				'jquery-windowDimensionListener'								=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.windowDimensionListener.js'
				),
				'jquery-fancybox'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox.js'
				),				
				'jquery-fancybox-media'											=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox-media.js'
				),			
				'jquery-fancybox-buttons'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox-buttons.js'
				),					
				'jquery-fancybox-launch'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.fancybox.launch.js'
				),	
				'jquery-carouFredSel'											=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.carouFredSel.packed.js'
				),				
				'jquery-waypoint'												=>	array
				(
					'file'														=>	'jquery.waypoints.min.js'
				),
				'jquery-waypoint-sticky'										=>	array
				(
					'file'														=>	'jquery.waypoints-sticky.min.js'
				),
				'jquery-parallax'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'jquery.parallax.js'
				),
				'jquery-page-builder'											=>	array
				(
					'file'														=>	'jquery.page-builder.js'
				),
				'jquery-page-builder-plugin-option'								=>	array
				(
					'file'														=>	'jquery.pluginOption.js'
				),
				'jquery-page-builder-plugin-option-element'						=>	array
				(
					'file'														=>	'jquery.pluginOptionElement.js'
				),
				'pb-animationWaypoint'											=>	array
				(
					'use'														=>	2,
					'file'														=>	'PB.AnimationWaypoint.js'
				),		
				'pb-helper'														=>	array
				(
					'use'														=>	3,
					'file'														=>	'PB.Helper.js'
				),
				'pb-table'														=>	array
				(
					'file'														=>	'PB.Table.js'
				),
				'pb-public'														=>	array
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
					'path'														=>	null,
					'file'														=>	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
				),				
				'jquery-dropkick'												=>	array
				(
					'file'														=>	'jquery.dropkick.css'
				),
				'jquery-dropkick-rtl'											=>	array
				(				
					'use'														=>	1,
					'inc'														=>	false,
					'path'														=>	PLUGIN_PAGE_BUILDER_STYLE_URL,
					'file'														=>	'jquery.dropkick.rtl.css',
				),
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.css'
				),	
				'jquery-qtip'													=>	array
				(
					'use'														=>	3,
					'file'														=>	'jquery.qtip.min.css'
				),
				'font-awesome'													=>	array
				(
					'use'														=>	3,
					'path'														=>	PLUGIN_PAGE_BUILDER_LIBRARY_URL,
					'file'														=>	'fontAwesome/css/font-awesome.min.css'
				),
				'jquery-fancybox'												=>	array
				(
					'use'														=>	2,
					'file'														=>	'fancybox/jquery.fancybox.css'
				),
				'jquery-fancybox-buttons'										=>	array
				(
					'use'														=>	2,
					'file'														=>	'fancybox/helpers/jquery.fancybox-buttons.css'
				),
				'pb-backend'													=>	array
				(
					'file'														=>	'PB.Backend.css'
				),	
				'pb-backend-rtl'												=>	array
				(
					'inc'														=>	false,
					'file'														=>	'PB.Backend.rtl.css'
				),
				'pb-frontend'													=>	array
				(
					'use'														=>	2,
					'file'														=>	'PB.Frontend.css'
				),	
				'pb-frontend-rtl'												=>	array
				(				
					'use'														=>	2,
					'inc'														=>	false,
					'path'														=>	PLUGIN_PAGE_BUILDER_STYLE_URL,
					'file'														=>	'PB.Frontend.rtl.css',
				),
				'pb-frontend-custom'											=>	array
				(
					'use'														=>	2,
					'path'														=>	PBData::get('theme_url_multisite_style'),
					'file'														=>	'PB.Frontend.css',
					'dependencies'												=>	array('pb-frontend')
				)
			)
		);
	}
	
	/**************************************************************************/
	
	function modifyLibrary($type)
	{
		$library=PBData::get('modify_library');

		if((isset($library[$type])) && (is_array($library[$type])))
		{
			foreach($library[$type] as $index=>$value)
			{
				if(isset($this->library[$type][$index]))
					$this->library[$type][$index]=array_merge($this->library[$type][$index],$value);
				elseif(isset($this->library[$type]['pb-component-'.$index]))
				{
					$this->library[$type]['pb-component-'.$index]=array_merge($this->library[$type]['pb-component-'.$index],$value);
				}
			}	
		}
	}
	
	/**************************************************************************/
	
	function addLibrary($type,$use)
	{
		foreach($this->library[$type] as $index=>$value)
			$this->library[$type][$index]=array_merge($this->libraryDefault[$type],$value);

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
	
	function pluginActivation()
	{
		if(version_compare(PHP_VERSION,'5.3','<'))
		{
			exit(sprintf('This plugin requires PHP 5.3 or higher. You’re still on %s.',PHP_VERSION));
		}
		
		if(PBData::get('visual_mode')==1)
		{
			$argument=array
			(
				'post_type'							=>	array('post','page'),
				'post_status '						=>	'any',
				'posts_per_page'					=>	-1
			);

			$query=new WP_Query($argument);
			if($query===false) return;

			foreach($query->posts as $value)
			{
				$data=$this->getData($value->ID);
				if($data['data']['enable']!=1) continue;

				$content=$value->post_content;
				$content=preg_replace('/\['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'builder\]/',null,$content);
				$content=preg_replace('/\['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'builder id="[0-9]{1,}"\]/',null,$content);
				$content=$content.$this->createMainShortcode();

				wp_update_post(array('ID'=>$value->ID,'post_content'=>$content));	
			}
		}
		
		$option=$this->pluginOptionDeafult;

		$optionSave=array();
		$optionCurrent=PBOption::createOption(true);
		
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

		PBOption::resetOption();
		PBOption::updateOption($optionSave);
		
		$this->createCSSFile();
	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}
	
	/**************************************************************************/

	function publicInit()
	{
		add_filter('widget_text','do_shortcode');
		
		if(is_array(PBData::get('filter_user_contactmethods')))
			add_filter('user_contactmethods',PBData::get('filter_user_contactmethods'));
		
		if(array_key_exists('pb-public',$this->library['script']))
		{
			$script=$this->library['script']['pb-public'];
		
			unset($this->library['script']['pb-public']);
		
			$this->library['script']['pb-public']=$script;
		}
		
		$this->includeLibrary(is_rtl(),array(),array('pb-frontend-rtl'));
		
		$this->modifyLibrary('style');
		$this->modifyLibrary('script');
		
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);	
				
		$data=array();

		$data['config']['content_width']=PBData::get('content_width');
		$data['config']['is_rtl']=is_rtl() ? 1 : 0;
		
		$param=array('l10n_print_after'=>'pbOption='.json_encode($data).';');
			
		wp_localize_script('pb-public','pbOption',$param);
	}
	
	/**************************************************************************/
	
	function adminInit()
	{		
		add_filter('mce_buttons',array($this,'filterEditorButton'));
		add_filter('mce_external_plugins',array($this,'filterEditorPlugin'));
		
		if(is_array(PBData::get('filter_user_contactmethods')))
			add_filter('user_contactmethods',PBData::get('filter_user_contactmethods'));
		
		$this->includeLibrary(is_rtl(),array(),array('pb-backend-rtl','jquery-dropkick-rtl'));
		
		$this->modifyLibrary('style');
		$this->modifyLibrary('script');
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
		
		$text=array();
		
		$text['save']=__('Save',PLUGIN_PAGE_BUILDER_DOMAIN);
		$text['cancel']=__('Cancel',PLUGIN_PAGE_BUILDER_DOMAIN);
		$text['delete']=__('Delete',PLUGIN_PAGE_BUILDER_DOMAIN);
		$text['create_shortcode']=__('Create Shortcode',PLUGIN_PAGE_BUILDER_DOMAIN);
		
		wp_localize_script('jquery-page-builder','pbText',$text);
		wp_localize_script('jquery-page-builder','cssClass',PBData::get('css_class'));
		wp_localize_script('jquery-page-builder','tinyMceShortcode',array('enable'=>0,'list'=>$this->getTinyMCEShortcodeListData()));
	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{
		if(!$this->isVisualModeEnable()) return;
		
		add_meta_box('page_builder_meta_box',__('Page builder',PLUGIN_PAGE_BUILDER_DOMAIN),array($this,'adminCreateMetaBox'),'page','normal','high');
		add_meta_box('page_builder_meta_box',__('Page builder',PLUGIN_PAGE_BUILDER_DOMAIN),array($this,'adminCreateMetaBox'),'post','normal','high');	
	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_theme_page(__('Page Builder',PLUGIN_PAGE_BUILDER_DOMAIN),__('Page Builder',PLUGIN_PAGE_BUILDER_DOMAIN),'edit_theme_options','page_builder_edit',array($this,'adminPluginOptionCreate'));
	}
	
	/**************************************************************************/
	
	function adminPluginOptionCreate()
	{
		$data=array();
		
		$data['option']=PBOption::createOption(true);
		
		$data['visualMode']=$this->isVisualModeEnable();
		
		$Template=new PBTemplate($data,PLUGIN_PAGE_BUILDER_TEMPLATE_PATH.'admin/page_builder_option.php');
		echo $Template->output();		
	}
	
	/**************************************************************************/
	
	function adminPluginOptionSave()
	{
		$response=array('global'=>array('error'=>1));
		
		$option=PBHelper::getPostOption();
		
		$Notice=new PBNotice();
		$Validation=new PBValidation($Notice);
		
		$invalidValue=__('Invalid value',PLUGIN_PAGE_BUILDER_DOMAIN);
		
		if($this->isVisualModeEnable())
		{
			$Validation->notice('isNumber',array($option['enable_page'],0,1),array(PBHelper::getFormName('enable_page',false),$invalidValue));
			$Validation->notice('isNumber',array($option['enable_post'],0,1),array(PBHelper::getFormName('enable_post',false),$invalidValue));
		}

		if($Notice->isError())
		{
			$response['local']=$Notice->getError();
		}
		else
		{
			PBOption::updateOption($option);
			$this->createCSSFile();
			$response['global']['error']=0;
		}

		$response['global']['notice']=$Notice->createHTML(PLUGIN_PAGE_BUILDER_TEMPLATE_PATH.'notice.php');

		echo json_encode($response);
		exit;		
	}
	
	/**************************************************************************/
	
	function filterEditorButton($button)
	{
		array_push($button,'|','shortcode_manager_list');
		return($button);			
	}
	
	/**************************************************************************/
	
	function filterEditorPlugin($plugin)
	{
	    $plugin['shortcode_manager']=PLUGIN_PAGE_BUILDER_SCRIPT_URL.'jquery.tinymce.init.js';
		return($plugin);	
	}
	
	/**************************************************************************/
	
	function adminCreateSwitchButton($context)
	{
		global $current_screen;
		
		if(is_null($current_screen)) return($context);
		
		if(!$this->isVisualModeEnable()) return($context);
		
		if(!in_array($current_screen->post_type,array('post','page'))) return($context);

		$context.='<a href="#" class="button-primary" id="pb-switch">'.__('Processing...',PLUGIN_PAGE_BUILDER_DOMAIN).'</a>';

		return($context);
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBox()
	{
		global $post;
		
		$Layout=new PBLayout();
		
		$data=new stdClass();
		
		$data->data=$this->getData($post->ID);

		$data->contentHTML=null;
		if(count($data->data['line']))
		{
			foreach($data->data['line'] as $value)
			{
				$data->contentHTML.=$this->lineCreateHTML($value);
			}
		}
		
		$data->layoutHTML=null;
		foreach($Layout->layout as $index=>$value)
		{
			$data->layoutHTML.=
			'
				<li class="pb-layout pb-layout-source">
					<div class="pb-layout-inner">
						<div class="pb-layout-icon pb-layout-icon-layout-'.$index.'"></div>
						<div class="pb-layout-header">'.$value['short_name'].'</div>					
					</div>
				</li>
			';
		}
			
		$data->componentHTML=null;
		foreach($this->componentData as $index=>$value)
		{
			PBHelper::removeUIndex($value,'visibility');
			if($this->getComponentVisibility($value['visibility']))
			{
				$data->componentHTML.=
				'
					<li class="pb-component pb-component-source">
						<div class="pb-component-inner">
							<div class="pb-component-icon pb-component-icon-'.$index.'"></div>
							<div class="pb-component-header">'.$value['name'].'</div>	
						</div>
					</li>
				';
			}
		}
		
		$Template=new PBTemplate($data,PLUGIN_PAGE_BUILDER_TEMPLATE_PATH.'page_builder_meta_box.php');
		echo $Template->output();
	}
	
	/**************************************************************************/
	
	function initComponent()
	{	
		$component=PBData::get('component');
		
		foreach($component as $componentName=>$componentData)
		{
			$path=PLUGIN_PAGE_BUILDER_COMPONENT_PATH.$componentName.'/class/PB.Component.'.$this->formatName($componentName).'.class.php';

			if(is_file($path))
			{		
				PBInclude::includeFileFromDir(PLUGIN_PAGE_BUILDER_COMPONENT_PATH.$componentName.'/class/');
				
				$className='PBComponent'.$this->formatName($componentName);
				
				$Component=new $className;
				
				if(method_exists($Component,'initCustomPostType'))
					$Component->initCustomPostType();
				
				$this->componentData[$componentName]=$Component->init();
				
				if(method_exists($Component,'initPublic'))
					$Component->initPublic();
				
				$this->addShortcode($componentName,$Component,$this->componentData[$componentName]);
				
				$style=$Component->addStyle();
				if(is_array($style)) $this->library['style']+=$style;	
				
				$script=$Component->addScript();
				if(is_array($script)) $this->library['script']+=$script;	
			}
		}
	}
	
	/**************************************************************************/
	
	function addShortcode($componentId,$component,$componentData)
	{
		$this->addShortcodeFunction($componentId,$component,null);
		
		foreach($componentData['structure']['element'] as $element)
		{
			$path=explode('/',$element['shortcode']['path']);
			
			foreach($path as $pathValue)
			{
				if(substr($pathValue,0,1)=='@') continue;
				
				$pathValue=preg_replace('/\*/','',$pathValue);
				
				$this->addShortcodeFunction($componentId,$component,$pathValue);
			}
		}
	}
	
	/**************************************************************************/
	
	function addShortcodeFunction($componentId,$component,$shortcode)
	{
		global $shortcode_tags;
		
		$prefix='processShortcode'.$this->formatName($componentId);
		$functionName=$prefix.(is_null($shortcode) ? null : $this->formatName($shortcode));

		if(!method_exists($component,$functionName)) return;

		$shortcodeName=PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.$componentId.(is_null($shortcode) ? null : '_'.$shortcode);

		if(!array_key_exists($shortcodeName,$shortcode_tags))
			add_shortcode($shortcodeName,array($component,$functionName));	
	}

	/**************************************************************************/
	
	function formatName($oName)
	{
		$nName=null;
		$data=explode('_',$oName);
		
		foreach($data as $value) $nName.=ucfirst($value);
		
		return($nName);
	}
	
	/**************************************************************************/
	
	function scanDir($path,$type='file')
	{
		$data=array();
		$file=scandir($path);
		
		foreach($file as $value)
		{
			if($type=='dir')
			{
				if(!is_dir($path.$value)) continue;
			}
			elseif($type=='file')
			{
				if(!is_file($path.$value)) continue;
			}
			else return($data);
				
			$data[]=$value;
		}		
		
		return($data);
	}
	
	/**************************************************************************/
	
	function getData($postId)
	{
		$data=get_post_meta($postId,PLUGIN_PAGE_BUILDER_CONTEXT,true);	
		$this->prepareData($data,$postId);
		return($data);
	}
	
	/**************************************************************************/
	
	function updateData($postId,$data)
	{		
		update_post_meta($postId,PLUGIN_PAGE_BUILDER_CONTEXT,$data);
	}	
	
	/**************************************************************************/
	
	function prepareData(&$data,$postId=0)
	{
		if(!is_array($data)) $data=array();
		
		if(!array_key_exists('data',$data))
		{
			$post=get_post($postId);
			
			$enable=0;
			if(is_object($post))
				$enable=PBOption::getOption('enable_'.($post->post_type=='page' ? 'page' : 'post'));
			
			$data['data']=array('enable'=>$enable);
		}
		
		if(!array_key_exists('line',$data)) $data['line']=array();
	}
	
	/**************************************************************************/
	
	function createMainShortcode()
	{
		return('['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'builder]');
	}
	
	/**************************************************************************/
	
	function pageBuilderSwitch()
	{
		list($postId,$switch)=$this->getRequestValue('postId','switch');
		
		$data=$this->getData($postId);
		
		if(!array_key_exists('enable',$data['data'])) $data['data']['enable']=0;
		elseif($switch) $data['data']['enable']=$data['data']['enable']==1 ? 0 : 1;
		
		if(!$this->isVisualModeEnable())
		{
			$switch=$data['data']['enable']==1 ? 1 : 0;
			$data['data']['enable']=0;
		}
		
		if($switch) $this->updateData($postId,$data);
			
		$post=get_post($postId,'OBJECT');
			
		$content=preg_replace('/\['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'builder]/',null,$post->post_content);
		
		if($data['data']['enable']==1) $content.=$this->createMainShortcode();
			
		wp_update_post(array('ID'=>$postId,'post_content'=>$content));		
			
		$response=array
		(
			'enable'	=>	$data['data']['enable'],
			'content'	=>	wpautop($content),
			'shortcode'	=>	$this->createMainShortcode()
		);

		if($data['data']['enable']==1) $response['buttonLabel']=__('Default editor',PLUGIN_PAGE_BUILDER_DOMAIN);
		else $response['buttonLabel']=__('Page Builder',PLUGIN_PAGE_BUILDER_DOMAIN);
		
		$this->createResponse($response,false);
	}
	
	/**************************************************************************/
	
	function lineAddAjax()
	{
		$Layout=new PBLayout();
		
		$response=array('html'=>'');
		
		list($layout,$postId,$position)=$this->getRequestValue('layout','postId','position');
		
		if(!$Layout->isLayout($layout))
			$this->createResponse($response);

		$dataLine=$this->lineAdd($postId,$layout,$position);
		
		$response['position']=$position;
		$response['html']=$this->lineCreateHTML($dataLine);
		
		$this->createResponse($response,false);
	}
	
	/**************************************************************************/
	
	function lineAdd($postId,$layout,$position)
	{
		$Layout=new PBLayout();
		
		$data=$this->getData($postId);
		
		$id=PBHelper::createId('line');
		
		$column=array();
		$columnCount=$Layout->getLayoutColumnCount($layout);
		
		for($i=0;$i<$columnCount;$i++)
			$column[]=array('data'=>array('id'=>PBHelper::createId('column')),'component'=>array());
		
		$dataLine=array
		(
			'data'							=>	array
			(
				'id'						=>	$id,
				'layout'					=>	$layout,
				'property'					=>	$this->lineProperty
			),
			'column'						=>	$column
		);
		
		$count=count($data['line']);
		
		$data['line'][]=$dataLine;
		
		$this->moveComponentInArray($data['line'],$count,$position);
	
		$this->updateData($postId,$data);
	
		return($dataLine);
	}
	
	/**************************************************************************/
	
	function lineReorderAjax()
	{
		$response=array();
		
		list($lineId,$postId,$position)=$this->getRequestValue('lineId','postId','position');
		
		$b=$this->lineReorder($postId,$lineId,$position);
		if($b===false) $this->createResponse($response);
		
		$this->createResponse($response,false);
	}
	
	/**************************************************************************/
	
	function lineReorder($postId,$lineId,$newPosition)
	{
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data);
		
		if($dataLine===false) return(false);
		
		$this->moveComponentInArray($data['line'],$dataLine['line']['index'],$newPosition);
		
		$this->updateData($postId,$data);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function lineRemoveAjax()
	{
		$response=array();
		
		list($lineId,$postId)=$this->getRequestValue('lineId','postId');
		
		$b=$this->lineRemove($postId,$lineId);
		if($b===false) $this->createResponse($response);
		
		$response['lineId']=$lineId;
		
		$this->createResponse($response,false);		
	}
	
	/**************************************************************************/
	
	function lineRemove($postId,$lineId)
	{
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine===false) return(false);
		
		unset($data['line'][$dataLine['line']['index']]);
		
		$data=array('data'=>$data['data'],'line'=>array_values($data['line']));
	
		$this->updateData($postId,$data);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function componentAddAjax()
	{
		$response=array();
		
		list($postId,$lineId,$columnId,$componentId,$position)=$this->getRequestValue('postId','lineId','columnId','componentId','position');
		
		$dataComponent=$this->componentAdd($postId,$lineId,$columnId,$componentId,$position);
		if($dataComponent===false) $this->createResponse($response);
		
		$response['html']=$this->componentCreateHTML($dataComponent);

		$response['columnId']=$columnId;
		$response['position']=$position;
		
		$this->createResponse($response,false);
	}
	
	/**************************************************************************/
	
	function componentAdd($postId,$lineId,$columnId,$componentId,$position)
	{
		$data=$this->getData($postId);

		$dataColumn=$this->getColumn($columnId,$data);
		if($dataColumn===false) return(false);	
		
		if(!$this->isComponent($componentId)) return(false);
		
		$componentValue=array();
		
		foreach($this->componentData[$componentId]['structure']['element'] as $value)
			$componentValue[$value['id']]=$value['ui']['element']['value'];

		$dataComponent=array
		(
			'data'				=>	array
			(
				'id'			=>	PBHelper::createId('component'),
				'componentId'	=>	$componentId
			),
			'value'				=>	$componentValue
		);
		
		$indexLine=$dataColumn['line']['index'];
		$indexColumn=$dataColumn['column']['index'];
		
		$count=count($data['line'][$indexLine]['column'][$indexColumn]['component']);

		$data['line'][$indexLine]['column'][$indexColumn]['component'][]=$dataComponent;
		
		$this->moveComponentInArray($data['line'][$indexLine]['column'][$indexColumn]['component'],$count,$position);
	
		$this->updateData($postId,$data);

		return($dataComponent);		
	}
	
	/**************************************************************************/
	
	function componentCloneAjax()
	{
		$response=array();
		
		list($postId,$componentId)=$this->getRequestValue('postId','componentId');
		
		$dataComponentCopy=$this->componentClone($postId,$componentId);
		if($dataComponentCopy===false) $this->createResponse($response);
		
		$response['columnId']=$dataComponentCopy['columnId'];
		$response['position']=$dataComponentCopy['position'];
		$response['html']=$this->componentCreateHTML($dataComponentCopy['component']);
		
		$this->createResponse($response,false);			
	}
	
	/**************************************************************************/
	
	function componentClone($postId,$componentId)
	{
		$data=$this->getData($postId);
		
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) return(false);		
		
		$id=$dataComponent['component']['data']['componentId'];

		if(!$this->isComponent($id)) return(false);
		
		$indexLine=$dataComponent['line']['index'];
		$indexColumn=$dataComponent['column']['index'];
		$indexComponent=$dataComponent['component']['index'];
		
		$dataComponentCopy=$dataComponent['component'];
		$dataComponentCopy['data']['id']=PBHelper::createId('component');
		
		$count=count($data['line'][$indexLine]['column'][$indexColumn]['component']);
		
		$data['line'][$indexLine]['column'][$indexColumn]['component'][]=$dataComponentCopy;
		
		$position=$indexComponent+1;
		
		$this->moveComponentInArray($data['line'][$indexLine]['column'][$indexColumn]['component'],$count,$position);
		
		$this->updateData($postId,$data);		
		
		return(array('component'=>$dataComponentCopy,'position'=>$position,'columnId'=>$dataComponent['column']['data']['id']));		
	}
	
	/**************************************************************************/
	
	function componentRemoveAjax()
	{
		$response=array();
		
		list($postId,$componentId)=$this->getRequestValue('postId','componentId');
		
		$b=$this->componentRemove($postId,$componentId);
		if($b===false) $this->createResponse($response);
		
		$response['componentId']=$componentId;
		
		$this->createResponse($response,false);
	}

	/**************************************************************************/
	
	function componentRemove($postId,$componentId)
	{
		$data=$this->getData($postId);
		
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) return(false);		
		
		$lineIndex=$dataComponent['line']['index'];
		$columnIndex=$dataComponent['column']['index'];
		$componentIndex=$dataComponent['component']['index'];
		
		unset($data['line'][$lineIndex]['column'][$columnIndex]['component'][$componentIndex]);
		
		$data['line'][$lineIndex]['column'][$columnIndex]['component']=array_values($data['line'][$lineIndex]['column'][$columnIndex]['component']);
	
		$this->updateData($postId,$data);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function componentAllInColumnRemoveAjax()
	{
		$response=array();
		
		list($postId,$columnId)=$this->getRequestValue('postId','columnId');
		
		$b=$this->componentAllInColumnRemove($postId,$columnId);
		if($b===false) $this->createResponse($response);
		
		$this->createResponse($response,false);		
	}
	
	/**************************************************************************/
	
	function componentAllInColumnRemove($postId,$columnId)
	{
		$data=$this->getData($postId);
		
		$dataColumn=$this->getColumn($columnId,$data);
		if($dataColumn===false) return(false);		
		
		$lineIndex=$dataColumn['line']['index'];
		$columnIndex=$dataColumn['column']['index'];
		
		$data['line'][$lineIndex]['column'][$columnIndex]['component']=array();
		
		$this->updateData($postId,$data);
		
		return(true);		
	}
	
	/**************************************************************************/
	
	function componentMoveAjax()
	{
		$response=array();
		
		list($postId,$lineId,$columnId,$componentId,$position)=$this->getRequestValue('postId','lineId','columnId','componentId','position');
		
		$dataComponent=$this->componentMove($postId,$lineId,$columnId,$componentId,$position);
		if($dataComponent===false) $this->createResponse($response);
		
		$response['html']=$this->componentCreateHTML($dataComponent);

		$response['columnId']=$columnId;
		$response['position']=$position;
		
		$this->createResponse($response,false);		
	}
	
	/**************************************************************************/
	
	function componentMove($postId,$lineId,$columnId,$componentId,$position)
	{
		$data=$this->getData($postId);
		
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) return(false);	
		
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine===false) return(false);	
		
		$dataColumn=$this->getColumn($columnId,$data);
		if($dataColumn===false) return(false);	
		
		$indexLine=$dataComponent['line']['index'];
		$indexColumn=$dataComponent['column']['index'];
		$indexComponent=$dataComponent['component']['index'];
		
		unset($data['line'][$indexLine]['column'][$indexColumn]['component'][$indexComponent]);
		
		$data['line'][$indexLine]['column'][$indexColumn]['component']=array_values($data['line'][$indexLine]['column'][$indexColumn]['component']);
		
		$indexLine=$dataLine['line']['index'];
		$indexColumn=$dataColumn['column']['index'];	
		
		$count=count($data['line'][$indexLine]['column'][$indexColumn]['component']);
		
		$data['line'][$indexLine]['column'][$indexColumn]['component'][]=$dataComponent['component'];
		
		$this->moveComponentInArray($data['line'][$indexLine]['column'][$indexColumn]['component'],$count,$position);
		
		$this->updateData($postId,$data);
		
		return($dataComponent['component']);		
	}
	
	/**************************************************************************/
	
	function componentEditAjax()
	{
		$response=array();
		
		list($postId,$componentId)=$this->getRequestValue('postId','componentId');
		
		$data=$this->getData($postId);
		
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) $this->createResponse($response);		
		
		$id=$dataComponent['component']['data']['componentId'];

		if(!$this->isComponent($id)) $this->createResponse($response);		

		$Form=new PBForm($id,$this->componentData[$id],$dataComponent['component']['value']);
		
		$response['html']=$Form->create();
		$response['componentId']=$componentId;
		
		$response['window']=$this->componentData[$id]['structure']['window'];

		$this->createResponse($response,false);	
	}
	
	/**************************************************************************/

	function componentShortcodeEditAjax()
	{
		$response=array();
		
		list($componentId)=$this->getRequestValue('componentId');

		if(!$this->isComponent($componentId)) $this->createResponse($response);		

		$Form=new PBForm($componentId,$this->componentData[$componentId],array(),2);
		
		$response['html']=$Form->create();
		$response['componentId']=$componentId;
		
		$response['window']=$this->componentData[$componentId]['structure']['window'];

		$this->createResponse($response,false);			
	}
	
	/**************************************************************************/
	
	function componentSaveAjax()
	{
		$response=array();
		
		list($postId,$componentId,$form)=$this->getRequestValue('postId','componentId','form');
		
		$data=$this->getData($postId);
		
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) $this->createResponse($response);
		
		$id=$dataComponent['component']['data']['componentId'];
		
		if(!$this->isComponent($id)) $this->createResponse($response);	

		$request=array();
		
		parse_str($form,$request);
		
		$b=$this->componentSave($postId,$componentId,$request);
		if($b===false) $this->createResponse($response);
		
		$data=$this->getData($postId);
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) $this->createResponse($response);		
		
		$response['componentId']=$componentId;
		$response['description']=$this->getComponentDescription($dataComponent['component']['value']['component_description']);
		
		$this->createResponse($response,false);		
	}
	
	/**************************************************************************/
	
	function componentSave($postId,$componentId,$request)
	{
		$data=$this->getData($postId);
		
		$dataComponent=$this->getComponent($componentId,$data);
		if($dataComponent===false) return(false);

		$id=$dataComponent['component']['data']['componentId'];
		
		$value=array();
		
		foreach($this->componentData[$id]['structure']['element'] as $elementData)
		{
			$name=$elementData['id'];
			
			if(!array_key_exists($name,$request)) continue;
			
			if(in_array($elementData['ui']['element']['type'],array('select-one','radio','checkbox','choice-1','choice-2')))
			{
				if($request[$name]==-1)
					$request[$name]=null;
			}
			
			if(is_array($request[$name]))
			{
				$value[$name]=$request[$name];
			}
			else $value[$name]=$request[$name];
		}
		
		PBHelper::formatNewLine($value);
		
		$lineIndex=$dataComponent['line']['index'];
		$columnIndex=$dataComponent['column']['index'];
		$componentIndex=$dataComponent['component']['index'];

		$data['line'][$lineIndex]['column'][$columnIndex]['component'][$componentIndex]['value']=$value;

		$this->updateData($postId,$data);		
		
		return(true);
	}
	
	/**************************************************************************/

	function lineCloneAjax()
	{
		$response=array();
		
		list($postId,$lineId)=$this->getRequestValue('postId','lineId');
		
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine==false) $this->createResponse($response);
		
		$dataLineCopy=$this->lineClone($postId,$lineId);
		if($dataLineCopy===false) $this->createResponse($response);
		
		$response['position']=$dataLineCopy['position'];
		$response['html']=$this->lineCreateHTML($dataLineCopy['line']);
		
		$this->createResponse($response,false);		
	}
	
	/**************************************************************************/
	
	function lineClone($postId,$lineId)
	{
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data,true);
		if($dataLine==false) return(false);
		
		$dataLineCopy=$dataLine;
		
		$dataLineCopy['data']['id']=PBHelper::createId('line');
		
		foreach($dataLineCopy['column'] as $columnIndex=>$columnData)
		{
			$dataLineCopy['column'][$columnIndex]['data']['id']=PBHelper::createId('column');
			foreach($columnData['component'] as $componentIndex=>$componentData)
				$dataLineCopy['column'][$columnIndex]['component'][$componentIndex]['data']['id']=PBHelper::createId('component');
		}
		
		$count=count($data['line']);
		
		$data['line'][]=$dataLineCopy;
		
		$position=$this->getLinePosition($lineId,$data)+1;
		
		$this->moveComponentInArray($data['line'],$count,$position);
	
		$this->updateData($postId,$data);		
		
		return(array('line'=>$dataLineCopy,'position'=>$position));
	}
	
	/**************************************************************************/
	
	function lineEditAjax()
	{
		$response=array();
		
		list($postId,$lineId)=$this->getRequestValue('postId','lineId');
		
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine==false) $this->createResponse($response);

		$id='layout';
		
		$Form=new PBForm($id,$this->componentData[$id],$dataLine['line']['data']['property']);
		
		$response['html']=$Form->create();

		$response['lineId']=$lineId;
		$response['window']=$this->componentData[$id]['structure']['window'];
		
		$this->createResponse($response,false);
	}
	
	/**************************************************************************/
	
	function lineEdit()
	{
		
	}
	
	/**************************************************************************/
	
	function lineSaveAjax()
	{
		$response=array();
		
		list($postId,$lineId,$form)=$this->getRequestValue('postId','lineId','form');
		
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine===false) $this->createResponse($response);
		
		$request=array();
		
		parse_str($form,$request);
	
		$b=$this->lineSave($postId,$lineId,$request);
		if($b===false) $this->createResponse($response);
		
		$this->createResponse($response,false);		
	}
	
	/**************************************************************************/
	
	function lineSave($postId,$lineId,$request)
	{
		$data=$this->getData($postId);
		
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine===false) return(false);		
		
		$property=$this->lineProperty;
		
		foreach($this->lineProperty as $index=>$value)
		{
			if(array_key_exists($index,$request))
				$property[$index]=$request[$index];
		}

		$lineIndex=$dataLine['line']['index'];

		$data['line'][$lineIndex]['data']['property']=$property;
		
		$this->updateData($postId,$data);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function componentShortcodeBuildAjax()
	{
		$response=array();
		
		list($componentId)=$this->getRequestValue('componentId');
		
		if(!$this->isComponent($componentId)) 
			$this->createResponse($response,true);
		
		$componentData=array
		(
			'data'=>array
			(
				'componentId'	=>	$componentId
			),
			'value'=>array()
		);
		
		$request=array();
		list($form)=$this->getRequestValue('form');
		
		parse_str($form,$request);

		foreach($this->componentData[$componentId]['structure']['element'] as $data)
		{
			$id=$data['id'];
			if(array_key_exists($id,$request))
				$componentData['value'][$id]=$request[$id];
		}

		$response['componentId']=$componentId;
		$response['shortcode']=$this->buildShortcode($componentData);
		
		$this->createResponse($response,false);			
	}
	
	/**************************************************************************/
	
	function processPageBuilder($argument,$content)
	{
		global $post;

		$id=$post->ID;
		
		$data=$this->getData($id);
		
		if($data['data']['enable']==1)
			$content=do_shortcode($this->processLine($data['line']));
		
		return($content);
	}
	
	/**************************************************************************/
	
	function processLine($line)
	{
		$html=null;
		
		foreach($line as $lineData)
		{
			$value=$lineData['data']['property'];
			
			$value['layout']=$lineData['data']['layout'];
			
			$value['text']=$this->processColumn($lineData['column'],$value['layout']);
			
			$data=array
			(
				'data'				=>	array	
				(
					'id'			=>	PBHelper::createId('pb_line'),
					'componentId'	=>	'layout'
				),
				'value'				=>	$value
			);
			
			$html.=$this->buildShortcode($data);
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	function processColumn($column,$layout)
	{
		$Layout=new PBLayout();
		
		$html=null;
		
		$columnCount=$Layout->getLayoutColumnCount($layout);
		
		for($i=0;$i<$columnCount;$i++)
		{
			$value=array();
			
			$value['text']=$this->processComponent($column[$i]['component']);;

			$data=array
			(
				'data'				=>	array	
				(
					'id'			=>	PBHelper::createId('pb_column'),
					'componentId'	=>	'layout_column'
				),
				'value'				=>	$value
			);
			
			$html.=$this->buildShortcode($data);
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	function processComponent($component)
	{
		$componentHTML=null;

		foreach($component as $componentData)
			$componentHTML.=$this->buildShortcode($componentData);

		return($componentHTML);
	}
	
	/**************************************************************************/
	
	function buildShortcode($component)
	{
		$shortcode=null;
		$shortcodeTree=array();
		
		$componentId=$component['data']['componentId'];
		
		if(!$this->isComponent($componentId)) return($shortcode);
		
		$shortcodeTree[$componentId]=array
		(
			'content'		=>	null,
			'children'		=>	array(),
			'parameter'		=>	array()
		);
		
		foreach($this->componentData[$componentId]['structure']['element'] as $data)
		{
			$value=array_key_exists($data['id'],$component['value']) ? $component['value'][$data['id']] : null;
			$this->composeArrayShortcode($shortcodeTree[$componentId],$data['shortcode']['path'],$data['id'],$value);
		}
		
		return($this->componseStringShortcode($shortcodeTree[$componentId],$componentId,null));
	}
	
	/**************************************************************************/
	
	function composeArrayShortcode(&$tree,$path,$id,$value)
	{
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($path)) return;

		$path=explode('/',$path);
		$pathNext=join('/',array_slice($path,1));
		
		$firstLetter=substr($path[0],0,1);
		if(in_array($firstLetter,array('*','@')))
			$name=substr($path[0],1);
		
		$arrayNext=array
		(
			'content'		=>	null,
			'children'		=>	array(),
			'parameter'		=>	array()
		);
		
		if($firstLetter=='*')
		{
			if(is_array($value))
			{
				$i=0;
				foreach($value as $b)
				{
					if(!array_key_exists($name,$tree['children']))
						$tree['children'][$name]=array();
					if(!array_key_exists($i,$tree['children'][$name]))
						$tree['children'][$name][$i]=$arrayNext;

					$this->composeArrayShortcode($tree['children'][$name][$i],$pathNext,$id,$b);
					$i++;
				}
			}
		}
		elseif($firstLetter=='@')
		{
			if($path[0]=='@content') $tree['content']=$value;
			else
			{
				if(is_array($value)) $value=join(',',$value);
				
				if($Validation->isNotEmpty($value))
				{
					$name=$path[0]=='@param' ? $id : $name;
					$tree['parameter'][$name]=$value;
				}
			}
		}
		else
		{
			$name=$path[0];

			if(!array_key_exists($name,$tree['children']))
				$tree['children'][$name]=$arrayNext;		
			
			$this->composeArrayShortcode($tree['children'][$name],$pathNext,$id,$value);			
		}
	}
	
	/**************************************************************************/
	
	function componseStringShortcode($data,$prefix,$id)
	{
		$parameter=null;
		$shortcode=null;
		
		$Validation=new PBValidation();
		
		$name=$prefix.($Validation->isEmpty($id) ? null : '_'.$id);
		
		foreach($data['parameter'] as $index=>$value)
		{
			$value=is_array($value) ? join(',',$value) : $value;
			
			if($value=='-1') continue;
			
			$parameter.=' '.$index.'="'.esc_attr($value).'"';
		}
		
		$shortcodeBegin='['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.$name.$parameter.']';
		$shortcodeEnd='[/'.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.$name.']';
		
		if(count($data['children']))
		{
			foreach($data['children'] as $aIndex=>$aValue)
			{
				if(PBHelper::isNumericArray($aValue))
				{
					foreach($aValue as $bValue)
						$shortcode.=$this->componseStringShortcode($bValue,$prefix,$aIndex);
				}
				else $shortcode.=$this->componseStringShortcode($aValue,$prefix,$aIndex);
			}
		}
		else $shortcode.=$data['content']; 
		
		$shortcode=$shortcodeBegin.$shortcode.$shortcodeEnd;
		
		return($shortcode);
	}
	
	/**************************************************************************/
	
	function isComponent($id)
	{
		return(array_key_exists($id,$this->componentData));
	}
	
	/**************************************************************************/

	function lineCreateHTML($dataLine)
	{
		$html=null;
		
		$Layout=new PBLayout();
		$columnCount=$Layout->getLayoutColumnCount($dataLine['data']['layout']);
		
		for($i=0;$i<$columnCount;$i++)
		{
			$componentCount=count($dataLine['column'][$i]['component']);
			
			$html.=
			'
				<li class="pb-content-column '.$Layout->getLayoutColumnCSSClass($dataLine['data']['layout'],$i).'" id="'.$dataLine['column'][$i]['data']['id'].'">
				
					<div class="pb-content-column-box">

						<div class="pb-content-column-bar pb-clear-fix">
							<a href="#" class="pb-content-button pb-content-remove-button" title="'.esc_attr__('Remove all components in this column',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
						</div>

						<ul class="pb-reset-list pb-clear-fix">
			';
			
			if($componentCount)
			{
				foreach($dataLine['column'][$i]['component'] as $value)
				{
					$html.=$this->componentCreateHTML($value);
				}
			}
			
			$html.=
			'
						</ul>
						
						<div class="pb-content-column-box-caption" style="display:'.($componentCount ? 'none' : 'block').'">
							<div>'.__('To start creating content,<br/>drag and drop component here',PLUGIN_PAGE_BUILDER_DOMAIN).'</div>
						</div>
						
					</div>

				</li>
			';
		}
		
		$html=
		'
			<li class="pb-content-line" id="'.$dataLine['data']['id'].'">
			
				<div class="pb-content-line-bar pb-clear-fix">
					<a href="#" class="pb-content-button pb-content-remove-button" title="'.esc_attr__('Remove this layout',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
					<a href="#" class="pb-content-button pb-content-edit-button" title="'.esc_attr__('Edit this layout',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
					<a href="#" class="pb-content-button pb-content-clone-button" title="'.esc_attr__('Clone this layout',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
					<a href="#" class="pb-content-button pb-content-move-up-button" title="'.esc_attr__('Move up/down this layout',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
				</div>

				<ul class="pb-content-layout pb-reset-list pb-clear-fix layout-'.$dataLine['data']['layout'].'">
					'.$html.'
				</ul>

			</li>
		';	
		
		return($html);
	}
	
	/**************************************************************************/
	
	function componentCreateHTML($dataComponent)
	{
		PBHelper::removeUIndex($dataComponent['value'],'component_description');
		
		$dataComponent['value']['component_description']=$this->getComponentDescription($dataComponent['value']['component_description']);
		
		$html=
		'
			<li class="pb-component pb-component-target pb-clear-fix" id="'.$dataComponent['data']['id'].'">
				<div class="pb-component-inner">
					<div class="pb-component-bar">
						<a href="#" class="pb-content-button pb-content-remove-button" title="'.esc_attr__('Remove this component',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
						<a href="#" class="pb-content-button pb-content-edit-button" title="'.esc_attr__('Edit this component',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
						<a href="#" class="pb-content-button pb-content-clone-button" title="'.esc_attr__('Clone this component',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
					</div>
					<div class="pb-component-icon pb-component-icon pb-component-icon-'.$dataComponent['data']['componentId'].'"></div>
					<div class="pb-component-header">'.$this->componentData[$dataComponent['data']['componentId']]['name'].'</div>
					<div class="pb-component-subheader">'.esc_html($dataComponent['value']['component_description']).'</div>
				</div>
			</li>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function getTinyMCEShortcodeListData()
	{
		$response=array();
		
		$response['component']=array();
		$response['title']=__('Select shortcode',PLUGIN_PAGE_BUILDER_DOMAIN);
		
		foreach($this->componentData as $index=>$value)
		{
			PBHelper::removeUIndex($value,'visibility');
			
			if($this->getComponentVisibility($value['visibility'],2))
				$response['component'][]=array('text'=>$value['name'],'value'=>$index);
		}
		
		return(json_encode($response));
	}
	
	/**************************************************************************/
	
	function createResponse($data,$error=true)
	{
		$data['error']=$error;
		echo json_encode($data);
		exit;
	}
	
	/**************************************************************************/
	
	function getRequestValue()
	{
		$value=array();
		$name=func_get_args();

		foreach($name as $key)
			$value[]=array_key_exists($key,$_POST) ? stripslashes($_POST[$key]) : null;
		
		return($value);
	}

	/**************************************************************************/
	
	function moveComponentInArray(&$array,$a,$b) 
	{
		$out=array_splice($array,$a,1);
		array_splice($array,$b,0,$out);
	}
	
	/**************************************************************************/
	
	function getComponent($componentId,$data,$complete=false)
	{
		foreach($data['line'] as $lineIndex=>$line)
		{
			foreach($line['column'] as $columnIndex=>$column)
			{
				foreach($column['component'] as $componentIndex=>$component)
				{
					if($component['data']['id']==$componentId)
					{
						if($complete) return($component);
						
						return(array
						(
							'line'		=>	array('index'=>$lineIndex,'data'=>$line['data']),
							'column'	=>	array('index'=>$columnIndex,'data'=>$column['data']),
							'component'	=>	array('index'=>$componentIndex,'data'=>$component['data'],'value'=>$component['value']),
						));
					}
				}
			}
		}
		
		return(false);
	}

	/**************************************************************************/
	
	function getLinePosition($lineId,$data)
	{
		$dataLine=$this->getLine($lineId,$data);
		if($dataLine===false) return(false);
		
		return($dataLine['line']['index']);
	}
	
	/**************************************************************************/
	
	function getLine($lineId,$data,$complete=false)
	{
		foreach($data['line'] as $lineIndex=>$line)
		{
			if($line['data']['id']==$lineId)
			{
				if($complete) return($line);
				
				return(array
				(
					'line'		=>	array('index'=>$lineIndex,'data'=>$line['data']),
				));
			}
		}
	}
	
	/**************************************************************************/
	
	function getColumn($columnId,$data)
	{
		foreach($data['line'] as $lineIndex=>$line)
		{
			foreach($line['column'] as $columnIndex=>$column)
			{
				if($column['data']['id']==$columnId)
				{
					return(array
					(
						'line'		=>	array('index'=>$lineIndex,'data'=>$line['data']),
						'column'	=>	array('index'=>$columnIndex,'data'=>$column['data']),
					));
				}				
			}
		}		
	}

	/**************************************************************************/
	
	function bodyClassAdd($class) 
	{
		$class[]='pb';
		return($class);
	}
	
	/**************************************************************************/
	
	function mediaLibraryAdd($form_fields,$post)
	{
		$option=PBMeta::get($post);
		
		if(PBData::get('media_library_url_field_enable'))
		{
			PBHelper::removeUIndex($option,'media_library_url');
			
			$form_fields['media_library_url']=array
			(
				'label'		=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
				'input'		=>	'text',
				'value'		=>	$option['media_library_url'],
				'helps'		=>	__('URL of the page which has to be opened when user has clicked on image',PLUGIN_PAGE_BUILDER_DOMAIN),
			);			
		}
		
		if(PBData::get('media_library_video_url_field_enable'))
		{
			PBHelper::removeUIndex($option,'media_library_video_url');
		
			$form_fields['media_library_video_url']=array
			(
				'label'		=>	__('Video URL',PLUGIN_PAGE_BUILDER_DOMAIN),
				'input'		=>	'text',
				'value'		=>	$option['media_library_video_url'],
				'helps'		=>	__('URL of the video. Supported services: youtube.com, vimeo.com, dailymotion.com, metacafe.com',PLUGIN_PAGE_BUILDER_DOMAIN)
			);
		}
		
		
		return($form_fields);		
	}
	
	/**************************************************************************/
	
	function mediaLibrarySave($post,$attachment)
	{
		$option=array();
		$enable=false;
		
		if(PBData::get('media_library_url_field_enable'))
		{
			$enable=true;
			if(isset($attachment['media_library_url']))
				$option['media_library_url']=$attachment['media_library_url'];
		}
		
		if(PBData::get('media_library_video_url_field_enable'))
		{
			$enable=true;
			if(isset($attachment['media_library_video_url']))
				$option['media_library_video_url']=$attachment['media_library_video_url'];
		}
		
		if($enable) PBMeta::update($post['ID'],$option);
		
		return($post);
	}
	
	/**************************************************************************/
	
	function getComponentDescription($description)
	{
		$Validation=new PBValidation();
			
		if($Validation->isEmpty($description)) $description=__('no description',PLUGIN_PAGE_BUILDER_DOMAIN);	
			
		return($description);
	}
	
	/**************************************************************************/
	
	function getComponentVisibility($visibility,$source=-1)
	{
		if(!in_array($visibility,array(1,2,3))) $visibility=3;
		if(!in_array($source,array(1,2))) $source=1;
		
		if($visibility==3) return(true);	
		
		if(array_key_exists('source',$_POST))
		{
			if(in_array($_POST['source'],array(1,2)))
				$source=$_POST['source'];
		}
		
		if($visibility==$source) return(true);
		
		return(false);		
	}
	
	/**************************************************************************/
	
	function createCSSFile()
	{
		$content=null;
		$component=PBData::get('component');
		
		$Validation=new PBValidation();
		
		foreach($component as $componentName=>$componentData)
		{
			$className='PBComponent'.$this->formatName($componentName);
			
			$Component=new $className;		
			
			if(method_exists($Component,'createCSS'))
			{
				$Component->createCSS();
				
				$css=PBComponentData::get($componentName,'css');
				if($Validation->isNotEmpty($css)) $content.=$css."\n\n";
			}
		}

		$file=PBData::get('theme_path_multisite_style').'PB.Frontend.css';
		
		$WPFileSystem=new PBWPFileSystem();
		if($WPFileSystem->put_contents($file,$content,0755)===false) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function adminNotice()
	{
		$file=array(PBData::get('theme_path_multisite_style').'PB.Frontend.css');
		foreach($file as $path)
		{
			if(!is_writable($path))
			{
				echo 
				'
					<div class="error">
						<p>'.sprintf(__('<b>File %s cannot be created. Please make sure that this location is writable.</b>',PLUGIN_PAGE_BUILDER_DOMAIN),str_replace('\\','/',$path)).'</p>
					</div>				
				';				
			}
		}
	}
	
	/**************************************************************************/
	
	function isVisualModeEnable()
	{
		return((bool)PBData::get('visual_mode'));
	}
	
	/**************************************************************************/
}	

/******************************************************************************/
/******************************************************************************/