<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentSpace extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'space'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->component=array
		(
			'name'																=>	__('Space',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Space',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Space',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'height',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Space height in pixels. Value can be negative.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'30'
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
	
	function processShortcodeSpace($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		
		$Validation=new PBValidation();
		
		if($Validation->isNumber($attribute['height'],-9999,9999))
		{
			if((int)$attribute['height']>=0)
				$style['height']=(int)$attribute['height'].'px';
			else $style['margin-top']=(int)$attribute['height'].'px';
		}
		
		$class=array('pb-space','pb-clear-fix',$attribute['css_class']);
		
		$html='<div'.PBHelper::createClassAttribute(array('pb-space-line')).'></div><div'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'></div>';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/