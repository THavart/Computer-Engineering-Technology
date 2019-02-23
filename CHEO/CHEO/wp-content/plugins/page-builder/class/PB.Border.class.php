<?php

/******************************************************************************/
/******************************************************************************/

class PBBorder
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->style=array
		(
			'none'																=>	array(__('None',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'hidden'															=>	array(__('Hidden',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'dotted'															=>	array(__('Dotted',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'dashed'															=>	array(__('Dashed',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'solid'																=>	array(__('Solid',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'double'															=>	array(__('Double',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'groove'															=>	array(__('Groove',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'ridge'																=>	array(__('Ridge',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'inset'																=>	array(__('Inset',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'outset'															=>	array(__('Outset',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'inherit'															=>	array(__('Inherit',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/