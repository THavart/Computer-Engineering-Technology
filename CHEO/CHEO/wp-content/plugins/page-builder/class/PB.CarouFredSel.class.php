<?php

/******************************************************************************/
/******************************************************************************/

class PBCarouFredSel
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->scrollFX=array
		(
			'none'				=>	array(__('None',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'scroll'			=>	array(__('Scroll',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'directscroll'		=>	array(__('Directscroll',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'fade'				=>	array(__('Fade',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'crossfade'			=>	array(__('Crossfade',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'cover'				=>	array(__('Cover',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'cover-fade'		=>	array(__('Cover-fade',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'uncover'			=>	array(__('Uncover',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'uncover-fade'		=>	array(__('Uncover-fade',PLUGIN_PAGE_BUILDER_DOMAIN)),
		);
		
		$this->pauseOnHover=array
		(
			'resume'				=>	array(__('Resume',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'immediate'				=>	array(__('Immediate',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'immediate-resume'		=>	array(__('Immediate and resume',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->direction=array
		(
			'left'					=>	array(__('Left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'right'					=>	array(__('Right',PLUGIN_PAGE_BUILDER_DOMAIN))
		);		
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/