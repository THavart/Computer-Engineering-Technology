/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBClass=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;
		
		/**********************************************************************/

		this.build=function() 
		{
			$this.windowDimensionListener({change:function(width,height) 
			{
				if($this.actual('width')<=300) $this.addClass('pb-responsive-width-300');
				else $this.removeClass('pb-responsive-width-300');
			}});
			
			var helper=new PBHelper();
			helper.setEqualHeight($this.children('ul'),true);
			
			$this.children('ul').children('li').css({visibility:'visible'});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBClass=function(option) 
	{
		var object=new PBClass(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/