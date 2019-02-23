/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var fancyBoxLaunch=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		
		var $optionDefault=
		{
			type						:	'image'
		};
		
		var $option=$.extend($optionDefault,option);

		/**********************************************************************/

		this.create=function() 
		{
			if(String($option.type)==='video') this.createVideoFancybox();
			if(String($option.type)==='image') this.createImageFancybox();
		};
		
		/**********************************************************************/
		
		this.createImageFancybox=function()
		{
			if(typeof(themeOption.fancyboxImage)==='undefined') return;

			var helpers={title:{type:'inside'}};

			if(themeOption.fancyboxImage.helper_button_enable)
			{
				helpers.buttons={skipSingle:true};
			}
			
			$this.fancybox(
			{
				type					:	'image',
				margin					:	parseInt(themeOption.fancyboxImage.margin),
				padding					:	parseInt(themeOption.fancyboxImage.padding),
				minWidth				:	parseInt(themeOption.fancyboxImage.min_width),
				minHeight				:	parseInt(themeOption.fancyboxImage.min_height),
				maxWidth				:	parseInt(themeOption.fancyboxImage.max_width),
				maxHeight				:	parseInt(themeOption.fancyboxImage.max_height),
				autoResize				:	parseInt(themeOption.fancyboxImage.autoresize)===1 ? true : false,
				autoCenter				:	parseInt(themeOption.fancyboxImage.autocenter)===1 ? true : false,
				fitToView				:	parseInt(themeOption.fancyboxImage.fittoview)===1 ? true : false,
				arrows					:	parseInt(themeOption.fancyboxImage.arrow)===1 ? true : false,
				closeBtn				:	parseInt(themeOption.fancyboxImage.close_button)===1 ? true : false,
				closeClick				:	parseInt(themeOption.fancyboxImage.close_click)===1 ? true : false,
				nextClick				:	parseInt(themeOption.fancyboxImage.next_click)===1 ? true : false,
				mouseWheel				:	parseInt(themeOption.fancyboxImage.mouse_wheel)===1 ? true : false,
				autoPlay				:	parseInt(themeOption.fancyboxImage.autoplay)===1 ? true : false,
				playSpeed				:	parseInt(themeOption.fancyboxImage.playspeed),
				loop					:	parseInt(themeOption.fancyboxImage.loop)===1 ? true : false,
				openEffect				:	themeOption.fancyboxImage.animation_effect_open,
				closeEffect				:	themeOption.fancyboxImage.animation_effect_close,
				nextEffect				:	themeOption.fancyboxImage.animation_effect_nex,
				prevEffect				:	themeOption.fancyboxImage.animation_effect_previous,
				openSpeed				:	themeOption.fancyboxImage.speed_open,
				closeSpeed				:	themeOption.fancyboxImage.speed_close,
				nextSpeed				:	themeOption.fancyboxImage.speed_next,
				prevSpeed				:	themeOption.fancyboxImage.speed_previous,		
				openEasing				:	themeOption.fancyboxImage.easing_open,
				closeEasing				:	themeOption.fancyboxImage.easing_close,
				nextEasing				:	themeOption.fancyboxImage.easing_next,
				prevEasing				:	themeOption.fancyboxImage.easing_previous,		
				beforeShow				:	function()
				{
			
				},
				helpers					:	helpers
			});
		};
	
		/**********************************************************************/
	
		this.createVideoFancybox=function()
		{	
			if(typeof(themeOption.fancyboxVideo)==='undefined') return;

			var helpers={};

			helpers.media={};

			$this.fancybox(
			{
				margin					:	parseInt(themeOption.fancyboxVideo.margin),
				padding					:	parseInt(themeOption.fancyboxVideo.padding),
				minWidth				:	parseInt(themeOption.fancyboxVideo.min_width),
				minHeight				:	parseInt(themeOption.fancyboxVideo.min_height),
				maxWidth				:	parseInt(themeOption.fancyboxVideo.max_width),
				maxHeight				:	parseInt(themeOption.fancyboxVideo.max_height),
				autoResize				:	parseInt(themeOption.fancyboxVideo.autoresize)===1 ? true : false,
				autoCenter				:	parseInt(themeOption.fancyboxVideo.autocenter)===1 ? true : false,
				fitToView				:	parseInt(themeOption.fancyboxVideo.fittoview)===1 ? true : false,
				closeBtn				:	parseInt(themeOption.fancyboxVideo.close_button)===1 ? true : false,
				openEffect				:	'none',
				closeEffect				:	'none',
				beforeShow				:	function()
				{

				},
				helpers					:	helpers
			});
		};

		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.fancyBoxLaunch=function(option) 
	{
		var element=new fancyBoxLaunch(this,option);
		element.create();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/