<?php

/******************************************************************************/
/******************************************************************************/

class PBBackground
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->backgroundRepeat=array
		(
			'no-repeat'															=>	array(__('Image will not be repeated',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'repeat-y'															=>	array(__('Image will be repeated only vertically',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'repeat-x'															=>	array(__('Image will be repeated only horizontally',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'repeat'															=>	array(__('Image will be repeated both vertically and horizontally',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'inherit'															=>	array(__('Property should be inherited from the parent element',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->backgroundSize=array
		(
			'auto'																=>	array(__('Auto',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'length'															=>	array(__('Length',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'percentage'														=>	array(__('Percentage',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'cover'																=>	array(__('Cover',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'contain'															=>	array(__('Contain',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'initial'															=>	array(__('Initial',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'inherit'															=>	array(__('Inherit',PLUGIN_PAGE_BUILDER_DOMAIN))
		);		
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/