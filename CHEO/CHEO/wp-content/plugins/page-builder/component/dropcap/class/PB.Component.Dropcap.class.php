<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentDropcap extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'dropcap'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);		
		
		$this->component=array
		(
			'name'																=>	__('Dropcap',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays dropcap',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Dropcap',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'dropcap_text',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@content'
						)
					),
					array
					(
						'id'													=>	'font_size',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Font size of first letter',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Font size of first letter in pixels. Font size equal to 0 means that default settings will be used.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),	
					array
					(
						'id'													=>	'font_color',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Text color of first letter',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Text color of first letter in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),				
					array
					(
						'id'													=>	'bg_color',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Background color of first letter',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color of first letter in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
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
	
	function processShortcodeDropcap($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Validation=new PBValidation();

		$style=array();
		$class=array('pb-dropcap','pb-clear-fix',$attribute['css_class']);
		
		if($Validation->isNumber($attribute['font_size'],1,100))		
			$style['font-size']=$attribute['font_size'].'px';
		if($Validation->isColor($attribute['font_color']))		
			$style['color']=PBColor::getColor($attribute['font_color']);		
		if($Validation->isColor($attribute['bg_color']))		
			$style['background-color']=PBColor::getColor($attribute['bg_color']);			
		
		$letter=substr($content,0,1);
		$content=substr($content,1);
		
		$html=
		'
			<p'.PBHelper::createClassAttribute($class).'>
				<span class="pb-dropcap-first-letter" '.PBHelper::createStyleAttribute($style).'>'.$letter.'</span>'
				.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
			</p>
		';
	
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/