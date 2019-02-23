<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentIframe extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'iframe'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);

		$this->component=array
		(
			'name'																=>	__('Iframe',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Iframe',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Iframe',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'src',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL of iframe source',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'width',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Width',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Width of the iframe in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'height',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Height of the iframe in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
	
	function processShortcodeIframe($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($attribute['src'])) return(null);
		
		$style=array(array(),array());
		
		if($Validation->isNumber($attribute['width'],1,9999))
			$style[0]['width']=(int)$attribute['width'].'px';
		if($Validation->isNumber($attribute['height'],1,9999))
		{
			$style[1]['height']=(int)$attribute['height'].'px';
			$style[1]['padding-bottom']='0px';
		}
		
		$class=array
		(
			array
			(
				'pb-iframe',
				$attribute['css_class']
			),
			array
			(
				'pb-iframe-content'
			)
		);
		
		$html='<div'.PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style[0]).'><div'.PBHelper::createClassAttribute($class[1]).PBHelper::createStyleAttribute($style[1]).'><iframe src="'.esc_attr($attribute['src']).'"></iframe></div></div>';
		
		return(PBHelper::formatCode($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/