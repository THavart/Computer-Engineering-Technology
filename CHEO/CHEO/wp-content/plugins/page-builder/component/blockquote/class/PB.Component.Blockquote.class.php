<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentBlockquote extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'blockquote'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);

		$this->component=array
		(
			'name'																=>	__('Blockquote',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays blockquote',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Blockquote',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'author',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Author',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=> array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=> '@content'
						)
					)
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeBlockquote($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);		
		
		$class=array('pb-blockquote',$attribute['css_class']);
		
		if($Validation->isNotEmpty($attribute['author']))
			$html='<div class="pb-blockquote-author">&mdash; '.$attribute['author'].'</div>';
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).'>
				<div class="pb-blockquote-line-top"></div>
				<blockquote>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</blockquote>
				'.$html.'
				<div class="pb-blockquote-line-bottom"></div>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/