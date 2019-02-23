<?php

/******************************************************************************/
/******************************************************************************/

class ThemeLayout
{
	/**************************************************************************/

	function __construct()
	{
		$this->layout=array
		(
			'100'						=>	array
			(
				'main'					=>	1,
				'name'					=>	__('Layout 100%',THEME_DOMAIN),
				'short_name'			=>	__('100',THEME_DOMAIN),
				'css_class_column'		=>	array('left'),
			),
			'50x50'						=>	array
			(
				'main'					=>	1,
				'name'					=>	__('Layout 50x50%',THEME_DOMAIN),
				'short_name'			=>	__('50x50',THEME_DOMAIN),
				'css_class_column'		=>	array('left','right'),
			),
			'33x33x33'					=>	array
			(
				'main'					=>	1,
				'name'					=>	__('Layout 33x33x33%',THEME_DOMAIN),
				'short_name'			=>	__('33x33x33',THEME_DOMAIN),
				'css_class_column'		=>	array('left','center','right'),
			),
			'33x66'						=>	array
			(
				'main'					=>	0,
				'name'					=>	__('Layout 33x66%',THEME_DOMAIN),
				'short_name'			=>	__('33x66',THEME_DOMAIN),
				'css_class_column'		=>	array('left','right'),
			),
			'66x33'						=>	array
			(
				'main'					=>	0,
				'name'					=>	__('Layout 66x33%',THEME_DOMAIN),
				'short_name'			=>	__('66x33',THEME_DOMAIN),
				'css_class_column'		=>	array('left','right'),
			),
			'25x25x25x25'				=>	array
			(
				'main'					=>	1,
				'name'					=>	__('Layout 25x25x25x25%',THEME_DOMAIN),
				'short_name'			=>	__('25x25x25x25',THEME_DOMAIN),
				'css_class_column'		=>	array('left','center-left','center-right','right'),
			),
			'25x75'						=>	array
			(
				'main'					=>	0,
				'name'					=>	__('Layout 25x75%',THEME_DOMAIN),
				'short_name'			=>	__('25x75',THEME_DOMAIN),
				'css_class_column'		=>	array('left','right'),
			),
			'75x25'						=>	array
			(
				'main'					=>	0,
				'name'					=>	__('Layout 75x25%',THEME_DOMAIN),
				'short_name'			=>	__('75x25',THEME_DOMAIN),
				'css_class_column'		=>	array('left','right'),
			)		
		);
	}
	
	/**************************************************************************/
	
	function isLayout($layout)
	{
		return(array_key_exists($layout,$this->layout) ? true : false);
	}
	
	/**************************************************************************/
	
	function getLayoutColumnCSSClass($layout,$index,$prefix='theme-layout-column-')
	{
		if(!$this->isLayout($layout)) return('');
		
		$index%=substr_count($layout,'x')+1;
		
		return($prefix.$this->layout[$layout]['css_class_column'][$index]);		
	}
	
	/**************************************************************************/
	
	function getLayoutCSSClass($layout,$prefix='theme-layout-')
	{
		if(!$this->isLayout($layout)) return('');
		return($prefix.$layout);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/