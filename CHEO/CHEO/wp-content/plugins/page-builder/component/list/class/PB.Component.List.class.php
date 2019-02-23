<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentList extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{		
		$this->style=array
		(
			'list'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'list'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.List.js'
			)
		);	
		
		$element=array();
	
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
		{
			$bullet=(array)PBComponentData::get($this->getComponentId(),'bullet');
			$file=PBFile::scanDir($bullet['path']);
		
			$this->bullet=array
			(
				'url'				=>	$bullet['url'],
				'url_retina'		=>	$bullet['url_retina'],
				'path'				=>	$bullet['path'],
				'file'				=>	array_combine($file,$file),
				'css_class'			=>	$bullet['css_class']
			);
			
			$element=array
			(
					array
					(
						'id'													=>	'bullet',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Bullet',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select bullet of the list element',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->bullet['file']
								)
							)
						)
					)
			);
		}
		else
		{
			$element=array
			(	
					array
					(
						'id'													=>	'font_icon_name',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter name of the icon (you have to enter at least two characters to get best matched set of icons).',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'fa-icon'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'check-square'
						)
					),	
					array
					(
						'id'													=>	'font_icon_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Icon color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'font_icon_size',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Icon size in pixels. Value 0 means that default size will be used.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	0,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	200
								)
							)
						)
					)				
			);			
		}
		
		$this->component=array
		(
			'name'																=>	__('List',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays list',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('List',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'ui'															=>	array
				(
					'panel'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('General',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(

					array
					(
						'id'													=>	'list',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('List',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the list',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'editor'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@content'
						)
					),					
					array
					(
						'id'													=>	'css_class',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('CSS class',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),					
				)
			)
		);	

		foreach($element as $elementValue)
			$this->component['structure']['element'][]=$elementValue;
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		if(PBComponentData::get($this->getComponentId(),'icon_type')!=='gr') return;
		
		$CSS=new PBCSS();

		$key=$retina ? 'url_retina' : 'url';
			
		$codeCurrent=null;
		foreach($this->bullet['file'] as $file)
		{
			$codeCurrent.=$CSS->create(array
			(
				'selector'	=>	array
				(
					$this->bullet['css_class'].' div.pb-list.pb-list-icon-name-'.PBHelper::createHash($file).' ul li'
				),
				'property'	=>	array
				(
					'background-image'	=>	$this->bullet[$key].$file,
				)
			));		
		}
		
		if($retina) $codeCurrent=$CSS->getRetinaMediaQuery($codeCurrent);
		
		$code.=$codeCurrent;
		
		if((PBData::get('retina_ready')==1) && (!$retina))
		{
			$this->createCSS($code,true);
			return;
		}
		
		PBComponentData::set($this->getComponentId(),'css',$code);
	}

	/**************************************************************************/
	
	function processShortcodeList($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Validation=new PBValidation();
		
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
		{
			$classBullet=null;
			if($Validation->isNotEmpty($attribute['bullet']))
				$classBullet='pb-list-icon-name-'.PBHelper::createHash($attribute['bullet']);
			
			$class=array('pb-list','pb-list-icon-type-gr',$classBullet,$attribute['css_class']);
		}
		else
		{
			$class=array('pb-list','pb-list-icon-type-fa',$attribute['css_class']);
		}

		$id=PBHelper::createId('pb_list');
		
		$html='<div'.PBHelper::createClassAttribute($class).' id="'.esc_attr($id).'">'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';
		
		if((PBComponentData::get($this->getComponentId(),'icon_type')==='fa') && ($Validation->isNotEmpty($attribute['font_icon_name'])))
		{
			$option=array();
			
			$option['icon_type']='fa';
			
			if($Validation->isNotEmpty($attribute['font_icon_name']))
				$option['font_icon_name']=$attribute['font_icon_name'];
			if($Validation->isColor($attribute['font_icon_color']))
				$option['font_icon_color']=$attribute['font_icon_color'];
			if($Validation->isNumber($attribute['font_icon_size'],1,200))
				$option['font_icon_size']=$attribute['font_icon_size'];	

			$html.=
			'
				<div class="pb-script-tag">
					<script type="text/javascript">
						jQuery(document).ready(function($)
						{
							$(\'#'.$id.'\').PBList('.json_encode($option).');
						});
					</script>
				</div>
			';
		}

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/