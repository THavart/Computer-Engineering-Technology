/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBAccordion=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var animate=false;
			if($option.animation_enable)
				animate={duration:parseInt($option.animation_duration),easing:$option.animation_easing};
			
			$this.accordion(
			{
				header			:	'h'+$option.header_important_default,
				active			:	parseInt($option.close_at_start)===1 ? false : parseInt($option.active),
				disabled		:	parseInt($option.disabled)===1 ? true : false,
				collapsible		:	parseInt($option.collapsible)===1 ? true : false,
				heightStyle		:	$option.height_style,
				animate			:	animate,
				create			:	function()
				{
					$(this).css('visibility','visible');
				}
			});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBAccordion=function(option) 
	{
		var object=new PBAccordion(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/