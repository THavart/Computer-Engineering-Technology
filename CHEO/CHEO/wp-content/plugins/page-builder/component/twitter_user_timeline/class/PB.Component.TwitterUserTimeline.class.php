<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentTwitterUserTimeline extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		$CarouFredSel=new PBCarouFredSel();
		
		$this->script=array
		(
			'jquery-timeago'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.timeago.js',
				'dependencies'													=>	array('jquery'),				
			),
			'twitter-user-timeline'												=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.TwitterUserTimeline.js',
				'dependencies'													=>	array('jquery'),
			)
		);
		
		$this->style=array
		(
			'twitter-user-timeline'												=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->component=array
		(
			'name'																=>	__('Twitter User Timeline',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Latest Tweets',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Twitter User Timeline',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Twitter',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Carousel',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
					),
					array
					(
						'id'													=>	'twitter_username',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Username',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Username of Twitter account',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),	
					array
					(
						'id'													=>	'twitter_consumer_key',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Consumer key',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),						
					array
					(
						'id'													=>	'twitter_consumer_key_secret',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Consumer secret key',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),						
					array
					(
						'id'													=>	'twitter_access_token',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Access token',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),						
					array
					(
						'id'													=>	'twitter_access_token_secret',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Access token secret',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'twitter_tweet_number',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Number of tweets',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Specifies the number of tweets to try and retrieve.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	10
						)
					),
					array
					(
						'id'													=>	'carousel_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Enable carousel',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable carousel',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),	
					array
					(
						'id'													=>	'carousel_autoplay_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),						
					array
					(
						'id'													=>	'carousel_circular_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Circular',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the carousel should be circular',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),						
					array
					(
						'id'													=>	'carousel_infinite_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Infinite',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the carousel should be infinite',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),
					array
					(
						'id'													=>	'carousel_scroll_pause_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Pause on hover',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the timeout between transitions should be paused',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),
					array
					(
						'id'													=>	'carousel_scroll_fx',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Scroll effect',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Indicates which effect to use for the transition',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($CarouFredSel->scrollFX)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'scroll'
						)
					),						
					array
					(
						'id'													=>	'carousel_scroll_easing',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Indicates which easing function to use for the transition',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Easing->easingType)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'easeInQuad'
						)
					),						
					array
					(
						'id'													=>	'carousel_scroll_duration',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Duration',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines the duration of the transition in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'500'
						)
					)					
				)
			)
		);
		
		parent::__construct();	
	}
	
	/**************************************************************************/
	
	function processShortcodeTwitterUserTimeline($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		$CarouFredSel=new PBCarouFredSel();

		if($Validation->isEmpty($attribute['twitter_username'])) return(null);
		
		if($Validation->isEmpty($attribute['twitter_consumer_key'])) return(null);
		if($Validation->isEmpty($attribute['twitter_consumer_key_secret'])) return(null);
		
		if($Validation->isEmpty($attribute['twitter_access_token'])) return(null);
		if($Validation->isEmpty($attribute['twitter_access_token_secret'])) return(null);
		
		if(!$Validation->isNumber($attribute['twitter_tweet_number'],1,200)) return(null);

		if(!$Validation->isBool($attribute['carousel_enable'])) return(null);

		if(!$Validation->isBool($attribute['carousel_autoplay_enable'])) return(null);
		if(!$Validation->isBool($attribute['carousel_circular_enable'])) return(null);
		if(!$Validation->isBool($attribute['carousel_infinite_enable'])) return(null);
		
		if(!$Validation->isBool($attribute['carousel_scroll_pause_hover'])) return(null);

		if(!array_key_exists($attribute['carousel_scroll_fx'],$CarouFredSel->scrollFX)) return(null);
		if(!array_key_exists($attribute['carousel_scroll_easing'],$Easing->easingType)) return(null);
		if(!$Validation->isNumber($attribute['carousel_scroll_duration'],1,99999)) return(null);
		
		$this->includeLibrary('twitteroauth/twitteroauth.php');
		
		$connection=new TwitterOAuth($attribute['twitter_consumer_key'],$attribute['twitter_consumer_key_secret'],$attribute['twitter_access_token'],$attribute['twitter_access_token_secret']);
		$tweet=$connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$attribute['twitter_username'].'&count='.$attribute['twitter_tweet_number']);
		
		if(is_null($tweet)) return(null);
		if(is_wp_error($tweet)) return(null);

		if(array_key_exists('errors',$tweet))
		{	
			if(count($tweet->errors)) return;
		}
		
		$data=array();
		
		$data['tweet']=$tweet;
		
		$data['attribute']=$attribute;
		
		$data['id']=PBHelper::createId('pb_twitter_user_timeline');
		
		$data['option']=PBHelper::getValueFromArray($attribute,array('carousel_enable','carousel_autoplay_enable','carousel_circular_enable','carousel_infinite_enable','carousel_scroll_pause_hover','carousel_scroll_fx','carousel_scroll_easing','carousel_scroll_duration'));
		
		$Template=new PBTemplate($data,$this->getTemplateFullPath('template'));
		return($Template->output(true));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/