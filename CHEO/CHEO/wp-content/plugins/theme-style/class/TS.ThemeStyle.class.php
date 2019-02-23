<?php

/******************************************************************************/
/******************************************************************************/

class TSThemeStyle
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->includeConfig();
		
		$this->libraryDefault=array
		(
			'script'															=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_THEME_STYLE_SCRIPT_URL,
				'file'															=>	'',
				'in_footer'														=>	true,
				'dependencies'													=>	array('jquery'),
			),
			'style'																=>	array
			(
				'use'															=>	1,
				'inc'															=>	true,
				'path'															=>	PLUGIN_THEME_STYLE_STYLE_URL,
				'file'															=>	'',
				'dependencies'													=>	array()
			)
		);
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
					'file'														=>	'',
					'in_footer'													=>	false,
					'dependencies'												=>	array()
				),
				'jquery-ui-core'												=>	array
				(
					'path'														=>	'',
					'file'														=>	''
				),
				'jquery-bbq'													=>	array
				(
					'file'														=>	'jquery.bbq.min.js'
				),	
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.js'
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
				'jquery-colorpicker'											=>	array
				(
					'file'														=>	'jquery.colorpicker.css'
				),
				'jquery-qtip'													=>	array
				(
					'file'														=>	'jquery.qtip.min.css'
				),
				'google-font-open-sans'											=>	array
				(
					'path'														=>	'',
					'file'														=>	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
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
				'ts-jquery-themeOption-overwrite'								=>	array
				(
					'file'														=>	'jquery.themeOption.overwrite.css'
				),				
				'ts-frontend'													=>	array
				(
					'use'														=>	2,
					'path'														=>	TSData::get('theme_url_multisite_style'),
					'file'														=>	'TS.Frontend.css'
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
		$option=array();
		
		global $ts_rule;
	
		if(!is_array($ts_rule)) return;
		if(!is_array($ts_rule['panel'])) return;
		
		foreach($ts_rule['panel'] as $panelData)
		{
			foreach($panelData as $panelSection)
			{
				foreach($panelSection['field'] as $panelField)
				{
					$value=TSOption::getOption($panelField['id']);
					$option[$panelField['id']]=$value===false ? $panelField['default'] : $value;
				}
			}
		}

		TSOption::updateOption($option);
		
		$this->createCSSFile();
	}
	
	/**************************************************************************/
	
	function pluginDeactivation()
	{

	}

	/**************************************************************************/
	
	function publicInit()
	{
		$this->addLibrary('style',2);
		$this->addLibrary('script',2);		
	}
	
	/**************************************************************************/
	
	function adminInit()
	{		
		$this->includeLibrary(is_rtl(),array(),array('jquery-themeOption-rtl'));
		
		$this->addLibrary('style',1);
		$this->addLibrary('script',1);
	}
	
	/**************************************************************************/
	
	function adminMenuInit()
	{
		add_theme_page(__('Theme Styles',PLUGIN_THEME_STYLE_DOMAIN),__('Theme Styles',PLUGIN_THEME_STYLE_DOMAIN),'edit_theme_options','theme_style_edit',array($this,'adminCreatePanel'));
	}
	
	/**************************************************************************/
	
	function adminCreatePanel()
	{
		$html=null;
		
		global $ts_rule;
		
		$html=
		'
			<div id="to" class="to to-ts">

				<div id="to_notice"></div>

				<form name="to_form" id="to_form" method="POST" action="#">

					<div class="to-header to-clear-fix">

						<div class="to-header-left">

							<div>
								<h3>QuanticaLabs</h3>
								<h6>'.esc_html('Theme Styles').'</h6>
							</div>

						</div>

						<div class="to-header-right">

							<div>
								<h3>'.esc_html__('Theme Styles',PLUGIN_THEME_STYLE_DOMAIN).'</h3>
								<h6>'.sprintf(esc_html__('WordPress Plugin ver. %s',PLUGIN_THEME_STYLE_DOMAIN),PLUGIN_THEME_STYLE_VERSION).'</h6>&nbsp;&nbsp;
							</div>

							<a href="http://quanticalabs.com" class="to-header-right-logo"></a>

						</div>

					</div>

					<div class="to-content to-clear-fix">

						<div class="to-content-left">

							<ul class="to-menu" id="to_menu">
								'.$this->adminCreatePanelMenu($ts_rule['menu']).'
							</ul>

						</div>

						<div class="to-content-right" id="to_panel">
							'.$this->adminCreatePanelPanel().'
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

						<div class="to-footer-right">
							<input type="submit" value="'.esc_attr__('Save changes',PLUGIN_THEME_STYLE_DOMAIN).'" name="Submit" id="Submit" class="to-button"/>
							<input type="button" value="'.esc_attr__('Restore to default',PLUGIN_THEME_STYLE_DOMAIN).'" name="Restore" id="Restore" class="to-button to-margin-right-10"/>
						</div>			

					</div>

					<input type="hidden" name="action" id="action" value="'.PLUGIN_THEME_STYLE_CONTEXT.'_save" />

					<script type="text/javascript">
					
						jQuery(document).ready(function($)
						{
							$(\'#to\').themeOption(
							{
								submitOneField	:	true,
								beforeSubmit	:	function() 
								{
									if($(\'#action\').val()==\''.PLUGIN_THEME_STYLE_CONTEXT.'_restore\')
									{
										if(confirm(\''.esc_html__('Do you really want to restore all colors to default?',PLUGIN_THEME_STYLE_DOMAIN).'\')) return(true);
										
										$(\'#action\').val(\''.PLUGIN_THEME_STYLE_CONTEXT.'_save\');

										return(false);
									}
									else return(true);
								},
								afterSubmit		:	function()
								{
									if($(\'#action\').val()==\''.PLUGIN_THEME_STYLE_CONTEXT.'_restore\') location.reload(true);
								}
							});
							
							$(\'#to\').themeOptionElement({init:true});
							
							$(\'#Restore\').bind(\'click\',function() 
							{
								$(\'#action\').val(\''.PLUGIN_THEME_STYLE_CONTEXT.'_restore\');
								$(\'#to_form\').submit();
							});
						});

					</script>

				</form>

			</div>	
		';
		
		echo $html;
	}

	/**************************************************************************/
	
	function adminCreatePanelMenu($data,$idParent=null)
	{
		$html=null;
		$Validation=new TSValidation();
		
		foreach($data as $value)
		{
			$id=$Validation->isEmpty($idParent) ? $value['id'] : $idParent.'_'.$value['id'];
			
			$html.=
			'
				<li>
					<a href="#'.$id.'">'.$value['label'].'</a>
			';
			
			if(array_key_exists('children',$value))
			{
				$html.=
				'
					<ul>
						'.$this->adminCreatePanelMenu($value['children'],$value['id']).'
					</ul>
				';
			}
			
			$html.=
			'
				</li>
			';
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	function adminCreatePanelPanel()
	{
		$html=null;
		
		global $ts_rule;
		
		$Validaton=new TSValidation();
		foreach($ts_rule['panel'] as $panelId=>$panelData)
		{
			$panelHTML=null;
			
			foreach($panelData as $panelSection)
			{
				$panelFieldHTML=null;
				
				foreach($panelSection['field'] as $panelField)
				{
					$labelHTML=null;
					
					if($Validaton->isNotEmpty($panelField['label']))
					{
						$labelHTML=substr($panelField['label'],-1)==':' ? $panelField['label'] : $panelField['label'].':';
						$labelHTML='<span class="to-legend-field">'.$labelHTML.'</span>';
					}
					
					$panelFieldHTML.=
					'
						<div>
							'.$labelHTML.'
							'.$this->adminCreateField($panelField).'
						</div>
					';
				}
				
				$subheader=$panelSection['description']['subheader'];
				if(substr($panelField['label'],-1)!='.') $subheader.='.';
				
				$panelHTML.=
				'
					<li>
						<h5>'.$panelSection['description']['header'].'</h5>
						<span class="to-legend">'.$subheader.'</span>
						'.$panelFieldHTML.'
					</li>
				';
			}
			
			$panelHTML=
			'
				<div id="'.esc_attr($panelId).'">
					<ul class="to-form-field-list">
						'.$panelHTML.'
					</ul>				
				</div>
			';
			
			$html.=$panelHTML;			
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	function adminCreateField($data)
	{
		$html=null;
		
		TSHelper::removeUIndex($data,'type');
		
		switch($data['type'])
		{
			default:
				
				$html=$this->adminCreateFieldColorPicker($data);
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	
	function adminCreateFieldColorPicker($data)
	{
		$value=TSOption::getOption($data['id']);
	
		$html=
		'
			<input type="text" class="to-color-picker" name="'.esc_attr(PLUGIN_THEME_STYLE_CONTEXT.'_'.$data['id']).'" value="'.esc_attr($value).'" maxlength="11"/>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function adminRestorePanel()
	{
		TSOption::updateOption(array());
		
		$this->pluginActivation();
		
		$response=array('global'=>array('error'=>0),'local'=>array());
		
		$response['global']['notice']=
		'
			<div class="to-notice to-notice-success">
				<span></span>
				<h4>'.__('Success',PLUGIN_THEME_STYLE_DOMAIN).'</h4>
				<h6>'.__('All colors have been restored to default theme values. Redirecting ...',PLUGIN_THEME_STYLE_DOMAIN).'</h6>
			</div>
		';			
		
		echo json_encode($response);
		exit;	
	}
	
	/**************************************************************************/
	
	function adminSavePanel()
	{
		global $ts_rule;
		
		$Validation=new TSValidation();
		
		$option=array();
		$response=array('global'=>array('error'=>1),'local'=>array());
		
		$temp=array();
		
		parse_str(TSHelper::stripslashesPOST($_POST['value']),$temp);
		
		foreach($temp as $index=>$value)
		{
			$index=preg_replace('/^'.PLUGIN_THEME_STYLE_CONTEXT.'_/',null,$index);
			$data[$index]=$value;
		}
		
		foreach($ts_rule['panel'] as $panelData)
		{
			foreach($panelData as $panelSection)
			{
				foreach($panelSection['field'] as $panelField)
				{
					$value=null;
					$name=$panelField['id'];

					if(array_key_exists($name,$data)) $value=$data[$name];
					
					$option[$name]=$value;
			
					switch($panelField['type'])
					{
						default:
							
							if(!$Validation->isColor($value,true))
								$response['local'][]=array(PLUGIN_THEME_STYLE_CONTEXT.'_'.$name,__('Enter valid color in HEX format.',PLUGIN_THEME_STYLE_DOMAIN));
					}
				}
			}
		}
			
		$response['global']['error']=(bool)count($response['local']);
		
		if($response['global']['error'])
		{
			$response['global']['notice']=
			'
				<div class="to-notice to-notice-error">
					<span></span>
					<h4>'.__('Error',PLUGIN_THEME_STYLE_DOMAIN).'</h4>
					<h6>'.__('Changes can not be saved.',PLUGIN_THEME_STYLE_DOMAIN).'</h6>
				</div>
			';
		}
		else
		{
			$response['global']['notice']=
			'
				<div class="to-notice to-notice-success">
					<span></span>
					<h4>'.__('Success',PLUGIN_THEME_STYLE_DOMAIN).'</h4>
					<h6>'.__('All changes have been saved.',PLUGIN_THEME_STYLE_DOMAIN).'</h6>
				</div>
			';		
			
			TSOption::updateOption($option);
			
			$this->createCSSFile();
		}

		echo json_encode($response);
		exit;		
	}
	
	/**************************************************************************/
	
	function addSkin()
	{
		TSOption::updateOption(array());
		$this->includeConfig();
		$this->pluginActivation();		
	}
	
	/**************************************************************************/
	
	function createCSSFile()
	{	
		global $ts_rule;
		
		$Validation=new TSValidation();
		
		if(!is_array($ts_rule)) return(false);
		
		$content=null;
		$CSS=new TSCSS();

		foreach($ts_rule['panel'] as $panelData)
		{
			foreach($panelData as $panelSection)
			{
				foreach($panelSection['field'] as $panelField)
				{
					$property=array();
					
					$value=TSOption::getOption($panelField['id']);
					$property[$panelField['type']]=$value;

					if($Validation->isNotEmpty($value))
					{
						if(array_key_exists('additionalRule',$panelField))
							$property=$property+$panelField['additionalRule'];
					}
					
					if(count($panelField['selector']))
					{
						$content.=$CSS->create(array
						(
							'selector'	=>	$panelField['selector'],
							'property'	=>	$property
						));
					}

					if(array_key_exists('customCSS',$panelField))
                    {        
                        $value=TSOption::getOption($panelField['id']);
                        if($Validation->isNotEmpty($value))
                            $content.=preg_replace('/__VALUE__/',TSColor::getColor($value),$panelField['customCSS']);
                    }
				}
			}
		}

		$file=TSData::get('theme_path_multisite_style').'TS.Frontend.css';
		
		$WPFileSystem=new TSWPFileSystem();
		if($WPFileSystem->put_contents($file,$content,0755)===false) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function adminNotice()
	{
		$file=array(TSData::get('theme_path_multisite_style').'TS.Frontend.css');
		foreach($file as $path)
		{
			if(!is_writable($path))
			{
				echo 
				'
					<div class="error">
						<p>'.sprintf(__('<b>File %s cannot be created. Please make sure that this location is writable.</b>',PLUGIN_THEME_STYLE_DOMAIN),str_replace('\\','/',$path)).'</p>
					</div>				
				';				
			}
		}
	}
	
	/**************************************************************************/
	
	function setSkin($skinIndex)
	{
		update_option(PLUGIN_THEME_STYLE_SKIN_OPTION_NAME,$skinIndex);
	}
	
	/**************************************************************************/
	
	function getSkin()
	{
        if(defined('PLUGIN_THEME_STYLE_SKIN_OPTION_NAME'))
            return(get_option(PLUGIN_THEME_STYLE_SKIN_OPTION_NAME,1));
	}
	
	/**************************************************************************/
	
	function includeConfig()
	{
        $file=get_template_directory().'/config/ts_config.php';
        if(TSFile::fileExist($file)) require_once($file);
        
        $file=get_template_directory().'/config/'.$this->getSkin().'/ts_config.php';
        if(TSFile::fileExist($file)) include($file);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/