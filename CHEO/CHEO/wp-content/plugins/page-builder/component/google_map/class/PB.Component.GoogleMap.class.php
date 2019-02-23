<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentGoogleMap extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'google-map'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'google-map'														=>	array
			(
				'use'															=>	2,
				'path'															=>	'//maps.google.com/maps/api/js?key='.PBOption::getOption('google_map_api_key')
			),
			'pb-google-map'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.GoogleMap.js',
				'dependencies'													=>	array('jquery'),
			)
		);

		$this->zoomControlStyle=array
		(
			'DEFAULT'															=>	array(__('Default',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'SMALL'																=>	array(__('Small',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'LARGE'																=>	array(__('Large',PLUGIN_PAGE_BUILDER_DOMAIN))
		);

		$this->mapTypeControlStyle=array
		(
			'DEFAULT'															=>	array(__('Default',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'HORIZONTAL_BAR'													=>	array(__('Horizontal Bar',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'DROPDOWN_MENU'														=>	array(__('Dropdown Menu',PLUGIN_PAGE_BUILDER_DOMAIN))
		);

		$this->position=array
		(
			'TOP_CENTER'														=>	array(__('Top center',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'TOP_LEFT'															=>	array(__('Top left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'TOP_RIGHT'															=>	array(__('Top right',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'LEFT_TOP'															=>	array(__('Left top',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'RIGHT_TOP'															=>	array(__('Right top',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'LEFT_CENTER'														=>	array(__('Left center',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'RIGHT_CENTER'														=>	array(__('Right center',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'LEFT_BOTTOM'														=>	array(__('Left bottom',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'RIGHT_BOTTOM'														=>	array(__('Right bottom',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'BOTTOM_CENTER'														=>	array(__('Bottom center',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'BOTTOM_LEFT'														=>	array(__('Bottom left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'BOTTOM_RIGHT'														=>	array(__('Bottom right',PLUGIN_PAGE_BUILDER_DOMAIN))	
		);

		$this->mapTypeId=array
		(
			'ROADMAP'															=>	array(__('Roadmap',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'SATELLITE'															=>	array(__('Satellite',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'HYBRID'															=>	array(__('Hybrid',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'TERRAIN'															=>	array(__('Terrain',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'CUSTOM_MAP'														=>	array(__('Custom styled map',PLUGIN_PAGE_BUILDER_DOMAIN))
		);	
		
		$this->mapTypeStyleFeatureType=array
		(
			'administrative'													=>	array(__('[administrative] Administrative areas',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'administrative.country'											=>	array(__('[administrative.country] Countries',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'administrative.land_parcel'										=>	array(__('[administrative.land_parcel] Land parcels',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'administrative.locality'											=>	array(__('[administrative.locality] Localities',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'administrative.neighborhood'										=>	array(__('[administrative.neighborhood] Neighborhoods',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'administrative.province'											=>	array(__('[administrative.province] Provinces',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'all'																=>	array(__('[all] All selector types',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'landscape'															=>	array(__('[landscape] Landscapes',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'landscape.man_made'												=>	array(__('[landscape.man_made] Man made structures',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'landscape.natural'													=>	array(__('[landscape.natural] Natural features',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'landscape.natural.landcover'										=>	array(__('[landscape.natural.landcover] Landcover',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'landscape.natural.terrain'											=>	array(__('[landscape.natural.terrain] Terrain',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi'																=>	array(__('[poi] Points of interest',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.attraction'													=>	array(__('[poi.attraction] Attractions for tourists',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.business'														=>	array(__('[poi.business] Businesses',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.government'													=>	array(__('[poi.government] Government buildings',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.medical'														=>	array(__('[poi.medical] Emergency services (hospitals, pharmacies, police, doctors, etc)',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.park'															=>	array(__('[poi.park] Parks',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.place_of_worship'												=>	array(__('[poi.place_of_worship] Places of worship, such as church, temple, or mosque',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.school'														=>	array(__('[poi.school] Schools',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'poi.sports_complex'												=>	array(__('[poi.sports_complex] Sports complexes',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'road'																=>	array(__('[road] All roads',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'road.arterial'														=>	array(__('[road.arterial] Arterial roads',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'road.highway'														=>	array(__('[road.highway] Highways',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'road.highway.controlled_access'									=>	array(__('[road.highway.controlled_access] Controlled-access highways',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'road.local'														=>	array(__('[road.local] Local roads',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'transit'															=>	array(__('[transit] All transit stations and lines',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'transit.line'														=>	array(__('[transit.line] Transit lines',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'transit.station'													=>	array(__('[transit.station] All transit stations',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'transit.station.airport'											=>	array(__('[transit.station.airport] Airports',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'transit.station.bus'												=>	array(__('[transit.station.bus] Bus stops',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'transit.station.rail'												=>	array(__('[transit.station.rail] Rail stations',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'water'																=>	array(__('[water] Bodies of water',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->mapTypeStyleElementType=array
		(
			'all'																=>	array(__('[all] Specified feature'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'geometry'															=>	array(__('[geometry] Feature\'s geometry'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'geometry.fill'														=>	array(__('[geometry.fill] Fill of the feature\'s geometry'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'geometry.stroke'													=>	array(__('[geometry.stroke] Stroke of the feature\'s geometry'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'labels'															=>	array(__('[labels] Feature\'s labels'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'labels.icon'														=>	array(__('[labels.icon] Icons within the feature\'s labels'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'labels.text'														=>	array(__('[labels.text] Text in the feature\'s label'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'labels.text.fill'													=>	array(__('[labels.text.fill] Fill of the text in the feature\'s labels'),PLUGIN_PAGE_BUILDER_DOMAIN),
			'labels.text.stroke'												=>	array(__('[labels.text.stroke] Stroke of the text in the feature\'s labels'),PLUGIN_PAGE_BUILDER_DOMAIN),
		);
		
		$this->mapTypeStyleVisibility=array
		(
			'on'																=>	__('On',PLUGIN_PAGE_BUILDER_DOMAIN),
			'off'																=>	__('Off',PLUGIN_PAGE_BUILDER_DOMAIN),
			'simplified'														=>	__('Simplified',PLUGIN_PAGE_BUILDER_DOMAIN)
		);	

		$this->component=array
		(
			'name'																=>	__('Google Maps',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Google Map',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Google Maps',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'ui'															=>	array
				(
					'panel'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('General',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Map type',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Zoom',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Pan',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Scale',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						6														=>	array
						(
							'header'											=>	__('Street view',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						7														=>	array
						(
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						)									
					),	
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Point coordinates',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	array(__('Coordinates, in order: latitude, longitude.',PLUGIN_PAGE_BUILDER_DOMAIN),__('You can define coordinates using this tool: <a href="http://www.birdtheme.org/useful/googletool.html">http://www.birdtheme.org/useful/googletool.html</a>',PLUGIN_PAGE_BUILDER_DOMAIN)),
						),
						2														=>	array
						(
							'header'											=>	__('Marker coordinates',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	array(__('Coordinates, in order: latitude, longitude.',PLUGIN_PAGE_BUILDER_DOMAIN),__('You can define coordinates using this tool: <a href="http://www.birdtheme.org/useful/googletool.html">http://www.birdtheme.org/useful/googletool.html</a>',PLUGIN_PAGE_BUILDER_DOMAIN)),
						),					
						3														=>	array
						(
							'header'											=>	__('Origin',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('The position of the image within a sprite, if any. By default, the origin is located at the top left corner of the image (0, 0).',PLUGIN_PAGE_BUILDER_DOMAIN),
						),
						4														=>	array
						(
							'header'											=>	__('Anchor',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('The position at which to anchor an image in correspondance to the location of the marker on the map. By default, the anchor is located along the center point of the bottom of the image.',PLUGIN_PAGE_BUILDER_DOMAIN),
						),	
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Style',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'coordinate_lat',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Latitude',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'coordinate_lng',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Longtitude',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),	
					array
					(
						'id'													=>	'coordinate_marker_lat',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Latitude',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'coordinate_marker_lng',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Longtitude',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),	
					array
					(
						'id'													=>	'marker_image_url',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Marker image URL',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-image',
							)							
						)
					),
					array
					(
						'id'													=>	'marker_image_origin_x',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('X',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	6
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'marker_image_origin_y',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Y',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	6
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'marker_image_anchor_x',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('X',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	6
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'marker_image_anchor_y',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Y',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	6
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),					
					array
					(
						'id'													=>	'width',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Width',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Width of the map (in % of the parent selector).',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	100,
								'option'										=>	array
								(
									'min'										=>	1,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'100'
						)
					),	
					array
					(
						'id'													=>	'height',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Map height in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'200'
						)
					),
					array
					(
						'id'													=>	'draggable',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Draggable',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the map should be draggable',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),					
					array
					(
						'id'													=>	'scrollwheel',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Scrollwheel',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('If disabled, prevents zooming the map during wheel scrolling',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),						
					array
					(
						'id'													=>	'css_class',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('CSS class',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'name_style_map',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Name of styled map',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'map_type_id',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Map type',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select map type. Must be selected also in "Allowed map type section".',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->mapTypeId),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'ROADMAP'
						)
					),
					array
					(
						'id'													=>	'map_type_ids',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Allowed map types',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'checkbox',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->mapTypeId),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'ROADMAP,SATELLITE,HYBRID,TERRAIN'
						)
					),
					array
					(
						'id'													=>	'map_type_control_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Map type control',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable map type control',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'map_type_control_style',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Map type control style',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->mapTypeControlStyle),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'DEFAULT'
						)
					),
					array
					(
						'id'													=>	'map_type_control_position',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Map type control position',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->position),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'TOP_CENTER'
						)
					),
					array
					(
						'id'													=>	'zoom_control_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Zoom control',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable zoom control.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
						)
					),
					array
					(
						'id'													=>	'zoom_level',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Zoom level',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	15,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	21
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'15'
						)
					),
					array
					(
						'id'													=>	'zoom_control_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Zoom control style',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->zoomControlStyle),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'SMALL'
						)
					),
					array
					(
						'id'													=>	'zoom_position',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Zoom position',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->position),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'RIGHT_TOP'
						)
					),
					array
					(
						'id'													=>	'pan_control_enable',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Pan control',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable pan control',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'pan_control_position',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Pan control position',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->position),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'TOP_CENTER'
						)
					),
					array
					(
						'id'													=>	'scale_control_enable',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'text'												=>	array
							(
								'header'										=>	__('Scale control',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable scale control',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'scale_control_position',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'text'												=>	array
							(
								'header'										=>	__('Scale control position',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->position),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'TOP_CENTER'
						)
					),	
					array
					(
						'id'													=>	'street_view_enable',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'text'												=>	array
							(
								'header'										=>	__('Street view',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable street view',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),
					array
					(
						'id'													=>	'street_view_position',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'text'												=>	array
							(
								'header'										=>	__('Street view position',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->position),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'TOP_CENTER'
						)
					),
					array
					(
						'id'													=>	'map_type_style_feature_type',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Feature type',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->mapTypeStyleFeatureType),
									'use_default'								=>	false
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@feature_type'
						)
					),	
					array
					(
						'id'													=>	'map_type_style_element_type',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Element type',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->mapTypeStyleElementType),
									'use_default'								=>	false
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@element_type'
						)
					),	
					array
					(
						'id'													=>	'map_type_style_styler_hue',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Hue',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Sets the hue in HEX of the feature to match the hue of the color supplied. Note that the saturation and lightness of the feature is conserved, which means that the feature will not match the color supplied exactly.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@hue'
						)
					),			
					array
					(
						'id'													=>	'map_type_style_styler_lightness',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Lightness',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Shifts lightness of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@lightness',
							'default'											=>	''
						)
					),
					array
					(
						'id'													=>	'map_type_style_styler_saturation',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Saturation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Shifts the saturation of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	4
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@saturation',
							'default'											=>	''
						)
					),	
					array
					(
						'id'													=>	'map_type_style_styler_gamma',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Gamma',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Modifies the gamma by raising the lightness to the given power.',PLUGIN_PAGE_BUILDER_DOMAIN),__('Valid values: Floating point numbers, [0.01, 10], with 1.0 representing no change.',PLUGIN_PAGE_BUILDER_DOMAIN)),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@gamma',
							'default'											=>	''
						)
					),						
					array
					(
						'id'													=>	'map_type_style_styler_inverse_lightness',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Inverse lightness',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable will invert the lightness of the feature while preserving the hue and saturation.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	array('1'=>__('Yes',PLUGIN_PAGE_BUILDER_DOMAIN),'0'=>__('No',PLUGIN_PAGE_BUILDER_DOMAIN))
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@inverse_lightness',
							'default'											=>	'-1'
						)
					),						
					array
					(
						'id'													=>	'map_type_style_style_visibility',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Visibility',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Sets the visibility of the feature.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->mapTypeStyleVisibility
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@visibility',
							'default'											=>	'-1'
						)
					),	
					array
					(
						'id'													=>	'map_type_style_styler_color',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Sets the color in HEX of the feature',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@color'
						)
					),	
					array
					(
						'id'													=>	'map_type_style_styler_weight',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Weight',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Sets the weight of the feature, in pixels.',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*map_type_style/@weight',
							'default'											=>	''
						)
					)						
				)
			)
		);			
		
		parent::__construct();
	}
		
	/**************************************************************************/
	
	function processShortcodeGoogleMap($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
	
		$Validation=new PBValidation();

		if($Validation->isEmpty($attribute['coordinate_lat'])) return(null);
		if($Validation->isEmpty($attribute['coordinate_lng'])) return(null);
		if($Validation->isEmpty($attribute['coordinate_marker_lat'])) return(null);
		if($Validation->isEmpty($attribute['coordinate_marker_lng'])) return(null);
		
		if(!$Validation->isNumber($attribute['marker_image_origin_x'],-99999,99999)) return(null);
		if(!$Validation->isNumber($attribute['marker_image_origin_y'],-99999,99999)) return(null);
		if(!$Validation->isNumber($attribute['marker_image_anchor_x'],-99999,99999)) return(null);
		if(!$Validation->isNumber($attribute['marker_image_anchor_y'],-99999,99999)) return(null);
		
		if(!$Validation->isNumber($attribute['width'],1,100)) return(null);
		if(!$Validation->isNumber($attribute['height'],1,9999)) return(null);
		
		if(!$Validation->isBool($attribute['draggable'])) return(null);
		if(!$Validation->isBool($attribute['scrollwheel'])) return(null);
		
		if(!array_key_exists($attribute['map_type_id'],$this->mapTypeId)) return(null);
		if(!array_key_exists($attribute['map_type_control_position'],$this->position)) return(null);
		if(!array_key_exists($attribute['map_type_control_style'],$this->mapTypeControlStyle)) return(null);
		if(!$Validation->isBool($attribute['map_type_control_enable'])) return(null);
		
		if(!$Validation->isNumber($attribute['zoom_level'],1,21)) return(null);
		if(!$Validation->isBool($attribute['zoom_control_enable'])) return(null);
		if(!array_key_exists($attribute['zoom_position'],$this->position)) return(null);
		if(!array_key_exists($attribute['zoom_control_style'],$this->zoomControlStyle)) return(null);
		
		if(!$Validation->isBool($attribute['pan_control_enable'])) return(null);
		if(!array_key_exists($attribute['pan_control_position'],$this->position)) return(null);
		
		if(!$Validation->isBool($attribute['scale_control_enable'])) return(null);
		if(!array_key_exists($attribute['scale_control_position'],$this->position)) return(null);
		
		if(!$Validation->isBool($attribute['street_view_enable'])) return(null);
		if(!array_key_exists($attribute['street_view_position'],$this->position)) return(null);
		
		$id=PBHelper::createId('google_map');

		$class=array('pb-google-map',$attribute['css_class']);
		
		$attribute['style']='['.substr(do_shortcode($content),1).']';
		
		$html=
		'
			<div id="'.$id.'"'.PBHelper::createClassAttribute($class).'></div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBGoogleMap('.json_encode($attribute).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function processShortcodeGoogleMapMapTypeStyle($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
	
		$Validation=new PBValidation();
		
		$data=array();
		$style=array();

		if(array_key_exists($attribute['feature_type'],$this->mapTypeStyleFeatureType))
		{
			if($attribute['feature_type']!='all')
				$data['featureType']=$attribute['feature_type'];
		}
		if(array_key_exists($attribute['element_type'],$this->mapTypeStyleElementType))
		{
			if($attribute['element_type']!='all')
				$data['elementType']=$attribute['element_type'];
		}
		
		if($Validation->isColor($attribute['hue'],false))
			$style[]['hue']=PBColor::getColor($attribute['hue']);
		if($Validation->isNumber($attribute['lightness'],-100,100,false))
			$style[]['lightness']=$attribute['lightness'];	
		if($Validation->isNumber($attribute['saturation'],-100,100,false))
			$style[]['saturation']=$attribute['saturation'];	
		if($Validation->isFloat($attribute['gamma'],0,10,false))
			$style[]['gamma']=$attribute['gamma'];	
		if($Validation->isBool($attribute['inverse_lightness']))
			$style[]['inverse_lightness']=$attribute['inverse_lightness'];
		if(array_key_exists($attribute['visibility'],$this->mapTypeStyleVisibility))
			$style[]['visibility']=$attribute['visibility'];		
		if($Validation->isColor($attribute['color'],false))
			$style[]['color']=PBColor::getColor($attribute['color']);
		if($Validation->isNumber($attribute['weight'],1,999,false))
			$style[]['weight']=$attribute['weight'];	
		
		$data['stylers']=$style;
		
		return(','.json_encode($data));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/