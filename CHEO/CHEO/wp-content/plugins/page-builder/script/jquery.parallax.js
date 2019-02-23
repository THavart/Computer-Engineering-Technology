/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var Parallax=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		
		var $optionDefault=
		{
			speed		:	30
		};
		
		var $option=$.extend($optionDefault,option);
		
		/**********************************************************************/
		
		this.bind=function()
		{		
			var object=this;
			$(window).bind('scroll',function() { object.update(); }).resize(function() { object.update(); });	
			this.update();
		};
		
		/**********************************************************************/
	
		this.update=function() 
		{
			var top=$this.offset().top;
			var position=$(window).scrollTop();
			
			var height=$this.actual('innerHeight');
			var windowHeight=$(window).height();
			
			if((top+height<position) || (top>position+windowHeight)) return;

			$this.css('backgroundPosition','50%'+' '+((position-top)*($option.speed/100))+'px');
		};	
		
		/**********************************************************************/
	};
	
	/**************************************************************************/

	$.fn.parallax=function(option) 
	{
		if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) return;
		
		var parallax=new Parallax(this,option);
		parallax.bind();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/