<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentRecentPost extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		$Layout=new PBLayout();
		$ImageHover=new PBImageHover();
		
		$this->script=array
		(
			'pb-recent-post'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.RecentPost.js',
				'dependencies'													=>	array('jquery'),
			)
		);
		
		$this->style=array
		(
			'pb-recent-post'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->layout=$Layout->getMainLayout();
		
		$this->template=array
		(
			'1'																	=>	array(__('Template 1'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'2'																	=>	array(__('Template 2'),PLUGIN_PAGE_BUILDER_DOMAIN)
		);
		
		$this->component=array
		(
			'name'																=>	__('Recent Posts',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Recent Post',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Recent Posts',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Elements',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),	
				'element'														=>	array
				(
					array
					(
						'id'													=>	'category',
						'name'													=>	'category[]',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Category',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select one or more categories from which data have to be retrieved.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'term',
								'dictionary'									=>	array
								(
									'term'										=>	'category'
								)
							)
						)
					),	
					array
					(
						'id'													=>	'post_id',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Posts ID',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('ID of posts (separated by comma) which have to be displayed',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
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
						'id'													=>	'layout',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select layout of the posts',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'template',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Template',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select template',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->template)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'template_default')
						)
					),					
					array
					(
						'id'													=>	'post_count',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Post count',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Number of posts to show',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'3'
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
							'panel'												=>	1,
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
							'panel'												=>	1,
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
						'id'													=>	'date_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show date',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of post date',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'image_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show image',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of post feature image',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'header_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show header',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of post header',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'excerpt_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show excerpt',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of post excerpt',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'author_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show author',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of post author',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'category_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show categories',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of post categories',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'comment_count_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Show comment count',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable visibility of comment count',PLUGIN_PAGE_BUILDER_DOMAIN)
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
					)		
				)
			)
		);			
		
		parent::__construct();
	}
		
	/**************************************************************************/
	
	function processShortcodeRecentPost($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		$ImageHover=new PBImageHover();
		
		if(!PBFile::isWPImage($attribute['image_size'])) return($html);
		
		if(!array_key_exists($attribute['layout'],$this->layout)) return($html);
		if(!array_key_exists($attribute['template'],$this->template)) return($html);
		
		if(!$Validation->isNumber($attribute['post_count'],1,999)) return($html);
		if(!$Validation->isBool($attribute['preloader_enable'])) return($html);	
		
		if(!$Validation->isBool($attribute['hover_enable'])) return($html);
		if(!array_key_exists($attribute['hover_type'],$ImageHover->type)) return($html);
		
		if(!$Validation->isBool($attribute['date_enable'])) return($html);
		if(!$Validation->isBool($attribute['image_enable'])) return($html);
		if(!$Validation->isBool($attribute['header_enable'])) return($html);
		if(!$Validation->isBool($attribute['author_enable'])) return($html);
		if(!$Validation->isBool($attribute['excerpt_enable'])) return($html);
		if(!$Validation->isBool($attribute['category_enable'])) return($html);
		
		$option=array();
		$key=array
		(
			'hover_type',
			'hover_enable',
			'preloader_enable'
		);
		foreach($key as $index)
			$option[$index]=$attribute[$index];
		
		$data=$this->getPost($attribute);
		
		if($data===false) return(null);
		if(!count($data->posts)) return(null);

		$i=0;
		
		global $post;
		$bPost=$post;
		
		while($data->have_posts())
		{
			$data->the_post();

			$class=array('pb-layout-'.$Layout->getLayoutColumnCSSClass($attribute['layout'],$i));
			
			$meta=array('date'=>null,'comment_count'=>null,'image'=>null,'header'=>null,'excerpt'=>null,'meta'=>null);
			
			if($attribute['date_enable'])
				$meta['date']='<div class="pb-recent-post-date">'.get_the_date().'</div>';
				
			if($attribute['image_enable'])
			{
				if(has_post_thumbnail())
				{
					$commentCountHTML=null;
					
					if($attribute['template']==1)
					{
						if(($attribute['comment_count_enable']==1) && (comments_open(get_the_id())))
						{
							$commentCount=wp_count_comments(get_the_id());
							$commentCountHTML='<div class="pb-recent-post-comment-count"><span class="pb-recent-post-comment-count-value">'.$commentCount->approved.'</span><span class="pb-recent-post-comment-count-arrow"></span></div>';
						}
					}
					
					$classImage=array
					(
						array('pb-recent-post-image','pb-image-box'),
						array('pb-image')
					);
					
					if($attribute['preloader_enable']==1)
						array_push($classImage[0],'pb-image-preloader','pb-image-preloader-animation-enable');
					if($attribute['hover_enable']==1)
						array_push($classImage[0],'pb-image-hover','pb-image-hover-type-'.$attribute['hover_type']);
					
					if($attribute['hover_enable']==1)
					{
						$meta['image']='<a href="'.get_permalink(get_the_ID()).'"'.PBHelper::createClassAttribute($classImage[1]).'>'.get_the_post_thumbnail(get_the_ID(),$attribute['image_size']).'<span><span><span></span></span></span></a>';
					}
					else
					{
						$meta['image']='<div'.PBHelper::createClassAttribute($classImage[1]).'>'.get_the_post_thumbnail(get_the_ID(),$attribute['image_size']).'</div>';						
					}
					
					$meta['image']='<div'.PBHelper::createClassAttribute($classImage[0]).'>'.$meta['image'].$commentCountHTML.'</div>';
				}
			}
			
			if($attribute['header_enable'])
				$meta['header']='<h'.PBComponentData::get($this->getComponentId(),'header_important_default').' class="pb-recent-post-header"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></h'.PBComponentData::get($this->getComponentId(),'header_important_default').'>';
			
			if($attribute['excerpt_enable'])
				$meta['excerpt']='<div class="pb-recent-post-excerpt">'.get_the_excerpt().'</div>';
			
			if(($attribute['author_enable']) || ($attribute['category_enable']) || (($attribute['template']==2) && ($attribute['comment_count_enable']==1) && (comments_open(get_the_id()))))
			{
				$authorHTML=null;
				$categoryHTML=null;
				$commentCountHTML=null;
				
				if($attribute['author_enable'])
					$authorHTML='<div class="pb-recent-post-meta-author">'.get_the_author().'</div>';
				
				$category=get_the_category(get_the_ID());
				$count=count($category);
				
				if($count)
				{
					foreach($category as $index=>$value)
					{
						$separator=$index==$count-1 ? '' : ',&nbsp;';
						$title=$Validation->isEmpty($value->description) ? sprintf(__('View all posts filed under %s',PLUGIN_PAGE_BUILDER_DOMAIN),$value->name) : strip_tags(apply_filters('category_description',$value->description,$value));
					
						$categoryHTML.='<li><a href="'.get_category_link($value->term_id).'" title="'.esc_attr($title).'">'.esc_html($value->name).'</a>'.$separator.'</li>';
					}
						
					$categoryHTML='<div class="pb-recent-post-meta-category"><ul class="pb-reset-list">'.$categoryHTML.'</ul></div>';					
				}
				
				if($attribute['template']==2)
				{
					if(($attribute['comment_count_enable']==1) && (comments_open(get_the_id())))
					{
						$commentCount=wp_count_comments(get_the_id());
						$commentCountHTML='<div class="pb-recent-post-meta-comment-count">'.__(sprintf('%d Comments',$commentCount->approved),PLUGIN_PAGE_BUILDER_DOMAIN).'</div>';
					}
				}
				
				$meta['meta']='<div class="pb-recent-post-meta pb-clear-fix">'.$authorHTML.$categoryHTML.$commentCountHTML.'</div>';
			}
			
			$templateHTML=array();
			
			$templateOrder=array('date','image','header','excerpt','meta');
			if($attribute['template']==2)
				$templateOrder=array('image','header','date','excerpt','meta');
			
			foreach($templateOrder as $value)
			{
				if(isset($meta[$value]))
					$templateHTML[$value]=$meta[$value];
			}
			
			$html.='<li'.PBHelper::createClassAttribute($class).'><div>'.implode($templateHTML).'</div></li>';
			
			$i++;
		}
		
		wp_reset_query();
		$post=$bPost;
		
		$id=PBHelper::createId('pb_recent_post');
		
		$class=array();
		
		$class[0]=array
		(
			'pb-recent-post',
			'pb-recent-post-template-'.$attribute['template'],
			$attribute['css_class']
		);
		
		$class[1]=array
		(
			'pb-clear-fix',
			'pb-reset-list',
			$Layout->getLayoutCSSClass($attribute['layout'])
		);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>
					'.$html.'
				</ul>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$("#'.$id.'").PBRecentPost('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function getPost($attribute)
	{
		$argument=array
		(
			'post_type'										=>	'post',
			'ignore_sticky_posts'							=>	true,
			'category_name'									=>	$attribute['category'],
			'posts_per_page'								=>	$attribute['post_count'],
			'orderby'										=>	'date',
			'order'											=>	'desc'
		);
		
		$Validation=new PBValidation();
		if($Validation->isNotEmpty($attribute['post_id']))
			$argument['post__in']=explode(',',$attribute['post_id']);

		$query=new WP_Query($argument);
		if($query===false) return;
		
		return($query);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/