/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBPreformattedText=function(object)
	{
		/**********************************************************************/
		
		var $this=$(object);

		/**********************************************************************/

		this.build=function() 
		{
			var self=this;
			
			this.switchLabel();
			
			$this.css('display','block');
			
			$this.children('div').children('a').on('click',function(e) 
			{
				e.preventDefault();
				
				var pre=$(this).parent('div').nextAll('pre');
				
				if(String(pre.css('display'))==='block')
					pre.css('display','none');
				else pre.css('display','block');
				
				self.switchLabel();
			});
		};
		
		/**********************************************************************/
		
		this.switchLabel=function()
		{
			var pre=$this.children('pre');
			
			if(String(pre.css('display'))==='block')
			{
				$this.find('.pb-preformatted-text-label-open').css('display','block');
				$this.find('.pb-preformatted-text-label-close').css('display','none');				
			}	
			else
			{
				$this.find('.pb-preformatted-text-label-open').css('display','none');
				$this.find('.pb-preformatted-text-label-close').css('display','block');				
			}
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBPreformattedText=function() 
	{
		var object=new PBPreformattedText(this);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/