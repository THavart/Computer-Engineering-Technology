/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBTeam=function(object,option)
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
			
			option.selector.value='.pb-team-skill-value-value';
			option.selector.progress='.pb-team-skill-foreground';
			
			option.option.enable=$option.skill_list_waypoint_enable;
			option.option.easing=$option.skill_list_waypoint_easing;
			option.option.duration=$option.skill_list_waypoint_duration;
			
			option.waypoint.trigger.offset=$option.skill_list_waypoint_offset_trigger;
			
			var animationWaypoint=new PBAnimationWaypoint();
			animationWaypoint.counter($this.find('.pb-team-skill'),option);			
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBTeam=function(option) 
	{
		var object=new PBTeam(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/