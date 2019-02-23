<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentGallery extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Layout=new PBLayout();
		$ImageHover=new PBImageHover();
		
		$this->style=array
		(
			'gallery'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'gallery'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Gallery.js'
			)
		);
		
		$this->layout=$Layout->getMainLayout();
		
		$this->component=array
		(
			'name'																=>	__('Gallery',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Gallery',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Gallery',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('Click on below button to create gallery',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'layout',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select layout of the images in gallery',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->layout,'name')
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'33x33x33'
						)
					),	
					array
					(
						'id'													=>	'layout_full_width_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Layout full width',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable full width layout (without margins between columns)',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'preloader_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Preloader',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable preloader on images',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'hover_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Hover',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable hover on images',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'hover_type',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Hover type',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select hover for the images in gallery',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($ImageHover->type)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'image_hover_type_default')
						)
					),	
					array
					(
						'id'													=>	'caption_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Caption',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable displaying captions under images',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'description_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Description',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable displaying descriptions under images',PLUGIN_PAGE_BUILDER_DOMAIN)
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
	
	function processShortcodeGallery($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		$elementHTML=null;
		
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		$ImageHover=new PBImageHover();

		$file=PBFile::getImage(explode(',',$attribute['image']));

		if($file===false) return($html);
		if(!count($file->posts)) return($html);
		
		if(!PBFile::isWPImage($attribute['image_size'])) return($html);
		if(!array_key_exists($attribute['layout'],$this->layout)) return($html);
		
		if(!$Validation->isBool($attribute['hover_enable'])) return($html);
		if(!array_key_exists($attribute['hover_type'],$ImageHover->type)) return($html);
		
		if(!$Validation->isBool($attribute['caption_enable'])) return($html);
		if(!$Validation->isBool($attribute['preloader_enable'])) return($html);
		if(!$Validation->isBool($attribute['description_enable'])) return($html);
		if(!$Validation->isBool($attribute['layout_full_width_enable'])) return($html);
		
		$key=array
		(
			'hover_type',
			'hover_enable',
			'preloader_enable',
			'layout_full_width_enable'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];		
		
		$id=PBHelper::createId('pb_gallery');
		
		global $post;
		$bPost=$post;		
		
		$i=0;
		while($file->have_posts())
		{
			global $post;
			
			$file->the_post();
			
			$full=wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
			$thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id(),$attribute['image_size']);
			
			$meta=PBMeta::get($post);
			PBHelper::removeUIndex($meta,'media_library_video_url','media_library_url');
			
			$class=array();
			
			$class[0]=array('pb-layout-'.$Layout->getLayoutColumnCSSClass($attribute['layout'],$i));
			$class[1]=array('pb-image-box');
			$class[2]=array('pb-image');
			
			if($attribute['preloader_enable']==1)
				array_push($class[1],'pb-image-preloader','pb-image-preloader-animation-enable');
			if($attribute['hover_enable']==1)
				array_push($class[1],'pb-image-hover','pb-image-hover-type-'.$attribute['hover_type']);
			
			/****/
			
			$imageTextHTML=null;
			if(($Validation->isNotEmpty($post->post_excerpt)) && ($attribute['caption_enable']==1))
				$imageTextHTML.='<'.PBComponentData::get($this->getComponentId(),'image_text_caption_header_tag').' class="pb-image-text-caption">'.get_the_excerpt().'</'.PBComponentData::get($this->getComponentId(),'image_text_caption_header_tag').'>';
			if(($Validation->isNotEmpty($post->post_content)) && ($attribute['description_enable']==1))
				$imageTextHTML.='<div class="pb-image-text-description">'.get_the_content().'</div>';
			
			if($Validation->isNotEmpty($imageTextHTML))
				$imageTextHTML='<div class="pb-image-text">'.$imageTextHTML.'</div>';
			if($Validation->isNotEmpty($imageTextHTML))
				$imageTextHTML.='<div class="pb-image-text-fancybox"><b>'.get_the_excerpt().'</b> '.get_the_content().'</div>';
			
			/****/
			
			$url=null;
			$rel=null;
			if($Validation->isVideoURL($meta['media_library_video_url']))
			{
				$url=$meta['media_library_video_url'];
				array_push($class[1],'pb-image-type-video');
			}
			elseif($Validation->isURL($meta['media_library_url']))
			{
				$url=$meta['media_library_url'];
				array_push($class[1],'pb-image-type-link');
			}
			else
			{
				$rel=$id;
				$url=$full[0];
				array_push($class[1],'pb-image-type-image');
			}
			
			/****/
			
			$imageHTML=null;
			if($attribute['hover_enable']==1)
			{
				$imageHTML='<a href="'.$url.'"'.PBHelper::createClassAttribute($class[2]).($Validation->isEmpty($rel) ? null : ' data-fancybox-group="'.esc_attr($rel).'"').'><img src="'.$thumbnail[0].'" alt=""/><span><span><span></span></span></span></a>';
			}
			else
			{
				$imageHTML='<div'.PBHelper::createClassAttribute($class[2]).'><img src="'.$thumbnail[0].'" alt=""/></div>';				
			}

			/****/
			
			if($Validation->isNotEmpty($imageTextHTML))
				array_push($class[1],'pb-image-text-enable');
			
			$elementHTML.='<li'.PBHelper::createClassAttribute($class[0]).'><div'.PBHelper::createClassAttribute($class[1]).'>'.$imageHTML.$imageTextHTML.'</div></li>';
			
			$i++;
		}
		
		wp_reset_query();
		$post=$bPost;
				
		$class=array();
		
		$class[0]=array('pb-gallery','pb-clear-fix',$attribute['css_class']);
		$class[1]=array($Layout->getLayoutCSSClass($attribute['layout']),'pb-reset-list','pb-clear-fix');
		
		if($attribute['layout_full_width_enable']==1)
			array_push($class[1],'pb-layout-full-width');

		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</ul>			
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBGallery('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,$elementHTML));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/