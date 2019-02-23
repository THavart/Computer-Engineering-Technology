<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentFlexSlider extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		
		$this->style=array
		(
			'jquery-flexslider'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'flexslider.css'
			),
			'flexslider'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'jquery-flexslider'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.flexslider-min.js'
			),
			'flexslider'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.FlexSlider.js'
			)
		);
		
		$this->animation=array
		(
			'fade'																=>	__('Fade',PLUGIN_PAGE_BUILDER_DOMAIN),
			'slide'																=>	__('Slide',PLUGIN_PAGE_BUILDER_DOMAIN),
		);	
		
		$this->direction=array
		(
			'horizontal'														=>	__('Horizontal',PLUGIN_PAGE_BUILDER_DOMAIN),
			'vertical'															=>	__('Vertical',PLUGIN_PAGE_BUILDER_DOMAIN),
		);			
		
		$this->component=array
		(
			'name'																=>	__('FlexSlider',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays FlexSlider',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('FlexSlider',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'image_size',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Image size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select image size',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'image-size'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'image_default')
						)
					),
					array
					(
						'id'													=>	'preloader_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Preloader',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable image slider preloader',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'url',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('URL of site which has to be open after clicking on each image.',PLUGIN_PAGE_BUILDER_DOMAIN),__('You can set URL of separate image during editing it via Media Library.',PLUGIN_PAGE_BUILDER_DOMAIN))
							)
						),
					),
					array
					(
						'id'													=>	'animation',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select animation type',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->animation)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'fade'
						)
					),	
					array
					(
						'id'													=>	'easing',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines the easing method used in transitions',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'swing'
						)
					),						
					array
					(
						'id'													=>	'direction',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Direction',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select the sliding direction',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	$this->direction
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'horizontal'
						)
					),		
					array
					(
						'id'													=>	'start_at',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Start at',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('The slide that the slider should start on',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'0'
						)
					),						
					array
					(
						'id'													=>	'slideshow_speed',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Slideshow speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Set the speed of the slideshow cycling in milliseconds.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'7000'
						)
					),		
					array
					(
						'id'													=>	'animation_speed',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Animation speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Set the speed of animations in milliseconds.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'600'
						)
					),		
					array
					(
						'id'													=>	'init_delay',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Initialization delay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Set an initialization delay in milliseconds.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'reverse',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Reverse',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Reverse the animation direction',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'animation_loop',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Animation loop',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'smooth_height',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Smooth height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Allow height of the slider to animate smoothly in horizontal mode',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'slideshow',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Slideshow',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Animate slider automatically',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'randomize',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Randomize',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Randomize slide order',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'pause_on_action',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Pause on action',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Pause the slideshow when interacting with control elements',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'pause_on_hover',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Pause on hover',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Pause the slideshow when hovering over slider, then resume when no longer hovering',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'use_css',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Use CSS',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Slider will use CSS3 transitions if available',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'touch',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Touch',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Allow touch swipe navigation of the slider on touch-enabled devices',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'control_nav',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Control navigation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable control (1,2,3 ...) navigation',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'direction_nav',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Direction navigation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enbale or disable direction (previous/next slide) navigation',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'keyboard',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Keyboard',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Allow slider navigating via keyboard left/right keys',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'multiple_keyboard',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Multiple keyboard',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Allow keyboard navigation to affect multiple sliders.',PLUGIN_PAGE_BUILDER_DOMAIN),__('Default behavior cuts out keyboard navigation with more than one slider present.',PLUGIN_PAGE_BUILDER_DOMAIN))
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
						'id'													=>	'mousewheel',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Mousewheel',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__(' Allows slider navigating via mousewheel.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'css_class',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('CSS class',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
					)
				)
			)
		);
		
		parent::__construct();		
	}
	
	/**************************************************************************/
	
	function processShortcodeFlexSlider($attribute,$content,$tag)
	{
		$Easing=new PBEasing();
		
		$attribute=$this->processAttribute($tag,$attribute);

		$option=array();
		$class=array(array(),array(),array(),array());
		
		$html=null;
		$imageHTML=null;
		$imageBoxHTML=null;
		
		$Validation=new PBValidation();
		
		$file=PBFile::getImage(explode(',',$attribute['image']));
		
		if($file===false) return($html);
		if(!count($file->posts)) return($html);
		
		if(!PBFile::isWPImage($attribute['image_size'])) return($html);

		if(!array_key_exists($attribute['easing'],$Easing->easingType)) return($html);
		if(!array_key_exists($attribute['animation'],$this->animation)) return($html);
		if(!array_key_exists($attribute['direction'],$this->direction)) return($html);

		if(!$Validation->isBool($attribute['preloader_enable'])) return($html);
		
		if(!$Validation->isNumber($attribute['start_at'],0,999)) return($html);
		if(!$Validation->isNumber($attribute['init_delay'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['slideshow_speed'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['animation_speed'],0,99999)) return($html);
		
		if(!$Validation->isBool($attribute['touch'])) return($html);
		if(!$Validation->isBool($attribute['reverse'])) return($html);
		if(!$Validation->isBool($attribute['use_css'])) return($html);
		if(!$Validation->isBool($attribute['keyboard'])) return($html);
		if(!$Validation->isBool($attribute['slideshow'])) return($html);
		if(!$Validation->isBool($attribute['randomize'])) return($html);
		if(!$Validation->isBool($attribute['mousewheel'])) return($html);
		if(!$Validation->isBool($attribute['control_nav'])) return($html);
		if(!$Validation->isBool($attribute['direction_nav'])) return($html);		
		if(!$Validation->isBool($attribute['smooth_height'])) return($html);
		if(!$Validation->isBool($attribute['animation_loop'])) return($html);
		if(!$Validation->isBool($attribute['pause_on_hover'])) return($html);
		if(!$Validation->isBool($attribute['pause_on_action'])) return($html);
		if(!$Validation->isBool($attribute['multiple_keyboard'])) return($html);

		$key=array
		(
			'easing',
			'animation',
			'direction',
			'start_at',
			'init_delay',
			'slideshow_speed',
			'animation_speed',
			'preloader_enable',
			'touch',
			'use_css',
			'reverse',
			'keyboard',
			'slideshow',
			'randomize',
			'mousewheel',
			'control_nav',
			'direction_nav',
			'smooth_height',
			'pause_on_hover',
			'animation_loop',
			'pause_on_action',
			'multiple_keyboard'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];

		if($attribute['preloader_enable']==1)
			array_push($class[0],'pb-image-box','pb-image-preloader');
		
		array_push($class[1],'pb-image');
		
		global $post;
		$bPost=$post;
		
		while($file->have_posts())
		{
			$file->the_post();
			
			$src=wp_get_attachment_image_src(get_the_ID(),$attribute['image_size']);
			
			$url=null;
			$meta=PBMeta::get($post->ID);
		
			PBHelper::removeUIndex($meta,'media_library_url');
			
			if($Validation->isNotEmpty($attribute['url']))
				$url=$attribute['url'];
			elseif($Validation->isNotEmpty($meta['media_library_url']))
				$url=$meta['media_library_url'];
			
			if($Validation->isNotEmpty($url))
				$imageHTML='<a href="'.esc_attr($url).'"><img src="'.$src[0].'" alt=""/></a>';
			else $imageHTML='<img src="'.$src[0].'" alt="" data-thumb="'.$src[0].'"/>';
			
			$imageBoxHTML.=
			'
				<li'.PBHelper::createClassAttribute($class[0]).'>
					<div'.PBHelper::createClassAttribute($class[1]).'>'.$imageHTML.'</div>
				</li>
			';
		}
		
		wp_reset_query();
		$post=$bPost;
		
		$id=PBHelper::createId('pb_flex_slider');
				
		array_push($class[2],'pb-flex-slider',$attribute['css_class']);
		
		if($attribute['preloader_enable']==1)
			array_push($class[2],'pb-preloader');
		
		array_push($class[3],'pb-reset-list','slides');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[2]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[3]).'>
					'.$imageBoxHTML.'
				</ul>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBFlexSlider('.json_encode($option).');
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