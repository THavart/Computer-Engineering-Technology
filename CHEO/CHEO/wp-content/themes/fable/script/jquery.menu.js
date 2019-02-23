/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var Menu=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;
		
		var $responsiveMenu;

		/**********************************************************************/

		this.build=function() 
		{
			var self=this;
			var menu=$this;
			var menuList=menu.find('ul.sf-menu');
			
			/***/
	
			if(parseInt($option.menu_animation_enable)===0)
			{
				$option.menu_animation_delay=0;
				$option.menu_animation_speed_open=0;
				$option.menu_animation_speed_close=0;
			}
			
			menuList.superfish(
			{ 
				delay		:	parseInt($option.menu_animation_delay), 
				animation	:	{height:'show'}, 
				speed		:	parseInt($option.menu_animation_speed_open), 
				speedOut	:	parseInt($option.menu_animation_speed_close),	
				cssArrows	:	false                       
			}); 
			
			/***/

			if(parseInt($option.sticky_enable)===1)
			{
				$this.waypoint('sticky',
				{
					offset		:	function() { return(-1*parseInt($this.actual('height')+100)); },
					wrapper		:	'<div>',
					stuckClass	:	'pb-menu-sticky',
					handler		:	function(direction)
					{
						self.setEqual();
						
						if(parseInt($option.hide_scroll_enable)===0)
						{
							if(direction==='down')
							{
								$this.css({top:-200}).animate({top:0},{complete:function() 
								{

								}});
							}
							else
							{

							}
						}
					}
				});

				if(parseInt($option.hide_scroll_enable)===1)
				{
					$(window).scroll(function() 
					{
						var height=$this.actual('height');

						if($this.hasClass('pb-menu-sticky'))
						{
							$this.stop().animate({'opacity':0,'margin-top':-1*height},{duration:250,complete:function() {}});

							window.clearTimeout($.data(this,'scrollTimer'));
							$.data(this,'scrollTimer',setTimeout(function() 
							{
								$this.stop().animate({'opacity':1,'margin-top':0},{duration:100,complete:function() {}});
							},100));
						}
						else
						{
							$this.css({'opacity':1,'margin-top':0});
						}
					});
				}				
			}
			
			/***/
			
			$(window).windowDimensionListener({change:function(width,height)  
			{
				if(width || height)
				{
					var menuElement=menuList.find('li.pb-menu-item-selected').parent('li');
					self.setSelected(menuElement);
				}
			}});
			
			$('body.pb .pb-line').waypoint(function(direction)
			{
				if(direction==='down')
				{
					self.setSelectedTo($(this));
				}
			},
			{
				offset	:	'50%'
			})
			.waypoint(function(direction)
			{
				if(direction==='up')
				{
					var prevPage=$(this).prevAll('.pb-line').first();
					if(parseInt(prevPage.length)===1) self.setSelectedTo(prevPage);
				}
			},
			{
				offset	:	'50%'
			});			
			
			/***/
			
			$(window).bind('hashchange',function(e) 
			{
				self.scrollTo();
			});	
			
			if(window.location.hash.length!==0)
			{
				jQuery(window).load(function () 
				{
					$(window).trigger('hashchange');
				});
			}
			
			/***/
			
			$responsiveMenu=responsiveNav($option.responsive_menu_id,{label:$option.responsive_menu_label,insert:'before','init':function() 
			{
				$this.find('.nav-toggle').append('<span><span></span></span>');
			}});
			
			$responsiveMenu.resize();
			self.setMenuResponsive();

			$(window).windowDimensionListener({change:function(width,height)  
			{
				if(width || height)
				{
					self.setMenuResponsive();
					$.waypoints('refresh');
					
					$responsiveMenu.resize();
				}
			}});
			
			/***/
			
			self.setEqual();
			$().windowDimensionListener({change:function(width,height)  
			{
				self.setEqual();
			}});
			
			menu.css({display:'block'});
		};
		
		/**********************************************************************/
		
		this.setSelectedTo=function(line)
		{
			var self=this;
			var helper=new PBHelper();
			var hash=helper.getValueFromClass(line,'pb-line-css-group-');

			var menu=$('.pb-menu');
			var menuList=menu.find('.pb-menu-default>ul.sf-menu');
			
			menu.find('.pb-menu-item-selected').removeClass('pb-menu-item-selected');
	
			menuList.each(function() 
			{	
				var menuElement=$(this).children('li').find('a[href="#'+hash+'"]').parent('li');
				self.setSelected(menuElement);
			});
		};
		
		/**********************************************************************/

		this.setSelected=function(menuElement)
		{
			$(menuElement).addClass('pb-menu-item-selected');
		};
		
		/**********************************************************************/
		
		this.scrollTo=function()
		{
			var hash=window.location.hash.substring(1);

			if($.trim(hash).length===0) return;
			if(hash==='page') return;
			
			var object=$('.pb-line-css-group-'+hash+':first');

			if(object.length!==1) return;

			var offset=0;
			if(parseInt($option.sticky_enable)===1)
				offset=-1*$this.actual('height');
			
			var option={};
			
			option.offset=offset;
			
			if(parseInt($option.scroll_animation_enable)===1)
			{
				option.easing=$option.scroll_animation_easing;
				option.duration=parseInt($option.scroll_animation_speed);
			}
			
			option.onAfter=function() 
			{
				window.location.hash='page'; 
			};
			
			$.scrollTo(object,option);				
		};
		
		/**********************************************************************/

		this.setMenuResponsive=function()
		{
			var width=$this.parent().actual('width');

			if(width<$option.responsive_mode)
			{
				$this.addClass('pb-menu-responsive-mode');
			}
			else
			{
				$this.removeClass('pb-menu-responsive-mode');
				$responsiveMenu.close();
			}
		};
		
		/**********************************************************************/
		
		this.setEqual=function()
		{
			var logo=$this.find('.pb-logo');	
			
			logo.each(function() 
			{
				var menu=$(this).next('.pb-menu-default');
				if(menu.length!==1) return; 
				
				if(menu.parents('.pb-menu.pb-menu-responsive').length!==1) 
				{
					var menuHeight=parseInt(menu.actual('height'));
					$(this).find('img').css('max-height',menuHeight);
				}
			});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.menu=function(option) 
	{
		var menu=new Menu(this,option);
		menu.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/