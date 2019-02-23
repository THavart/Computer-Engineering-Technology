/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBList=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			if(String($option.icon_type)==='fa')
			{			
				$this.find('ul>li').prepend('<i class="fa fa-'+$option.font_icon_name+'"></i>');
				
				if(String(typeof($option.font_icon_color))!=='undefined')
					$this.find('ul>li>i.fa').css('color','#'+$option.font_icon_color);
				if(String(typeof($option.font_icon_size))!=='undefined')
					$this.find('ul>li>i.fa').css('font-size',$option.font_icon_size+'px');				
			}
		};
		
		/**********************************************************************/
	}
	
	/**************************************************************************/
	
	$.fn.PBList=function(option) 
	{
		var object=new PBList(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/