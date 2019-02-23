/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBNotice=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);

		/**********************************************************************/

		this.build=function() 
		{
			var time=0;
			var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');

			$this.find('.pb-notice-close-button').bind(clickEventType,function(e) 
			{
				e.preventDefault();
				$this.hide('blind',{},300,function()
				{
					$(this).remove();
				});
			});

			if(typeof($this.attr('class'))!=='undefined')
			{
				var c=$this.attr('class').split(' ');
				for(var i in c)
				{
					if(parseInt(new String(c[i]).indexOf('pb-notice-time-to-close-'))!==-1)
					{
						time=parseInt(c[i].substring(24));
						break;
					}			
				}
			}
		
			if(time<=0) return;
		
			var closeButton=$this.find('.pb-notice-close-button');
			var timeline=$this.find('.pb-notice-timeline>div');
		
			if((closeButton.length===0) && (timeline.length===0)) return;
		
			var timer=closeButton.find('span');
			
			$(timer).countdown(
			{
				until		:	time,
				format		:	'S',
				layout		:	' {sn} ',
				onExpiry	:	function()
				{
					$this.hide('blind',{},600,function()
					{
						$(this).remove();
					});
				},
				onTick		:	function(period)
				{	
					timer.html(period[6]);
				}
			}); 
		
			if(timeline.length===1)
				timeline.animate({width:'100%'},{duration:time*1000,easing:'linear'});
		};
	};
	
	/**************************************************************************/
	
	$.fn.PBNotice=function(option) 
	{
		var object=new PBNotice(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/