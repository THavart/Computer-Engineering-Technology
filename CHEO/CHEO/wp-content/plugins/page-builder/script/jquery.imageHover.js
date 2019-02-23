/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var imageHover=function()
	{
		/**********************************************************************/
		
		var $self=this;
		
		/**********************************************************************/

		this.create=function() 
		{
			$('.pb-image-hover').hover
			(			
				function() 
				{
					var box=$(this);
					
					if($self.hasPreloader(box)) return;
					
					var hover=box.find('a').children('span');
					var hoverType=$self.getHoverType(box);

					var option={properties:{start:{},stop:{}}};
					
					switch(hoverType)
					{
						case 'slide-left-to-right':
							option={properties:{start:{left:'-100%'},stop:{'left':0}}};
						break;
						case 'fade':
							option={properties:{start:{opacity:0},stop:{opacity:1}}};
						break;
					}

					hover.css(option.properties.start).stop().animate(option.properties.stop,{duration:300,easing:'easeInOutQuint',complete:function() 
					{

					}});
				},
				function() 
				{
					var box=$(this);
					
					if($self.hasPreloader(box)) return;
					
					var hover=box.find('a').children('span');
					var hoverType=$self.getHoverType(box);

					var option={properties:{start:{},stop:{}}};

					switch(hoverType)
					{
						case 'slide-left-to-right':
							option={properties:{stop:{left:'100%'}}};
						break;
						case 'fade':
							option={properties:{stop:{opacity:0}}};
						break;
					}

					hover.stop().animate(option.properties.stop,{duration:300,easing:'easeOutQuint',complete:function() 
					{

					}});
				}
			);
		};
		
		/**********************************************************************/
		
		this.hasPreloader=function(box)
		{
			return(box.hasClass('pb-image-preloader').length ? true : false);
		};
		
		/**********************************************************************/

		this.getHoverType=function(object)
		{
			var helper=new PBHelper();
			return(helper.getValueFromClass(object,'pb-image-hover-type-'));
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.imageHover=function() 
	{
		var element=new imageHover();
		element.create();
	};
	
	/**************************************************************************/

})(jQuery,document,window);