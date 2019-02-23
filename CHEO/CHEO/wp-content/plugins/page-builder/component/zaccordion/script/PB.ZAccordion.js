/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBZAccordion=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var helper=new PBHelper();
			
			if(parseInt($option.preloader_enable)===1)
			{
				var id=$this.attr('id');
				
				helper.wait('#'+id+' .pb-image-preloader',function() 
				{
					$this.css({'height':'auto'}).removeClass('pb-preloader');
					$self.createAccordion();
				});
			}
			else $self.createAccordion();
		};
		
		/**********************************************************************/
		
		this.createAccordion=function() 
		{
			var helper=new PBHelper();
			
			$this.zAccordion(
			{
				slideClass			:	'slide',
				width				:	'100%',
				tabWidth			:	'10%',
				height				:	$self.getAccordionHeight(),
				startingSlide		:	(pbOption.config.is_rtl ? ($this.children().length-parseInt($option.starting_slide)-1) : parseInt($option.starting_slide)),
				timeout				:	parseInt($option.timeout),
				speed				:	parseInt($option.speed),
				auto				:	helper.parseBool($option.auto),
				pause				:	helper.parseBool($option.pause),
				easing				:	$option.easing,
				trigger				:	$option.trigger,
				animationStart		:	function()
				{
					$this.find('li.slide-previous .pb-zaccordion-caption-box').fadeOut();
				},
				animationComplete	:	function()
				{
					$this.find('li.slide-open .pb-zaccordion-caption-box').fadeIn().css('display','block');
				},
				buildComplete		:	function()
				{
					$this.find('li.slide-closed .pb-zaccordion-caption-box').css('display','none');
					$this.find('li.slide-open .pb-zaccordion-caption-box').fadeIn();
					$self.setAccordionResposnive(true);
				}
			});
		};
		
		/**********************************************************************/
		
		this.getAccordionHeight=function()
		{
			var height=parseInt($this.find('li img').actual('height'));
			return(height);
		};
		
		/**********************************************************************/
		
		this.setAccordionResposnive=function(bind)
		{
			var height=this.getAccordionHeight();
			
			$this.css('height',height);
			$this.children('ul').css('height',height);
			
			$this.find('.pb-zaccordion-caption-box').each(function() 
			{
				if($(this).actual('outerHeight')>height)
					$(this).addClass('pb-zaccordion-caption-box-disable');
				else $(this).removeClass('pb-zaccordion-caption-box-disable');
			});
			
			if(bind)
			{
				$(window).windowDimensionListener({change:function(width,height) 
				{
					if(width || height)
						$self.setAccordionResposnive(false);
				}});
			}
		};
				
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBZAccordion=function(option) 
	{
		var slider=new PBZAccordion(this,option);
		slider.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/