/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBPricingPlan=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			$this.find('ul>li>div').each(function() 
			{
				var box=$(this).children('.pb-pricing-plan-item-price-box');

				box.remove();

				$(this).prepend(box);
			});
			
			$this.windowDimensionListener({change:function(width,height) 
			{
				if($this.actual('width')<=300) $this.addClass('pb-responsive-width-300');
				else $this.removeClass('pb-responsive-width-300');
			}});				
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBPricingPlan=function(option) 
	{
		var object=new PBPricingPlan(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/