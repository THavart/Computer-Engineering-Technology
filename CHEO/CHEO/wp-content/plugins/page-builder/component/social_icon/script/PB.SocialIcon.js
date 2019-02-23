/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBSocialIcon=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var helper=new PBHelper();
			
			helper.hover($this.find('a'),$option);
			
			$this.find('a').each(function() 
			{
				$(this).children('i').css('line-height',parseInt($(this).actual('height'))+'px');
				
				$(this).hover(function()
				{
					$(this).children('i').css('line-height',parseInt($(this).actual('height'))+'px');								
				},function() 
				{
					$(this).children('i').css('line-height',parseInt($(this).actual('height'))+'px');		
				});
			});
		};
		
		/**********************************************************************/
	}
	
	/**************************************************************************/
	
	$.fn.PBSocialIcon=function(option) 
	{
		var object=new PBSocialIcon(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/