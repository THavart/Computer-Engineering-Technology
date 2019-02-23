<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentHeader extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Font=new PBFont();
		$Header=new PBHeader();
		
		$this->style=array
		(
			'header'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->component=array
		(
			'name'																=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays header',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'header',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the header',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@content'
						)
					),
					array
					(
						'id'													=>	'important',
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
							'default'											=>	'3'
						)
					),
					array
					(
						'id'													=>	'underline_enable',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Underline',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable header underline',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2',
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
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
					array
					(
						'id'													=>	'font_size',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Font size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Font size in pixels. Value 0 means that default size for selected header will be used.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),	
					array
					(
						'id'													=>	'font_weight',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Font weight',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Font->weight),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),					
					array
					(
						'id'													=>	'font_style',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Font style',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Font->style),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),
					array
					(
						'id'													=>	'font_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Font color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Font color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'background_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
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
						'id'													=>	'line_height',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Line height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Line height in selected unit. E.g: 1em, 2px etc.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	10
								)
							)
						)
					),
					array
					(
						'id'													=>	'text_indent',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Text indent',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Text indent in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$style=array();
		
		$Font=new PBFont();
		$Header=new PBHeader();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if(!array_key_exists($attribute['important'],$Header->important)) return($html);
		if(!$Validation->isBool($attribute['underline_enable'])) return($html);
		
		if($Validation->isNumber($attribute['font_size'],1,200,true))
			$style['font-size']=$attribute['font_size'].'px';
		if(isset($attribute['font_weight']))
		{
			if(array_key_exists($attribute['font_weight'],$Font->weight))
				$style['font-weight']=$attribute['font_weight'];
		}
		if(isset($attribute['font_style']))
		{
			if(array_key_exists($attribute['font_style'],$Font->style))
				$style['font-style']=$attribute['font_style'];
		}
		if($Validation->isColor($attribute['font_color']))
			$style['color']=PBColor::getColor($attribute['font_color']);
		if($Validation->isColor($attribute['background_color']))
			$style['background-color']=PBColor::getColor($attribute['background_color']);		
		if($Validation->isNotEmpty($attribute['line_height']))
			$style['line-height']=$attribute['line_height'];		
		if($Validation->isNumber($attribute['text_indent'],0,999))
			$style['text-indent']=$attribute['text_indent'].'px';			

		$class=array 
		(
			array
			(
				'pb-header',
				$attribute['css_class']
			),
			array
			(
				'pb-header-content'
			),
			array
			(
				'pb-header-underline'
			)
		);
		
		$html='<h'.(int)$attribute['important'].PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style).'><span'.PBHelper::createClassAttribute($class[1]).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</span>'.($attribute['underline_enable']==1 ? '<span'.PBHelper::createClassAttribute($class[2]).'></span>' : null).'</h'.(int)$attribute['important'].'>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/