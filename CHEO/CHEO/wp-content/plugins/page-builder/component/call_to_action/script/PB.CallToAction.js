/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBCallToAction=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);

		/**********************************************************************/

		this.build=function() 
		{
			$this.responsiveElement({children:null,className:'pb-call-to-action-responsive'});
			
			var link=$this.find('div.pb-call-to-action-box>div').children('a');
			
			var option=JSON.parse(link.next('input').val());
			
			var helper=new PBHelper();
			
			helper.hover(link,option);	
		};

		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBCallToAction=function(option) 
	{
		var object=new PBCallToAction(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/