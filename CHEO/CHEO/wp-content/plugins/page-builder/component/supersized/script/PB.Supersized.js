/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBSupersized=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			$(document).ready(function()
			{
				$.supersized(
				{
					autoplay				:	parseInt($option.autoplay),
					fit_always				:	parseInt($option.fit_always),
					fit_landscape			:	parseInt($option.fit_landscape),
					fit_portrait			:	parseInt($option.fit_portrait),
					horizontal_center		:	parseInt($option.horizontal_center),
					vertical_center			:	parseInt($option.vertical_center),
					min_width				:	parseInt($option.min_width),
					min_height				:	parseInt($option.min_height),
					image_protect			:	parseInt($option.image_protect),
					keyboard_nav			:	parseInt($option.keyboard_nav),
					new_window				:	parseInt($option.new_window),
					pause_hover				:	parseInt($option.pause_hover),
					random					:	parseInt($option.random),
					start_slide				:	parseInt($option.start_slide),
					stop_loop				:	parseInt($option.stop_loop),
					performance				:	$option.performance,
					transition				:	$option.transition,
					transition_speed		:	parseInt($option.transition_speed),
					slide_interval			:	parseInt($option.slide_interval),
					slides					:	$option.slides
				});
				
				$('#supersized').addClass($option.css_class);
			});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBSupersized=function(option) 
	{
		var object=new PBSupersized(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/