/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBTwitterUserTimeline=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			var helper=new PBHelper();
			
			$this.find('ul>li>.pb-twitter-user-timeline-date').each(function() 
			{
				var date;
				
				try
				{
					date=new Date(Date.parse($(this).text().replace(/( \+)/, ' UTC$1'))).toISOString();
				}
				catch(e) 
				{
					date=$(this).text();
				}
				
				$(this).html($.timeago(date));
			});

			$this.find('ul>li>.pb-twitter-user-timeline-date').css('visibility','visible');

			if(parseInt($option.carousel_enable)===1)
				$this.children('ul').addClass('pb-layout-responsive-0');
			
			$option.onCreate=function() 
			{
				$this.css({opacity:1});
			};
			
			helper.createCarousel($this,$option);

			$this.find('a').attr('target','_blank');	
		};
	};
	
	/**************************************************************************/
	
	$.fn.PBTwitterUserTimeline=function(option) 
	{
		var object=new PBTwitterUserTimeline(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/