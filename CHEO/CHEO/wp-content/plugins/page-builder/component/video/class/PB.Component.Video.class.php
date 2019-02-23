<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentVideo extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'video'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->videoType=array
		(
			'vimeo'																=>	array(__('Vimeo video',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'youtube'															=>	array(__('Youtube video',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'metacafe'															=>	array(__('Metacafe video',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'dailymotion'														=>	array(__('Dailymotion video',PLUGIN_PAGE_BUILDER_DOMAIN))
		);	
		
		$this->component=array
		(
			'name'																=>	__('Video',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Video',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Video',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'type',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Video type',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->videoType),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'youtube'
						)
					),
					array
					(
						'id'													=>	'src',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Video source',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL address of video',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
						)
					),	
					array
					(
						'id'													=>	'player_width',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Player width',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Player width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
	
	function processShortcodeVideo($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		
		$Validation=new PBValidation();
		
		$src=$this->parseVideoURL($attribute['src'],$attribute['type']);
		if($src===false) return($html);
		
		$style=array();
		
		if($Validation->isNumber($attribute['player_width'],1,9999))
			$style['width']=(int)$attribute['player_width'].'px';
		
		$class=array
		(
			array
			(
				'pb-video',
				$attribute['css_class']
			),
			array
			(
				'pb-video-content'
			)
		);

		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style).'>
				<div'.PBHelper::createClassAttribute($class[1]).'>
					<iframe src="'.esc_attr($src).'" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function parseVideoURL($url,$type)
	{
		$result=array();
		$resultURL=false;
		
		switch($type)
		{
			case 'youtube':
				if(preg_match('/(youtube\.com|youtu\.be)\/(watch\?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*)).*/i',$url,$result))
					$resultURL='https://www.youtube.com/embed/'.$result[3];
			break;
			case 'vimeo':
				if(preg_match('/(?:vimeo(?:pro)?.com)\/(?:[^\d]+)?(\d+)(?:.*)/',$url,$result))
					$resultURL='http://player.vimeo.com/video/'.$result[1];
			break;	
			case 'metacafe':
				if(preg_match('/metacafe.com\/(?:watch|fplayer)\/([\w\-]{1,10})/',$url,$result))
					$resultURL='http://www.metacafe.com/fplayer/'.$result[1].'/.swf';	
			break;
			case 'dailymotion':
				if(preg_match('/dailymotion.com\/video\/(.*)\/?(.*)/',$url,$result))
					$resultURL='http://www.dailymotion.com/swf/video/'.$result[1];	
			break;
		}
		
		return($resultURL);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/