<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentSitemap extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Post=new PBPost();
		
		$this->style=array
		(
			'sitemap'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		/***/
		
		$element=array();
		

		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
		{
			$bullet=(array)PBComponentData::get($this->getComponentId(),'bullet');
			$file=PBFile::scanDir($bullet['path']);

			$this->bullet=array
			(
				'url'				=>	$bullet['url'],
				'url_retina'		=>	$bullet['url_retina'],
				'path'				=>	$bullet['path'],
				'file'				=>	array_combine($file,$file)
			);

			$element=array
			(
					array
					(
						'id'													=>	'bullet',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('List bullet',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->bullet['file'],
									'use_default'								=>	false
								)
							)
						)
					)
			);
		}
		else 
		{
			$element=array
			(	
					array
					(
						'id'													=>	'font_icon_name',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter name of the icon (you have to enter at least two characters to get best matched set of icons).',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'fa-icon'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'check-square'
						)
					),	
					array
					(
						'id'													=>	'font_icon_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Icon color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Icon color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'font_icon_size',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Icon size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Icon size in pixels. Value 0 means that default size for will be used.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	0,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	200
								)
							)
						)
					)				
			);
		}

		/***/
		
		$this->component=array
		(
			'name'																=>	__('Sitemap',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Sitemap',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Sitemap',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Data source',PLUGIN_PAGE_BUILDER_DOMAIN)
						),						
						3														=>	array
						(
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'date_enable',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Date',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable displaying of item date.',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'post_type',
						'ui'													=>	array
						(
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
					)
				)
			)
		);
		
		foreach($element as $elementValue)
			$this->component['structure']['element'][]=$elementValue;
		
		if(PBComponentData::get($this->getComponentId(),'icon_type')!='none')
			unset($this->component['structure']['is']['panel'][3]);
			
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		if(PBComponentData::get($this->getComponentId(),'icon_type')!=='gr') return;
		
		$CSS=new PBCSS();

		$key=$retina ? 'url_retina' : 'url';
			
		$codeCurrent=null;
		foreach((array)$this->bullet['file'] as $file)
		{
			$codeCurrent.=$CSS->create(array
			(
				'selector'	=>	array
				(
					'.pb-sitemap.pb-sitemap-icon-name-'.PBHelper::createHash($file).' ul li'
				),
				'property'	=>	array
				(
					'background-image'	=>	$this->bullet[$key].$file,
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
	
	function processShortcodeSitemap($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		$argument=array();
		
		if(isset($attribute['date_enable']))
			if(!$Validation->isBool($attribute['date_enable'])) return($html);
		
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
		
		$class=array(array('pb-sitemap'),array('pb-reset-list'));
		
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
		{
			if(array_key_exists($attribute['bullet'],$this->bullet['file']))
				array_push($class[0],'pb-sitemap-icon-type-gr','pb-sitemap-icon-name-'.PBHelper::createHash($attribute['bullet']));
		}
		
		$iconHTML=null;
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='fa')
		{
			if($Validation->isNotEmpty($attribute['font_icon_name']))
			{
				$style=array();
	
				if($Validation->isColor($attribute['font_icon_color']))		
					$style['color']=PBColor::getColor($attribute['font_icon_color']);
				if($Validation->isNumber($attribute['font_icon_size'],1,200))		
					$style['font-size']=$attribute['font_icon_size'].'px';				

				array_push($class[0],'pb-sitemap-icon-type-fa');
				
				$iconHTML='<i class="fa fa-'.esc_attr($attribute['font_icon_name']).'"'.PBHelper::createStyleAttribute($style).'></i>';
			}
		}
		
		global $post;
		$bPost=$post;

		while($query->have_posts())
		{
			$query->the_post();
			
			$html.=
			'
				<li id="post-'.get_the_ID().'" class="'.implode(' ',get_post_class()).'">
					'.$iconHTML.'
					<a href="'.get_the_permalink().'">'.preg_replace('/\<br\/\>/',' ',get_the_title()).'</a>
					'.(((isset($attribute['date_enable'])) && ($attribute['date_enable'])) ? '<span class="pb-sitemap-date">'.get_the_date('',$post).'</span>' : null).'
				</li>
			';
		}
		
		$post=$bPost;
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).'>
				<ul'.PBHelper::createClassAttribute($class[1]).'>'.$html.'</ul>
			</div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/