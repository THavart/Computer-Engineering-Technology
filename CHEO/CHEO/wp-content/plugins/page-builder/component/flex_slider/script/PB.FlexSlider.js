/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBFlexSlider=function(object,option)
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
					$self.createSlider();
				});
			}
			else $self.createSlider();
		};
		
		/**********************************************************************/
		
		this.createSlider=function() 
		{		
			var helper=new PBHelper();
			
			var imageCount=$this.find('img').length;
			
			var marginWidth=2;
			var marginWidthRest=marginWidth/imageCount;
			
			$this.flexslider(
			{
				direction			:	$option.direction,
				animation			:	$option.animation,
				easing				:	$option.easing,
				startAt				:	parseInt($option.start_at),
				slideshowSpeed		:	parseInt($option.slideshow_speed),
				animationSpeed		:	parseInt($option.animation_speed),
				initDelay			:	parseInt($option.init_delay),
				touch				:	helper.parseBool($option.touch),
				useCSS				:	helper.parseBool($option.use_css),
				reverse				:	helper.parseBool($option.reverse),
				slideshow			:	helper.parseBool($option.slideshow),
				randomize			:	helper.parseBool($option.randomize),
				smoothHeight		:	helper.parseBool($option.smooth_height),
				pauseOnHover		:	helper.parseBool($option.pause_on_hover),
				animationLoop		:	helper.parseBool($option.animation_loop),
				pauseOnAction		:	helper.parseBool($option.pause_on_action),
				controlNav			:	helper.parseBool($option.control_nav),
				directionNav		:	helper.parseBool($option.direction_nav),
				keyboard			:	helper.parseBool($option.keyboard),
				multipleKeyboard	:	helper.parseBool($option.multiple_keyboard),
				mousewheel			:	helper.parseBool($option.mousewheel),
				prevText			:	'',
				nextText			:	'',
				playText			:	'',
				pauseText			:	'',
				start				:	function()
				{
					$self.alignPaginationDirection();
					
					var paginationControl=$this.children('.pb-slider-pagination');
					if(paginationControl.length===1) return;
					
					paginationControl=$this.children('.flex-control-nav');
					if(paginationControl.length!==1) return;
					
					paginationControl.addClass('pb-slider-pagination');
					paginationControl.children('li').css({'width':((100/imageCount)-(marginWidth)+marginWidthRest)+'%','margin-left':(marginWidth)+'%'});
					paginationControl.css('display','block');
					
					$self.alignPaginationDirection();
				}
			});
		};
		
		/**********************************************************************/
		
		this.alignPaginationDirection=function()
		{
			var paginationControl=$this.children('.pb-slider-pagination');
			var paginationDirection=$this.children('.flex-direction-nav');
			
			if(paginationDirection.length===1)
			{
				var height=0;
				
				if(paginationControl.length===1)
					height=parseInt(paginationControl.actual('height'));
				
				height+=parseInt(paginationDirection.find('a').actual('height'))/2;				
				paginationDirection.find('a').css('margin-top',-1*height);
			}			
		};
	
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBFlexSlider=function(option) 
	{
		var slider=new PBFlexSlider(this,option);
		slider.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/