/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBCounterBox=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{			
			var helper=new PBHelper();
			
			if(parseInt($option.carousel.carousel_enable)===1)
				$this.children('ul').addClass('pb-layout-responsive-0');
			
			helper.createCarousel($this,$option.carousel);
			
			this.waypoint();
		};
		
		/**********************************************************************/

		this.waypoint=function()
		{
			var option={selector:{},option:{},waypoint:{initial:{},trigger:{}}};
			
			option.selector.value='.pb-counter-box-text-counter-value';
			option.selector.progress='.pb-counter-box-graphic-counter-foreground';
			
			option.option.enable=$option.waypoint.waypoint_enable;
			option.option.easing=$option.waypoint.waypoint_easing;
			option.option.duration=$option.waypoint.waypoint_duration;
			
			option.waypoint.trigger.offset=$option.waypoint.waypoint_offset_trigger;
			
			var animationWaypoint=new PBAnimationWaypoint();
			animationWaypoint.counter($this.find('ul>li'),option);
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBCounterBox=function(carouselOption,animationOption) 
	{
		var object=new PBCounterBox(this,carouselOption,animationOption);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/