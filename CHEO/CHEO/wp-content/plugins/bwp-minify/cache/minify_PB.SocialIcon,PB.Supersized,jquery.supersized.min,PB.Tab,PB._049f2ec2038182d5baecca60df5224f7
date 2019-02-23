;(function($,doc,win)
{"use strict";var PBSocialIcon=function(object,option)
{var $this=$(object);var $option=option;this.build=function()
{var helper=new PBHelper();helper.hover($this.find('a'),$option);$this.find('a').each(function()
{$(this).children('i').css('line-height',parseInt($(this).actual('height'))+'px');$(this).hover(function()
{$(this).children('i').css('line-height',parseInt($(this).actual('height'))+'px');},function()
{$(this).children('i').css('line-height',parseInt($(this).actual('height'))+'px');});});};}
$.fn.PBSocialIcon=function(option)
{var object=new PBSocialIcon(this,option);object.build();};})(jQuery,document,window);;;(function($,doc,win)
{"use strict";var PBSupersized=function(object,option)
{var $this=$(object);var $option=option;this.build=function()
{$(document).ready(function()
{$.supersized({autoplay:parseInt($option.autoplay),fit_always:parseInt($option.fit_always),fit_landscape:parseInt($option.fit_landscape),fit_portrait:parseInt($option.fit_portrait),horizontal_center:parseInt($option.horizontal_center),vertical_center:parseInt($option.vertical_center),min_width:parseInt($option.min_width),min_height:parseInt($option.min_height),image_protect:parseInt($option.image_protect),keyboard_nav:parseInt($option.keyboard_nav),new_window:parseInt($option.new_window),pause_hover:parseInt($option.pause_hover),random:parseInt($option.random),start_slide:parseInt($option.start_slide),stop_loop:parseInt($option.stop_loop),performance:$option.performance,transition:$option.transition,transition_speed:parseInt($option.transition_speed),slide_interval:parseInt($option.slide_interval),slides:$option.slides});$('#supersized').addClass($option.css_class);});};};$.fn.PBSupersized=function(option)
{var object=new PBSupersized(this,option);object.build();};})(jQuery,document,window);
;/*

	Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.7
	Site	: www.buildinternet.com/project/supersized
	
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License
	
*/

(function($){

	/* Place Supersized Elements
	----------------------------*/
	$(document).ready(function() {
		$('body').append('<div id="supersized-loader"></div><ul id="supersized"></ul>');
	});
    
    
    $.supersized = function(options){
    	
    	/* Variables
		----------------------------*/
    	var el = '#supersized',
        	base = this;
        // Access to jQuery and DOM versions of element
        base.$el = $(el);
        base.el = el;
        vars = $.supersized.vars;
        // Add a reverse reference to the DOM object
        base.$el.data("supersized", base);
        api = base.$el.data('supersized');
		
		base.init = function(){
        	// Combine options and vars
        	$.supersized.vars = $.extend($.supersized.vars, $.supersized.themeVars);
        	$.supersized.vars.options = $.extend({},$.supersized.defaultOptions, $.supersized.themeOptions, options);
            base.options = $.supersized.vars.options;
            
            base._build();
        };
        
        
        /* Build Elements
		----------------------------*/
        base._build = function(){
        	// Add in slide markers
        	var thisSlide = 0,
        		slideSet = '',
				markers = '',
				markerContent,
				thumbMarkers = '',
				thumbImage;
				
			while(thisSlide <= base.options.slides.length-1){
				//Determine slide link content
				switch(base.options.slide_links){
					case 'num':
						markerContent = thisSlide;
						break;
					case 'name':
						markerContent = base.options.slides[thisSlide].title;
						break;
					case 'blank':
						markerContent = '';
						break;
				}
				
				slideSet = slideSet+'<li class="slide-'+thisSlide+'"></li>';
				
				if(thisSlide == base.options.start_slide-1){
					// Slide links
					if (base.options.slide_links)markers = markers+'<li class="slide-link-'+thisSlide+' current-slide"><a>'+markerContent+'</a></li>';
					// Slide Thumbnail Links
					if (base.options.thumb_links){
						base.options.slides[thisSlide].thumb ? thumbImage = base.options.slides[thisSlide].thumb : thumbImage = base.options.slides[thisSlide].image;
						thumbMarkers = thumbMarkers+'<li class="thumb'+thisSlide+' current-thumb"><img src="'+thumbImage+'"/></li>';
					};
				}else{
					// Slide links
					if (base.options.slide_links) markers = markers+'<li class="slide-link-'+thisSlide+'" ><a>'+markerContent+'</a></li>';
					// Slide Thumbnail Links
					if (base.options.thumb_links){
						base.options.slides[thisSlide].thumb ? thumbImage = base.options.slides[thisSlide].thumb : thumbImage = base.options.slides[thisSlide].image;
						thumbMarkers = thumbMarkers+'<li class="thumb'+thisSlide+'"><img src="'+thumbImage+'"/></li>';
					};
				}
				thisSlide++;
			}
			
			if (base.options.slide_links) $(vars.slide_list).html(markers);
			if (base.options.thumb_links && vars.thumb_tray.length){
				$(vars.thumb_tray).append('<ul id="'+vars.thumb_list.replace('#','')+'">'+thumbMarkers+'</ul>');
			}
			
			$(base.el).append(slideSet);
			
			// Add in thumbnails
			if (base.options.thumbnail_navigation){
				// Load previous thumbnail
				vars.current_slide - 1 < 0  ? prevThumb = base.options.slides.length - 1 : prevThumb = vars.current_slide - 1;
				$(vars.prev_thumb).show().html($("<img/>").attr("src", base.options.slides[prevThumb].image));
				
				// Load next thumbnail
				vars.current_slide == base.options.slides.length - 1 ? nextThumb = 0 : nextThumb = vars.current_slide + 1;
				$(vars.next_thumb).show().html($("<img/>").attr("src", base.options.slides[nextThumb].image));
			}
			
            base._start(); // Get things started
        };
        
        
        /* Initialize
		----------------------------*/
    	base._start = function(){
			
			// Determine if starting slide random
			if (base.options.start_slide){
				vars.current_slide = base.options.start_slide - 1;
			}else{
				vars.current_slide = Math.floor(Math.random()*base.options.slides.length);	// Generate random slide number
			}
			
			// If links should open in new window
			var linkTarget = base.options.new_window ? ' target="_blank"' : '';
			
			// Set slideshow quality (Supported only in FF and IE, no Webkit)
			if (base.options.performance == 3){
				base.$el.addClass('speed'); 		// Faster transitions
			} else if ((base.options.performance == 1) || (base.options.performance == 2)){
				base.$el.addClass('quality');	// Higher image quality
			}
						
			// Shuffle slide order if needed		
			if (base.options.random){
				arr = base.options.slides;
				for(var j, x, i = arr.length; i; j = parseInt(Math.random() * i), x = arr[--i], arr[i] = arr[j], arr[j] = x);	// Fisher-Yates shuffle algorithm (jsfromhell.com/array/shuffle)
			    base.options.slides = arr;
			}
			
			/*-----Load initial set of images-----*/
	
			if (base.options.slides.length > 1){
				if(base.options.slides.length > 2){
					// Set previous image
					vars.current_slide - 1 < 0  ? loadPrev = base.options.slides.length - 1 : loadPrev = vars.current_slide - 1;	// If slide is 1, load last slide as previous
					var imageLink = (base.options.slides[loadPrev].url) ? "href='" + base.options.slides[loadPrev].url + "'" : "";
				
					var imgPrev = $('<img src="'+base.options.slides[loadPrev].image+'"/>');
					var slidePrev = base.el+' li:eq('+loadPrev+')';
					imgPrev.appendTo(slidePrev).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading prevslide');
				
					imgPrev.load(function(){
						$(this).data('origWidth', $(this).width()).data('origHeight', $(this).height());
						base.resizeNow();	// Resize background image
					});	// End Load
				}
			} else {
				// Slideshow turned off if there is only one slide
				base.options.slideshow = 0;
			}
			
			// Set current image
			imageLink = (api.getField('url')) ? "href='" + api.getField('url') + "'" : "";
			var img = $('<img src="'+api.getField('image')+'"/>');
			
			var slideCurrent= base.el+' li:eq('+vars.current_slide+')';
			img.appendTo(slideCurrent).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading activeslide');
			
			img.load(function(){
				base._origDim($(this));
				base.resizeNow();	// Resize background image
				base.launch();
				if( typeof theme != 'undefined' && typeof theme._init == "function" ) theme._init();	// Load Theme
			});
			
			if (base.options.slides.length > 1){
				// Set next image
				vars.current_slide == base.options.slides.length - 1 ? loadNext = 0 : loadNext = vars.current_slide + 1;	// If slide is last, load first slide as next
				imageLink = (base.options.slides[loadNext].url) ? "href='" + base.options.slides[loadNext].url + "'" : "";
				
				var imgNext = $('<img src="'+base.options.slides[loadNext].image+'"/>');
				var slideNext = base.el+' li:eq('+loadNext+')';
				imgNext.appendTo(slideNext).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading');
				
				imgNext.load(function(){
					$(this).data('origWidth', $(this).width()).data('origHeight', $(this).height());
					base.resizeNow();	// Resize background image
				});	// End Load
			}
			/*-----End load initial images-----*/
			
			//  Hide elements to be faded in
			base.$el.css('visibility','hidden');
			$('.load-item').hide();
			
    	};
		
		
		/* Launch Supersized
		----------------------------*/
		base.launch = function(){
		
			base.$el.css('visibility','visible');
			$('#supersized-loader').remove();		//Hide loading animation
			
			// Call theme function for before slide transition
			if( typeof theme != 'undefined' && typeof theme.beforeAnimation == "function" ) theme.beforeAnimation('next');
			$('.load-item').show();
			
			// Keyboard Navigation
			if (base.options.keyboard_nav){
				$(document.documentElement).keyup(function (event) {
				
					if(vars.in_animation) return false;		// Abort if currently animating
					if($(document.activeElement).is("input, textarea")) return false; // Abort if active element is an input or a textarea.
					
					// Left Arrow or Down Arrow
					if ((event.keyCode == 37) || (event.keyCode == 40)) {
						clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
						base.prevSlide();
					
					// Right Arrow or Up Arrow
					} else if ((event.keyCode == 39) || (event.keyCode == 38)) {
						clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
						base.nextSlide();
					
					// Spacebar	
					} else if (event.keyCode == 32 && !vars.hover_pause) {
						clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
						base.playToggle();
					}
				
				});
			}
			
			// Pause when hover on image
			if (base.options.slideshow && base.options.pause_hover){
				$(base.el).hover(function() {
					if(vars.in_animation) return false;		// Abort if currently animating
			   			vars.hover_pause = true;	// Mark slideshow paused from hover
			   			if(!vars.is_paused){
			   				vars.hover_pause = 'resume';	// It needs to resume afterwards
			   				base.playToggle();
			   			}
			   	}, function() {
					if(vars.hover_pause == 'resume'){
						base.playToggle();
						vars.hover_pause = false;
					}
			   	});
			}
			
			if (base.options.slide_links){
				// Slide marker clicked
				$(vars.slide_list+'> li').click(function(){
				
					index = $(vars.slide_list+'> li').index(this);
					targetSlide = index + 1;
					
					base.goTo(targetSlide);
					return false;
					
				});
			}
			
			// Thumb marker clicked
			if (base.options.thumb_links){
				$(vars.thumb_list+'> li').click(function(){
				
					index = $(vars.thumb_list+'> li').index(this);
					targetSlide = index + 1;
					
					api.goTo(targetSlide);
					return false;
					
				});
			}
			
			// Start slideshow if enabled
			if (base.options.slideshow && base.options.slides.length > 1){
	    		
	    		// Start slideshow if autoplay enabled
	    		if (base.options.autoplay && base.options.slides.length > 1){
	    			vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);	// Initiate slide interval
				}else{
					vars.is_paused = true;	// Mark as paused
				}
				
				//Prevent navigation items from being dragged					
				$('.load-item img').bind("contextmenu mousedown",function(){
					return false;
				});
								
			}
			
			// Adjust image when browser is resized
			$(window).resize(function(){
	    		base.resizeNow();
			});
    		
    	};
        
        
        /* Resize Images
		----------------------------*/
		base.resizeNow = function(){
			
			return base.$el.each(function() {
		  		//  Resize each image seperately
		  		$('img', base.el).each(function(){
		  			
					thisSlide = $(this);
					var ratio = (thisSlide.data('origHeight')/thisSlide.data('origWidth')).toFixed(2);	// Define image ratio
					
					// Gather browser size
					var browserwidth = base.$el.width(),
						browserheight = base.$el.height(),
						offset;
					
					/*-----Resize Image-----*/
					if (base.options.fit_always){	// Fit always is enabled
						if ((browserheight/browserwidth) > ratio){
							resizeWidth();
						} else {
							resizeHeight();
						}
					}else{	// Normal Resize
						if ((browserheight <= base.options.min_height) && (browserwidth <= base.options.min_width)){	// If window smaller than minimum width and height
						
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth(true) : resizeHeight(true);	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight(true) : resizeWidth(true);		// If portraits are set to fit
							}
						
						} else if (browserwidth <= base.options.min_width){		// If window only smaller than minimum width
						
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth(true) : resizeHeight();	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight() : resizeWidth(true);		// If portraits are set to fit
							}
							
						} else if (browserheight <= base.options.min_height){	// If window only smaller than minimum height
						
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth() : resizeHeight(true);	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight(true) : resizeWidth();		// If portraits are set to fit
							}
						
						} else {	// If larger than minimums
							
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth() : resizeHeight();	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight() : resizeWidth();		// If portraits are set to fit
							}
							
						}
					}
					/*-----End Image Resize-----*/
					
					
					/*-----Resize Functions-----*/
					
					function resizeWidth(minimum){
						if (minimum){	// If minimum height needs to be considered
							if(thisSlide.width() < browserwidth || thisSlide.width() < base.options.min_width ){
								if (thisSlide.width() * ratio >= base.options.min_height){
									thisSlide.width(base.options.min_width);
						    		thisSlide.height(thisSlide.width() * ratio);
						    	}else{
						    		resizeHeight();
						    	}
						    }
						}else{
							if (base.options.min_height >= browserheight && !base.options.fit_landscape){	// If minimum height needs to be considered
								if (browserwidth * ratio >= base.options.min_height || (browserwidth * ratio >= base.options.min_height && ratio <= 1)){	// If resizing would push below minimum height or image is a landscape
									thisSlide.width(browserwidth);
									thisSlide.height(browserwidth * ratio);
								} else if (ratio > 1){		// Else the image is portrait
									thisSlide.height(base.options.min_height);
									thisSlide.width(thisSlide.height() / ratio);
								} else if (thisSlide.width() < browserwidth) {
									thisSlide.width(browserwidth);
						    		thisSlide.height(thisSlide.width() * ratio);
								}
							}else{	// Otherwise, resize as normal
								thisSlide.width(browserwidth);
								thisSlide.height(browserwidth * ratio);
							}
						}
					};
					
					function resizeHeight(minimum){
						if (minimum){	// If minimum height needs to be considered
							if(thisSlide.height() < browserheight){
								if (thisSlide.height() / ratio >= base.options.min_width){
									thisSlide.height(base.options.min_height);
									thisSlide.width(thisSlide.height() / ratio);
								}else{
									resizeWidth(true);
								}
							}
						}else{	// Otherwise, resized as normal
							if (base.options.min_width >= browserwidth){	// If minimum width needs to be considered
								if (browserheight / ratio >= base.options.min_width || ratio > 1){	// If resizing would push below minimum width or image is a portrait
									thisSlide.height(browserheight);
									thisSlide.width(browserheight / ratio);
								} else if (ratio <= 1){		// Else the image is landscape
									thisSlide.width(base.options.min_width);
						    		thisSlide.height(thisSlide.width() * ratio);
								}
							}else{	// Otherwise, resize as normal
								thisSlide.height(browserheight);
								thisSlide.width(browserheight / ratio);
							}
						}
					};
					
					/*-----End Resize Functions-----*/
					
					if (thisSlide.parents('li').hasClass('image-loading')){
						$('.image-loading').removeClass('image-loading');
					}
					
					// Horizontally Center
					if (base.options.horizontal_center){
						$(this).css('left', (browserwidth - $(this).width())/2);
					}
					
					// Vertically Center
					if (base.options.vertical_center){
						$(this).css('top', (browserheight - $(this).height())/2);
					}
					
				});
				
				// Basic image drag and right click protection
				if (base.options.image_protect){
					
					$('img', base.el).bind("contextmenu mousedown",function(){
						return false;
					});
				
				}
				
				return false;
				
			});
			
		};
        
        
        /* Next Slide
		----------------------------*/
		base.nextSlide = function(){
			
			if(vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
				else vars.in_animation = true;		// Otherwise set animation marker
				
		    clearInterval(vars.slideshow_interval);	// Stop slideshow
		    
		    var slides = base.options.slides,					// Pull in slides array
				liveslide = base.$el.find('.activeslide');		// Find active slide
				$('.prevslide').removeClass('prevslide');
				liveslide.removeClass('activeslide').addClass('prevslide');	// Remove active class & update previous slide
					
			// Get the slide number of new slide
			vars.current_slide + 1 == base.options.slides.length ? vars.current_slide = 0 : vars.current_slide++;
			
		    var nextslide = $(base.el+' li:eq('+vars.current_slide+')'),
		    	prevslide = base.$el.find('.prevslide');
			
			// If hybrid mode is on drop quality for transition
			if (base.options.performance == 1) base.$el.removeClass('quality').addClass('speed');	
			
			
			/*-----Load Image-----*/
			
			loadSlide = false;

			vars.current_slide == base.options.slides.length - 1 ? loadSlide = 0 : loadSlide = vars.current_slide + 1;	// Determine next slide

			var targetList = base.el+' li:eq('+loadSlide+')';
			if (!$(targetList).html()){
				
				// If links should open in new window
				var linkTarget = base.options.new_window ? ' target="_blank"' : '';
				
				imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
				var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
				
				img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
				
				img.load(function(){
					base._origDim($(this));
					base.resizeNow();
				});	// End Load
			};
						
			// Update thumbnails (if enabled)
			if (base.options.thumbnail_navigation == 1){
			
				// Load previous thumbnail
				vars.current_slide - 1 < 0  ? prevThumb = base.options.slides.length - 1 : prevThumb = vars.current_slide - 1;
				$(vars.prev_thumb).html($("<img/>").attr("src", base.options.slides[prevThumb].image));
			
				// Load next thumbnail
				nextThumb = loadSlide;
				$(vars.next_thumb).html($("<img/>").attr("src", base.options.slides[nextThumb].image));
				
			}
			
			
			
			/*-----End Load Image-----*/
			
			
			// Call theme function for before slide transition
			if( typeof theme != 'undefined' && typeof theme.beforeAnimation == "function" ) theme.beforeAnimation('next');
			
			//Update slide markers
			if (base.options.slide_links){
				$('.current-slide').removeClass('current-slide');
				$(vars.slide_list +'> li' ).eq(vars.current_slide).addClass('current-slide');
			}
		    
		    nextslide.css('visibility','hidden').addClass('activeslide');	// Update active slide
		    
	    	switch(base.options.transition){
	    		case 0: case 'none':	// No transition
	    		    nextslide.css('visibility','visible'); vars.in_animation = false; base.afterAnimation();
	    		    break;
	    		case 1: case 'fade':	// Fade
	    		    nextslide.css({opacity : 0, 'visibility': 'visible'}).animate({opacity : 1, avoidTransforms : false}, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 2: case 'slideTop':	// Slide Top
	    		    nextslide.css({top : -base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 3: case 'slideRight':	// Slide Right
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 4: case 'slideBottom': // Slide Bottom
	    			nextslide.css({top : base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 5: case 'slideLeft':  // Slide Left
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 6: case 'carouselRight':	// Carousel Right
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.animate({ left: -base.$el.width(), avoidTransforms : false }, base.options.transition_speed );
	    			break;
	    		case 7: case 'carouselLeft':   // Carousel Left
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.animate({ left: base.$el.width(), avoidTransforms : false }, base.options.transition_speed );
	    			break;
	    	}
		    return false;	
		};
		
		
		/* Previous Slide
		----------------------------*/
		base.prevSlide = function(){
		
			if(vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
				else vars.in_animation = true;		// Otherwise set animation marker
			
			clearInterval(vars.slideshow_interval);	// Stop slideshow
			
			var slides = base.options.slides,					// Pull in slides array
				liveslide = base.$el.find('.activeslide');		// Find active slide
				$('.prevslide').removeClass('prevslide');
				liveslide.removeClass('activeslide').addClass('prevslide');		// Remove active class & update previous slide
			
			// Get current slide number
			vars.current_slide == 0 ?  vars.current_slide = base.options.slides.length - 1 : vars.current_slide-- ;
				
		    var nextslide =  $(base.el+' li:eq('+vars.current_slide+')'),
		    	prevslide =  base.$el.find('.prevslide');
			
			// If hybrid mode is on drop quality for transition
			if (base.options.performance == 1) base.$el.removeClass('quality').addClass('speed');	
			
			
			/*-----Load Image-----*/
			
			loadSlide = vars.current_slide;
			
			var targetList = base.el+' li:eq('+loadSlide+')';
			if (!$(targetList).html()){
				// If links should open in new window
				var linkTarget = base.options.new_window ? ' target="_blank"' : '';
				imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
				var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
				
				img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
				
				img.load(function(){
					base._origDim($(this));
					base.resizeNow();
				});	// End Load
			};
			
			// Update thumbnails (if enabled)
			if (base.options.thumbnail_navigation == 1){
			
				// Load previous thumbnail
				//prevThumb = loadSlide;
				loadSlide == 0 ? prevThumb = base.options.slides.length - 1 : prevThumb = loadSlide - 1;
				$(vars.prev_thumb).html($("<img/>").attr("src", base.options.slides[prevThumb].image));
				
				// Load next thumbnail
				vars.current_slide == base.options.slides.length - 1 ? nextThumb = 0 : nextThumb = vars.current_slide + 1;
				$(vars.next_thumb).html($("<img/>").attr("src", base.options.slides[nextThumb].image));
			}
			
			/*-----End Load Image-----*/
			
			
			// Call theme function for before slide transition
			if( typeof theme != 'undefined' && typeof theme.beforeAnimation == "function" ) theme.beforeAnimation('prev');
			
			//Update slide markers
			if (base.options.slide_links){
				$('.current-slide').removeClass('current-slide');
				$(vars.slide_list +'> li' ).eq(vars.current_slide).addClass('current-slide');
			}
			
		    nextslide.css('visibility','hidden').addClass('activeslide');	// Update active slide
		    
		    switch(base.options.transition){
	    		case 0: case 'none':	// No transition
	    		    nextslide.css('visibility','visible'); vars.in_animation = false; base.afterAnimation();
	    		    break;
	    		case 1: case 'fade':	// Fade
	    		  	nextslide.css({opacity : 0, 'visibility': 'visible'}).animate({opacity : 1, avoidTransforms : false}, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 2: case 'slideTop':	// Slide Top (reverse)
	    		    nextslide.css({top : base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 3: case 'slideRight':	// Slide Right (reverse)
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 4: case 'slideBottom': // Slide Bottom (reverse)
	    			nextslide.css({top : -base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 5: case 'slideLeft':  // Slide Left (reverse)
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 6: case 'carouselRight':	// Carousel Right (reverse)
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.css({left : 0}).animate({ left: base.$el.width(), avoidTransforms : false}, base.options.transition_speed );
	    			break;
	    		case 7: case 'carouselLeft':   // Carousel Left (reverse)
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.css({left : 0}).animate({ left: -base.$el.width(), avoidTransforms : false }, base.options.transition_speed );
	    			break;
	    	}
		    return false;	
		};
		
		
		/* Play/Pause Toggle
		----------------------------*/
		base.playToggle = function(){
		
			if (vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
			
			if (vars.is_paused){
				
				vars.is_paused = false;
				
				// Call theme function for play
				if( typeof theme != 'undefined' && typeof theme.playToggle == "function" ) theme.playToggle('play');
				
				// Resume slideshow
	        	vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);
	        	  
        	}else{
        		
        		vars.is_paused = true;
        		
        		// Call theme function for pause
        		if( typeof theme != 'undefined' && typeof theme.playToggle == "function" ) theme.playToggle('pause');
        		
        		// Stop slideshow
        		clearInterval(vars.slideshow_interval);	
       		
       		}
		    
		    return false;
    		
    	};
    	
    	
    	/* Go to specific slide
		----------------------------*/
    	base.goTo = function(targetSlide){
			if (vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
			
			var totalSlides = base.options.slides.length;
			
			// If target outside range
			if(targetSlide < 0){
				targetSlide = totalSlides;
			}else if(targetSlide > totalSlides){
				targetSlide = 1;
			}
			targetSlide = totalSlides - targetSlide + 1;
			
			clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
			
			// Call theme function for goTo trigger
			if (typeof theme != 'undefined' && typeof theme.goTo == "function" ) theme.goTo();
			
			if (vars.current_slide == totalSlides - targetSlide){
				if(!(vars.is_paused)){
					vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);
				} 
				return false;
			}
			
			// If ahead of current position
			if(totalSlides - targetSlide > vars.current_slide ){
				
				// Adjust for new next slide
				vars.current_slide = totalSlides-targetSlide-1;
				vars.update_images = 'next';
				base._placeSlide(vars.update_images);
				
			//Otherwise it's before current position
			}else if(totalSlides - targetSlide < vars.current_slide){
				
				// Adjust for new prev slide
				vars.current_slide = totalSlides-targetSlide+1;
				vars.update_images = 'prev';
			    base._placeSlide(vars.update_images);
			    
			}
			
			// set active markers
			if (base.options.slide_links){
				$(vars.slide_list +'> .current-slide').removeClass('current-slide');
				$(vars.slide_list +'> li').eq((totalSlides-targetSlide)).addClass('current-slide');
			}
			
			if (base.options.thumb_links){
				$(vars.thumb_list +'> .current-thumb').removeClass('current-thumb');
				$(vars.thumb_list +'> li').eq((totalSlides-targetSlide)).addClass('current-thumb');
			}
			
		};
        
        
        /* Place Slide
		----------------------------*/
        base._placeSlide = function(place){
    			
			// If links should open in new window
			var linkTarget = base.options.new_window ? ' target="_blank"' : '';
			
			loadSlide = false;
			
			if (place == 'next'){
				
				vars.current_slide == base.options.slides.length - 1 ? loadSlide = 0 : loadSlide = vars.current_slide + 1;	// Determine next slide
				
				var targetList = base.el+' li:eq('+loadSlide+')';
				
				if (!$(targetList).html()){
					// If links should open in new window
					var linkTarget = base.options.new_window ? ' target="_blank"' : '';
					
					imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
					var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
					
					img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
					
					img.load(function(){
						base._origDim($(this));
						base.resizeNow();
					});	// End Load
				};
				
				base.nextSlide();
				
			}else if (place == 'prev'){
			
				vars.current_slide - 1 < 0  ? loadSlide = base.options.slides.length - 1 : loadSlide = vars.current_slide - 1;	// Determine next slide
				
				var targetList = base.el+' li:eq('+loadSlide+')';
				
				if (!$(targetList).html()){
					// If links should open in new window
					var linkTarget = base.options.new_window ? ' target="_blank"' : '';
					
					imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
					var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
					
					img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
					
					img.load(function(){
						base._origDim($(this));
						base.resizeNow();
					});	// End Load
				};
				base.prevSlide();
			}
			
		};
		
		
		/* Get Original Dimensions
		----------------------------*/
		base._origDim = function(targetSlide){
			targetSlide.data('origWidth', targetSlide.width()).data('origHeight', targetSlide.height());
		};
		
		
		/* After Slide Animation
		----------------------------*/
		base.afterAnimation = function(){
			
			// If hybrid mode is on swap back to higher image quality
			if (base.options.performance == 1){
		    	base.$el.removeClass('speed').addClass('quality');
			}
			
			// Update previous slide
			if (vars.update_images){
				vars.current_slide - 1 < 0  ? setPrev = base.options.slides.length - 1 : setPrev = vars.current_slide-1;
				vars.update_images = false;
				$('.prevslide').removeClass('prevslide');
				$(base.el+' li:eq('+setPrev+')').addClass('prevslide');
			}
			
			vars.in_animation = false;
			
			// Resume slideshow
			if (!vars.is_paused && base.options.slideshow){
				vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);
				if (base.options.stop_loop && vars.current_slide == base.options.slides.length - 1 ) base.playToggle();
			}
			
			// Call theme function for after slide transition
			if (typeof theme != 'undefined' && typeof theme.afterAnimation == "function" ) theme.afterAnimation();
			
			return false;
		
		};
		
		base.getField = function(field){
			return base.options.slides[vars.current_slide][field];
		};
		
        // Make it go!
        base.init();
	};
	
	
	/* Global Variables
	----------------------------*/
	$.supersized.vars = {
	
		// Elements							
		thumb_tray			:	'#thumb-tray',	// Thumbnail tray
		thumb_list			:	'#thumb-list',	// Thumbnail list
		slide_list          :   '#slide-list',	// Slide link list
		
		// Internal variables
		current_slide			:	0,			// Current slide number
		in_animation 			:	false,		// Prevents animations from stacking
		is_paused 				: 	false,		// Tracks paused on/off
		hover_pause				:	false,		// If slideshow is paused from hover
		slideshow_interval		:	false,		// Stores slideshow timer					
		update_images 			: 	false,		// Trigger to update images after slide jump
		options					:	{}			// Stores assembled options list
		
	};
	
	
	/* Default Options
	----------------------------*/
	$.supersized.defaultOptions = {
    
    	// Functionality
		slideshow               :   1,			// Slideshow on/off
		autoplay				:	1,			// Slideshow starts playing automatically
		start_slide             :   1,			// Start slide (0 is random)
		stop_loop				:	0,			// Stops slideshow on last slide
		random					: 	0,			// Randomize slide order (Ignores start slide)
		slide_interval          :   5000,		// Length between transitions
		transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	750,		// Speed of transition
		new_window				:	1,			// Image links open in new window/tab
		pause_hover             :   0,			// Pause slideshow on hover
		keyboard_nav            :   1,			// Keyboard navigation on/off
		performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed //  (Only works for Firefox/IE, not Webkit)
		image_protect			:	1,			// Disables image dragging and right click with Javascript
												   
		// Size & Position
		fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
		fit_landscape			:   0,			// Landscape images will not exceed browser width
		fit_portrait         	:   1,			// Portrait images will not exceed browser height  			   
		min_width		        :   0,			// Min width allowed (in pixels)
		min_height		        :   0,			// Min height allowed (in pixels)
		horizontal_center       :   1,			// Horizontally center background
		vertical_center         :   1,			// Vertically center background
		
												   
		// Components							
		slide_links				:	1,			// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links				:	1,			// Individual thumb links for each slide
		thumbnail_navigation    :   0			// Thumbnail navigation
    	
    };
    
    $.fn.supersized = function(options){
        return this.each(function(){
            (new $.supersized(options));
        });
    };
		
})(jQuery);
 
;;(function($,doc,win)
{"use strict";var PBTab=function(object,option)
{var $this=$(object);var $option=option;this.build=function()
{var id=$this.attr('id');$this.find('>ul>li>a').each(function(index)
{$(this).attr('href','#'+id+'_'+index);});$this.find('>div').each(function(index)
{$(this).attr('id',id+'_'+index);});var animate={show:false,hide:false};if(parseInt($option.animation_show_enable)===1)
{animate.show={easing:$option.animation_show_easing,delay:parseInt($option.animation_show_delay),duration:parseInt($option.animation_show_duration)};}
if(parseInt($option.animation_hide_enable)===1)
{animate.hide={easing:$option.animation_hide_easing,delay:parseInt($option.animation_hide_delay),duration:parseInt($option.animation_hide_duration)};}
$this.tabs({active:parseInt($option.active),disabled:parseInt($option.disabled)===1?true:false,collapsible:parseInt($option.collapsible)===1?true:false,heightStyle:$option.height_style,show:animate.show,hide:animate.hide,create:function()
{$(this).css('display','block');}});};};$.fn.PBTab=function(option)
{var object=new PBTab(this,option);object.build();};})(jQuery,document,window);;;(function($,doc,win)
{"use strict";var PBTeam=function(object,option)
{var $this=$(object);var $option=option;this.build=function()
{this.animate();};this.animate=function()
{var option={selector:{},option:{},waypoint:{initial:{},trigger:{}}};option.selector.value='.pb-team-skill-value-value';option.selector.progress='.pb-team-skill-foreground';option.option.enable=$option.skill_list_waypoint_enable;option.option.easing=$option.skill_list_waypoint_easing;option.option.duration=$option.skill_list_waypoint_duration;option.waypoint.trigger.offset=$option.skill_list_waypoint_offset_trigger;var animationWaypoint=new PBAnimationWaypoint();animationWaypoint.counter($this.find('.pb-team-skill'),option);};};$.fn.PBTeam=function(option)
{var object=new PBTeam(this,option);object.build();};})(jQuery,document,window);;;(function($,doc,win)
{"use strict";var PBTestimonial=function(object,carouselOption)
{var $this=$(object);var $carouselOption=carouselOption;this.build=function()
{var helper=new PBHelper();if(parseInt($carouselOption.carousel_enable)===1)
$this.children('ul').addClass('pb-layout-responsive-0');$carouselOption.onCreate=function()
{$this.css({visibility:'visible'});};helper.createCarousel($this,$carouselOption);};};$.fn.PBTestimonial=function(carouselOption)
{var object=new PBTestimonial(this,carouselOption);object.build();};})(jQuery,document,window);;(function(factory){if(typeof define==='function'&&define.amd){define(['jquery'],factory);}else{factory(jQuery);}}(function($){$.timeago=function(timestamp){if(timestamp instanceof Date){return inWords(timestamp);}else if(typeof timestamp==="string"){return inWords($.timeago.parse(timestamp));}else if(typeof timestamp==="number"){return inWords(new Date(timestamp));}else{return inWords($.timeago.datetime(timestamp));}};var $t=$.timeago;$.extend($.timeago,{settings:{refreshMillis:60000,allowFuture:false,localeTitle:false,cutoff:0,strings:{prefixAgo:null,prefixFromNow:null,suffixAgo:"ago",suffixFromNow:"from now",seconds:"less than a minute",minute:"about a minute",minutes:"%d minutes",hour:"about an hour",hours:"about %d hours",day:"a day",days:"%d days",month:"about a month",months:"%d months",year:"about a year",years:"%d years",wordSeparator:" ",numbers:[]}},inWords:function(distanceMillis){var $l=this.settings.strings;var prefix=$l.prefixAgo;var suffix=$l.suffixAgo;if(this.settings.allowFuture){if(distanceMillis<0){prefix=$l.prefixFromNow;suffix=$l.suffixFromNow;}}
var seconds=Math.abs(distanceMillis)/1000;var minutes=seconds/60;var hours=minutes/60;var days=hours/24;var years=days/365;function substitute(stringOrFunction,number){var string=$.isFunction(stringOrFunction)?stringOrFunction(number,distanceMillis):stringOrFunction;var value=($l.numbers&&$l.numbers[number])||number;return string.replace(/%d/i,value);}
var words=seconds<45&&substitute($l.seconds,Math.round(seconds))||seconds<90&&substitute($l.minute,1)||minutes<45&&substitute($l.minutes,Math.round(minutes))||minutes<90&&substitute($l.hour,1)||hours<24&&substitute($l.hours,Math.round(hours))||hours<42&&substitute($l.day,1)||days<30&&substitute($l.days,Math.round(days))||days<45&&substitute($l.month,1)||days<365&&substitute($l.months,Math.round(days/30))||years<1.5&&substitute($l.year,1)||substitute($l.years,Math.round(years));var separator=$l.wordSeparator||"";if($l.wordSeparator===undefined){separator=" ";}
return $.trim([prefix,words,suffix].join(separator));},parse:function(iso8601){var s=$.trim(iso8601);s=s.replace(/\.\d+/,"");s=s.replace(/-/,"/").replace(/-/,"/");s=s.replace(/T/," ").replace(/Z/," UTC");s=s.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2");return new Date(s);},datetime:function(elem){var iso8601=$t.isTime(elem)?$(elem).attr("datetime"):$(elem).attr("title");return $t.parse(iso8601);},isTime:function(elem){return $(elem).get(0).tagName.toLowerCase()==="time";}});var functions={init:function(){var refresh_el=$.proxy(refresh,this);refresh_el();var $s=$t.settings;if($s.refreshMillis>0){this._timeagoInterval=setInterval(refresh_el,$s.refreshMillis);}},update:function(time){var parsedTime=$t.parse(time);$(this).data('timeago',{datetime:parsedTime});if($t.settings.localeTitle)$(this).attr("title",parsedTime.toLocaleString());refresh.apply(this);},updateFromDOM:function(){$(this).data('timeago',{datetime:$t.parse($t.isTime(this)?$(this).attr("datetime"):$(this).attr("title"))});refresh.apply(this);},dispose:function(){if(this._timeagoInterval){window.clearInterval(this._timeagoInterval);this._timeagoInterval=null;}}};$.fn.timeago=function(action,options){var fn=action?functions[action]:functions.init;if(!fn){throw new Error("Unknown function name '"+action+"' for timeago");}
this.each(function(){fn.call(this,options);});return this;};function refresh(){var data=prepareData(this);var $s=$t.settings;if(!isNaN(data.datetime)){if($s.cutoff==0||distance(data.datetime)<$s.cutoff){$(this).text(inWords(data.datetime));}}
return this;}
function prepareData(element){element=$(element);if(!element.data("timeago")){element.data("timeago",{datetime:$t.datetime(element)});var text=$.trim(element.text());if($t.settings.localeTitle){element.attr("title",element.data('timeago').datetime.toLocaleString());}else if(text.length>0&&!($t.isTime(element)&&element.attr("title"))){element.attr("title",text);}}
return element.data("timeago");}
function inWords(date){return $t.inWords(distance(date));}
function distance(date){return(new Date().getTime()-date.getTime());}
document.createElement("abbr");document.createElement("time");}));;;(function($,doc,win)
{"use strict";var PBTwitterUserTimeline=function(object,option)
{var $this=$(object);var $option=option;this.build=function()
{var helper=new PBHelper();$this.find('ul>li>.pb-twitter-user-timeline-date').each(function()
{var date;try
{date=new Date(Date.parse($(this).text().replace(/( \+)/,' UTC$1'))).toISOString();}
catch(e)
{date=$(this).text();}
$(this).html($.timeago(date));});$this.find('ul>li>.pb-twitter-user-timeline-date').css('visibility','visible');if(parseInt($option.carousel_enable)===1)
$this.children('ul').addClass('pb-layout-responsive-0');$option.onCreate=function()
{$this.css({opacity:1});};helper.createCarousel($this,$option);$this.find('a').attr('target','_blank');};};$.fn.PBTwitterUserTimeline=function(option)
{var object=new PBTwitterUserTimeline(this,option);object.build();};})(jQuery,document,window);
;/*
	jQuery zAccordion Plugin v2.1.0
	Copyright (c) 2010 - 2012 Nate Armagost, http://www.armagost.com/zaccordion
	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
(function(a){a.fn.zAccordion=function(e){var d={timeout:6000,width:null,slideWidth:null,tabWidth:null,height:null,startingSlide:0,slideClass:null,easing:null,speed:1200,auto:true,trigger:"click",pause:true,invert:false,animationStart:function(){},animationComplete:function(){},buildComplete:function(){},errors:false},c={displayError:function(g,f){if(window.console&&f){console.log("zAccordion: "+g+".")}},findChildElements:function(f){if(f.children().get(0)===undefined){return false}else{return true}},getNext:function(g,h){var f=h+1;if(f>=g){f=0}return f},fixHeight:function(f){if((f.height===null)&&(f.slideHeight!==undefined)){f.height=f.slideHeight;return true}else{if((f.height!==null)&&(f.slideHeight===undefined)){return true}else{if((f.height===null)&&(f.slideHeight===undefined)){return false}}}},getUnits:function(f){if(f!==null){if(f.toString().indexOf("%")>-1){return"%"}else{if(f.toString().indexOf("px")>-1){return"px"}else{return"px"}}}},toInteger:function(f){if(f!==null){return parseInt(f,10)}},sizeAccordion:function(f,g){if((g.width===undefined)&&(g.slideWidth===undefined)&&(g.tabWidth===undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width!==undefined)&&(g.slideWidth===undefined)&&(g.tabWidth===undefined)){if((g.width>100)&&(g.widthUnits==="%")){c.displayError("width cannot be over 100%",g.errors);return false}else{g.slideWidthUnits=g.widthUnits;g.tabWidthUnits=g.widthUnits;if(g.widthUnits==="%"){g.tabWidth=100/(f.children().size()+1);g.slideWidth=100-((f.children().size()-1)*g.tabWidth)}else{g.tabWidth=g.width/(f.children().size()+1);g.slideWidth=g.width-((f.children().size()-1)*g.tabWidth)}return true}}else{if((g.width===undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth===undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width===undefined)&&(g.slideWidth===undefined)&&(g.tabWidth!==undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width!==undefined)&&(g.slideWidth===undefined)&&(g.tabWidth!==undefined)){if(g.widthUnits!==g.tabWidthUnits){c.displayError("Units do not match",g.errors);return false}else{if((g.width>100)&&(g.widthUnits==="%")){c.displayError("width cannot be over 100%",g.errors);return false}else{if((((f.children().size()*g.tabWidth)>100)&&(g.widthUnits==="%"))||(((f.children().size()*g.tabWidth)>g.width)&&(g.widthUnits==="px"))){c.displayError("tabWidth too large for accordion",g.errors);return false}else{g.slideWidthUnits=g.widthUnits;if(g.widthUnits==="%"){g.slideWidth=100-((f.children().size()-1)*g.tabWidth)}else{g.slideWidth=g.width-((f.children().size()-1)*g.tabWidth)}return true}}}}else{if((g.width!==undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth===undefined)){if(g.widthUnits!==g.slideWidthUnits){c.displayError("Units do not match",g.errors);return false}else{if((g.width>100)&&(g.widthUnits==="%")){c.displayError("width cannot be over 100%",g.errors);return false}else{if(g.slideWidth>=g.width){c.displayError("slideWidth cannot be greater than or equal to width",g.errors);return false}else{if((((f.children().size()*g.slideWidth)<100)&&(g.widthUnits==="%"))||(((f.children().size()*g.slideWidth)<g.width)&&(g.widthUnits==="px"))){c.displayError("slideWidth too small for accordion",g.errors);return false}else{g.tabWidthUnits=g.widthUnits;if(g.widthUnits==="%"){g.tabWidth=(100-g.slideWidth)/(f.children().size()-1)}else{g.tabWidth=(g.width-g.slideWidth)/(f.children().size()-1)}return true}}}}}else{if((g.width===undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth!==undefined)){c.displayError("width must be defined",g.errors);return false}else{if((g.width!==undefined)&&(g.slideWidth!==undefined)&&(g.tabWidth!==undefined)){c.displayError("At maximum two of three attributes (width, slideWidth, and tabWidth) should be defined",g.errors);return false}}}}}}}}},timer:function(k){var l=k.data("next")+1;if(k.data("pause")&&k.data("inside")&&k.data("auto")){try{clearTimeout(k.data("interval"))}catch(j){}}else{if(k.data("pause")&&!k.data("inside")&&k.data("auto")){try{clearTimeout(k.data("interval"))}catch(i){}k.data("interval",setTimeout(function(){k.children(k.children().get(0).tagName+":nth-child("+l+")").trigger(k.data("trigger"))},k.data("timeout")))}else{if(!k.data("pause")&&k.data("auto")){try{clearTimeout(k.data("interval"))}catch(h){}k.data("interval",setTimeout(function(){k.children(k.children().get(0).tagName+":nth-child("+l+")").trigger(k.data("trigger"))},k.data("timeout")))}}}}},b={init:function(h){var i,g=["slideWidth","tabWidth","startingSlide","slideClass","animationStart","animationComplete","buildComplete"];for(i=0;i<g.length;i+=1){if(a(this).data(g[i].toLowerCase())!==undefined){a(this).data(g[i],a(this).data(g[i].toLowerCase()));a(this).removeData(g[i].toLowerCase())}}h=a.extend(d,h,a(this).data());if(this.length<=0){c.displayError("Selector does not exist",h.errors);return false}else{if(!c.fixHeight(h)){c.displayError("height must be defined",h.errors);return false}else{if(!c.findChildElements(this)){c.displayError("No child elements available",h.errors);return false}else{if(h.speed>h.timeout){c.displayError("Speed cannot be greater than timeout",h.errors);return false}else{h.heightUnits=c.getUnits(h.height);h.height=c.toInteger(h.height);h.widthUnits=c.getUnits(h.width);h.width=c.toInteger(h.width);h.slideWidthUnits=c.getUnits(h.slideWidth);h.slideWidth=c.toInteger(h.slideWidth);h.tabWidthUnits=c.getUnits(h.tabWidth);h.tabWidth=c.toInteger(h.tabWidth);if(h.slideClass!==null){h.slideOpenClass=h.slideClass+"-open";h.slideClosedClass=h.slideClass+"-closed";h.slidePreviousClass=h.slideClass+"-previous"}if(!c.sizeAccordion(this,h)){return false}else{return this.each(function(){var q=h,p=a(this),j=[],k,f,n,l,m=-1;k=q.slideWidth-q.tabWidth;f=p.get(0).tagName;n=p.children().get(0).tagName;l=p.children().size();p.data(a.extend({},{auto:q.auto,interval:null,timeout:q.timeout,trigger:q.trigger,current:q.startingSlide,previous:m,next:c.getNext(l,q.startingSlide),slideClass:q.slideClass,inside:false,pause:q.pause}));if(q.heightUnits==="%"){q.height=(p.parent().get(0).tagName==="BODY")?q.height*0.01*a(window).height():q.height*0.01*p.parent().height();q.heightUnits="px"}p.children().each(function(s){var r,o,t;o=q.invert?o=((l-1)*q.tabWidth)-(s*q.tabWidth):s*q.tabWidth;j[s]=o;r=q.invert?((l-1)-s)*10:s*10;if(q.slideClass!==null){a(this).addClass(q.slideClass)}a(this).css({top:0,"z-index":r,margin:0,padding:0,"float":"left",display:"block",position:"absolute",overflow:"hidden",width:q.slideWidth+q.widthUnits,height:q.height+q.heightUnits});if(n==="LI"){a(this).css({"text-indent":0})}if(q.invert){a(this).css({right:o+q.widthUnits,"float":"right"})}else{a(this).css({left:o+q.widthUnits,"float":"left"})}if(s===(q.startingSlide)){a(this).css("cursor","default");if(q.slideClass!==null){a(this).addClass(q.slideOpenClass)}}else{a(this).css("cursor","pointer");if(q.slideClass!==null){a(this).addClass(q.slideClosedClass)}if((s>(q.startingSlide))&&(!q.invert)){t=s+1;p.children(n+":nth-child("+t+")").css({left:j[t-1]+k+q.widthUnits})}else{if((s<(q.startingSlide))&&(q.invert)){t=s+1;p.children(n+":nth-child("+t+")").css({right:j[t-1]+k+q.widthUnits})}}}});p.css({display:"block",height:q.height+q.heightUnits,width:q.width+q.widthUnits,padding:0,position:"relative",overflow:"hidden"});if((f==="UL")||(f==="OL")){p.css({"list-style":"none"})}p.hover(function(){p.data("inside",true);if(p.data("pause")){try{clearTimeout(p.data("interval"))}catch(o){}}},function(){p.data("inside",false);if(p.data("auto")&&p.data("pause")){c.timer(p)}});p.children().bind(q.trigger,function(){if(a(this).index()!==p.data("current")){var r,o,s,t;s=m+1;t=p.data("current")+1;if((s!==0)&&(q.slideClass!==null)){p.children(n+":nth-child("+s+")").removeClass(q.slidePreviousClass)}p.children(n+":nth-child("+t+")");if(q.slideClass!==null){p.children(n+":nth-child("+t+")").addClass(q.slidePreviousClass)}m=p.data("current");p.data("previous",p.data("current"));s=m;s+=1;p.data("current",a(this).index());t=p.data("current");t+=1;p.children().css("cursor","pointer");a(this).css("cursor","default");if(q.slideClass!==null){p.children().addClass(q.slideClosedClass).removeClass(q.slideOpenClass);a(this).addClass(q.slideOpenClass).removeClass(q.slideClosedClass)}p.data("next",c.getNext(l,a(this).index()));c.timer(p);q.animationStart();if(q.invert){p.children(n+":nth-child("+t+")").stop().animate({right:j[p.data("current")]+q.widthUnits},q.speed,q.easing,q.animationComplete)}else{p.children(n+":nth-child("+t+")").stop().animate({left:j[p.data("current")]+q.widthUnits},q.speed,q.easing,q.animationComplete)}for(r=0;r<l;r+=1){o=r+1;if(r<p.data("current")){if(q.invert){p.children(n+":nth-child("+o+")").stop().animate({right:q.width-(o*q.tabWidth)+q.widthUnits},q.speed,q.easing)}else{p.children(n+":nth-child("+o+")").stop().animate({left:j[r]+q.widthUnits},q.speed,q.easing)}}if(r>p.data("current")){if(q.invert){p.children(n+":nth-child("+o+")").stop().animate({right:(l-o)*q.tabWidth+q.widthUnits},q.speed,q.easing)}else{p.children(n+":nth-child("+o+")").stop().animate({left:j[r]+k+q.widthUnits},q.speed,q.easing)}}}return false}});if(p.data("auto")){c.timer(p)}q.buildComplete()})}}}}}},stop:function(){if(a(this).data("auto")){clearTimeout(a(this).data("interval"));a(this).data("auto",false)}},start:function(){if(!a(this).data("auto")){var f=a(this).data("next")+1;a(this).data("auto",true);a(this).children(a(this).children().get(0).tagName+":nth-child("+f+")").trigger(a(this).data("trigger"))}},trigger:function(f){if((f>=a(this).children().size())||(f<0)){f=0}f+=1;a(this).children(a(this).children().get(0).tagName+":nth-child("+f+")").trigger(a(this).data("trigger"))},destroy:function(i){var f,g,h=a(this).data("slideClass");if(i!==undefined){f=(i.removeStyleAttr!==undefined)?i.removeStyleAttr:true;g=(i.removeClasses!==undefined)?i.removeClasses:false}clearTimeout(a(this).data("interval"));a(this).children().stop().unbind(a(this).data("trigger"));a(this).unbind("mouseenter mouseleave mouseover mouseout");if(f){a(this).removeAttr("style");a(this).children().removeAttr("style")}if(g){a(this).children().removeClass(h);a(this).children().removeClass(h+"-open");a(this).children().removeClass(h+"-closed");a(this).children().removeClass(h+"-previous")}a(this).removeData();if(i!==undefined){if(i.destroyComplete!=="undefined"){if(typeof(i.destroyComplete.afterDestroy)!=="undefined"){i.destroyComplete.afterDestroy()}if(i.destroyComplete.rebuild){return b.init.apply(this,[i.destroyComplete.rebuild])}}}}};if(b[e]){return b[e].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof e==="object"||!e){return b.init.apply(this,arguments)}else{a.error("zAccordion: "+e+" does not exist.")}}}}(jQuery));
;;(function($,doc,win)
{"use strict";var PBZAccordion=function(object,option)
{var $self=this;var $this=$(object);var $option=option;this.build=function()
{var helper=new PBHelper();if(parseInt($option.preloader_enable)===1)
{var id=$this.attr('id');helper.wait('#'+id+' .pb-image-preloader',function()
{$this.css({'height':'auto'}).removeClass('pb-preloader');$self.createAccordion();});}
else $self.createAccordion();};this.createAccordion=function()
{var helper=new PBHelper();$this.zAccordion({slideClass:'slide',width:'100%',tabWidth:'10%',height:$self.getAccordionHeight(),startingSlide:(pbOption.config.is_rtl?($this.children().length-parseInt($option.starting_slide)-1):parseInt($option.starting_slide)),timeout:parseInt($option.timeout),speed:parseInt($option.speed),auto:helper.parseBool($option.auto),pause:helper.parseBool($option.pause),easing:$option.easing,trigger:$option.trigger,animationStart:function()
{$this.find('li.slide-previous .pb-zaccordion-caption-box').fadeOut();},animationComplete:function()
{$this.find('li.slide-open .pb-zaccordion-caption-box').fadeIn().css('display','block');},buildComplete:function()
{$this.find('li.slide-closed .pb-zaccordion-caption-box').css('display','none');$this.find('li.slide-open .pb-zaccordion-caption-box').fadeIn();$self.setAccordionResposnive(true);}});};this.getAccordionHeight=function()
{var height=parseInt($this.find('li img').actual('height'));return(height);};this.setAccordionResposnive=function(bind)
{var height=this.getAccordionHeight();$this.css('height',height);$this.children('ul').css('height',height);$this.find('.pb-zaccordion-caption-box').each(function()
{if($(this).actual('outerHeight')>height)
$(this).addClass('pb-zaccordion-caption-box-disable');else $(this).removeClass('pb-zaccordion-caption-box-disable');});if(bind)
{$(window).windowDimensionListener({change:function(width,height)
{if(width||height)
$self.setAccordionResposnive(false);}});}};};$.fn.PBZAccordion=function(option)
{var slider=new PBZAccordion(this,option);slider.build();};})(jQuery,document,window);