<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentHeaderSubheader extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Font=new PBFont();
		$Header=new PBHeader();
		
		$this->style=array
		(
			'header-subheader'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->component=array
		(
			'name'																=>	__('Header + Subheader',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays header + subheader',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Header + Subheader',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Header styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Subheader styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'header_content',
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
								'header'										=>	__('Important of the header',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'2',
							'path'												=>	'header/@important'
						)
					),
					array
					(
						'id'													=>	'subheader',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Subheader',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the subheader',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'subheader/@content'
						)
					),
					array
					(
						'id'													=>	'subheader_important',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Important of the subheader',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'6',
							'path'												=>	'subheader/@important'
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
						'id'													=>	'header_font_size',
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
							'path'												=>	'header/@font_size',
							'default'											=>	'0'
						)
					),	
					array
					(
						'id'													=>	'header_font_weight',
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
							'path'												=>	'header/@font_weight',
							'default'											=>	'-1'
						)
					),					
					array
					(
						'id'													=>	'header_font_style',
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
							'path'												=>	'header/@font_style',
							'default'											=>	'-1'
						)
					),
					array
					(
						'id'													=>	'header_font_color',
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
						),
						'shortcode'												=>	array
						(
							'path'												=>	'header/@font_color'
						)
					),
					array
					(
						'id'													=>	'header_line_height',
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
									'maxlength'									=>	5
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'header/@line_height'
						)
					),
					array
					(
						'id'													=>	'subheader_font_size',
						'ui'													=>	array
						(
							'panel'												=>	3,
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
							'path'												=>	'subheader/@font_size',
							'default'											=>	'0'
						)
					),	
					array
					(
						'id'													=>	'subheader_font_weight',
						'ui'													=>	array
						(
							'panel'												=>	3,
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
							'path'												=>	'subheader/@font_weight',
							'default'											=>	'-1'
						)
					),					
					array
					(
						'id'													=>	'subheader_font_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
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
							'path'												=>	'subheader/@font_style',
							'default'											=>	'-1'
						)
					),
					array
					(
						'id'													=>	'subheader_font_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Font color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Font color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'subheader/@font_color'
						)
					),
					array
					(
						'id'													=>	'subheader_line_height',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Line height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Line height in selected unit. E.g: 1em, 2px etc.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'subheader/@line_height'
						)
					)
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeHeaderSubheader($attribute,$content,$tag)
	{
		$Validation=new PBValidation();
		
		$attribute=$this->processAttribute($tag,$attribute);
		
		if(!$Validation->isBool($attribute['underline_enable'])) return;

		$class=array
		(
			array
			(
				'pb-header-subheader',
				$attribute['css_class']
			),
			array
			(
				'pb-header-underline'
			)
		);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).'>
				'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				'.($attribute['underline_enable']==1 ? '<div'.PBHelper::createClassAttribute($class[1]).'></div>' : null).'
			</div>
		';	
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeHeaderSubheaderHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$style=array();
		
		$Font=new PBFont();
		$Header=new PBHeader();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if(!array_key_exists($attribute['important'],$Header->important)) return($html);
		
		if($Validation->isNumber($attribute['font_size'],1,200,true))
			$style['font-size']=$attribute['font_size'].'px';
		if(array_key_exists($attribute['font_weight'],$Font->weight))
			$style['font-weight']=$attribute['font_weight'];
		if(array_key_exists($attribute['font_style'],$Font->style))
			$style['font-style']=$attribute['font_style'];
		if($Validation->isColor($attribute['font_color']))
			$style['color']=PBColor::getColor($attribute['font_color']);
		if($Validation->isNotEmpty($attribute['line_height']))
			$style['line-height']=$attribute['line_height'];		
	
		$class=array 
		(
			array
			(
				'pb-header'
			),
			array
			(
				'pb-header-content'
			)
		);
		
		$html='<h'.(int)$attribute['important'].PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style).'><span'.PBHelper::createClassAttribute($class[1]).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</span></h'.(int)$attribute['important'].'>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeHeaderSubheaderSubheader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$style=array();
		
		$Font=new PBFont();
		$Header=new PBHeader();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if(!array_key_exists($attribute['important'],$Header->important)) return($html);
		
		if($Validation->isNumber($attribute['font_size'],1,200,true))
			$style['font-size']=$attribute['font_size'].'px';
		if(array_key_exists($attribute['font_weight'],$Font->weight))
			$style['font-weight']=$attribute['font_weight'];
		if(array_key_exists($attribute['font_style'],$Font->style))
			$style['font-style']=$attribute['font_style'];
		if($Validation->isColor($attribute['font_color']))
			$style['color']=PBColor::getColor($attribute['font_color']);
		if($Validation->isNotEmpty($attribute['line_height']))
			$style['line-height']=$attribute['line_height'];		
	
		$class=array 
		(
			array
			(
				'pb-subheader'
			),
			array
			(
				'pb-subheader-content'
			)
		);
		
		$html='<h'.(int)$attribute['important'].PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style).'><span'.PBHelper::createClassAttribute($class[1]).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</span></h'.(int)$attribute['important'].'>';
		
		return(PBHelper::formatHTML($html,$content));		
	}
	
	/**************************************************************************/
	
}

/******************************************************************************/
/******************************************************************************/