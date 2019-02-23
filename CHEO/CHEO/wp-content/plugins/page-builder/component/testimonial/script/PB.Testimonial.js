/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBTestimonial=function(object,carouselOption)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $carouselOption=carouselOption;

		/**********************************************************************/

		this.build=function() 
		{
			var helper=new PBHelper();
			
			if(parseInt($carouselOption.carousel_enable)===1)
				$this.children('ul').addClass('pb-layout-responsive-0');
			
			$carouselOption.onCreate=function()
			{
				$this.css({visibility:'visible'});
			};
			
			helper.createCarousel($this,$carouselOption);
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBTestimonial=function(carouselOption) 
	{
		var object=new PBTestimonial(this,carouselOption);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/