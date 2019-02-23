<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentZaccordion extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Post=new PBPost();
		$Easing=new PBEasing();
		
		$this->style=array
		(
			'zaccordion'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'jquery-zaccordion'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.zaccordion.min.js'
			),
			'zaccordion'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.ZAccordion.js'
			)
		);
		
		$this->dataSource=array
		(
			1																	=>	__('Gallery',PLUGIN_PAGE_BUILDER_DOMAIN),
			2																	=>	__('Posts',PLUGIN_PAGE_BUILDER_DOMAIN)
		);
		
		$this->tabOpenTriggerEvent=array				
		(
			'click'																=>	__('On click',PLUGIN_PAGE_BUILDER_DOMAIN),
			'mouseover'															=>	__('On mouseover',PLUGIN_PAGE_BUILDER_DOMAIN)			
		);
		
		$this->component=array
		(
			'name'																=>	__('zAccordion',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays zAccordion',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('zAccordion',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Gallery',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Posts',PLUGIN_PAGE_BUILDER_DOMAIN)
						)	
					),
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'data_source',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Data source',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Select data source for accordion content.',PLUGIN_PAGE_BUILDER_DOMAIN),__('Accordion can be build based on gallery (images) or posts featured image. Each of them can be setup in separate tabs.',PLUGIN_PAGE_BUILDER_DOMAIN))
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->dataSource)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),					
					array
					(
						'id'													=>	'image_size',
						'ui'													=>	array
						(
							'panel'												=>	1,
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
							'panel'												=>	1,
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
						'id'													=>	'starting_slide',
						'ui'													=>	array
						(
							'panel'												=>	1,
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
						'id'													=>	'timeout',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Timeout',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Time between each slide in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'2000'
						)
					),						
					array
					(
						'id'													=>	'speed',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Speed of the slide in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'auto',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Auto',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Whether or not the slideshow should play automatically',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'pause',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Pause',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Pause on hover',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'easing',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Easing method',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'trigger',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Event type',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Event type needed to open tab',PLUGIN_PAGE_BUILDER_DOMAIN),__('Accordion can be build based on gallery (images) or posts featured image. Each of them can be setup in separate tabs.',PLUGIN_PAGE_BUILDER_DOMAIN))
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->tabOpenTriggerEvent)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'click'
						)
					),		
					array
					(
						'id'													=>	'display_slide_title',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Slide title',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable slide title (for posts) or caption (for images)',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'display_slide_excerpt',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Slide excerpt',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable slide excerpt (for posts) or description (for images)',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'image',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Images',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Click on below button to create gallery with images to the accordion',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-gallery'
							)
						),
					),	
					array
					(
						'id'													=>	'url',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
					),
					array
					(
						'id'													=>	'post_type',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Post type',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select types of posts which have to be displayed.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'checkbox',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Post->postType),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	''
						)
					),	
					array
					(
						'id'													=>	'post_status',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Post status',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select types of post statuses which have to be displayed.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'checkbox',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Post->postStatus),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	''
						)
					),	
					array
					(
						'id'													=>	'post__in',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Include',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Define a comma-separated list of page ID\'s to be included to the list',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	''
						)
					),	
					array
					(
						'id'													=>	'post__not_in',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Exclude',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Define a comma-separated list of page ID\'s to be excluded from the list.',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	''
						)
					),	
					array
					(
						'id'													=>	'posts_per_page',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Limit number of posts',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Number of posts to show. Leave this field empty to show all posts.',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-2'
						)
					),					
					array
					(
						'id'													=>	'orderby',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Sort column',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Post->sortColumn),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'date'
						)
					),						
					array
					(
						'id'													=>	'order',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Sort order',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	array('asc'=>__('Ascending',PLUGIN_PAGE_BUILDER_DOMAIN),'desc'=>__('Descending',PLUGIN_PAGE_BUILDER_DOMAIN)),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'asc'
						)
					),
				)
			)
		);
		
		parent::__construct();		
	}

	/**************************************************************************/
	
	function processShortcodeZAccordion($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$Image=new PBImage();
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		
		$html=null;
		$imageHTML=null;
		$imageBoxHTML=null;
		$imageBoxHTMLArray=array();
		
		$option=array();
		
		if(!array_key_exists($attribute['data_source'],$this->dataSource)) return($html);
		
		if($attribute['data_source']==1)
		{
			$query=PBFile::getImage(explode(',',$attribute['image']));
		
			if($query===false) return($html);
			if(!count($query->posts)) return($html);			
		}
		else
		{
			$argument=array
			(
				'meta_query'	=>	array
				(
					array
					(
						'key'	=>	'_thumbnail_id'
					)
				) 
			);
			
			if($Validation->isNotEmpty($attribute['post_type']))
				$argument['post_type']=explode(',',$attribute['post_type']);
			if($Validation->isNotEmpty($attribute['post_status']))
				$argument['post_status']=explode(',',$attribute['post_status']);		
			if($Validation->isNotEmpty($attribute['post__in']))
				$argument['post__in']=explode(',',$attribute['post__in']);	
			if($Validation->isNotEmpty($attribute['post__not_in']))
				$argument['post__not_in']=explode(',',$attribute['post__not_in']);			
			if($Validation->isNotEmpty($attribute['posts_per_page']))
				$argument['posts_per_page']=$attribute['posts_per_page']==-2 ? -1 : $attribute['posts_per_page'];		
			if($Validation->isNotEmpty($attribute['orderby']))
				$argument['orderby']=$attribute['orderby'];
			if($Validation->isNotEmpty($attribute['order']))
				$argument['order']=$attribute['order'];
			
			$query=new WP_Query($argument);
			if($query===false) return($html);
			if($query->post_count==0) return($html);		
		}
		
		if(!PBFile::isWPImage($attribute['image_size'])) return($html);
		if(!$Validation->isBool($attribute['preloader_enable'])) return($html);
		
		if(!$Validation->isNumber($attribute['starting_slide'],0,999)) return($html);
		if(!$Validation->isNumber($attribute['timeout'],0,99999)) return($html);
		if(!$Validation->isNumber($attribute['speed'],0,99999)) return($html);

		if(!$Validation->isBool($attribute['auto'])) return($html);
		
		if(!$Validation->isBool($attribute['pause'])) return($html);
		if(!array_key_exists($attribute['easing'],$Easing->easingType)) return($html);
		if(!array_key_exists($attribute['trigger'],$this->tabOpenTriggerEvent)) return($html);
		
		if(!$Validation->isBool($attribute['display_slide_title'])) return($html);
		if(!$Validation->isBool($attribute['display_slide_excerpt'])) return($html);
		
		$imageSize=$Image->getImageDimension($attribute['image_size']);
		if($imageSize===false) return($html);
		
		$key=array
		(		
			'preloader_enable',
			'starting_slide',
			'timeout',
			'speed',
			'auto',
			'pause',
			'easing',
			'trigger',
			'display_slide_title',
			'display_slide_excerpt'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];

		$option['width']=$imageSize['width'];
		$option['height']=$imageSize['height'];
		
		$class=array(array(),array(),array(),array());
		
		array_push($class[0],'pb-zaccordion',$attribute['css_class']);
		array_push($class[1],'pb-reset-list');
		
		if($attribute['preloader_enable']==1)
		{
			array_push($class[1],'pb-preloader');
			array_push($class[2],'pb-image-box','pb-image-preloader');
		}
		
		array_push($class[3],'pb-image');
		
		global $post;
		$bPost=$post;
		
		while($query->have_posts())
		{
			$query->the_post();
			
			$url=null;
			
			if($attribute['data_source']==1)
			{
				$meta=PBMeta::get($post->ID);
				PBHelper::removeUIndex($meta,'media_library_url');
				
				if($Validation->isNotEmpty($attribute['url']))
					$url=$attribute['url'];
				elseif($Validation->isNotEmpty($meta['media_library_url']))
					$url=$meta['media_library_url'];
				
				$src=wp_get_attachment_image_src(get_the_ID(),$attribute['image_size']);
			}
			else
			{
				$url=get_the_permalink();
				$src=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),$attribute['image_size']);
			}
			
			$captionHTML=null;
			if($attribute['display_slide_title']==1)
				$captionHTML.='<span'.PBHelper::createClassAttribute(array('pb-zaccordion-caption-box-title')).'>'.($attribute['data_source']==1 ? strip_tags(get_the_excerpt()) : get_the_title()).'</span>';
			if($attribute['display_slide_excerpt']==1)
				$captionHTML.='<span'.PBHelper::createClassAttribute(array('pb-zaccordion-caption-box-excerpt')).'>'.($attribute['data_source']==1 ? get_the_content() : strip_tags(get_the_excerpt())).'</span>';			
			if($Validation->isNotEmpty($captionHTML))
				$captionHTML='<span'.PBHelper::createClassAttribute(array('pb-zaccordion-caption-box"')).'>'.$captionHTML.'</span>';
			
			$imageHTML=null;
			if($Validation->isNotEmpty($url))
				$imageHTML='<a href="'.esc_attr($url).'"'.PBHelper::createClassAttribute($class[3]).'><img src="'.$src[0].'" alt=""/>'.$captionHTML.'</a>';
			else $imageHTML='<img src="'.$src[0].'" alt="" data-thumb="'.$src[0].'"/>'.$captionHTML;

			$imageBoxHTMLArray[] = 
			'
				<li>
					<div'.PBHelper::createClassAttribute($class[2]).'>'.$imageHTML.'</div>
				</li>
			';
		}
		
		$imageBoxHTML = join('',(is_rtl() ? array_reverse($imageBoxHTMLArray) : $imageBoxHTMLArray));
		wp_reset_query();
		$post=$bPost;
		
		$id=PBHelper::createId('accordion');
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).'>
				<ul'.PBHelper::createClassAttribute($class[1]).' id="'.$id.'">
					'.$imageBoxHTML.'
				</ul>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBZAccordion('.json_encode($option).');
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