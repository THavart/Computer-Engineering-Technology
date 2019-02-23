<?php

/******************************************************************************/
/******************************************************************************/

class ThemeMenu
{
	/**************************************************************************/

	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function getMenuDictionary($useNone=true,$useGlobal=true,$useLeftUnchaged=false)
	{
		$menu=get_terms('nav_menu');
		
		$data=array();
		
		if($useNone) $data[0]=array(__('[None]',THEME_DOMAIN));
		if($useGlobal) $data[-1]=array(__('[Use global settings]',THEME_DOMAIN));
		if($useLeftUnchaged) $data[-10]=array(__('[Left unchaged]',THEME_DOMAIN));

		foreach($menu as $singlePost)
			$data[$singlePost->term_id]=array($singlePost->name);
		
		return($data);
	}
	
	/**************************************************************************/
	
	function create()
	{
		global $fable_parentPost;
		
		$attribute=array();
		$attribute['menu_id']=0;
		
		$menu=wp_get_nav_menus();
		$menuLocation=get_nav_menu_locations();
		
		$locationId='menu_top';
		
		$Validation=new ThemeValidation();
		
		if(isset($menuLocation[$locationId])) 
		{
			foreach($menu as $m)
			{
				if($m->term_id==$menuLocation[$locationId])
					$attribute['menu_id']=$m->term_id;
			}
		}

		if($attribute['menu_id']==0)
			if(ThemeOption::getGlobalOption($fable_parentPost->post,'menu_top',ThemeOption::getOptionPostfix())==0) return;

		if($attribute['menu_id']==0)
			$attribute['menu_id']=ThemeOption::getGlobalOption($fable_parentPost->post,'menu_top',ThemeOption::getOptionPostfix());
		
		$attribute['logo_src']=ThemeOption::getOption('menu_logo_src');
		
		$attribute['responsive_mode']=ThemeOption::getOption('menu_responsive_mode');
		
		$attribute['sticky_enable']=ThemeOption::getOption('menu_sticky_enable');
		$attribute['hide_scroll_enable']=ThemeOption::getOption('menu_hide_scroll_enable');
		
		$attribute['menu_animation_enable']=ThemeOption::getOption('menu_animation_enable');
		$attribute['menu_animation_speed_open']=ThemeOption::getOption('menu_animation_speed_open');
		$attribute['menu_animation_speed_close']=ThemeOption::getOption('menu_animation_speed_close');
		$attribute['menu_animation_delay']=ThemeOption::getOption('menu_animation_delay');
		
		$attribute['scroll_animation_enable']=ThemeOption::getOption('menu_scroll_animation_enable');
		$attribute['scroll_animation_speed']=ThemeOption::getOption('menu_scroll_animation_speed');
		$attribute['scroll_animation_easing']=ThemeOption::getOption('menu_scroll_animation_easing');

		$attribute['css_class']='pb';

		if(!class_exists('PBComponentMenu'))
		{
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

			$option['responsive_menu_id']=ThemeHelper::createId('pb_menu_responsive');
			$option['responsive_menu_label']=__('Menu',THEME_DOMAIN);

			$id=ThemeHelper::createId('pb_menu');

			$classLogo=array('pb-logo');
			$classMenu=array('pb-menu-default');
			$classMenuResponsive=array('pb-menu-responsive');

			$class=array('pb-menu',$attribute['css_class']);

			$menuAttribute=array
			(
				'menu'				=>	$attribute['menu_id'],
				'walker'			=>	new ThemeMenuWalker(),
				'menu_class'		=>	'sf-menu pb-reset-list pb-clear-fix',
				'container'			=>	'',
				'container_class'	=>	'',
				'echo'				=>	0
			);

			$menuResponsiveAttribute=array
			(
				'id'				=>	$option['responsive_menu_id'],
				'menu'				=>	$attribute['menu_id'],
				'walker'			=>	new ThemeMenuResponsiveWalker(),
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
				<div'.ThemeHelper::createClassAttribute($class).' id="'.$id.'">
					<div class="pb-main pb-clear-fix">
						<div'.ThemeHelper::createClassAttribute($classLogo).'>
							'.$logoHTML.'
						</div>
						<div'.ThemeHelper::createClassAttribute($classMenu).'>
							'.wp_nav_menu($menuAttribute).'
						</div>
						<div'.ThemeHelper::createClassAttribute($classMenuResponsive).'>
							'.wp_nav_menu($menuResponsiveAttribute).'
						</div>	
					</div>
				</div>
				<div class="pb-script-tag">
					<script type="text/javascript">
						jQuery(document).ready(function($)
						{
							$(\'#'.$id.'\').menu('.json_encode($option).');
						});
					</script>
				</div>
			';

			return($html);
		}
		else
		{
			$attributeString=null;
			foreach($attribute as $index=>$value)
				$attributeString.=' '.$index.'="'.$value.'"';

			$shortcode='['.PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.'menu'.$attributeString.']';

			echo do_shortcode($shortcode);
		}
	}
	
	/**************************************************************************/
	
	function setupNavigationMenuItemField($menu_item) 
	{
		$meta=get_post_meta($menu_item->ID,'pb_meta',true);
		
		ThemeHelper::removeUIndex($meta,'menu_item_icon','menu_item_mega_menu_enable','menu_item_mega_menu_layout');
		
		$menu_item->icon=$meta['menu_item_icon'];
		$menu_item->mega_menu_enable=$meta['menu_item_mega_menu_enable'];
		$menu_item->mega_menu_layout=$meta['menu_item_mega_menu_layout'];

		return($menu_item);
	}
	
	/**************************************************************************/

	function updateNavigationMenuItemField($menu_id,$menu_item_db_id,$args) 
	{
		$key=array('menu_item_icon','menu_item_mega_menu_enable','menu_item_mega_menu_layout');

		foreach($key as $index)
		{
			if(array_key_exists($index,$_REQUEST))
			{
				if(isset($_REQUEST[$index][$menu_item_db_id]))
				{
					$value=$_REQUEST[$index][$menu_item_db_id];
					
					$meta=get_post_meta($menu_item_db_id,'pb_meta',true);
					
					$meta[$index]=$value;
					
					update_post_meta($menu_item_db_id,'pb_meta',$meta);
				}
			}
		}
	}
	
	/**************************************************************************/
	
	function editNavigationMenuWalker($walker,$menu_id) 
	{
		return 'Walker_Nav_Menu_Edit_Custom';
	}
	
	/**************************************************************************/
	
	function getIcon()
	{
		$file=ThemeFile::scanDir(THEME_PATH_MEDIA.'image/public/icon_menu/');
		return($file);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/