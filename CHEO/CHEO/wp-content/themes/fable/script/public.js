"use strict";
/******************************************************************************/
/******************************************************************************/

jQuery(document).ready(function($) 
{	
	/**************************************************************************/
	
	var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');
	
	/**************************************************************************/

	try
	{
		$.fn.qtip.zindex=10;
	}
	catch(e) {}
	
	/**************************************************************************/
	
	$('.widget_search label').inFieldLabels();
	
	/**************************************************************************/
	
	$('.widget_archive>ul>li').each(function() 
	{
		var text=$(this).text();
		var link=$(this).children('a').html(text).clone(true,true);
		$(this).html(link).css({display:'block'});
	});

	/**************************************************************************/
	
	$('.widget_rss>ul>li').each(function() 
	{
		var author=$(this).children('cite').clone(true,true);
		var date=$(this).children('.rss-date').clone(true,true);
				
		$(this).children('cite').remove();
		$(this).children('.rss-date').remove();
		
		if(date.length===1) $(this).children('a').after(date);
		if(author.length===1) $(this).children('a').after(author);
		
		$(this).css({display:'block'});
	});
	
	/**************************************************************************/

	$('.widget_nav_menu a').bind(clickEventType,function(e) 
	{
		if((parseInt($(this).attr('href').length)===1) && ($(this).attr('href').substr(0,1)==='#'))
		{			
			e.preventDefault();
			
			var menu=$(this).parents('.widget_nav_menu');
					
			menu.find('li').removeClass('current-menu-item current-menu-ancestor current_page_item');
			menu.find('ul>li>ul').css('display','none');
			
			$(this).parents('ul.sub-menu').css('display','block');
			$(this).parents('li').addClass('current-menu-item');
			
			$(this).next('ul.sub-menu').css('display','block');
		}
		else 
        {    
            if(new String($(this).attr('target'))!=='_blank')
                window.location.href=$(this).attr('href');
        }
        
		return(true);
	});
	
	$('.widget_nav_menu a').hover(function() { $(this).append('<span>'); },function() { $(this).children('span').remove() } );
	
	/**************************************************************************/
	
	$('.widget_recent_comments>ul>li').each(function() 
	{
		$(this).html('<span>'+$(this).html().replace('<a','</span><a'));
	});
	
	$('.widget_recent_comments').css('display','block');
	
	/**************************************************************************/
	
	$('.widget_nav_menu').each(function() 
	{
		$(this).find('li.current-menu-item,li.current_page_item').parents('ul.sub-menu').css('display','block');
	});
	
	/**************************************************************************/
	
	if(parseInt(themeOption.config.woocommerce_enable)===1)
	{
		/**********************************************************************/
		
		$('.woocommerce.widget_product_categories ul>li').each(function() 
		{
			$(this).children('a').append($(this).children('span'));
			$(this).children('span').remove();
		});
		
		$('.woocommerce.widget_product_categories').css('display','block');
		
		/**********************************************************************/
		
		$('.woocommerce.widget_product_search input[type="text"]').removeAttr('placeholder');

        /**********************************************************************/
        
        $('select').removeClass('select2-hidden-accessible');

		/**********************************************************************/
	}
	
	/**************************************************************************/

	if(parseInt(themeOption.selection.enable)===0)
	{
		$('body').attr('unselectable','on').css('user-select','none').on('selectstart',false);
	};
	
	/**************************************************************************/
	
	if(parseInt(themeOption.rightClick.enable)===0)
	{
		document.oncontextmenu=function() { return false; };
		$(document).mousedown(function(e)
		{ 
			if(parseInt(e.button)===2) return false; 
			return true; 
		});
	};	
	
	/**************************************************************************/
	
	var body=$('body');
	var page=$('.theme-page');
	var footer=$('.theme-footer');
	
	if(body.hasClass('theme-footer-sticky'))
	{
		$(window).windowDimensionListener({change:function(width,height)
		{	
			var menuHeight=$('.pb.pb-menu.pb-menu-sticky').actual('height');
		
			var footerHeight=footer.actual('height');
			var windowHeight=$(window).actual('height')-menuHeight;
			
			if(windowHeight>footerHeight)
			{
				body.addClass('theme-footer-sticky');
				page.css({'margin-bottom':footerHeight});			
			}
			else
			{
				body.removeClass('theme-footer-sticky');
				page.css({'margin-bottom':'0'});	
			}
			
			footer.css({'visibility':'visible'});
		}});
	}
	else footer.css({'visibility':'visible'});

	/**************************************************************************/

	if(parseInt(themeOption.goToPageTop.enable)===1)
	{
		$('body').waypoint(function(direction)
		{
			if(direction==='down')
				$('#theme-go-to-top').animate({opacity:1},{duration:1000});
			else $('#theme-go-to-top').animate({opacity:0},{duration:250});
		},
		{
			offset	:	'-100%'
		});
		
		$(window).bind('hashchange',function(e) 
		{
			e.preventDefault();
			
			var hash=window.location.hash.substring(1);
			if(hash===themeOption.goToPageTop.hash)
			{
				var options={};
				
				if(parseInt(themeOption.goToPageTop.animation_enable)===1)
					options={duration:parseInt(themeOption.goToPageTop.animation_duration),easing:themeOption.goToPageTop.animation_easing};
				
				options.onAfter=function() { window.location.hash='#'; };
				
				$.scrollTo(0,options);
			}
		});
	};
	
	/**************************************************************************/

	$('#theme-post-button-leave-a-reply').bind(clickEventType,function(e) 
	{
		e.preventDefault();
		$.scrollTo($('#respond'),{duration:300});
	});

	/**************************************************************************/
	
	$('.theme-comment-content-read-more-link').live(clickEventType,function(e)
	{
		e.preventDefault();
		var parent=$(this).parent('p');
		
		parent.children('.theme-comment-content-excerpt,.theme-comment-content-read-more-link').css('display','none');
		parent.children('.theme-comment-content-content,.theme-comment-content-read-less-link').css('display','inline');
	});
	
	$('.theme-comment-content-read-less-link').live(clickEventType,function(e)
	{
		e.preventDefault();
		var parent=$(this).parent('p');
		
		parent.children('.theme-comment-content-excerpt,.theme-comment-content-read-more-link').css('display','inline');
		parent.children('.theme-comment-content-content,.theme-comment-content-read-less-link').css('display','none');
	});

	/**************************************************************************/
	
	$('.theme-layout-100').responsiveElement({className:'theme-responsive-column-a'});
	$('.theme-layout-50x50').responsiveElement({className:'theme-responsive-column-a'});
	$('.theme-layout-33x33x33').responsiveElement({width:650,className:'theme-responsive-column-a'});
	$('.theme-layout-25x25x25x25').responsiveElement({width:650,className:'theme-responsive-column-a'});
	$('.theme-layout-66x33').responsiveElement({className:'theme-responsive-column-a'});
	$('.theme-layout-33x66').responsiveElement({className:'theme-responsive-column-a'});
	$('.theme-layout-25x75').responsiveElement({className:'theme-responsive-column-a'});
	$('.theme-layout-75x25').responsiveElement({className:'theme-responsive-column-a'});

	/**************************************************************************/

	$('body').windowDimensionListener({change:function(width,height) 
	{
		if(height) $(window).scroll();
	}});

	/**************************************************************************/

	$(window).trigger('resize');

	/**************************************************************************/
	
	try
	{
		var retina=window.devicePixelRatio>1 ? true : false;
		if(retina)
		{
			$('.pb-icon-list img').one("load", function()
			{
				var width=$(this).actual('width');
				var src=$(this).attr('src').replace(/public/,'public/2x');
				$(this).attr('src',src).width(width);
				
			}).each(function() 
			{
				if(this.complete) $(this).load();
			});
		}
	}
	catch(e) {}
    
    /**************************************************************************/
    
    $('.theme-table-responsive-on').responsiveTable();
	
	/**************************************************************************/
});

/******************************************************************************/
/******************************************************************************/