<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentNivoSlider extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'jquery-nivo-slider'												=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'jquery.nivo.slider.css'
			),
			'nivo-slider'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'jquery-nivo-slider'												=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.nivo.slider.pack.js'
			),
			'nivo-slider'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.NivoSlider.js'
			)
		);
		
		$this->effect=array
		(
			'sliceDown'															=>	array(__('Slice down',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'sliceDownLeft'														=>	array(__('Slice down left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'sliceUp'															=>	array(__('Slice up',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'sliceUpLeft'														=>	array(__('Slice up left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'sliceUpDown'														=>	array(__('Slice up down',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'sliceUpDownLeft'													=>	array(__('Slice up down left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'fold'																=>	array(__('Fold',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'fade'																=>	array(__('Fade',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'random'															=>	array(__('Random',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'slideInRight'														=>	array(__('Slide in right',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'slideInLeft'														=>	array(__('Slide in left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'boxRandom'															=>	array(__('Box random',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'boxRain'															=>	array(__('Box rain',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'boxRainReverse'													=>	array(__('Box rain reverse',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'boxRainGrow'														=>	array(__('Box rain grow',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'boxRainGrowReverse'												=>	array(__('Box rain grow reverse',PLUGIN_PAGE_BUILDER_DOMAIN))
		);	
		
		$this->component=array
		(
			'name'																=>	__('Nivo Slider',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Nivo Slider',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Nivo Slider',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'url',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
					),
					array
					(
						'id'													=>	'transition_effect',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Transition effect',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select transition effect',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'checkbox',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->effect)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'random'
						)
					),	
					array
					(
						'id'													=>	'count_slice',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Number of slices',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter number of slices - only for "slice" transitions',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'15'
						)
					),							
					array
					(
						'id'													=>	'count_column',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Number of columns',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter number of columns - only for "box" transitions',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'8'
						)
					),	
					array
					(
						'id'													=>	'count_row',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Number of rows',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter number of rows - only for "box" transitions',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'4'
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
								'subheader'										=>	__('Slide transition speed in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'500'
						)
					),
					array
					(
						'id'													=>	'pause_time',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Pause time',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter value of pause time in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'3000'
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
								'subheader'										=>	__('Enter number of start slide',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'direction_navigation_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Direction navigation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable Prev/Next navigation',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'control_navigation_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Control navigation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable 1,2,3 ... navigation (pagination)',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'control_navigation_thumbs_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Control navigation with thumbnails',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Use thumbnails for control navigation',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'pause_on_hover',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Pause on hover',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Stop transition when user hover on image',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'manual_advance_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Manual advance',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Force manual transitions',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'random_start_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Random at start',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Start on a random slide',PLUGIN_PAGE_BUILDER_DOMAIN)
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
	
	function init()
	{
		return($this->component);
	}
	
	/**************************************************************************/
	
	function processShortcodeNivoSlider($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$option=array();
		
		$html=null;
		$imageHTML=null;
		$imageBoxHTML=null;
		$paginationHTML=null;	
		
		$Validation=new PBValidation();
		
		global $post;
		$bPost=$post;
		
		$file=PBFile::getImage(explode(',',$attribute['image']));
		
		if($file===false) return($html);
		if(!count($file->posts)) return($html);
		
		if(!PBFile::isWPImage($attribute['image_size'])) return($html);
		if(!array_key_exists($attribute['transition_effect'],$this->effect)) return($html);
		
		if(!$Validation->isNumber($attribute['count_slice'],0,999)) return($html);
		if(!$Validation->isNumber($attribute['count_column'],0,999)) return($html);
		if(!$Validation->isNumber($attribute['count_row'],0,999)) return($html);
		if(!$Validation->isNumber($attribute['transition_speed'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['pause_time'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['start_slide'],0,999)) return($html);
		
		if(!$Validation->isBool($attribute['preloader_enable'])) return($html);
		if(isset($attribute['direction_navigation_enable']))
		{
			if(!$Validation->isBool($attribute['direction_navigation_enable'])) return($html);
		}
		if(!$Validation->isBool($attribute['control_navigation_enable'])) return($html);
		if(isset($attribute['control_navigation_thumbs_enable']))
		{
			if(!$Validation->isBool($attribute['control_navigation_thumbs_enable'])) return($html);
		}
		if(!$Validation->isBool($attribute['pause_on_hover'])) return($html);
		if(!$Validation->isBool($attribute['manual_advance_enable'])) return($html);
		if(!$Validation->isBool($attribute['random_start_enable'])) return($html);

		$key=array
		(
			'transition_effect',
			'count_slice',
			'count_column',
			'count_row',
			'transition_speed',
			'pause_time',
			'start_slide',
			'preloader_enable',
			'direction_navigation_enable',
			'control_navigation_enable',
			'control_navigation_thumbs_enable',
			'pause_on_hover',
			'manual_advance_enable',
			'random_start_enable'
		);
		
		foreach($key as $index)
		{
			if(isset($attribute[$index]))
				$option[$index]=$attribute[$index];
		}
		
		$class=array(array(),array());
		if($attribute['preloader_enable']==1)
			array_push($class[0],'pb-image-box','pb-image-preloader');
		
		array_push($class[1],'pb-image');
		
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
			{
				$imageHTML='<a href="'.esc_attr($url).'"><img src="'.$src[0].'" alt=""/></a>';
			}
			else $imageHTML='<img src="'.$src[0].'" alt="" data-thumb="'.$src[0].'"/>';
			
			$imageBoxHTML.=
			'
				<div'.PBHelper::createClassAttribute($class[0]).'>
					<div'.PBHelper::createClassAttribute($class[1]).'>'.$imageHTML.'</div>
				</div>
			';
		}
		
		wp_reset_query();
		$post=$bPost;
		
		setup_postdata($post); 
		
		$id=PBHelper::createId('pb_nivo_slider');
		
		$class=array(array(),array());
		
		array_push($class[0],'pb-nivo-slider',$attribute['css_class']);
		
		if($attribute['preloader_enable']==1)
			array_push($class[1],'pb-preloader');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).'>
				<div'.PBHelper::createClassAttribute($class[1]).' id="'.$id.'">
					'.$imageBoxHTML.'
					'.$paginationHTML.'
				</div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBNivoSlider('.json_encode($option).');
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