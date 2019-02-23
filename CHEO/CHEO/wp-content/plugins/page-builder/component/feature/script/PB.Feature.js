/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBFeature=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var helper=new PBHelper();
			
			if(typeof($option.carousel)!=='undefined')
			{
				if(parseInt($option.carousel.carousel_enable)===1)
					$this.children('ul').addClass('pb-layout-responsive-0');

				helper.createCarousel($this,$option.carousel);
			}
		
			if(typeof($option.waypoint)!=='undefined')
				this.waypoint();
		};
		
		/**********************************************************************/
		
		this.waypoint=function()
		{
			if($option.waypoint.waypoint_type==='none') return;
			
			var object,style={initial:{},trigger:{}},option={},waypoint={initial:{},trigger:{}};
			
			style.trigger.opacity=1;
			style.initial.opacity=parseInt($option.waypoint.waypoint_opacity_initial/100);
			
			option.easing=$option.waypoint.waypoint_easing;
			option.duration=parseInt($option.waypoint.waypoint_duration);			
			
			waypoint.trigger.offset=$option.waypoint.waypoint_offset_trigger;

			switch($option.waypoint.waypoint_type)
			{
				case 'iconFadeIn':
					object=$this.find('.pb-feature-icon');
				break;
				case 'itemFadeIn':
					object=$this.children('ul').children('li');
				break;
			}
			
			var animation=new PBAnimationWaypoint();
			animation.fadeIn(object,style,option,waypoint);
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBFeature=function(option) 
	{
		var object=new PBFeature(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/