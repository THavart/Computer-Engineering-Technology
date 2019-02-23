
/******************************************************************************/
/******************************************************************************/

function PBHelper()
{
	/**************************************************************************/

	this.getRandom=function(min,max)
	{
		return((Math.floor(Math.random()*(max-min)))+min);
	};
	
	/**************************************************************************/
	
	this.setLinkTarget=function(object)
	{
		jQuery(object).attr('target','_blank');
	};
	
	/**************************************************************************/
	
	this.hover=function(object,option,init)
	{
		if(typeof(init)!=='undefined')
		{
			if(init===true)
			{
				for(var i in option['out'])
				{
					if(option['out'][i]!==null) 
						object.css(i,option['out'][i]);	
				}				
			}
		}
		
		object.hover(

			function() 
			{
				for(var i in option['in'])
				{
					if(option['in'][i]!==null) 
						jQuery(this).css(i,option['in'][i]);	
				}
			},
			function()
			{
				for(var i in option['out'])
				{
					if(option['out'][i]!==null) 
						jQuery(this).css(i,option['out'][i]);	
				}
			}
		);	
	}
	
	/**************************************************************************/
	
	this.getValueFromClass=function(object,pattern)
	{
		var reg=new RegExp(pattern);
		var className=jQuery(object).attr('class').split(' ');

		for(var i in className)
		{
			if(reg.test(className[i]))
				return(className[i].substring(pattern.length));
		}

		return(false);		
	};
	
	/**************************************************************************/
	
	this.getRandomString=function(length)
	{
		var string='';
		for(var i=0;i<length;i++)
			string+=String.fromCharCode(this.getRandom(65,90));
		return(string);
	};
	
	/**************************************************************************/

	this.createCarousel=function(carousel,option)
	{
		if(parseInt(option.carousel_enable)!==1) return;
		
		var margin=30;
		var contentWidth=pbOption.config.content_width;
		var list=jQuery(carousel).find('ul:first');
		
		var self=this;

		carousel.parent().css({overflow:'hidden'});

		list.children('li').css(
		{
			'float'			:	'left',
			'clear'			:	'none',
			'margin-right'	:	(pbOption.config.is_rtl ? 0 : margin),
			'margin-left'	:	(pbOption.config.is_rtl ? margin : 0)
		});

		var columnCount=this.getLayoutColumnCount(list);
		var columnWidth=((contentWidth+margin)/columnCount);

		this.setCarouselResponsive(carousel,columnWidth,margin);
		jQuery(window).bind('resize',function() 
		{
			self.setCarouselResponsive(carousel,columnWidth,margin);
		});

		list.carouFredSel(
		{
			debug					:	false,
			auto					:	parseInt(option.carousel_autoplay_enable)===1 ? true : false,
			infinite				:	parseInt(option.carousel_infinite_enable)===1 ? true : false,
			circular				:	parseInt(option.carousel_circular_enable)===1 ? true : false,
			direction				:	'left',
			height					:	'auto',
			responsive				:	true,
			items					: 
			{
				minimum				:	self.getLayoutColumnCount(list)+1		
			},	
			scroll					: 
			{
				fx					:	option.carousel_scroll_fx,
				items				:	1,
				easing				:	option.carousel_scroll_easing,
				duration			:	parseInt(option.carousel_scroll_duration),
				pauseOnHover		:	parseInt(option.carousel_scroll_pause_hover)===1 ? 'resume' : false
			},
			pagination				:	
			{
				anchorBuilder		:	function() 
				{
					var count=jQuery(this).parent('ul').children('li').length;
					return('<a href="#" style="width:'+((100/count)-4)+'%;margin-right:2%;margin-left:2%"></a>');	
				},
				container			:	function() 
				{ 
					var pagination=jQuery(this).parents('.caroufredsel_wrapper').parent('div').find('.pb-slider-pagination');
					
					pagination.css('display','block');
					
					return(pagination); 
				}
			},	
			swipe					:
			{
				onTouch				:	true,
				onMouse				:	true
			},
			onCreate				:	function()
			{
				self.setCarouselResponsive(carousel,columnWidth,margin);
				
				if(typeof(option.onCreate)!=='undefined')
					option.onCreate();
			}
		});		
	};

	/**************************************************************************/

	this.setCarouselResponsive=function(carousel,columnWidth,margin)
	{	
		var parent=jQuery(carousel).parent();
		var parentWidth=parent.parent().actual('width');
		
		var list=carousel.find('ul:first');
		var listElement=list.children('li');

		if(parentWidth>300)
		{
			var columnCount=Math.floor((parentWidth+margin)/(columnWidth));
			if(columnCount===0) columnCount=1;
		}
		else columnCount=1;
		
		if(columnCount===1) columnWidth=parentWidth;

		var carouselWidth=columnWidth*columnCount;
		
		if(columnCount===1) margin=0;
		
		listElement.css({'width':(columnWidth-margin),'margin-right':margin});

		list.css('width',carouselWidth-margin);
		carousel.css('width',carouselWidth);

		list.trigger('configuration',['width',carouselWidth]);
		list.trigger('configuration',['items.width',columnWidth]);
		list.trigger('configuration',['items.visible',columnCount]);
		list.trigger('configuration',['items.minimum',columnCount+1]);

		list.trigger('updateSizes');	
	};

	/**************************************************************************/
	
	this.getLayoutColumnCount=function(object)
	{
		var value=this.getValueFromClass(object,'pb-layout-');
		if(value===false) return(false);
		
		return(value.split('x').length);
	};
	
	/**************************************************************************/

	this.isAnimationComplete=function(object)
	{
		return(object.hasClass('pb-animation-complete') ? true : false);
	};
	
	/**************************************************************************/
	
	this.setAnimationAsComplete=function(object)
	{
		object.addClass('pb-animation-complete');
	};
	
	/**************************************************************************/
	
	this.addLoadClass=function()
	{
		var loadClass='pb-load-'+this.getRandomString(16);
		jQuery('body').addClass(loadClass);
		return(loadClass);
	};
	
	/**************************************************************************/
	
	this.removeLoadClass=function(loadClass)
	{
		jQuery('body').removeClass(loadClass);
	};
	
	/**************************************************************************/
	
	this.parseBool=function(value)
	{
		return(parseInt(value)===1 ? true : false);
	}
	
	/**************************************************************************/
	
	this.setEqualHeight=function(parent,bind)
	{
		var self=this;
		var maxHeight=0;
		
		jQuery(parent).children().each(function() 
		{
			jQuery(this).height('auto');
			var height=jQuery(this).actual('height');
			maxHeight=height>maxHeight ? height : maxHeight;
		});
		
		jQuery(parent).children().height(maxHeight);
		
		if(bind)
		{
			parent.windowDimensionListener({change:function(width,height) 
			{
				if(width || height) self.setEqualHeight(parent,false);
			}});
		}
	};
	
	/**************************************************************************/
	
	this.wait=function(object,onReady)
	{
		var self=this;
		var temporaryClock=window.setTimeout(function() 
		{
			if(jQuery(object).length)
				self.wait(object,onReady);
			else
			{
				window.clearTimeout(temporaryClock);
				onReady.call();
			}
		},200);			
	};
	
	/**************************************************************************/
	
	this.isEmpty=function(value)
	{
		return(jQuery.trim(value).length==0 ? true : false);
	};
	
	/**************************************************************************/
};

/******************************************************************************/
/******************************************************************************/