<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentSupersized extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'supersized'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			),
			'jquery-supersized'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'jquery-supersized.css'
			)
		);	
		
		$this->script=array
		(
			'supersized'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Supersized.js'
			),
			'jquery-supersized'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.supersized.min.js'
			)			
		);
		
		$this->performance=array
		(
			'0'																	=>	__('No adjustments',PLUGIN_PAGE_BUILDER_DOMAIN),
			'1'																	=>	__('Hybrid, lowers image quality during transitions and restores after completed. (Default)',PLUGIN_PAGE_BUILDER_DOMAIN),
			'2'																	=>	__('Higher image quality',PLUGIN_PAGE_BUILDER_DOMAIN),
			'3'																	=>	__('Faster transition speed, lower image qualit',PLUGIN_PAGE_BUILDER_DOMAIN)
		);
		
		$this->transition=array
		(
			'none'																=>	__('none - No transition effect',PLUGIN_PAGE_BUILDER_DOMAIN),
			'fade'																=>	__('fade - Fade effect (Default)',PLUGIN_PAGE_BUILDER_DOMAIN),
			'slideTop'															=>	__('slideTop - Slide in from top',PLUGIN_PAGE_BUILDER_DOMAIN),
			'slideRight'														=>	__('slideRight - Slide in from right',PLUGIN_PAGE_BUILDER_DOMAIN),
			'slideBottom'														=>	__('slideBottom - Slide in from bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
			'slideLeft'															=>	__('slideLeft - Slide in from left',PLUGIN_PAGE_BUILDER_DOMAIN),
			'carouselRight'														=>	__('carouselRight - Carousel from right to left',PLUGIN_PAGE_BUILDER_DOMAIN),
			'carouselLeft'														=>	__('carouselLeft - Carousel from left to right',PLUGIN_PAGE_BUILDER_DOMAIN)
		);
		
		$this->component=array
		(
			'name'																=>	__('Supersized',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Supersized',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Supersized',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'image',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Images',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Click on below button to create gallery with images to the slider',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-gallery'
							)
						),
					),
					array
					(
						'id'													=>	'autoplay',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether slideshow begins playing when page is loaded',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'fit_always',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Fit always',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Prevents the image from ever being cropped. Ignores minimum width and height',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'fit_landscape',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Fit landscape',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Prevents the image from being cropped by locking it at 100% width',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'fit_portrait',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Fit portrait',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Prevents the image from being cropped by locking it at 100% height',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'horizontal_center',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Horizontal center',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Centers image horizontally. When turned off, the images resize/display from the left of the page',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'vertical_center',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Vertical center',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Centers image vertically. When turned off, the images resize/display from the top of the page',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'min_width',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Minimum width',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Minimum width the image is allowed to be. If it is met, the image won\'t size down any further.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
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
						'id'													=>	'min_height',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Minimum height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Minimum height the image is allowed to be. If it is met, the image won\'t size down any further.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
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
						'id'													=>	'image_protect',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Image protect',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Disables right clicking and image dragging using Javascript',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'keyboard_nav',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Keyboard navigation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Allows control via keyboard',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'new_window',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('New window',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Slide links open in a new window.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'pause_hover',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Pause on hover',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Pauses slideshow while current image hovered over',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'random',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Random',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Slides are shown in a random order',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'start_slide',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Start slide',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('The slide the slideshow starts on',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)						
					),
					array
					(
						'id'													=>	'stop_loop',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Stop loop',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Pauses slideshow upon reaching the last slide',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'performance',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Performance',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Uses image rendering options in Firefox and Internet Explorer to adjust image quality. This can speed up/slow down transitions. Webkit does not yet support these options',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->performance)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),	
					
					array
					(
						'id'													=>	'transition',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Transition',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Controls which effect is used to transition between slides',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->transition)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),
					array
					(
						'id'													=>	'transition_speed',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Transition speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Speed of transitions in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'750'
						)						
					),					
					array
					(
						'id'													=>	'slide_interval',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Slide interval',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Time between slide changes in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'5000'
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
	
	function processShortcodeSupersized($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		
		$Validation=new PBValidation();

		$file=PBFile::getImage(explode(',',$attribute['image']));

		if($file===false) return($html);
		if(!count($file->posts)) return($html);

		if(!$Validation->isBool($attribute['autoplay'])) return($html);
		if(!$Validation->isBool($attribute['fit_always'])) return($html);
		if(!$Validation->isBool($attribute['fit_landscape'])) return($html);
		if(!$Validation->isBool($attribute['fit_portrait'])) return($html);
		if(!$Validation->isBool($attribute['horizontal_center'])) return($html);
		if(!$Validation->isBool($attribute['vertical_center'])) return($html);

		if(!$Validation->isNumber($attribute['min_width'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['min_height'],0,99999)) return($html);

		if(!$Validation->isBool($attribute['image_protect'])) return($html);
		if(!$Validation->isBool($attribute['keyboard_nav'])) return($html);
		if(!$Validation->isBool($attribute['new_window'])) return($html);
		if(!$Validation->isBool($attribute['pause_hover'])) return($html);
		if(!$Validation->isBool($attribute['random'])) return($html);

		if(!$Validation->isNumber($attribute['start_slide'],0,99999)) return($html);

		if(!$Validation->isBool($attribute['stop_loop'])) return($html);

		if(!array_key_exists($attribute['performance'],$this->performance)) return($html);
		if(!array_key_exists($attribute['transition'],$this->transition)) return($html);

		if(!$Validation->isNumber($attribute['transition_speed'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['slide_interval'],0,99999)) return($html);

		$option=array();
		$key=array
		(
			'autoplay',
			'fit_always',
			'fit_landscape',
			'fit_portrait',
			'horizontal_center',
			'vertical_center',
			'min_width',
			'min_height',
			'image_protect',
			'keyboard_nav',
			'new_window',
			'pause_hover',
			'random',
			'start_slide',
			'stop_loop',
			'performance',
			'transition',
			'transition_speed',
			'slide_interval',
			'css_class'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];
		
		global $post;
		$bPost=$post;		
		
		$i=0;
		while($file->have_posts())
		{
			global $post;
			$file->the_post();
			
			$meta=PBMeta::get($post);
			
			PBHelper::removeUIndex($meta,'media_library_url');
			
			$full=wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
			
			$option['slides'][$i]['url']=$meta['media_library_url'];
			
			$option['slides'][$i]['image']=$full[0];
			$option['slides'][$i]['title']=get_the_title();
			
			$i++;
		}
		
		wp_reset_query();
		$post=$bPost;
		
		$html=
		'
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$().PBSupersized('.json_encode($option).');
					});
				</script>
			</div>				
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/