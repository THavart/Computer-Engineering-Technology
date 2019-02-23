<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentBox extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Align=new PBAlign();
		$Border=new PBBorder();
		$Header=new PBheader();
		
		$this->style=array
		(
			'box'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->script=array
		(
			'box'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Box.js'
			)
		);
		
		$this->icon=(array)PBComponentData::get($this->getComponentId(),'icon');
		foreach($this->icon as $index=>$value)
			$this->icon[$index]['file']=PBComponentData::setFile($this->getComponentId(),'icon_feature_'.$index,$value['path']);

		$this->iconPosition=array
		(	
			'top'																=>	array(__('Top',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'right'																=>	array(__('Right',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'bottom'															=>	array(__('Bottom',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'left'																=>	array(__('Left',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->component=array
		(
			'name'																=>	__('Box',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays box',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Box',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						)						
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Border top',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border top properties in order: style, width, color, radius.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Border right',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border right properties in order: style, width, color, radius.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Border bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border bottom properties in order: style, width, color, radius.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Border left',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border left properties in order: style, width, color, radius.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Padding',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Padding of the box in pixels in order: top, right, bottom, left.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						6														=>	array
						(
							'header'											=>	__('Text colors',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Text colors in HEX.',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(
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
					array
					(
						'id'													=>	'header_content',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the header',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
						),
						'shortcode'												=>	array
						(
							'path'												=>	'header/@content'
						)
					),						
					array
					(
						'id'													=>	'header_important',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Importance of the header',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Header->important),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'header_important_default'),
							'path'												=>	'header/@important'
						)
					),
					array
					(
						'id'													=>	'header_align',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Align of the header',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Align->align),
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'header/@align',
							'default'											=>	'left'
						)
					),
					array
					(
						'id'													=>	'text',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=> array
							(
								'type'											=>	'editor'
							)
						),
						'visibility'											=>	1,
						'shortcode'												=>	array
						(
							'path'												=>	'text/@content'
						)
					),
					array
					(
						'id'													=>	'icon_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Enable icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'icon',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->icon[PBComponentData::get($this->getComponentId(),'icon_size_default')]['file'],
									'use_default'								=>	false
								)
							)
						)
					),							
					array
					(
						'id'													=>	'icon_size',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon size',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->icon,'label')
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'icon_size_default')
						)
					),					
					array
					(
						'id'													=>	'icon_position',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon position',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=> PBHelper::extractDictionary($this->iconPosition)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'left'
						)
					),	
					array
					(
						'id'													=>	'icon_background_position',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon background position',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						)
					),						
					array
					(
						'id'													=>	'background_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'border_top_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Style:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style)
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_top_width',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_top_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),					
					array
					(
						'id'													=>	'border_top_radius',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Radius in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),						
					array
					(
						'id'													=>	'border_right_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Style:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style)
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_right_width',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_right_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),					
					array
					(
						'id'													=>	'border_right_radius',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Radius in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),						
					array
					(
						'id'													=>	'border_bottom_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Style:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style)
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_bottom_width',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_bottom_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),					
					array
					(
						'id'													=>	'border_bottom_radius',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Radius in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),						
					array
					(
						'id'													=>	'border_left_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Style:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style)
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_left_width',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),					
					array
					(
						'id'													=>	'border_left_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),					
					array
					(
						'id'													=>	'border_left_radius',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Radius in pixels:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),							
					array
					(
						'id'													=>	'padding_top',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Top:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),						
					array
					(
						'id'													=>	'padding_right',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Right:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),
					array
					(
						'id'													=>	'padding_bottom',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Bottom:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),
					array
					(
						'id'													=>	'padding_left',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Left:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						)
					),
					array
					(
						'id'													=>	'text_color_content',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	6,
							'text'												=>	array
							(
								'label'											=>	__('Content text color:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'text/@text_color'
						)
					),						
					array
					(
						'id'													=>	'text_color_header',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	6,
							'text'												=>	array
							(
								'label'											=>	__('Header text color:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker',
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'header/@text_color'
						)
					),						
					array
					(
						'id'													=>	'text_color_link',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	6,
							'text'												=>	array
							(
								'label'											=>	__('Link text color:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),						
					array
					(
						'id'													=>	'text_color_link_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	6,
							'text'												=>	array
							(
								'label'											=>	__('Link text color on hover:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					)
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		$CSS=new PBCSS();

		$key=$retina ? 'url_retina' : 'url';
			
		$codeCurrent=null;
		foreach($this->icon as $iconSize=>$iconFile)
		{
			foreach($iconFile['file'] as $iconName)
			{
				$codeCurrent.=$CSS->create(array
				(
					'selector'	=>	array
					(
						
						'.pb-box.pb-box-icon.pb-box-icon-size-'.$iconSize.'.pb-box-icon-'.PBHelper::createHash($iconName).'>.pb-box-inner'
					),
					'property'	=>	array
					(
						'background-image'	=>	$this->icon[$iconSize][$key].$iconName,
					)
				));	
			}
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
	
	function processShortcodeBox($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		$option=array();
		
		$style=array(array(),array());
		
		$Border=new PBBorder();
		$Validation=new PBValidation();
		
		/***/
		
		if(!$Validation->isBool($attribute['icon_enable'])) return($html);
		
		if(!array_key_exists($attribute['icon_size'],$this->icon)) return($html);
		if(!array_key_exists($attribute['icon_position'],$this->iconPosition)) return($html);
		
		/***/
		
		if($Validation->isColor($attribute['background_color']))
			$style[0]['background-color']=PBColor::getColor($attribute['background_color']);
		
		if(array_key_exists($attribute['border_top_style'],$Border->style))
			$style[0]['border-top-style']=$attribute['border_top_style'];
		if($Validation->isNumber($attribute['border_top_width'],0,999))
			$style[0]['border-top-width']=$attribute['border_top_width'].'px';	
		if($Validation->isColor($attribute['border_top_color']))
			$style[0]['border-top-color']=PBColor::getColor($attribute['border_top_color']);
		if($Validation->isNumber($attribute['border_top_radius'],0,999))
		{
			$style[0]['-webkit-border-top-left-radius']=$attribute['border_top_radius'].'px';			
			$style[0]['-moz-border-radius-topleft']=$attribute['border_top_radius'].'px';
			$style[0]['border-top-left-radius']=$attribute['border_top_radius'].'px';
		}
		
		if(array_key_exists($attribute['border_right_style'],$Border->style))
			$style[0]['border-right-style']=$attribute['border_right_style'];
		if($Validation->isNumber($attribute['border_right_width'],0,999))
			$style[0]['border-right-width']=$attribute['border_right_width'].'px';	
		if($Validation->isColor($attribute['border_right_color']))
			$style[0]['border-right-color']=PBColor::getColor($attribute['border_right_color']);
		if($Validation->isNumber($attribute['border_right_radius'],0,999))
		{
			$style[0]['-webkit-border-top-right-radius']=$attribute['border_right_radius'].'px';			
			$style[0]['-moz-border-radius-topright']=$attribute['border_right_radius'].'px';
			$style[0]['border-top-right-radius']=$attribute['border_right_radius'].'px';
		}
		
		if(array_key_exists($attribute['border_bottom_style'],$Border->style))
			$style[0]['border-bottom-style']=$attribute['border_bottom_style'];
		if($Validation->isNumber($attribute['border_bottom_width'],0,999))
			$style[0]['border-bottom-width']=$attribute['border_bottom_width'].'px';	
		if($Validation->isColor($attribute['border_bottom_color']))
			$style[0]['border-bottom-color']=PBColor::getColor($attribute['border_bottom_color']);
		if($Validation->isNumber($attribute['border_bottom_radius'],0,999))
		{
			$style[0]['-webkit-border-bottom-right-radius']=$attribute['border_bottom_radius'].'px';			
			$style[0]['-moz-border-radius-bottomright']=$attribute['border_bottom_radius'].'px';
			$style[0]['border-bottom-right-radius']=$attribute['border_bottom_radius'].'px';
		}
		
		if(array_key_exists($attribute['border_left_style'],$Border->style))
			$style[0]['border-left-style']=$attribute['border_left_style'];
		if($Validation->isNumber($attribute['border_left_width'],0,999))
			$style[0]['border-left-width']=$attribute['border_left_width'].'px';	
		if($Validation->isColor($attribute['border_left_color']))
			$style[0]['border-left-color']=PBColor::getColor($attribute['border_left_color']);
		if($Validation->isNumber($attribute['border_left_radius'],0,999))
		{
			$style[0]['-webkit-border-bottom-left-radius']=$attribute['border_left_radius'].'px';			
			$style[0]['-moz-border-radius-bottomleft']=$attribute['border_left_radius'].'px';
			$style[0]['border-bottom-left-radius']=$attribute['border_left_radius'].'px';
		}
		
		if($Validation->isNumber($attribute['padding_top'],0,999))
			$style[0]['padding-top']=$attribute['padding_top'].'px';
		if($Validation->isNumber($attribute['padding_right'],0,999))
			$style[0]['padding-right']=$attribute['padding_right'].'px';
		if($Validation->isNumber($attribute['padding_bottom'],0,999))
			$style[0]['padding-bottom']=$attribute['padding_bottom'].'px';
		if($Validation->isNumber($attribute['padding_left'],0,999))
			$style[0]['padding-left']=$attribute['padding_left'].'px';

		if($Validation->isColor($attribute['text_color_link']))
			$option['out']['color']=PBColor::getColor($attribute['text_color_link']);
		if($Validation->isColor($attribute['text_color_link_hover']))
			$option['in']['color']=PBColor::getColor($attribute['text_color_link_hover']);		
		
		$id=PBHelper::createId('pb_box');
		
		$class[0]=array('pb-box','pb-clear-fix',$attribute['css_class']);
		
		if($attribute['icon_enable']==1)
		{
			array_push($class[0],'pb-box-icon');
			array_push($class[0],'pb-box-icon-size-'.$attribute['icon_size']);
			array_push($class[0],'pb-box-icon-position-'.$attribute['icon_position']);
			array_push($class[0],'pb-box-icon-'.PBHelper::createHash($attribute['icon']));
			
			if($Validation->isNotEmpty($attribute['icon_background_position']))
				$style[1]['background-position']=$attribute['icon_background_position'];
		}
		
		$class[1]=array('pb-box-inner');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style[0]).' id="'.$id.'">
				<div'.PBHelper::createClassAttribute($class[1]).PBHelper::createStyleAttribute($style[1]).'>
				'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$(\'#'.$id.'\').PBBox('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeBoxText($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		$style=array();
		
		$Validation=new PBValidation();
		
		if($Validation->isColor($attribute['text_color']))
			$style['color']=PBColor::getColor($attribute['text_color']);		
		
		$class=array('pb-box-content');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>
		';	

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
	
	function processShortcodeBoxHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		$style=array();
		
		$Align=new PBAlign();
		$Header=new PBHeader();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if(!array_key_exists($attribute['align'],$Align->align)) return($html);
		if(!array_key_exists($attribute['important'],$Header->important)) return($html);
		
		if($Validation->isColor($attribute['text_color']))
			$style['color']=PBColor::getColor($attribute['text_color']);
		
		$class=array('pb-box-header','pb-clear-fix',$Align->getCSSClass($attribute['align']));
		
		$html=
		'
			<h'.$attribute['important'].PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h'.$attribute['important'].'>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/