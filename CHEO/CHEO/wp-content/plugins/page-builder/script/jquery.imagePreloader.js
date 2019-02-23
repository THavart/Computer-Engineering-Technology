/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var imagePreloader=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		
		/**********************************************************************/

		this.create=function() 
		{
			var helper=new PBHelper();
			
			$('.pb-image-preloader').each(function() 
			{
				var box=$(this);
				var image=box.find('img');
				
				if(image.length===1)
				{
					var loadClass=helper.addLoadClass();

					$(image).one('load',function()
					{
						if(box.hasClass('pb-image-preloader-animation-enable'))
						{
							var height=$self.getImageBoxHeight(box);
							box.animate({'height':height},500,function() 
							{
								box.css({'height':'auto','background-image':'none'});
								box.children().animate({'opacity':1},300,function() 
								{			
									$self.complete(box,loadClass);
								}); 
							});
						}
						else
						{
							box.css({'height':'auto'});
							box.children().css({'opacity':1});
							$self.complete(box,loadClass);
						}

					}).each(function() 
					{
						if(this.complete) $(this).load();
					});
				}
			});
		};
		
		/**********************************************************************/
		
		this.complete=function(box,loadClass)
		{
			var helper=new PBHelper();
			
			box.removeClass('pb-image-preloader');
					
			box.find('img').unbind('load');
			
			helper.removeLoadClass(loadClass);	
		};
		
		/**********************************************************************/
		
		this.getImageBoxHeight=function(box)
		{
			var height=0;
			box.children().each(function() 
			{
				height+=$(this).actual('outerHeight');
			});
			return(height);
		};

		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.imagePreloader=function() 
	{
		var element=new imagePreloader();
		element.create();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/