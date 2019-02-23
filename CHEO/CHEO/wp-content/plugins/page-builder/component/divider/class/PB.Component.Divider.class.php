<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentDivider extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Align=new PBAlign();
		$Border=new PBBorder();
		
		$this->style=array
		(
			'divider'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->component=array
		(
			'name'																=>	__('Divider',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Divider',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Divider',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'line_width',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Line width',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Line width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						)
					),
					array
					(
						'id'													=>	'line_height',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Line height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Line height in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						)
					),
					array
					(
						'id'													=>	'line_style',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Line style',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style),
								)
							)
						)
					),
					array
					(
						'id'													=>	'line_color',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Line color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Line color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'align',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Align',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Align->align),
								)
							)
						)
					),
					array
					(
						'id'													=>	'margin_top',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Top margin',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Top margin in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						)
					),
					array
					(
						'id'													=>	'margin_bottom',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Bottom margin',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Bottom margin in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						)
					),					
					array
					(
						'id'													=>	'css_class',
						'ui'													=>	array
						(
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
		
		parent::__construct();
	}
	
	/**************************************************************************/

	function processShortcodeDivider($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Align=new PBAlign();
		$Border=new PBBorder();
		$Validation=new PBValidation();
		
		$style=array();
		$class=array('pb-divider','pb-clear-fix');
		
		if($Validation->isNumber($attribute['line_width'],0,9999))
			$style['width']=$attribute['line_width'].'px';	
		if($Validation->isNumber($attribute['line_height'],0,9999))
			$style['border-bottom-width']=$attribute['line_height'].'px';
		if(array_key_exists($attribute['line_style'],$Border->style))
			$style['border-style']=$attribute['line_style'];
		if($Validation->isColor($attribute['line_color']))
			$style['border-color']=PBColor::getColor($attribute['line_color']);
		if(array_key_exists($attribute['align'],$Align->align))
			array_push($class,$Align->getCSSClass($attribute['align']));
		if($Validation->isNumber($attribute['margin_top'],0,9999))
			$style['margin-top']=$attribute['margin_top'].'px';
		if($Validation->isNumber($attribute['margin_bottom'],0,9999))
			$style['margin-bottom']=$attribute['margin_bottom'].'px';
		
		array_push($class,$attribute['css_class']);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'></div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/