/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBNivoSlider=function(object,option)
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
					var image=$this.find('.pb-image').children();
					
					$this.find('.pb-image-box').remove();
					
					$this.prepend(image);
					
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
			
			$this.nivoSlider(
			{
				effect					:	$option.transition_effect,               
				slices					:	parseInt($option.count_slice),                     
				boxCols					:	parseInt($option.count_column),                     
				boxRows					:	parseInt($option.count_row),                     
				animSpeed				:	parseInt($option.transition_speed),                 
				pauseTime				:	parseInt($option.pause_time),                
				startSlide				:	parseInt($option.start_slide),                 
				directionNav			:	helper.parseBool(String(typeof($option.direction_navigation_enable))==='undefined' ? 0 : $option.direction_navigation_enable),             
				controlNav				:	helper.parseBool($option.control_navigation_enable),               
				controlNavThumbs		:	helper.parseBool(String(typeof($option.control_navigation_thumbs_enable))==='undefined' ? 0 : $option.control_navigation_thumbs_enable),       
				pauseOnHover			:	helper.parseBool($option.pause_on_hover),           
				manualAdvance			:	helper.parseBool($option.manual_advance_enable),          
				prevText				:	'',             
				nextText				:	'',              
				randomStart				:	helper.parseBool($option.random_start_enable),            
				beforeChange			:	function(){},     
				afterChange				:	function()
				{
					$self.simulateImageLink();
				},      
				slideshowEnd			:	function(){},     
				lastSlide				:	function(){},        
				afterLoad				:	function()
				{
					var pagination=$this.nextAll('.nivo-controlNav');

					pagination.addClass('pb-slider-pagination');
					pagination.children('a').css({'width':((100/imageCount)-(marginWidth)+marginWidthRest)+'%','margin-left': pbOption.config.is_rtl ? 0 : (marginWidth)+'%','margin-right': pbOption.config.is_rtl ? (marginWidth)+'%' : 0});
					pagination.css('display','block');
					
					$self.simulateImageLink();
				}         
			});				
		};
		
		/**********************************************************************/
		
		this.simulateImageLink=function()
		{
			var mainImage=$this.find('.nivo-main-image');
			if(mainImage.length!==1) return;
					
			var image=$this.find('.pb-image img[src="'+mainImage.attr('src')+'"]');
			if(image.length!==1) return;
		
			var link=image.parent('a');
			if(link.length!==1) return;
		
			var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');
		
			mainImage.unbind(clickEventType).css({cursor:'pointer'}).bind(clickEventType,function()
			{
				window.location.href=link.attr('href');
			});			
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBNivoSlider=function(option) 
	{
		var slider=new PBNivoSlider(this,option);
		slider.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/