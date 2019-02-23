<?php

/******************************************************************************/
/******************************************************************************/

class PBWindow
{
	/**************************************************************************/
	
	function __construct()
	{		
		$this->linkTarget=array
		(	
			'_self'																=>	array(__('Open page in the same frame',PLUGIN_PAGE_BUILDER_DOMAIN),'pb-window-target-self'),
			'_blank'															=>	array(__('Open page in a new window',PLUGIN_PAGE_BUILDER_DOMAIN),'pb-window-target-blank')
		);		
	}
	
	/**************************************************************************/
	
	function getTargetCSSClass($value)
	{
		return(array_key_exists($value,$this->linkTarget) ? $this->linkTarget[$value][1] : 'pb-window-target-self');
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/