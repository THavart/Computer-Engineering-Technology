<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentText extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->component=array
		(
			'name'																=>	__('Text',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Text box',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Text',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'text',
						'ui'													=>	array
						(
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
							'path'												=> '@content'
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					)
				)
			)
		);

		parent::__construct();	
	}
	
	/**************************************************************************/
	
	function processShortcodeText($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$class=array('pb-text',$attribute['css_class']);
		
		$html='<div'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/