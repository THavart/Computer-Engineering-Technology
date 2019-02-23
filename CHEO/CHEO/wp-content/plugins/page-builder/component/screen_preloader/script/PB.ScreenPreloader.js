/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBScreenPreloader=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var self=this;
			var helper=new PBHelper();
			
			$('body').prepend($this);

			var preloaderClock=window.setTimeout(function() 
			{
				var value=helper.getValueFromClass($('body'),'pb-load-');
				
				if(value) self.build($this);
				else
				{
					window.clearTimeout(preloaderClock);
					
					$('body.pb').css({'opacity':'1'});
					
					$this.css('background-image','none');
					$this.animate({opacity:0},{duration:200,complete:function() 
					{
						$this.remove();
					}});
				}
			},200);	
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBScreenPreloader=function(option) 
	{
		var object=new PBScreenPreloader(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/