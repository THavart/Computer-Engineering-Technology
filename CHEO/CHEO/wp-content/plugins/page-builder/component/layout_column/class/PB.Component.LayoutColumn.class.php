<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentLayoutColumn extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->component=array
		(
			'name'																=>	__('Layout column',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays layout column',PLUGIN_PAGE_BUILDER_DOMAIN),
			'visibility'														=>	2,
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Layout column',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
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
					),
					array
					(
						'id'													=>	'text',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN)
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
					)
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/

	function processShortcodeLayoutColumn($attribute,$content,$tag)
	{
		$Layout=new PBLayout();
		
		$attribute=$this->processAttribute($tag,$attribute);

		$index=PBComponentData::get('layout','index');
		$layout=PBComponentData::get('layout','layout');
		
		$class=array('pb-layout-'.$Layout->getLayoutColumnCSSClass($layout,$index),$attribute['css_class']);
		
		$html=
		'
			<li'.PBHelper::createClassAttribute($class).'> 
				<div class="pb-space-line"></div>
				<div>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>
			</li>			
		';
		
		PBComponentData::set('layout','index',$index+1);

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/