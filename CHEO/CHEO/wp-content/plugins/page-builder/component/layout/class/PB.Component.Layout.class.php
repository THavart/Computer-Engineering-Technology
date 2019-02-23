<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentLayout extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Border=new PBBorder();
		$Layout=new PBLayout();
		$Easing=new PBEasing();
		$Background=new PBBackground();
		
		$this->script=array
		(
			'layout'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Layout.js'
			)
		);

		$this->component=array
		(
			'name'																=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays layout',PLUGIN_PAGE_BUILDER_DOMAIN),
			'visibility'														=>	2,
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Image',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Video',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Colors',PLUGIN_PAGE_BUILDER_DOMAIN)
						),						
						5														=>	array
						(
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						)							
					),	
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Padding',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Padding of the layout in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Video',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Select video in available format. To display background video, at least one format has to be selected',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Overlay',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Select color and opacity of overlay',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Border top',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border top properties in order: style, width, color',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Border right',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border right properties in order: style, width, color',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						6														=>	array
						(
							'header'											=>	__('Border bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border bottom properties in order: style, width, color',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						7														=>	array
						(
							'header'											=>	__('Border left',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border left properties in order: style, width, color',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'layout_line',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Layout of parent section',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select layout of parent section',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Layout->layoutLine,'name'),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'wide'
						)
					),	
					array
					(
						'id'													=>	'layout',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select layout (number and width of columns)',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Layout->layout,'name'),
								)
							)
						),
						'visibility'											=>	2,
						'shortcode'												=>	array
						(
							'default'											=>	'100'
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'css_group',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('CSS class group name',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Name of the CSS class of related lines',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
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
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'visibility'											=>	2,
						'shortcode'												=>	array
						(
							'path'												=>	'@content'
						)
					),
					array
					(
						'id'													=>	'bg_image',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Background image',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Click on button to select image',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-image',
							)							
						)
					),						
					array
					(
						'id'													=>	'bg_repeat',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Background image repeat',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select type of background repeat',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Background->backgroundRepeat),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'no-repeat'
						)
					),					
					array
					(
						'id'													=>	'bg_position',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Background image position',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter position of the background',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'bg_size_a',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Background image size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Specify the image size. For options "Length" and "Percentage" you have to specify these values in next field.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Background->backgroundSize)
								)
							)
						)
					),	
					array
					(
						'id'													=>	'bg_size_b',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Background image size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Sets the width and height of the background image.',PLUGIN_PAGE_BUILDER_DOMAIN),__('Sets the width and height of the background image in percent of the parent element.',PLUGIN_PAGE_BUILDER_DOMAIN),__('The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto"',PLUGIN_PAGE_BUILDER_DOMAIN))
							)
						)
					),	
					array
					(
						'id'													=>	'bg_parallax_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Enable parallax',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable parallax effect on background image',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'bg_parallax_mobile_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Enable parallax on mobile devices',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable parallax on mobile devices',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'bg_parallax_speed',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Parallax speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Speed of parallax effect',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	30,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	100
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
						'id'													=>	'video_format_webm',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Format WEBM',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-file',
							)							
						)
					),						
					array
					(
						'id'													=>	'video_format_ogg',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Format OGG',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-file',
							)							
						)
					),	
					array
					(
						'id'													=>	'video_format_mp4',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Format MP4',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-file',
							)							
						)
					),	
					array
					(
						'id'													=>	'video_poster',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Poster',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Click on button to select image',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-image',
							)							
						)
					),
					array
					(
						'id'													=>	'video_autoplay',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('If enabled, the video will automatically begin to play back as soon as it can do so without stopping to finish loading the data',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),				
					array
					(
						'id'													=>	'video_loop',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Loop',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('If enabled, upon reaching the end of the video, automatically seek back to the start',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),			
					array
					(
						'id'													=>	'video_muted',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Muted',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('If enabled, the audio will be initially silenced',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'video_control',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Controls',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('If enabled, control buttons (play, mute etc.) will be visible',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),		
					array
					(
						'id'													=>	'video_mobile_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Enable video on mobile devices',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable video on mobile devices',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),							
					array
					(
						'id'													=>	'bg_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'overlay_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Overlay color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'padding_top',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Top',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						)
					),
					array
					(
						'id'													=>	'padding_right',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Right',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						)
					),	
					array
					(
						'id'													=>	'padding_bottom',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						)
					),	
					array
					(
						'id'													=>	'padding_left',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Left',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						)
					),
					array
					(
						'id'													=>	'border_top_style',
						'ui'													=>	array
						(
							'panel'												=>	5,
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
						'id'													=>	'border_top_width',
						'ui'													=>	array
						(
							'panel'												=>	5,
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
						'id'													=>	'border_top_color',
						'ui'													=>	array
						(
							'panel'												=>	5,
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
						'id'													=>	'border_right_style',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	5,
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
							'panel'												=>	5,
							'group'												=>	5,
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
							'panel'												=>	5,
							'group'												=>	5,
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
						'id'													=>	'border_bottom_style',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	6,
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
							'panel'												=>	5,
							'group'												=>	6,
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
							'panel'												=>	5,
							'group'												=>	6,
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
						'id'													=>	'border_left_style',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	7,
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
							'panel'												=>	5,
							'group'												=>	7,
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
							'panel'												=>	5,
							'group'												=>	7,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX:',PLUGIN_PAGE_BUILDER_DOMAIN)
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

	function processShortcodeLayout($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Border=new PBBorder();
		$Layout=new PBLayout();
		$Background=new PBBackground();
		$Validation=new PBValidation();
		
		$style=array();
		$option=array();

		if(!$Layout->isLayout($attribute['layout'])) return;
		if(!$Layout->isLayoutLine($attribute['layout_line'])) return;
		
		if(isset($attribute['bg_parallax_enable']))
		{
			if(!$Validation->isBool($attribute['bg_parallax_enable'])) return;
		}
		if(isset($attribute['bg_parallax_mobile_enable']))
		{	
			if(!$Validation->isBool($attribute['bg_parallax_mobile_enable'])) return;
		}
		if(isset($attribute['bg_parallax_speed']))
		{
			if(!$Validation->isNumber($attribute['bg_parallax_speed'],0,100)) return;
		}
		if(isset($attribute['bg_color']))
		{
			if($Validation->isColor($attribute['bg_color']))
				$style['background-color']=PBColor::getColor($attribute['bg_color']);
		}
		if(isset($attribute['bg_position']))
		{
			if($Validation->isNotEmpty($attribute['bg_position']))
				$style['background-position']=$attribute['bg_position'];		
		}
		if(isset($attribute['bg_repeat']))
		{
			if($Validation->isNotEmpty($attribute['bg_repeat']))
				$style['background-repeat']=$attribute['bg_repeat'];
		}
		if(isset($attribute['bg_image']))
		{
			if($Validation->isNotEmpty($attribute['bg_image']))
				$style['background-image']='url(\''.$attribute['bg_image'].'\')';	
		}
		
		if(isset($attribute['bg_size_a']))
		{
			if($Validation->isNotEmpty($attribute['bg_size_a']))
			{
				if(array_key_exists($attribute['bg_size_a'],$Background->backgroundSize))
				{
					if(in_array($attribute['bg_size_a'],array('length','percentage')))
					{
						if(isset($attribute['bg_size_b']))
						{
							if($Validation->isNotEmpty($attribute['bg_size_b']))
								$style['background-size']=$attribute['bg_size_b'];
						}
					}	
					else $style['background-size']=$attribute['bg_size_a'];
				}
			}
		}
		
		if(isset($attribute['video_loop']))
		{
			if(!$Validation->isBool($attribute['video_loop'])) return;
		}
		
		if(isset($attribute['video_muted']))
		{
			if(!$Validation->isBool($attribute['video_muted'])) return;
		}
		if(isset($attribute['video_autoplay']))
		{
			if(!$Validation->isBool($attribute['video_autoplay'])) return;
		}
		if(isset($attribute['video_control']))
		{
			if(!$Validation->isBool($attribute['video_control'])) return;
		}
		
		if($Validation->isNotEmpty($attribute['padding_top']))
			$style['padding-top']=(int)$attribute['padding_top'].'px';
		if($Validation->isNotEmpty($attribute['padding_right']))
			$style['padding-right']=(int)$attribute['padding_right'].'px';
		if($Validation->isNotEmpty($attribute['padding_bottom']))
			$style['padding-bottom']=(int)$attribute['padding_bottom'].'px';
		if($Validation->isNotEmpty($attribute['padding_left']))
			$style['padding-left']=(int)$attribute['padding_left'].'px';		
		
		if(array_key_exists($attribute['border_top_style'],$Border->style))
			$style['border-top-style']=$attribute['border_top_style'];
		if($Validation->isNumber($attribute['border_top_width'],0,999))
			$style['border-top-width']=$attribute['border_top_width'].'px';	
		if($Validation->isColor($attribute['border_top_color']))
			$style['border-top-color']=PBColor::getColor($attribute['border_top_color']);
		if(array_key_exists($attribute['border_right_style'],$Border->style))
			$style['border-right-style']=$attribute['border_right_style'];
		if($Validation->isNumber($attribute['border_right_width'],0,999))
			$style['border-right-width']=$attribute['border_right_width'].'px';	
		if($Validation->isColor($attribute['border_right_color']))
			$style['border-right-color']=PBColor::getColor($attribute['border_right_color']);
		if(array_key_exists($attribute['border_bottom_style'],$Border->style))
			$style['border-bottom-style']=$attribute['border_bottom_style'];
		if($Validation->isNumber($attribute['border_bottom_width'],0,999))
			$style['border-bottom-width']=$attribute['border_bottom_width'].'px';	
		if($Validation->isColor($attribute['border_bottom_color']))
			$style['border-bottom-color']=PBColor::getColor($attribute['border_bottom_color']);
		if(array_key_exists($attribute['border_left_style'],$Border->style))
			$style['border-left-style']=$attribute['border_left_style'];
		if($Validation->isNumber($attribute['border_left_width'],0,999))
			$style['border-left-width']=$attribute['border_left_width'].'px';	
		if($Validation->isColor($attribute['border_left_color']))
			$style['border-left-color']=PBColor::getColor($attribute['border_left_color']);
		
		/***/
		
		$mobile=0;
		
		$video=0;
		$videoHTML=null;
		
		if((isset($attribute['video_format_webm'])) && (isset($attribute['video_format_ogg'])) && (isset($attribute['video_format_mp4']))) 
		{
			$video=$Validation->isNotEmpty($attribute['video_format_webm']) || $Validation->isNotEmpty($attribute['video_format_ogg']) || $Validation->isNotEmpty($attribute['video_format_mp4']);
		}
		
		if(isset($attribute['video_mobile_enable']))
		{
			if(($video) && ($attribute['video_mobile_enable']!=1))
			{
				PBInclude::includeClass(PLUGIN_PAGE_BUILDER_LIBRARY_PATH.'mobileDetect/Mobile_Detect.php',array('Mobile_Detect'));

				$MobileDetect=new Mobile_Detect();
				$mobile=(int)$MobileDetect->isMobile();

				if($mobile) $video=false;
			}
		}
		
		if($video)
		{
			$sourceHTML=null;
			
			$videoControlHTML=null;
			$videoAttributeHTML=null;
			
			if(isset($attribute['video_format_mp4']))
			{
				if($Validation->isNotEmpty($attribute['video_format_mp4']))
					$sourceHTML.='<source type="video/mp4" src="'.esc_attr($attribute['video_format_mp4']).'" />';
			}
			if(isset($attribute['video_format_webm']))
			{	
				if($Validation->isNotEmpty($attribute['video_format_webm']))
					$sourceHTML.='<source type="video/webm" src="'.esc_attr($attribute['video_format_webm']).'" />';
			}
			if(isset($attribute['video_format_ogg']))
			{
				if($Validation->isNotEmpty($attribute['video_format_ogg']))
					$sourceHTML.='<source type="video/ogg" src="'.esc_attr($attribute['video_format_ogg']).'" />';
			}
			
			if(isset($attribute['video_loop']))
			{
				if($attribute['video_loop']) $videoAttributeHTML.=' loop';
			}
			if(isset($attribute['video_muted']))
			{	
				if($attribute['video_muted']) $videoAttributeHTML.=' muted';
			}
			if(isset($attribute['video_autoplay']))
			{
				if($attribute['video_autoplay']) $videoAttributeHTML.=' autoplay';
			}
			
			if(isset($attribute['video_control']))
			{
				if($attribute['video_control']==1)
				{
					$videoControlHTML=
					'
						<div class="pb-line-video-control">
							<a href="#" class="pb-line-video-control-toggle-play pb-line-video-control-toggle-play-'.(isset($attribute['video_autoplay']) && $attribute['video_autoplay']==1 ? 'on' : 'off').'"></a>
							<a href="#" class="pb-line-video-control-toggle-sound pb-line-video-control-toggle-sound-'.(isset($attribute['video_muted']) && $attribute['video_muted']==1 ? 'off' : 'on').'"></a>
						</div>
					';
				}
			}
			
			$videoHTML=
			'
				<div class="pb-line-video">
					<video preload="auto"'.$videoAttributeHTML.'>
						'.$sourceHTML.'
					</video>
				</div>
				'.$videoControlHTML.'
			';
		}
		
		/***/
		
		$overlay=false;
		$overlayHTML=null;
		if(isset($attribute['overlay_color']))
		{
			if($Validation->isColor($attribute['overlay_color']))
			{
				$overlay=true;
				$overlayHTML='<div class="pb-line-overlay" style="background-color:'.PBColor::getColor($attribute['overlay_color']).'"></div>';
			}
		}
		
		/***/
		
		$class=array
		(
			array('pb-line','pb-clear-fix',$attribute['css_class'],($video || $overlay ? 'pb-line-include-video' : null)),
			array('pb-layout',$Layout->getLayoutCSSClass($attribute['layout']),'pb-reset-list','pb-clear-fix')
		);
			
		if(in_array($attribute['layout_line'],array('boxed')))
			$class[0][]='pb-main';
		if(in_array($attribute['layout_line'],array('boxed','wide','')))
			$class[1][]='pb-main';
				
		$key=array
		(
			'bg_parallax_speed',
			'bg_parallax_enable',
			'bg_parallax_mobile_enable'
		);
		
		foreach($key as $index)
		{
			if(isset($attribute[$index]))
				$option[$index]=$attribute[$index];
		}
		
		$id=PBHelper::createId('pb_line');
			
		$css=esc_attr($attribute['css_group']);
		if($Validation->isNotEmpty($css))
			array_push($class[0],'pb-line-css-group-'.$css);

		PBComponentData::set('layout','index',0);
		PBComponentData::set('layout','layout',$attribute['layout']);
		
		$html=
		'
			<div id="'.$id.'" '.PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style).'>
				'.$videoHTML.'
				'.$overlayHTML.'
				<ul'.PBHelper::createClassAttribute($class[1]).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</ul>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#'.$id.'").PBLayout('.json_encode($option).','.$mobile.');
					});
				</script>
			</div>
		';		
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/