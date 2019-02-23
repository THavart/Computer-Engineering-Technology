/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBCounterList=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{			
			this.animate();
		};
		
		/**********************************************************************/
		
		this.animate=function()
		{
			var option={selector:{},option:{},waypoint:{initial:{},trigger:{}}};
			
			option.selector.value='.pb-counter-list-value-value';
			option.selector.progress='.pb-counter-list-foreground';
			
			option.option.enable=$option.waypoint_enable;
			option.option.easing=$option.waypoint_easing;
			option.option.duration=$option.waypoint_duration;
			
			option.waypoint.trigger.offset=$option.waypoint_offset_trigger;
			
			var animationWaypoint=new PBAnimationWaypoint();
			animationWaypoint.counter($this.find('ul>li'),option);
		};

		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBCounterList=function(option) 
	{
		var object=new PBCounterList(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/