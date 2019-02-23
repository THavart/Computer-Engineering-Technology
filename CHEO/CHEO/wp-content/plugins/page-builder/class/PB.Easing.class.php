<?php

/******************************************************************************/
/******************************************************************************/

class PBEasing
{
	/**************************************************************************/
	
	function __construct()
	{		
		$this->easingType=array
		(
			'swing'																=>	array(__('swing',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'linear'															=>	array(__('linear',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInQuad'														=>	array(__('easeInQuad',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutQuad'														=>	array(__('easeOutQuad',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutQuad'														=>	array(__('easeInOutQuad',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInCubic'														=>	array(__('easeInCubic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutCubic'														=>	array(__('easeOutCubic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutCubic'													=>	array(__('easeInOutCubic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInQuart'														=>	array(__('easeInQuart',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutQuart'														=>	array(__('easeOutQuart',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutQuart'													=>	array(__('easeInOutQuart',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutQuart'													=>	array(__('easeInOutQuart',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInQuint'														=>	array(__('easeInQuint',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutQuint'														=>	array(__('easeOutQuint',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutQuint'													=>	array(__('easeInOutQuint',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInSine'														=>	array(__('easeInSine',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutSine'														=>	array(__('easeOutSine',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutSine'														=>	array(__('easeInOutSine',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInExpo'														=>	array(__('easeInExpo',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutExpo'														=>	array(__('easeOutExpo',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutExpo'														=>	array(__('easeInOutExpo',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInCirc'														=>	array(__('easeInCirc',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutCirc'														=>	array(__('easeOutCirc',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutCirc'														=>	array(__('easeInOutCirc',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInElastic'														=>	array(__('easeInElastic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutElastic'													=>	array(__('easeOutElastic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutElastic'													=>	array(__('easeInOutElastic',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInBack'														=>	array(__('easeInBack',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutBack'														=>	array(__('easeOutBack',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutBack'														=>	array(__('easeInOutBack',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInBounce'														=>	array(__('easeInBounce',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeOutBounce'														=>	array(__('easeOutBounce',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'easeInOutBounce'													=>	array(__('easeInOutBounce',PLUGIN_PAGE_BUILDER_DOMAIN))
		);	
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/