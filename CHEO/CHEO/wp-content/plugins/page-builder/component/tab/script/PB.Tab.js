/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBTab=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var id=$this.attr('id');
			
			$this.find('>ul>li>a').each(function(index) 
			{
				$(this).attr('href','#'+id+'_'+index);
			});
			$this.find('>div').each(function(index) 
			{
				$(this).attr('id',id+'_'+index);
			});			
			
			var animate={show:false,hide:false};
			if(parseInt($option.animation_show_enable)===1)
			{
				animate.show=
				{
					easing		:	$option.animation_show_easing,
					delay		:	parseInt($option.animation_show_delay),
					duration	:	parseInt($option.animation_show_duration)
				};
			}
			if(parseInt($option.animation_hide_enable)===1)
			{
				animate.hide=
				{
					easing		:	$option.animation_hide_easing,
					delay		:	parseInt($option.animation_hide_delay),
					duration	:	parseInt($option.animation_hide_duration)
				};
			}

			$this.tabs(
			{
				active			:	parseInt($option.active),
				disabled		:	parseInt($option.disabled)===1 ? true : false,
				collapsible		:	parseInt($option.collapsible)===1 ? true : false,
				heightStyle		:	$option.height_style,
				show			:	animate.show,
				hide			:	animate.hide,
				create			:	function()
				{
					$(this).css('display','block');
				}
			});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBTab=function(option) 
	{
		var object=new PBTab(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/