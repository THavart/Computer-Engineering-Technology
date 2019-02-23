<?php

/******************************************************************************/
/******************************************************************************/

class PBLayout
{
	/**************************************************************************/
	
	public $layout;
	
	/**************************************************************************/

	function __construct()
	{
		$this->layout=array
		(
			'100'																=>	array
			(
				'main'															=>	1,
				'name'															=>	__('Layout 100%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('100',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left'),
			),
			'50x50'																=>	array
			(
				'main'															=>	1,
				'name'															=>	__('Layout 50x50%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('50x50',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','right'),
			),
			'33x33x33'															=>	array
			(
				'main'															=>	1,
				'name'															=>	__('Layout 33x33x33%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('33x33x33',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','center','right'),
			),
			'33x66'																=>	array
			(
				'main'															=>	0,
				'name'															=>	__('Layout 33x66%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('33x66',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','right'),
			),
			'66x33'																=>	array
			(
				'main'															=>	0,
				'name'															=>	__('Layout 66x33%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('66x33',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','right'),
			),
			'25x25x25x25'														=>	array
			(
				'main'															=>	1,
				'name'															=>	__('Layout 25x25x25x25%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('25x25x25x25',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','center-left','center-right','right'),
			),
			'25x75'																=>	array
			(
				'main'															=>	0,
				'name'															=>	__('Layout 25x75%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('25x75',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','right'),
			),
			'75x25'																=>	array
			(
				'main'															=>	0,
				'name'															=>	__('Layout 75x25%',PLUGIN_PAGE_BUILDER_DOMAIN),
				'short_name'													=>	__('75x25',PLUGIN_PAGE_BUILDER_DOMAIN),
				'css_class_column'												=>	array('left','right'),
			)		
		);
		
		$this->layoutLine=array
		(
			'full'																=>	array
			(
				'name'															=>	__('Full width',PLUGIN_PAGE_BUILDER_DOMAIN),
			),
			'wide'																=>	array
			(
				'name'															=>	__('Wide',PLUGIN_PAGE_BUILDER_DOMAIN),
			),
			'boxed'																=>	array
			(
				'name'															=>	__('Boxed',PLUGIN_PAGE_BUILDER_DOMAIN),
			),			
		);
	}
	
	/**************************************************************************/
	
	function isLayout($layout)
	{
		return(array_key_exists($layout,$this->layout) ? true : false);
	}
	
	/**************************************************************************/
	
	function isLayoutLine($layout)
	{
		return(array_key_exists($layout,$this->layoutLine) ? true : false);
	}
	
	/**************************************************************************/
	
	function getLayoutCSSClass($layout)
	{
		if(!$this->isLayout($layout)) return('');
		return('pb-layout-'.$layout);
	}
	
	/**************************************************************************/
	
	function getLayoutColumnCSSClass($layout,$index)
	{
		if(!$this->isLayout($layout)) return('');
		
		$index%=substr_count($layout,'x')+1;
		return('column-'.$this->layout[$layout]['css_class_column'][$index]);		
	}
	
	/**************************************************************************/
	
	function getLayoutColumnCount($layout)
	{
		if(!$this->isLayout($layout)) return(0);
		return(substr_count($layout,'x')+1);
	}
	
	/**************************************************************************/

	function getMainLayout()
	{
		$layout=array();
		foreach($this->layout as $index=>$value)
		{
			if($value['main']==1) $layout[$index]=$value;
		}
		return($layout);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/