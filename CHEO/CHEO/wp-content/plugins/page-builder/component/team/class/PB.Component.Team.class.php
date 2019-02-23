<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentTeam extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		$Layout=new PBLayout();
		$ImageHover=new PBImageHover();
		
		$this->social=array();
		
		$this->social_icon_url=PBComponentData::get($this->getComponentId(),'social_icon_url');
		$this->social_icon_path=PBComponentData::get($this->getComponentId(),'social_icon_path');
		$this->social_icon_file=PBComponentData::setFile($this->getComponentId(),'social_icon_file',$this->social_icon_path);
		
		foreach($this->social_icon_file as $value)
		{
			$pathinfo=pathinfo($this->social_icon_path.$value);
			
			$id=$pathinfo['filename'];
			$name=ucfirst(preg_replace(array('/-/','/_/'),' ',$pathinfo['filename']));
			
			$this->social[$id]=array($name,$value);
		}
		
		$this->template=array
		(
			1																	=>	array(__('Template 1'),PLUGIN_PAGE_BUILDER_DOMAIN),
			2																	=>	array(__('Template 2'),PLUGIN_PAGE_BUILDER_DOMAIN),
			3																	=>	array(__('Template 3'),PLUGIN_PAGE_BUILDER_DOMAIN)
		);
		
		$this->layout=$Layout->getMainLayout();
		
		$this->style=array
		(
			'team'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'team'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Team.js'
			)
		);

		$this->component=array
		(
			'name'																=>	__('Team',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Team',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Team',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Skills list',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),	
				'element'														=>	array
				(
					array
					(
						'id'													=>	'template',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Template',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select one from the available team templates.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'1'
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
								'subheader'										=>	__('Select layout for the team members (this option can be used only for <i>Template 3</i>).',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'25x25x25x25'
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
						'id'													=>	'category',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Category',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select one or more categories from which team members have to be retrieved.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'term',
								'dictionary'									=>	array
								(
									'term'										=>	PLUGIN_PAGE_BUILDER_CONTEXT.'_team_category'
								)
							)
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'skill_list_waypoint_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Run animation on start',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'skill_list_waypoint_offset_trigger',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Offset',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('This option determines how far the top of the element must be from the top of the viewport to trigger the animation',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	10
								)	
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'90%'
						)
					),					
					array
					(
						'id'													=>	'skill_list_waypoint_duration',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Duration',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Duration of the animation in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'skill_list_waypoint_easing',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Easing type of animation',PLUGIN_PAGE_BUILDER_DOMAIN),
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
					)	
				)
			)
		);		
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		$CSS=new PBCSS();

		$key=$retina ? 'social_icon_url_retina' : 'social_icon_url';
			
		$codeCurrent=null;
		foreach($this->social as $index=>$value)
		{
			$codeCurrent.=$CSS->create(array
			(
				'selector'	=>	array
				(
					'.pb-team>ul>li ul.pb-team-social-icon-box>li>a.pb-team-social-icon-'.$index
				),
				'property'	=>	array
				(
					'background-image'	=>	PBComponentData::get($this->getComponentId(),$key).$value[1],
				)
			));			
		}
		
		if($retina) $codeCurrent=$CSS->getRetinaMediaQuery($codeCurrent);
		
		$code.=$codeCurrent;
		
		if((PBData::get('retina_ready')==1) && (!$retina))
		{
			$this->createCSS($code,true);
			return;
		}
		
		PBComponentData::set($this->getComponentId(),'css',$code);
	}
	
	/**************************************************************************/
	
	function processShortcodeTeam($attribute,$content,$tag)
	{
		$html=null;
		$teamHTML=null;
		$option=array();
		
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Window=new PBWindow();
		$Easing=new PBEasing();
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		$ImageHover=new PBImageHover();
		
		$data=$this->getTeam($attribute);
		
		if($data===false) return;
		if(!count($data->posts)) return;
		
		if(!array_key_exists($attribute['template'],$this->template)) return($html);
		if(!array_key_exists($attribute['layout'],$this->layout)) return($html);
		
		if(!PBFile::isWPImage($attribute['image_size'])) return($html);
		
		if(!$Validation->isBool($attribute['hover_enable'])) return($html);
		if(!array_key_exists($attribute['hover_type'],$ImageHover->type)) return($html);
		
		if(!$Validation->isBool($attribute['preloader_enable'])) return($html);
		
		if(!$Validation->isBool($attribute['skill_list_waypoint_enable'])) return($html);
		if(!$Validation->isNumber($attribute['skill_list_waypoint_duration'],0,99999)) return($html);
		if(!array_key_exists($attribute['skill_list_waypoint_easing'],$Easing->easingType)) return($html);
		
		$key=array
		(
			'hover_type',
			'hover_enable',
			'preloader_enable',
			'skill_list_waypoint_enable',
			'skill_list_waypoint_easing',
			'skill_list_waypoint_duration',
			'skill_list_waypoint_offset_trigger'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];		
		
		$layoutCurrent='100';
		if($attribute['template']==2)
			$layoutCurrent='50x50';
		elseif($attribute['template']==3) 
			$layoutCurrent=$attribute['layout'];
		
		global $post;
		$bPost=$post;
		
		$i=0;
		while($data->have_posts())
		{
			global $post;
			
			$data->the_post();
			
			$full=wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
			$thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id(),$attribute['image_size']);
			
			if(($full==false) || ($thumbnail==false)) continue; 
			
			$meta=PBMeta::get($post);
			
			PBHelper::removeUIndex($meta,'team_first_name','team_second_name','team_position','team_url','team_social','team_skill');
			
			/***/
			
			$class=array(array(),array());
			
			$class[0]=array('pb-layout-'.$Layout->getLayoutColumnCSSClass($layoutCurrent,$i));
			$class[1]=array('pb-image-box','pb-image-preloader-animation-enable');
			$class[2]=array('pb-image');
			
			if($attribute['preloader_enable']==1)
				array_push($class[1],'pb-image-preloader');
			if($attribute['hover_enable']==1)
			{
				array_push($class[1],'pb-image-hover','pb-image-hover-type-'.$attribute['hover_type'],'pb-image-type-image');
				if($Validation->isNotEmpty($meta['team_url'])) array_push($class[1],'pb-fancybox-disabled');
			}
			
			/***/
			
			$textHTML=null;
			if(($Validation->isNotEmpty($meta['team_first_name'])) || ($Validation->isNotEmpty($meta['team_second_name'])))
				$textHTML.='<h3 class="pb-team-text-box-member-name">'.trim($meta['team_first_name'].' '.$meta['team_second_name']).'</h3>';
			if($Validation->isNotEmpty($meta['team_position']))
				$textHTML.='<div class="pb-team-text-box-member-position">'.$meta['team_position'].'</div>';
			
			/***/
			
			$socialHTML=null;
			if(is_array($meta['team_social']))
			{
				$social=PBHelper::orderArrayByElement($meta['team_social'],'team_social_order');
				
				foreach($social as $index=>$value)
				{
					if(!array_key_exists($value['team_social_name'],$this->social)) continue;
					
					$socialHTML.=
					'
						<li>
							<a href="'.esc_attr($value['team_social_url']).'" class="pb-team-social-icon-'.$value['team_social_name'].' '.$Window->getTargetCSSClass('_blank').'"></a>
						</li>
					';
				}
				
				if($Validation->isNotEmpty($socialHTML))
				{
					$socialHTML=
					'
						<ul class="pb-team-social-icon-box pb-reset-list pb-clear-fix">
							'.$socialHTML.'
						</ul>
					';
				}
			}
			
			/***/
			
			$skillHTML=null;
			if(is_array($meta['team_skill']))
			{
				$skill=PBHelper::orderArrayByElement($meta['team_skill'],'team_skill_order');
				
				foreach($skill as $index=>$value)
				{	
					if(!$Validation->isNumber($value['team_skill_level'],0,100)) continue;
					
					$skillHTML.=
					'
						<div class="pb-team-skill pb-value-'.(int)$value['team_skill_level'].'">
							<span class="pb-team-skill-label">'.esc_html($value['team_skill_name']).'</span>
							<span class="pb-team-skill-value">
								<span class="pb-team-skill-value-value">'.(int)$value['team_skill_level'].'</span>
								<span class="pb-team-skill-value-character-after">%</span>
							</span>
							<span class="pb-team-skill-foreground"></span>
							<span class="pb-team-skill-background"></span>						
						</div>
					';
				}
				
				if($Validation->isNotEmpty($skillHTML))
				{
					$skillHTML=
					'
						<div class="pb-team-skill-box">
							'.$skillHTML.'
						</div>
					';
				}
			}
			
			/***/
			
			$imageTextHTML=null;
			if(($Validation->isNotEmpty($meta['team_first_name'])) || ($Validation->isNotEmpty($meta['team_second_name'])))
				$imageTextHTML.='<'.PBComponentData::get($this->getComponentId(),'image_text_caption_header_tag').' class="pb-image-text-caption">'.trim($meta['team_first_name'].' '.$meta['team_second_name']).'</'.PBComponentData::get($this->getComponentId(),'image_text_caption_header_tag').'>';
			if($Validation->isNotEmpty($meta['team_position']))
				$imageTextHTML.='<div class="pb-image-text-description">'.$meta['team_position'].'</div>';
			
			if($Validation->isNotEmpty($imageTextHTML))
				$imageTextHTML='<div class="pb-image-text">'.$imageTextHTML.'</div>';
			
			/***/
			
			$imageHTML=null;
			if($attribute['hover_enable']==1)
			{
				if($Validation->isNotEmpty($meta['team_url']))
				{
					$imageHTML='<a href="'.esc_attr($meta['team_url']).'"'.PBHelper::createClassAttribute($class[2]).'><img src="'.$thumbnail[0].'" alt=""/><span><span><span></span></span></span></a>';
				}
				else $imageHTML='<a href="'.$full[0].'"'.PBHelper::createClassAttribute($class[2]).'><img src="'.$thumbnail[0].'" alt=""/><span><span><span></span></span></span></a>';
			}
			else
			{
				$imageHTML='<div'.PBHelper::createClassAttribute($class[2]).'><img src="'.$thumbnail[0].'" alt=""/></div>';	
			}
			
			if($Validation->isNotEmpty($imageTextHTML))
				array_push($class[1],'pb-image-text-enable');
			
			$imageBoxHTML='<div'.PBHelper::createClassAttribute($class[1]).'>'.$imageHTML.$imageTextHTML.'</div>';
			
			/***/
						
			$teamHTML.=
			'
				<li'.PBHelper::createClassAttribute($class[0]).'>
			';
			
			switch($attribute['template'])
			{
				case 1:
					
					$teamHTML.='<div class="pb-layout-33x66 pb-clear-fix"><div class="pb-layout-column-left">'.$imageBoxHTML.$socialHTML.'</div><div class="pb-layout-column-right"><div class="pb-team-text-box">'.$textHTML.apply_filters('the_content',do_shortcode(get_the_content())).'</div>'.$skillHTML.'</div></div>';
					
				break;
			
				case 2:
					
					$teamHTML.='<div class="pb-layout-50x50 pb-clear-fix"><div class="pb-layout-column-left">'.$imageBoxHTML.'</div><div class="pb-layout-column-right"><div class="pb-team-quote-box"></div><div class="pb-team-text-box">'.apply_filters('the_content',do_shortcode(get_the_content())).'</div>'.$socialHTML.'</div></div>';
					
				break;
			
				case 3:
					
					$teamHTML.='<div>'.$imageBoxHTML.$socialHTML.'</div>';
					
				break;
			}
			
			$teamHTML.=
			'
				</li>
			';

			$i++;
		}
		
		wp_reset_query();
		$post=$bPost;
		
		if($Validation->isEmpty($teamHTML)) return;
		
		$id=PBHelper::createId('pb_team');
		
		$class=array();
		
		$class[0]=array('pb-team','pb-team-template-'.$attribute['template'],'pb-clear-fix',$attribute['css_class']);
		$class[1]=array('pb-layout-'.$layoutCurrent,'pb-reset-list','pb-clear-fix');

		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>
					'.$teamHTML.'
				</ul>			
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBTeam('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return($html);
	}

	/**************************************************************************/
	
	function getTeam($attribute)
	{
		$argument=array
		(
			'post_type'											=>	PLUGIN_PAGE_BUILDER_CONTEXT.'_team',
			PLUGIN_PAGE_BUILDER_CONTEXT.'_team_category'		=>	$attribute['category'],
			'posts_per_page'									=>	-1,
			'orderby'											=>	'menu_order',
			'order'												=>	'asc'
		);
		
		$query=new WP_Query($argument);
		if($query===false) return;
		
		return($query);
	}
	
	/**************************************************************************/
	
	function initCustomPostType()
	{
		add_action('init',array($this,'adminInit')); 
		add_action('save_post',array($this,'adminSaveMetaBox'));
		add_action('add_meta_boxes',array($this,'adminInitMetaBox'));
		add_filter('manage_edit-'.PLUGIN_PAGE_BUILDER_CONTEXT.'_team_columns',array($this,'adminManageEditColumn')); 
		add_action('manage_'.PLUGIN_PAGE_BUILDER_CONTEXT.'_team_posts_custom_column',array($this,'adminManageColumn'));
		add_filter('manage_edit-'.PLUGIN_PAGE_BUILDER_CONTEXT.'_team_sortable_columns',array($this,'adminManageEditSortableColumn'));
	}
	
	/**************************************************************************/
	
	function adminInit()
	{
		register_post_type
		(
			PLUGIN_PAGE_BUILDER_CONTEXT.'_team',
			array
			(  
				'labels'							=> array
				(
					'name'							=>	__('Team',PLUGIN_PAGE_BUILDER_DOMAIN),
					'singular_name'					=>	__('Team',PLUGIN_PAGE_BUILDER_DOMAIN),
					'add_new'						=>	__('Add New',PLUGIN_PAGE_BUILDER_DOMAIN),
					'add_new_item'					=>	__('Add New Team Member',PLUGIN_PAGE_BUILDER_DOMAIN),
					'edit_item'						=>	__('Edit Team Member',PLUGIN_PAGE_BUILDER_DOMAIN),
					'new_item'						=>	__('New Team Member',PLUGIN_PAGE_BUILDER_DOMAIN),
					'all_items'						=>	__('All Team Members',PLUGIN_PAGE_BUILDER_DOMAIN),
					'view_item'						=>	__('View Team Member',PLUGIN_PAGE_BUILDER_DOMAIN),
					'search_items'					=>	__('Search Team Members',PLUGIN_PAGE_BUILDER_DOMAIN),
					'not_found'						=>	__('No Team Members found',PLUGIN_PAGE_BUILDER_DOMAIN),
					'not_found_in_trash'			=>	__('No Team Members found in Trash',PLUGIN_PAGE_BUILDER_DOMAIN), 
					'parent_item_colon'				=>	'',
					'menu_name'						=>	__('Team',PLUGIN_PAGE_BUILDER_DOMAIN)
				), 
				'public'							=>	false,  
				'show_ui'							=>	true,  
				'capability_type'					=>	'post',
				'hierarchical'						=>	false,  
				'rewrite'							=>	false,  
				'supports'							=>	array('title','editor','page-attributes','thumbnail')
			)				
		);  
		
		register_taxonomy
		(
			PLUGIN_PAGE_BUILDER_CONTEXT.'_team_category',
			array(PLUGIN_PAGE_BUILDER_CONTEXT.'_team'),
			array
			(
				'label'								=>	__('Categories',PLUGIN_PAGE_BUILDER_DOMAIN),
				'labels'							=>	array
				(
					'name'							=>	__('Team categories',PLUGIN_PAGE_BUILDER_DOMAIN),		 
					'singular_name'					=>	__('Team category',PLUGIN_PAGE_BUILDER_DOMAIN),		 
					'menu_name'						=>	__('Categories',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'all_items'						=>	__('All Categories',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'edit_item'						=>	__('Edit Category',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'view_item'						=>	__('View Category',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'update_item'					=>	__('Update Category',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'add_new_item'					=>	__('Add New Category',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'new_item_name'					=>	__('New Category Name',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'parent_item'					=>	__('Parent Category',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'parent_item_colon'				=>	__('Parent Category:',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'search_items'					=>	__('Search Categories',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'popular_items'					=>	__('Popular Categories',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'separate_items_with_commas'	=>	__('Separate categories with commas',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'add_or_remove_items'			=>	__('Add or remove categories',PLUGIN_PAGE_BUILDER_DOMAIN),	
					'choose_from_most_used'			=>	__('Choose from the most used categories',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'hierarchical' => true
			)
		); 	
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxBase()
	{
		global $post;
		
		$data=array();

		$data['option']=PBMeta::get($post);
		$data['nonce']=wp_nonce_field('adminSaveMetaBox',PLUGIN_PAGE_BUILDER_CONTEXT.'_team_noncename',false,false);
		
		PBHelper::setDeafultOption($data['option'],'team_first_name',null);
		PBHelper::setDeafultOption($data['option'],'team_second_name',null);
		PBHelper::setDeafultOption($data['option'],'team_position',null);
		PBHelper::setDeafultOption($data['option'],'team_url',null);

		$Template=new PBTemplate($data,$this->getTemplateFullPath('meta_box_base'));
		echo $Template->output();				
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxSkill()
	{
		global $post;
		
		$data=array();

		$data['option']= PBMeta::get($post);
		$data['nonce']=wp_nonce_field('adminSaveMetaBox',PLUGIN_PAGE_BUILDER_CONTEXT.'_team_noncename',false,false);
		
		$data['tableId']=PBHelper::createId('team_skill_table');
		
		PBHelper::setDeafultOption($data['option'],'team_skill','');

		$Template=new PBTemplate($data,$this->getTemplateFullPath('meta_box_skill'));
		echo $Template->output();				
	}
	
	/**************************************************************************/
	
	function adminCreateMetaBoxSocial()
	{
		global $post;
		
		$data=array();

		$data['option']=PBMeta::get($post);
		$data['nonce']=wp_nonce_field('adminSaveMetaBox',PLUGIN_PAGE_BUILDER_CONTEXT.'_team_noncename',false,false);
		
		$data['dictionary']['social']=$this->social;
		
		$data['tableId']=PBHelper::createId('team_social_table');
		
		PBHelper::setDeafultOption($data['option'],'team_social','');

		$Template=new PBTemplate($data,$this->getTemplateFullPath('meta_box_social'));
		echo $Template->output();				
	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{
		add_meta_box(PLUGIN_PAGE_BUILDER_CONTEXT.'_team_base',__('Base information',PLUGIN_PAGE_BUILDER_DOMAIN),array($this,'adminCreateMetaBoxBase'),PLUGIN_PAGE_BUILDER_CONTEXT.'_team','normal','high');	
		add_meta_box(PLUGIN_PAGE_BUILDER_CONTEXT.'_team_skill',__('Skills',PLUGIN_PAGE_BUILDER_DOMAIN),array($this,'adminCreateMetaBoxSkill'),PLUGIN_PAGE_BUILDER_CONTEXT.'_team','normal','high');	
		add_meta_box(PLUGIN_PAGE_BUILDER_CONTEXT.'_team_social',__('Social networks',PLUGIN_PAGE_BUILDER_DOMAIN),array($this,'adminCreateMetaBoxSocial'),PLUGIN_PAGE_BUILDER_CONTEXT.'_team','normal','high');	
	}
	
	/**************************************************************************/
	
	function adminSaveMetaBox($postId)
	{
		if($_POST)
		{
			if(PBHelper::checkSavePost($postId,PLUGIN_PAGE_BUILDER_CONTEXT.'_team_noncename','adminSaveMetaBox')===false) return(false);
			
			$option=PBHelper::getPOSTOption('team');
			
			$Validation=new PBValidation();
			
			/***/
			
			PBHelper::removeUIndex($option,'team_skill_name','team_skill_level','team_skill_order');	
			$skill=array
			(
				'team_skill_name'		=>	$option['team_skill_name'],
				'team_skill_level'		=>	$option['team_skill_level'],
				'team_skill_order'		=>	$option['team_skill_order'],
				
			);
			
			unset($option['team_skill_name'],$option['team_skill_level'],$option['team_skill_order']);
			
			foreach($skill['team_skill_name'] as $index=>$value)
			{
				if($Validation->isEmpty($value)) continue;
				
				if(!array_key_exists($index,$skill['team_skill_level'])) continue;
				if(!$Validation->isNumber($skill['team_skill_level'][$index],1,100)) continue;
				
				$option['team_skill'][]=array
				(
					'team_skill_name'		=>	$value,
					'team_skill_level'		=>	$skill['team_skill_level'][$index],
					'team_skill_order'		=>	array_key_exists($index,$skill['team_skill_order']) ? $skill['team_skill_order'][$index] : 0
				);
			}
			
			/***/
			
			PBHelper::removeUIndex($option,'team_social_name','team_social_url','team_social_order');	
			$social=array
			(
				'team_social_name'		=>	$option['team_social_name'],
				'team_social_url'		=>	$option['team_social_url'],
				'team_social_order'		=>	$option['team_social_order'],
			);
			
			unset($option['team_social_name'],$option['team_social_url'],$option['team_social_order']);
			
			foreach($social['team_social_name'] as $index=>$value)
			{
				if(!array_key_exists($value,$this->social)) continue;
				
				if(!array_key_exists($index,$social['team_social_url'])) continue;
				if(!$Validation->isURL($social['team_social_url'][$index])) continue;
				
				$option['team_social'][]=array
				(
					'team_social_name'		=>	$value,
					'team_social_url'		=>	$social['team_social_url'][$index],
					'team_social_order'		=>	array_key_exists($index,$social['team_social_order']) ? $social['team_social_order'][$index] : 0
				);
			}
			
			PBMeta::update($postId,$option);
		}		
	}
	
	/**************************************************************************/
	
	function adminManageEditColumn($column)
	{
		$column=array
		(  
			'cb'				=> '<input type="checkbox"/>',
			'team_image'		=> __('Image',PLUGIN_PAGE_BUILDER_DOMAIN),
			'team_name'			=> __('Name',PLUGIN_PAGE_BUILDER_DOMAIN),
			
		);    

		return($column);  		
	}
	
	/**************************************************************************/
	
	function adminManageColumn($column)
	{
		global $post;
		$option=PBMeta::get($post);
		
		PBHelper::removeUIndex($option,'team_first_name','team_second_name');
		
		switch($column)  
		{
			case 'team_image':   
				
				if(has_post_thumbnail($post->ID))
				{
					echo '<a href="'.get_edit_post_link($post->ID).'">'.get_the_post_thumbnail($post->ID,'thumbnail').'</a><br/>'; 
				}
				
			break;
			case 'team_name':   
	
				echo '<a href="'.get_edit_post_link($post->ID).'">'.trim($option['team_first_name'].' '.$option['team_second_name']).'</a><br/>'; 
	
			break;
		}  
		
		return($column);		
	}
	
	/**************************************************************************/
	
	function adminManageEditSortableColumn($column)
	{
		$column['team_image']='title';
		$column['team_name']='title';
		
		return($column);		
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/