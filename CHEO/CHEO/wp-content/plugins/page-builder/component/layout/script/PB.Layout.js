/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBLayout=function(object,option,mobile)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;
		var $mobile=mobile;
		
		/**********************************************************************/

		this.build=function() 
		{
			var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');
			
			if(String(typeof($option.bg_parallax_enable))!=='udnefined')
			{
				if(parseInt($option.bg_parallax_enable)===1)
				{				
					if((($mobile) && (parseInt($option.bg_parallax_mobile_enable)===1)) || (!$mobile))
						$this.parallax({speed:parseInt($option.bg_parallax_speed)});
				}
			}
			
			$this.find('.pb-line-video-control-toggle-sound').bind(clickEventType,function(e) 
			{
				e.preventDefault();
				
				var video=$(this).parents('.pb-line').children('.pb-line-video').children('video')[0];
				
				if(video.muted)
				{
					$(this).removeClass('pb-line-video-control-toggle-sound-off').addClass('pb-line-video-control-toggle-sound-on');
					video.muted=false;
				}
				else
				{
					$(this).removeClass('pb-line-video-control-toggle-sound-on').addClass('pb-line-video-control-toggle-sound-off');
					video.muted=true;
				}
			});
			
			$this.find('.pb-line-video-control-toggle-play').bind(clickEventType,function(e) 
			{
				e.preventDefault();
				
				var video=$(this).parents('.pb-line').children('.pb-line-video').children('video')[0];
				
				if(video.paused)
				{
					$(this).removeClass('pb-line-video-control-toggle-play-off').addClass('pb-line-video-control-toggle-play-on');
					video.play();
				}
				else
				{
					$(this).removeClass('pb-line-video-control-toggle-play-on').addClass('pb-line-video-control-toggle-play-off');
					video.pause();
				}
			});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBLayout=function(option,mobile) 
	{
		var line=new PBLayout(this,option,mobile);
		line.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/