<?php

/******************************************************************************/
/******************************************************************************/

class TIThemeInstaller
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
				'path'															=>	PLUGIN_THEME_INSTALLER_SCRIPT_URL,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_THEME_INSTALLER_STYLE_URL,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);

		$this->prepareLibrary();
		
		/***/
	
		$this->skin=false;
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
					'path'														=>	'',
					'in_footer'													=>	false,
					'dependencies'												=>	array()
				),
				'jquery-ui-core'												=>	array
				(
					'path'														=>	''
				),
				'jquery-bbq'													=>	array
				(
					'file'														=>	'jquery.bbq.min.js'
				),	
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.js'
				),
				'jquery-blockUI'												=>	array
				(
					'file'														=>	'jquery.blockUI.js'
				),	
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.js'
				),
				'jquery-themeOptionElement'										=>	array
				(
					'file'														=>	'jquery.themeOptionElement.js'
				)
			),
			'style'																=>	array
			(
				'jquery-ui'														=>	array
				(
					'file'														=>	'jquery.ui.min.css'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.css'
				),
				'google-font-open-sans'											=>	array
				(
					'path'														=>	null,
					'file'														=>	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
				),
				'jquery-themeOption'											=>	array
				(
					'file'														=>	'jquery.themeOption.css'
				),
				'jquery-themeOption-rtl'										=>	array
				(
					'inc'														=>	false,
					'file'														=>	'jquery.themeOption.rtl.css'
				),
				'ti-jquery-themeOption-overwrite'								=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css'
				)
			)
		);
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

	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}
	
	/**************************************************************************/
	
	function adminInit()
	{
        $file=get_template_directory().'/config/ti_config.php';
        if(!TIFile::fileExist($file)) return;
        require_once($file);
        
        $file=get_template_directory().'/config/'.$this->getSkin().'/ti_config.php';
        if(!TIFile::fileExist($file)) return;
        include($file);
		
		$className=PLUGIN_THEME_INSTALLER_THEME_CLASS_PREFIX.'ThemeSkin';

		$Skin=new $className;
		$this->skin=$Skin->getSkinDictionary();
		
		$this->includeLibrary(is_rtl(),array(),array('jquery-themeOption-rtl'));
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_theme_page(__('Theme Demo Data Installer',PLUGIN_THEME_INSTALLER_DOMAIN),__('Theme Demo Data Installer',PLUGIN_THEME_INSTALLER_DOMAIN),'edit_theme_options','theme_demo_data_installer_edit',array($this,'adminCreatePanel'));
	}
	
	/**************************************************************************/
	
	function adminCreatePanel()
	{
		global $ti_data;
		
		$addHTML=array(null,null,null,null);
		
		if(in_array('widget_data',$ti_data['import']['option']))
		{
			$addHTML[0]=
			'
				<input type="checkbox" name="data_import[]" id="data_import_2" value="2" checked/>
				<label for="data_import_2">'.esc_html__('Widgets settings',PLUGIN_THEME_INSTALLER_DOMAIN).'</label>				
			';
		}
		
		if(in_array('content_data',$ti_data['import']['option']))
		{
			$addHTML[1]=
			'
				<input type="checkbox" name="data_import[]" id="data_import_1" value="1" checked/>
				<label for="data_import_1">'.esc_html__('Dummy content',PLUGIN_THEME_INSTALLER_DOMAIN).'</label>		
			';
		}
		
		if(in_array('theme_option',$ti_data['import']['option']))
		{
			$addHTML[2]=
			'
				<input type="checkbox" name="data_import[]" id="data_import_3" value="3" checked/>
				<label for="data_import_3">'.esc_html__('Theme options',PLUGIN_THEME_INSTALLER_DOMAIN).'</label>		
			';
		}
		
		foreach($this->skin['skin'] as $skinIndex=>$skinData)
		{
			$addHTML[3].=
			'
				<input type="radio" name="skin_import" id="skin_import_'.$skinIndex.'" value="'.$skinIndex.'" '.($skinIndex==1 ? 'checked' : null).'/>
				<label for="skin_import_'.$skinIndex.'">'.esc_html($skinData['name']).'</label>		
			';
		}

		$html=
		'
			<div id="to" class="to to-ti">

				<div id="to_notice"></div>

				<form name="to_form" id="to_form" method="POST" action="#">

					<div class="to-header to-clear-fix">

						<div class="to-header-left">

							<div>
								<h3>QuanticaLabs</h3>
								<h6>'.esc_html__('Theme Demo Data Installer',PLUGIN_THEME_INSTALLER_DOMAIN).'</h6>
							</div>

						</div>

						<div class="to-header-right">

							<div>
								<h3>'.esc_html__('Theme Demo Data Installer',PLUGIN_THEME_INSTALLER_DOMAIN).'</h3>
								<h6>'.sprintf(esc_html__('WordPress Plugin ver. %s',PLUGIN_THEME_INSTALLER_DOMAIN),PLUGIN_THEME_INSTALLER_VERSION).'</h6>&nbsp;&nbsp;
							</div>

							<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

						</div>

					</div>

					<div class="to-content to-clear-fix">

						<div class="to-content-left">

							<ul class="to-menu" id="to_menu">
								
								<li>
									<a href="#information">'.esc_html__('Information',PLUGIN_THEME_INSTALLER_DOMAIN).'<span></span></a>
									<a href="#install_demo_data">'.esc_html__('Install demo data',PLUGIN_THEME_INSTALLER_DOMAIN).'<span></span></a>
								</li>

							</ul>

						</div>

						<div class="to-content-right" id="to_panel">
						
							<div id="information">
							
								<div class="to-plugin-description">
									'.__('This simple plugin allows to import dummy content (posts, pages, images etc.), widget settings and theme options.',PLUGIN_THEME_INSTALLER_DOMAIN).'<br/>
									'.__('You should run this plugin only once. For each of the next time, plugin will be creating the same content.',PLUGIN_THEME_INSTALLER_DOMAIN).'<br/>
									'.__('This plugin works best with fresh WordPress instance and should be used only in this way.',PLUGIN_THEME_INSTALLER_DOMAIN).'<br/>
									'.__('This operation takes a few minutes. This operation is not reversable.',PLUGIN_THEME_INSTALLER_DOMAIN).'<br/>
									'.__('When you try to install sample data the second time, please reset your WordPress using this plugin: <a href="https://wordpress.org/plugins/wordpress-reset/" target="_blank">WordPress Reset</a>.',PLUGIN_THEME_INSTALLER_DOMAIN).'
								</div>
								
							</div>
							
							<div id="install_demo_data">	
							
								<ul class="to-form-field-list">

									<li>
										<h5>'.esc_html__('Data to import',PLUGIN_THEME_INSTALLER_DOMAIN).'</h5>
										<span class="to-legend">'.esc_html__('Select which sample data have to be imported.',PLUGIN_THEME_INSTALLER_DOMAIN).'</span>
										<div class="to-radio-button">
											'.join('',array_slice($addHTML,0,3)).'
										</div>			
									</li>

									<li>
										<h5>'.esc_html__('Select skin',PLUGIN_THEME_INSTALLER_DOMAIN).'</h5>
										<span class="to-legend">'
											.esc_html__('Select which skin has to be imported.',PLUGIN_THEME_INSTALLER_DOMAIN).'
											<a href="'.$this->skin['general']['landing_url'].'" target="_blank">'.__('Live preview',PLUGIN_THEME_INSTALLER_DOMAIN).'</a>
										</span>
										<div class="to-radio-button">
											'.$addHTML[3].'
										</div>
									</li>	

								</ul>
								
								<input type="submit" value="'.esc_attr__('Install demo data',PLUGIN_THEME_INSTALLER_DOMAIN).'" name="Submit" id="Submit" class="to-button"/>

							</div>
						
						</div>

					</div>

					<div class="to-footer to-clear-fix">

						<div class="to-footer-left">

							<ul class="to-social-list">
								<li><a href="http://themeforest.net/user/QuanticaLabs?ref=quanticalabs" class="to-social-list-envato" title="Envato"></a></li>
								<li><a href="http://www.facebook.com/QuanticaLabs" class="to-social-list-facebook" title="Facebook"></a></li>
								<li><a href="http://twitter.com/quanticalabs" class="to-social-list-twitter" title="Twitter"></a></li>
								<li><a href="http://quanticalabs.tumblr.com/" class="to-social-list-tumblr" title="Tumblr"></a></li>
							</ul>

						</div>
						
					</div>

					<input type="hidden" name="action" id="action" value="'.PLUGIN_THEME_INSTALLER_CONTEXT.'_install" />

					<script type="text/javascript">
					
						jQuery(document).ready(function($)
						{
							$(\'#to\').themeOption(
							{
								beforeSubmit		:	function() 
								{
									if(confirm(\''.esc_html__('Do you really want to run importer? Please note that this operation is not reversable.',PLUGIN_THEME_INSTALLER_DOMAIN).'\')) return(true);
									return(false);
								},
								ajaxError			:
								{
									enable			:	true,
									text			:	
									{
										header		:	\''.esc_html__('Error',PLUGIN_THEME_INSTALLER_DOMAIN).'\',
										subheader	:	\''.esc_html__('Process of importing data cannot be continued. Your server returned HTTP error. More details are below and in browser console.',PLUGIN_THEME_INSTALLER_DOMAIN).'\'
									}
								}
							});
							
							$(\'#to\').themeOptionElement({init:true});
						});

					</script>

				</form>

			</div>	
		';
		
		echo $html;		
	}
	
	/**************************************************************************/

	function installSampleData()
	{
		error_reporting(E_ALL);
		
		ob_start();
		ob_clean();
		
		$this->code=0;
		$this->buffer=null;
		
		$skinImport=1;
		$dataImport=array();
		
		if(array_key_exists('code',$_POST))
			$this->code=(int)$_POST['code'];
		if(array_key_exists('buffer',$_POST))
			$this->buffer=stripslashes($_POST['buffer']);
		if(array_key_exists('data_import',$_POST))
			$dataImport=(array)$_POST['data_import'];
		if(array_key_exists('skin_import',$_POST))
			$skinImport=(int)$_POST['skin_import'];
		
		if(count($dataImport)==0)
			$this->createResponse(__('Please select at least one option of data which need to be imported.',PLUGIN_THEME_INSTALLER_DOMAIN),true);

		if(!array_key_exists($skinImport,$this->skin['skin'])) $skinImport=1;
		
		$this->setSkin($skinImport);
		
		include(get_template_directory().'/config/'.$this->getSkin().'/ti_config.php');
		
		global $ti_data;

		if(!ini_get('safe_mode'))
		{
			set_time_limit(0);
			ini_set('memory_limit','512M');
		}
		
		if(in_array(1,$dataImport))
		{
			/***/
			
			if(array_key_exists('plugin_timetable',$ti_data))
			{
				if($this->checkCode(10000))
				{
					global $wpdb;
					$wpdb->query($ti_data['plugin_timetable']['sql']);
					$this->createResponse(null,false,10001);
				}
			}
			
			/***/
			
			if(array_key_exists('plugin_revslider',$ti_data))
			{
				if(class_exists('RevSlider'))
				{
					if(array_key_exists('path',$ti_data['plugin_revslider']))
					{
						if($this->checkCode(10002))
						{
							$Slider=new RevSlider();
							
							if(is_array($ti_data['plugin_revslider']['path']))
							{
								foreach($ti_data['plugin_revslider']['path'] as $path)
									$Slider->importSliderFromPost(true,true,$path);
							}
							else $Slider->importSliderFromPost(true,true,$ti_data['plugin_revslider']['path']);	
							
							$this->createResponse(null,false,10003);
						}
					}
				}
			}
            
			/***/
			
			if(!defined('WP_LOAD_IMPORTERS'))
				define('WP_LOAD_IMPORTERS',true);

			TIInclude::includeFile(ABSPATH.'wp-admin/includes/import.php');

			$includeClass=array
			(
				array
				(
					'class'	=>	'WP_Import',
					'path'	=>	PLUGIN_THEME_INSTALLER_LIBRARY_PATH.'wordpress-importer.php'				
				)
			);

			foreach($includeClass as $value)
			{
				$r=TIInclude::includeClass($value['path'],array($value['class']));
				if($r!==true) break;
			}

			if($r===false) $this->createResponse(__('Auto import feature couldn\'t be loaded. Please make import manually. You can find import dummy files in folder dummy_content.',PLUGIN_THEME_INSTALLER_DOMAIN));

			foreach($ti_data['value']['dummy_content_file'] as $index=>$value)
			{
				if($this->checkCode(20000+$index))
				{
					$Import=new WP_Import();
					$Import->fetch_attachments=true;
					$Import->import($value['path']);

					$this->createResponse(null,false,20000+$index+1);
				}
			}
			
			/***/
			
			if($this->checkCode(30000))
			{
				if(array_key_exists('meta',$ti_data))
				{
					foreach($ti_data['meta'] as $aIndex=>$aValue)
					{
						switch($aIndex)
						{
							case 'post_menu';

								$post=get_page_by_title($aValue['post_title'],'OBJECT',$aValue['post_type']);
								if(is_null($post)) break;

								$menu=get_term_by('name',$aValue['menu_title'],'nav_menu');
								if($menu===false) break;

								$meta=get_post_meta($post->ID,PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX,true);
								if($meta===false) $meta=array();

								$meta[$aValue['meta_name']]=$menu->term_id;

								update_post_meta($post->ID,PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX,$meta);							

							break;
						}
					}
				}
				$this->createResponse(null,false,40000);
			}
		}
		
		/**********************************************************************/
	
		if($this->checkCode(40000))
		{
			if(in_array(2,$dataImport))
			{
				if(array_key_exists('widget_settings_file',$ti_data['value']))
				{
					foreach($ti_data['value']['widget_settings_file'] as $file)
					{
						$json_data=json_decode(file_get_contents($file['path']),true);

						$sidebars_data=$json_data[0];
						$widget_data=$json_data[1];
						$current_sidebars=get_option('sidebars_widgets');
						$new_widgets=array();

						foreach($sidebars_data as $import_sidebar=>$import_widgets)
						{
							foreach($import_widgets as $import_widget)
							{
								$title=trim(substr($import_widget,0,strrpos($import_widget,'-')));
								$index=trim(substr($import_widget,strrpos($import_widget,'-')+1));
								$current_widget_data=get_option('widget_'.$title);
								$new_widget_name=$this->getNewWidgetName($title,$index);
								$new_index=trim(substr($new_widget_name,strrpos($new_widget_name,'-')+1));

								if(!empty($new_widgets[$title]) && is_array($new_widgets[$title])) 
								{
									while(array_key_exists($new_index,$new_widgets[$title])) 
									{
										$new_index++;
									}
								}
								$current_sidebars[$import_sidebar][]=$title.'-'.$new_index;
								if(array_key_exists($title,$new_widgets)) 
								{
									$new_widgets[$title][$new_index]=$widget_data[$title][$index];
									$multiwidget=$new_widgets[$title]['_multiwidget'];
									unset($new_widgets[$title]['_multiwidget']);
									$new_widgets[$title]['_multiwidget']=$multiwidget;
								} 
								else 
								{
									$current_widget_data[$new_index]=$widget_data[$title][$index];
									$current_multiwidget=array_key_exists('_multiwidget',$current_widget_data) ? $current_widget_data['_multiwidget'] : 0;
									$new_multiwidget=isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
									$multiwidget=($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
									unset($current_widget_data['_multiwidget']);
									$current_widget_data['_multiwidget']=$multiwidget;
									$new_widgets[$title]=$current_widget_data;
								}
							}
						}

						if(isset($new_widgets) && isset($current_sidebars)) 
						{
							update_option('sidebars_widgets',$current_sidebars);
							foreach($new_widgets as $title=>$content) 
							{
								$content=apply_filters('widget_data_import',$content,$title);
								update_option('widget_'.$title,$content);
							}
						}
					}
						
					$menu=get_terms('nav_menu'); 
					foreach($menu as $menuValue)
					{		
						$option=get_option('widget_nav_menu');
						if(is_array($option))
						{
							foreach($option as $optionIndex=>$optionValue)
							{
								if(is_array($optionValue) && array_key_exists('title',$optionValue) && $optionValue['title']==$menuValue->name)
								{
									$option[$optionIndex]['nav_menu']=$menuValue->term_id;
									update_option('widget_nav_menu',$option);
									break;
								}
							}
						}
					}
				}
			}
			$this->createResponse(null,false,50000);
		}

		/**********************************************************************/
		
		if($this->checkCode(50000))
		{
			if(in_array(3,$dataImport))
			{
				$option=array();
				foreach($ti_data as $aIndex=>$aValue)
				{
					foreach($aValue as $bIndex=>$bValue)
					{
						$result=null;

						switch($aIndex)
						{
							case 'path':

								if(array_key_exists('title',$bValue)) $result=get_page_by_title($bValue['title'],'OBJECT',$bValue['postType']);
								if(is_null($result)) break;

								list($result)=wp_get_attachment_image_src($result->ID,'full');						

							break;

							case 'post_id':

								if(array_key_exists('title',$bValue)) $result=get_page_by_title($bValue['title'],'OBJECT',$bValue['postType']);
								if(is_null($result)) break;

								$result=$result->ID;

							break;
							
							case 'widget_area':

								if(array_key_exists('title',$bValue))
									$result=get_page_by_title($bValue['title'],'OBJECT','wa_widget_area');
		
								if(is_null($result)) break;

								$result='wa_'.$result->ID;

							break;

							case 'term_id':

								if(array_key_exists('title',$bValue)) $result=get_term_by('name',$bValue['title'],$bValue['taxonomy']);
								if($result===false)
								{
									$result=null;
									break;
								}

								$result=$result->term_id;

							break;	

							case 'value':

								if(array_key_exists('value',$bValue))
									$result=$bValue['value'];

							break;

							case 'option':

								if($bIndex=='permalink_structure')
								{
									global $wp_rewrite;

									$wp_rewrite->set_permalink_structure($bValue);
									$result=null;
								}
								else $result=$bValue;

							break;						
						}

						if(!is_null($result))
						{
							if(preg_match('/^'.PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_/',$bIndex))
							{
								$key=substr($bIndex,strlen(PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX)+1);
								$option[PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX][$key]=$result;
							}
							else $option['option'][$bIndex]=$result;
						}
					}
				}

				foreach($option as $aIndex=>$aValue)
				{
					switch($aIndex)
					{
						case 'option':

							foreach($aValue as $bIndex=>$bValue)
								update_option($bIndex,$bValue);

						break;

						case PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX:

							if(class_exists(PLUGIN_THEME_INSTALLER_THEME_CLASS_PREFIX.'ThemeOption'))
							{
								$class=PLUGIN_THEME_INSTALLER_THEME_CLASS_PREFIX.'ThemeOption';
								$class::updateOption($option[PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX]);
							}	
							
						break;
					}
				}
				
				if(TIPlugin::isActive('woocommerce/woocommerce.php'))
				{
					$page=get_page_by_title('Shop');
					if(!is_null($page)) update_option('woocommerce_shop_page_id',$page->ID);
					
					$page=get_page_by_title('My Account');
					if(!is_null($page)) update_option('woocommerce_myaccount_page_id',$page->ID);
					
					$page=get_page_by_title('Cart');
					if(!is_null($page)) update_option('woocommerce_cart_page_id',$page->ID);
					
					$page=get_page_by_title('Checkout');
					if(!is_null($page)) update_option('woocommerce_checkout_page_id',$page->ID);
					
					$notice=array_diff(get_option('woocommerce_admin_notices',array()),array('install'));
					update_option('woocommerce_admin_notices',$notice);
					do_action('woocommerce_hide_install_notice');					
				}
			}
            
            $this->createResponse(null,false,60000);
		}
		
		/**********************************************************************/
		
		$page=get_page_by_title('Sample page','OBJECT','page');
		if(!is_null($page)) wp_delete_post($page->ID);
		
		$post=get_page_by_title('Hello world!','OBJECT','post');
		if(!is_null($post)) wp_delete_post($post->ID);		

		$post=get_page_by_title('Contact form 1','OBJECT','wpcf7_contact_form');
		if(!is_null($post)) wp_delete_post($post->ID);	
        
		/**********************************************************************/
		
		if(TIPlugin::isActive('theme-font/theme-font.php'))
		{
			$ThemeFont=new TFThemeFont();
			$ThemeFont->addSkin();
		}
		
		if(TIPlugin::isActive('theme-style/theme-style.php'))
		{
			$ThemeStyle=new TSThemeStyle();
			$ThemeStyle->addSkin();
		}
		
		/**********************************************************************/
        
		if(function_exists('ti_complete')) ti_complete();
		
		/**********************************************************************/
		
		flush_rewrite_rules();
		
		/**********************************************************************/
		
		$this->createResponse(__('Seems,that demo data has been imported. To make sure if this process has been sucessfully completed,please check below content of buffer returned by external applications.',PLUGIN_THEME_INSTALLER_DOMAIN),false);
	}
	
	/**************************************************************************/
	
	function createNotice($message,$error)
	{	
		$Validation=new TIValidation();
		
		$html=null;
		
		if($Validation->isNotEmpty($this->buffer))
		{
			$html=
			'
				<div class="to-buffer-output">
					'.$this->buffer.'
				</div>
			';
		}
		
		$html=
		'
			<div class="to-notice to-notice-'.($error ? 'error' : 'success').'">
				<span></span>
				<h4>'.($error ? esc_html__('Error',PLUGIN_THEME_INSTALLER_DOMAIN) : esc_html__('Success',PLUGIN_THEME_INSTALLER_DOMAIN)).'</h4>
				<h6>'.$message.'</h6>
			</div>
			'.$html.'
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createResponse($message,$error=true,$code=-1)
	{
		$Validation=new TIValidation();
		if($Validation->isNotEmpty($this->buffer)) $this->buffer.="\n\n";
		
		$this->buffer.=ob_get_clean();
		if(ob_get_contents()) ob_end_clean();
		
		$response=array();
		
		$response['code']=$code;
		$response['error']=$error;
		$response['buffer']=$this->buffer;
		$response['global']['notice']=$this->createNotice($message,$error);
		
		echo json_encode($response);
		exit;			
	}
	
	/**************************************************************************/
	
	function checkCode($code)
	{
		if($code>=$this->code) 
		{
			$this->code=$code;
			return(true);
		}
		
		return(false);
	}
	
	/**************************************************************************/
	
	function getNewWidgetName($widget_name,$widget_index) 
	{
		$current_sidebars=get_option( 'sidebars_widgets');
		$all_widget_array=array( );
		foreach($current_sidebars as $sidebar=>$widgets) 
		{
			if (!empty($widgets) && is_array($widgets) && $sidebar!='wp_inactive_widgets') 
			{
				foreach($widgets as $widget) 
				{
					$all_widget_array[]=$widget;
				}
			}
		}
		while (in_array($widget_name.'-'.$widget_index,$all_widget_array)) 
		{
			$widget_index++;
		}
		
		$new_widget_name=$widget_name.'-'.$widget_index;
		return $new_widget_name;
	}
	
	/**************************************************************************/
	
	function setSkin($skinIndex)
	{
		update_option(PLUGIN_THEME_INSTALLER_SKIN_OPTION_NAME,$skinIndex);
	}
	
	/**************************************************************************/
	
	function getSkin()
	{
		return(get_option(PLUGIN_THEME_INSTALLER_SKIN_OPTION_NAME,1));
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/