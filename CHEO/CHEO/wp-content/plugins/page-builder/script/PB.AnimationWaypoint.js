
/******************************************************************************/
/******************************************************************************/

function PBAnimationWaypoint()
{
	/**************************************************************************/

	this.fadeIn=function(object,style,option,waypoint)
	{
		var self=this;
		
		object.css(style.initial);
		
		object.waypoint(function()
		{
			if(!self.isAnimationComplete(jQuery(this)))
			{
				jQuery(this).animate(style.trigger,option);
				self.setAnimationAsComplete(jQuery(this));
			}
		},
		{
			offset	:	waypoint.trigger.offset
		});		
	};
	
	/**************************************************************************/
	
	this.counter=function(object,option)
	{
		var self=this;
		var maxValue=0;
		var helper=new PBHelper();

		object.each(function() 
		{
			var value=parseInt(helper.getValueFromClass(jQuery(this),'pb-value-'));
			if(maxValue<value) maxValue=value;
		});
		
		if(parseInt(option.option.enable)===1) 
		{
			object.find(option.selector.value).html(0);
			object.find(option.selector.progress).css({'width':0});

			object.waypoint(function()
			{
				if(!self.isAnimationComplete(jQuery(this)))
				{
					self.setAnimationAsComplete(jQuery(this));
					
					var value=helper.getValueFromClass(jQuery(this),'pb-value-');
					if(value===false) return;

					var counter=jQuery(this).find(option.selector.value);
					var progress=jQuery(this).find(option.selector.progress);
					
					var portion=(value/maxValue);

					var i=0;

					progress.animate({width:(portion*100)+'%'},{duration:parseInt(option.option.duration),easing:option.option.easing,step:function(now,fx) 
					{
						i++;
						counter.html(Math.round(((now/100)*maxValue)));
					}});
				}
			},
			{
				offset		:	option.waypoint.trigger.offset
			});
		}
		else
		{
			object.each(function() 
			{
				var value=helper.getValueFromClass(jQuery(this),'pb-value-');
				if(value===false) return;

				var progress=jQuery(this).find(option.selector.progress);

				var portion=(value/maxValue);

				progress.css('width',(portion*100)+'%');
			});
		}		
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
};

/******************************************************************************/
/******************************************************************************/