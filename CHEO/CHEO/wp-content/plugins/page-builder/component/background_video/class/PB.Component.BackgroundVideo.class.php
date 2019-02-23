<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentBackgroundVideo extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'background-video'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'jquery-vide'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.vide.js'
			),
			'background-video'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.BackgroundVideo.js'
			)
		);
		
		$this->component=array
		(
			'name'																=>	__('Background Video',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Background Video',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Background Video',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Videos',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Video',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Enter URL\'s to the videos in different formats',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),	
				'element'														=>	array
				(
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
						'id'													=>	'loop',
						'ui'													=>	array
						(
							'panel'												=>	1,
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
						'id'													=>	'muted',
						'ui'													=>	array
						(
							'panel'												=>	1,
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
						'id'													=>	'volume',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Volume',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Volume',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	80,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'80'
						)
					),
					
					array
					(
						'id'													=>	'playback_rate',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Playback rate',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Sets the speed of the video playback',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	6
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1.0'
						)
					),	
					array
					(
						'id'													=>	'position',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Position',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Position (x,y) of the video.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'50% 50%'
						)
					),
					array
					(
						'id'													=>	'poster',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Poster',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-image',
							)							
						)
					),	
					array
					(
						'id'													=>	'video_format_webm',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
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
							'panel'												=>	2,
							'group'												=>	1,
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
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Format MP4',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-file',
							)							
						)
					)
				)
			)
		);		
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeBackgroundVideo($attribute,$content,$tag)
	{
		$html=null;
		$option=array();
		
		$Validation=new PBValidation();
		
		$attribute=$this->processAttribute($tag,$attribute);
		
		if(!$Validation->isBool($attribute['loop'])) return($html);
		if(!$Validation->isBool($attribute['muted'])) return($html);
		
		if(!$Validation->isNumber($attribute['volume'],0,100)) return($html);
		if(!$Validation->isFloat($attribute['playback_rate'],-999.99,999.99)) return($html);
		
		if(($Validation->isEmpty($attribute['video_format_webm'])) && ($Validation->isEmpty($attribute['video_format_ogg'])) && ($Validation->isEmpty($attribute['video_format_mp4']))) return($html);

		$key=array
		(
			'loop',
			'muted',
			'poster',
			'volume',
			'position',
			'playback_rate',
			'video_format_mp4',
			'video_format_ogg',
			'video_format_webm'
		);
		
		foreach($key as $value)
			$option[$value]=$attribute[$value];
		
		$html=
		'
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$(\'body\').PBBackgroundVideo('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/