<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentMenu extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		
		$this->icon_url=PBComponentData::get($this->getComponentId(),'icon_url');
		$this->icon_path=PBComponentData::get($this->getComponentId(),'icon_path');
		$this->icon_file=PBComponentData::setFile($this->getComponentId(),'icon_file',$this->icon_path);
		
		if(PBData::get('retina_ready')==1)
			$this->icon_url_retina=PBComponentData::get($this->getComponentId(),'icon_url_retina');
		
		add_theme_support('menus');
		
		add_filter('wp_setup_nav_menu_item',array($this,'setupNavigationMenuItemField'));
		add_action('wp_update_nav_menu_item',array($this,'updateNavigationMenuItemField'),10,3);
		add_filter('wp_edit_nav_menu_walker',array($this,'editNavigationMenuWalker'),10,2);

		$this->style=array
		(
			'menu'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			),
			'responsive-nav'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'responsive-nav.css'
			)
		);
		
		$this->script=array
		(
			'responsive-nav'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'responsive-nav.min.js'
			),	
			'superfish'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'superfish.js'
			),
			'menu'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Menu.js'
			)
		);
		
		$ResponsiveMode=new PBResponsiveMode();
		
		$this->responiveMode=$ResponsiveMode->getDictionary();
		
		$this->component=array
		(
			'name'																=>	__('Menu + Logo',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Menu and logo',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Menu + Logo',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'logo_src',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Logo',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select a image file',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-image',
							)
						)
					),		
					array
					(
						'id'													=>	'menu_id',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Menu',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select a menu',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->getMenuDictionary()),
								)
							)
						)
					),	
					array
					(
						'id'													=>	'responsive_mode',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Responsive menu',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable responsive menu when screen width (in px) is less than selected',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->responiveMode),
									'use_default'								=>	true
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'responsive_menu_default')
						)
					),	
					array
					(
						'id'													=>	'sticky_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Sticky menu',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable sticky menu',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'hide_scroll_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Hide menu on scroll',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Hide menu when page is scrolled',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'menu_animation_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Menu animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable menu animation',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'menu_animation_speed_open',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Menu opening speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Speed of the opening animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'400'
						)
					),
					array
					(
						'id'													=>	'menu_animation_speed_close',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Menu closing speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Speed of the closing animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'200'
						)
					),	
					array
					(
						'id'													=>	'menu_animation_delay',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Menu delay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('The delay in milliseconds that the mouse can remain outside a submenu without it closing',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'800'
						)
					),
					array
					(
						'id'													=>	'scroll_animation_enable',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Scrolling animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable animation during page scrolling (after clicking on menu item)',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'scroll_animation_speed',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Scrolling speed',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Speed of the scrolling in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'1000'
						)
					),					
					array
					(
						'id'													=>	'scroll_animation_easing',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Scrolling easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Type of easing for scrolling animation.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'easeOutQuint'
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		$CSS=new PBCSS();
		
		$url=$retina ? $this->icon_url_retina : $this->icon_url;
			
		$codeCurrent=null;
		foreach($this->icon_file as $value)
		{
			$codeCurrent.=$CSS->create(array
			(
				'selector'	=>	array
				(
					'.pb-menu .pb-menu-default>ul>li.pb-menu-icon.pb-menu-icon-'.PBHelper::createHash($value).'>a>span'
				),
				'property'	=>	array
				(
					'background-image'	=>	$url.$value,
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
	
	function getMenuDictionary()
	{
		$menu=get_terms('nav_menu');

		$data=array();
		
		foreach($menu as $singlePost)
			$data[$singlePost->term_id]=array($singlePost->name);
		
		return($data);
	}
	
	/**************************************************************************/

	function processShortcodeMenu($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		
		if(!array_key_exists($attribute['responsive_mode'],$this->responiveMode)) return;
		
		if(!$Validation->isBool($attribute['sticky_enable'])) return;
		if(!$Validation->isBool($attribute['hide_scroll_enable'])) return;
	
		if(!$Validation->isBool($attribute['menu_animation_enable'])) return;
		if(!$Validation->isNumber($attribute['menu_animation_speed_open'],0,99999)) return;
		if(!$Validation->isNumber($attribute['menu_animation_speed_close'],0,99999)) return;
		if(!$Validation->isNumber($attribute['menu_animation_delay'],0,99999)) return;
		
		if(!$Validation->isBool($attribute['scroll_animation_enable'])) return;
		if(!$Validation->isNumber($attribute['scroll_animation_speed'],0,99999)) return;
		if(!array_key_exists($attribute['scroll_animation_easing'],$Easing->easingType)) return;
		
		$html=null;
		$logoHTML=null;
		
		$option=array();

		$key=array
		(
			'responsive_mode',
			'sticky_enable',
			'hide_scroll_enable',
			'menu_animation_enable',
			'menu_animation_speed_open',
			'menu_animation_speed_close',
			'menu_animation_delay',
			'scroll_animation_enable',
			'scroll_animation_speed',
			'scroll_animation_easing'
		);	
		
		foreach($key as $value)
			$option[$value]=$attribute[$value];
		
		$option['responsive_menu_id']=PBHelper::createId('pb_menu_responsive');
		$option['responsive_menu_label']=__('Menu',PLUGIN_PAGE_BUILDER_DOMAIN);
		
		$id=PBHelper::createId('pb_menu');
		
		$classLogo=array('pb-logo');
		$classMenu=array('pb-menu-default');
		$classMenuResponsive=array('pb-menu-responsive');
		
		$class=array('pb-menu',$attribute['css_class']);
		
		$menuAttribute=array
		(
			'menu'				=>	$attribute['menu_id'],
			'walker'			=>	new PBMenuWalker(),
			'menu_class'		=>	'sf-menu pb-reset-list pb-clear-fix',
			'container'			=>	'',
			'container_class'	=>	'',
			'echo'				=>	0
		);
		
		$menuResponsiveAttribute=array
		(
			'id'				=>	$option['responsive_menu_id'],
			'menu'				=>	$attribute['menu_id'],
			'walker'			=>	new PBMenuResponsiveWalker(),
			'menu_class'		=>	'pb-clear-fix',
			'container'			=>	'',
			'container_class'	=>	'',
			'echo'				=>	0,
			'items_wrap'		=>	'<div id="%1$s" class="%2$s"><div id="'.$option['responsive_menu_id'].'"><ul>%3$s</ul></div></div>'
		);
		
		if($Validation->isURL($attribute['logo_src']))
		{
			$logoHTML=
			'
				<a href="'.get_home_url().'" title="'.esc_attr(get_bloginfo('name')).'">
					<img src="'.esc_attr($attribute['logo_src']).'" alt="'.esc_attr(get_bloginfo('name')).'"/>
				</a>
			';
		}
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).' id="'.$id.'">
				<div class="pb-main pb-clear-fix">
					<div'.PBHelper::createClassAttribute($classLogo).'>
						'.$logoHTML.'
					</div>
					<div'.PBHelper::createClassAttribute($classMenu).'>
						'.wp_nav_menu($menuAttribute).'
					</div>
					<div'.PBHelper::createClassAttribute($classMenuResponsive).'>
						'.wp_nav_menu($menuResponsiveAttribute).'
					</div>	
				</div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBMenu('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatCode($html));
	}
	
	/**************************************************************************/
	
	function setupNavigationMenuItemField($menu_item) 
	{
		$meta=PBMeta::get($menu_item->ID);
		
		PBHelper::removeUIndex($meta,'menu_item_icon','menu_item_mega_menu_enable','menu_item_mega_menu_layout');
		
		$menu_item->icon=$meta['menu_item_icon'];
		$menu_item->mega_menu_enable=$meta['menu_item_mega_menu_enable'];
		$menu_item->mega_menu_layout=$meta['menu_item_mega_menu_layout'];

		return($menu_item);
	}
	
	/**************************************************************************/

	function updateNavigationMenuItemField($menu_id,$menu_item_db_id,$args) 
	{
		$default=array
		(
			'menu_item_icon'				=>	null,
			'menu_item_mega_menu_enable'	=>	0,
			'menu_item_mega_menu_layout'	=>	'100'
		);

		foreach($default as $index=>$value)
		{
			if(!array_key_exists($index,$_REQUEST))
				$_REQUEST[$index]=array();
			
			if(!isset($_REQUEST[$index][$menu_item_db_id]))
				$_REQUEST[$index][$menu_item_db_id]=$value;
			
			$value=$_REQUEST[$index][$menu_item_db_id];
					
			$meta=PBMeta::get($menu_item_db_id);
					
			$meta[$index]=$value;
					
			PBMeta::update($menu_item_db_id,$meta);
		}
	}
	
	/**************************************************************************/
	
	function editNavigationMenuWalker($walker,$menu_id) 
	{
		return 'Walker_Nav_Menu_Edit_Custom_Component';
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/