<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentAudio extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'audio'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)	
		);
		
		$this->script=array
		(
			'audio'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Audio.js',
				'dependencies'													=>	array('jquery'),
			),
			'jplayer'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.jplayer.min.js',
				'dependencies'													=>	array('jquery'),
			),
			'jplayer-playlist'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jplayer.playlist.min.js',
				'dependencies'													=>	array('jquery'),
			)			
		);
		
		$this->component=array
		(
			'name'																=>	__('Audio',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Audio',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Audio',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Tracks',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Track',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'volume',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Volume',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Defines the initial volume as a value.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	80,
								'option'										=>	array
								(
									'min'										=>	1,
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
						'id'													=>	'muted',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Muted',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the sound has to be muted by default',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-1'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'autoplay',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable autoplay',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-1'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'playlist_enable',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Enable playlist',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the playlist has to be visible',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-1'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'track_artist',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Artist',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Artist of the track',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'track/*track_item/track_item_artist/@content'
						)
					),
					array
					(
						'id'													=>	'track_title',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Title',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Title of the track',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'track/*track_item/track_item_title/@content'
						)
					),	
					array
					(
						'id'													=>	'track_url_mp3',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('MP3',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL of MP3 file',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'track/*track_item/@format_mp3'
						)
					),
					array
					(
						'id'													=>	'track_url_ogg',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('OGG',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL of OGG file',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'track/*track_item/@format_ogg'
						)
					)	
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeAudio($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$option=array();
		
		$this->track=array();
		$this->trackIndex=0;
		
		$Validation=new PBValidation();

		if($Validation->isEmpty($content)) return($html);
		
		if(!$Validation->isNumber($attribute['volume'],0,100)) return($html);
		
		if(!$Validation->isBool($attribute['muted'])) return($html);
		if(!$Validation->isBool($attribute['autoplay'])) return($html);
		if(!$Validation->isBool($attribute['playlist_enable'])) return($html);
		
		$attribute['volume']/=100;
		
		$key=array
		(
			'muted',
			'volume',
			'autoplay',
			'playlist_enable'
		);
		
		foreach($key as $value)
			$option[$value]=$attribute[$value];
		
		$id=PBHelper::createId('audio');
		$idPlayer=PBHelper::createId('audio_player');
		$idPlayerContainer=PBHelper::createId('audio_player_container');
		
		do_shortcode($content);
		
		if(!count($this->track)) return($html);
	
		$html.=$this->createJPlayerTemplate($id,$idPlayer,$idPlayerContainer);
		
		$html.=
		'
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBAudio('.json_encode(array('idPlayer'=>$idPlayer,'idPlayerContainer'=>$idPlayerContainer)).','.json_encode($option).','.json_encode($this->track).');
					});
				</script>
			</div>		
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function processShortcodeAudioTrack($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		do_shortcode($content);
	}
	
	/**************************************************************************/
	
	function processShortcodeAudioTrackItem($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$this->track[$this->trackIndex]=array
		(
			'mp3'		=>	$attribute['format_mp3'],
			'oga'		=>	$attribute['format_ogg']
		);
				
		do_shortcode($content);
		
		$this->trackIndex++;
	}
	
	/**************************************************************************/
	
	function processShortcodeAudioTrackItemTitle($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		$this->track[$this->trackIndex]['title']=$content;
	}
	
	/**************************************************************************/
	
	function processShortcodeAudioTrackItemArtist($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		$this->track[$this->trackIndex]['artist']=$content;
	}	
	
	/**************************************************************************/
	
	function createJPlayerTemplate($id,$idPlayer,$idPlayerContainer)
	{
		$html=
		'
			<div id="'.esc_attr($id).'" class="pb-audio">
				<div id="'.esc_attr($idPlayer).'" class="jp-jplayer"></div>
				<div id="'.esc_attr($idPlayerContainer).'" class="jp-audio">
					<div class="jp-type-playlist">
						<div class="jp-gui jp-interface">
							<div class="jp-controls-1">
								<a href="javascript:;" class="jp-play" tabindex="1" title="'.__('Play',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
								<a href="javascript:;" class="jp-pause" tabindex="1" title="'.__('Pause',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
							</div>
							<div class="jp-current-time"></div>
							<div class="jp-progress-box">
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
							</div>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>							
							<div class="jp-controls-2">
								<a href="javascript:;" class="jp-mute" tabindex="1" title="'.__('Mute',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
								<a href="javascript:;" class="jp-unmute" tabindex="1" title="'.__('Unmute',PLUGIN_PAGE_BUILDER_DOMAIN).'"></a>
							</div>
							<div class="jp-duration"></div>
						</div>
						<div class="jp-playlist">
							<ul>
								<li></li>
							</ul>
						</div>
						<div class="jp-no-solution">
							<span>'.__('Update Required',PLUGIN_PAGE_BUILDER_DOMAIN).'</span>
							'.__('To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.',PLUGIN_PAGE_BUILDER_DOMAIN).'
						</div>
					</div>
				</div>
		
			</div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/