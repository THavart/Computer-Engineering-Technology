jQuery(document).ready(function($) 
{
	/**************************************************************************/

	var helper=new PBHelper();
	
	$().imagePreloader();
	$().imageHover();
	
	$('.pb-image-type-image:not(.pb-fancybox-disabled) a').fancyBoxLaunch();
	$('a:has(img.pb-fancybox)').fancyBoxLaunch();
	
	$('.pb-image-type-video a').fancyBoxLaunch({type:'video'});
	
	helper.setLinkTarget('a.pb-window-target-blank');
	
	/**************************************************************************/

	$('.pb-layout-100').responsiveElement({className:'pb-responsive-column-a'});
	$('.pb-layout-50x50').responsiveElement({className:'pb-responsive-column-a'});
	$('.pb-layout-33x33x33').responsiveElement({width:650,className:'pb-responsive-column-a'});
	$('.pb-layout-25x25x25x25').responsiveElement({width:650,className:'pb-responsive-column-a'});
	$('.pb-layout-66x33').responsiveElement({className:'pb-responsive-column-a'});
	$('.pb-layout-33x66').responsiveElement({className:'pb-responsive-column-a'});
	$('.pb-layout-25x75').responsiveElement({className:'pb-responsive-column-a'});
	$('.pb-layout-75x25').responsiveElement({className:'pb-responsive-column-a'});
	
	if(jQuery().waypoints)
	{
		$().windowDimensionListener({'change':function(width,height) 
		{
			if(height) $.waypoints('refresh');
		}});
	}
	
	$('body.pb').css({'opacity':'1'});

	$(window).trigger('resize');

	/**************************************************************************/
});