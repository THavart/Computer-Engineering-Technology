/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBAudio=function(object,id,option,track)
	{
		/**********************************************************************/
		
		var $id=id;
		var $track=track;
		var $option=option;
		
		var $this=$(object);
		
		/**********************************************************************/

		this.build=function() 
		{
			option=
			{
				muted			:	parseInt($option.muted)===1 ? true : false,
				volume			:	$option.volume,
				swfPath			:	'../js',
				supplied		:	'oga, m4a, mp3',
				wmode			:	'window',
				smoothPlayBar	:	true,
				keyEnabled		:	true,
				errorAlerts		:	false,
				warningAlerts	:	false,
				playlistOptions	:	
				{
					autoPlay	:	parseInt($option.autoplay)===1 ? true : false		
				},	
				ready			:	function()
				{
					if(parseInt($option.playlist_enable)===0)
						$this.find('.jp-playlist').css({display:'none'});
					$this.css({display:'block'});
				}
			};
	
			new jPlayerPlaylist({'jPlayer':'#'+$id.idPlayer,'cssSelectorAncestor':'#'+$id.idPlayerContainer},$track,option);
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBAudio=function(id,option,track) 
	{
		var object=new PBAudio(this,id,option,track);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/