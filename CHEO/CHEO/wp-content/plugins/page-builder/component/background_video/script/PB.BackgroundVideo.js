/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBBackgroundVideo=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var video={};
			var helper=new PBHelper();
			
			$('html,body').css('min-height','100%');
			$('html').attr('style',$('html').attr('style')+';margin:0px !important');
			
			if(!helper.isEmpty($option.video_format_mp4))
				video.mp4=$option.video_format_mp4;
			if(!helper.isEmpty($option.video_format_ogg))
				video.ogg=$option.video_format_ogg;
			if(!helper.isEmpty($option.video_format_webm))
				video.webm=$option.video_format_webm;
			if(!helper.isEmpty($option.video_format_poster))
				video.poster=$option.video_format_poster;
			
			var instance=$this.vide(video,
			{
				loop			:	helper.parseBool($option.loop),
				muted			:	helper.parseBool($option.muted),
				volume			:	parseInt($option.volume)/100,
				position		:	$option.position,
				autoplay		:	true,
				playbackRate	:	$option.playback_rate
			});

			instance.addClass('pb-background-video');
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBBackgroundVideo=function(option) 
	{
		var video=new PBBackgroundVideo(this,option);
		video.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/