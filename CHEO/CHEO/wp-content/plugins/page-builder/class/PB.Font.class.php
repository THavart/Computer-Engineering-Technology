<?php

/******************************************************************************/
/******************************************************************************/

class PBFont
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->weight=array
		(
			'100'				=>	array(__('100',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'200'				=>	array(__('200',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'300'				=>	array(__('300',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'400'				=>	array(__('400',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'500'				=>	array(__('500',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'600'				=>	array(__('600',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'700'				=>	array(__('700',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'800'				=>	array(__('800',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'900'				=>	array(__('900',PLUGIN_PAGE_BUILDER_DOMAIN)),	
			'bold'				=>	array(__('bold',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'bolder'			=>	array(__('bolder',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'inherit'			=>	array(__('inherit',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'lighter'			=>	array(__('lighter',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'normal'			=>	array(__('normal',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->style=array
		(
			'inherit'			=>	array(__('inherit',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'italic'			=>	array(__('italic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'normal'			=>	array(__('normal',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'oblique'			=>	array(__('oblique',PLUGIN_PAGE_BUILDER_DOMAIN))
		);	
	}
}

/******************************************************************************/
/******************************************************************************/