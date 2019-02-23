/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBGoogleMap=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{
			try
			{
				var object=$this;
				object.css({width:$option.width+'%',height:$option.height+'px'});		

				var coordinate=new google.maps.LatLng($option.coordinate_lat,$option.coordinate_lng);

				var mapTypeIdsGoogle=[];
				var mapTypeIds=$option.map_type_ids.split(',');
				
				for(var i in mapTypeIds) 
				{
					if(mapTypeIds[i]==='CUSTOM_MAP') mapTypeIdsGoogle.push('CUSTOM_MAP');
					else mapTypeIdsGoogle.push(google.maps.MapTypeId[mapTypeIds[i]]);
				}
				
				var helper=new PBHelper();
				
				var mapOptions= 
				{
					center						:	coordinate,
					draggable					:	helper.parseBool($option.draggable),
					scrollwheel					:	helper.parseBool($option.scrollwheel),
					mapTypeId					:	($option.map_type_id==='CUSTOM_MAP' ? 'CUSTOM_MAP' : google.maps.MapTypeId[$option.map_type_id]),
					mapTypeControl				:	parseInt($option.map_type_control_enable),
					mapTypeControlOptions		: 
					{
						style					:	google.maps.MapTypeControlStyle[$option.map_type_control_style],
						position				:	google.maps.ControlPosition[$option.map_type_control_position],
						mapTypeIds				:	mapTypeIdsGoogle
					},
					zoom						:	parseInt($option.zoom_level),
					zoomControl					:	helper.parseBool($option.zoom_control_enable),
					zoomControlOptions			:	
					{
						style					:	google.maps.ZoomControlStyle[$option.zoom_style],
						position				:	google.maps.ControlPosition[$option.zoom_position]
					},
					panControl					:	helper.parseBool($option.pan_control_enable),
					panControlOptions			: 
					{
						position				:	google.maps.ControlPosition[$option.pan_control_position]
					},
					scaleControl				:	helper.parseBool($option.scale_control_enable),
					scaleControlOptions			: 
					{
						position				:	google.maps.ControlPosition[$option.scale_control_position]
					},
					streetViewControl			:	helper.parseBool($option.street_view_enable),
					streetViewControlOptions	: 
					{
						position				:	google.maps.ControlPosition[$option.street_view_position]
					}
				};

				var googleMap=new google.maps.Map(document.getElementById(object.attr('id')),mapOptions);

				coordinate=new google.maps.LatLng($option.coordinate_marker_lat,$option.coordinate_marker_lng);

				var icon=null;

				if($.trim($option.marker_image_url).length!==0)
				{
					var origin=null;
					var anchor=null;
				
					if(parseInt($option.marker_image_origin_x)!==0  || parseInt($option.marker_image_origin_y)!==0 )
						origin=new google.maps.Point(parseInt($option.marker_image_origin_x),parseInt($option.marker_image_origin_y)); 
					if(parseInt($option.marker_image_anchor_x)!==0 || parseInt($option.marker_image_anchor_y)!==0 )
						anchor=new google.maps.Point(parseInt($option.marker_image_anchor_x),parseInt($option.marker_image_anchor_y)); 

					icon=new google.maps.MarkerImage($option.marker_image_url,null,origin,anchor);
				}

				var markerOptions=
				{
					map			:	googleMap,
					position	:	coordinate,
					icon		:	icon
				}

				new google.maps.Marker(markerOptions);

				jQuery(window).resize(function() 
				{
					var currCenter=googleMap.getCenter();

					google.maps.event.trigger(googleMap,'resize');
					googleMap.setCenter(currCenter);
				});
				
				var style=new google.maps.StyledMapType(JSON.parse($option.style),{name:$option.name_style_map});
				googleMap.mapTypes.set('CUSTOM_MAP',style);
			}
			catch(e) { }		
		};
	};
	
	/**************************************************************************/
	
	$.fn.PBGoogleMap=function(option) 
	{
		var map=new PBGoogleMap(this,option);
		map.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/