<?php

/******************************************************************************/
/******************************************************************************/

class ThemeBackground
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->backgroundRepeat=array
		(
			'no-repeat'															=>	array(__('Image will not be repeated',THEME_DOMAIN)),
			'repeat-y'															=>	array(__('Image will be repeated only vertically',THEME_DOMAIN)),
			'repeat-x'															=>	array(__('Image will be repeated only horizontally',THEME_DOMAIN)),
			'repeat'															=>	array(__('Image will be repeated both vertically and horizontally',THEME_DOMAIN)),
			'inherit'															=>	array(__('Property should be inherited from the parent element',THEME_DOMAIN))
		);
		
		$this->backgroundSize=array
		(
			'auto'																=>	array(__('Auto',THEME_DOMAIN)),
			'length'															=>	array(__('Length',THEME_DOMAIN)),
			'percentage'														=>	array(__('Percentage',THEME_DOMAIN)),
			'cover'																=>	array(__('Cover',THEME_DOMAIN)),
			'contain'															=>	array(__('Contain',THEME_DOMAIN)),
			'initial'															=>	array(__('Initial',THEME_DOMAIN)),
			'inherit'															=>	array(__('Inherit',THEME_DOMAIN))
		);	
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/