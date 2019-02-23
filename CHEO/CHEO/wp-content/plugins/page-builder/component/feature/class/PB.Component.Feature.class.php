<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentFeature extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Window=new PBWindow();
		$Border=new PBBorder();
		$Layout=new PBLayout();
		$Easing=new PBEasing();
		$CarouFredSel=new PBCarouFredSel();
		
		$this->style=array
		(
			'feature'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'feature'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Feature.js'
			)
		);
		
		$this->layout=$Layout->getMainLayout();
	
		$this->iconPosition=array
		(	
			'top'																=>	array(__('Top',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'right'																=>	array(__('Right',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'bottom'															=>	array(__('Bottom',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'left'																=>	array(__('Left',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->waypointType=array
		(
			'none'																=>	array(__('None',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'iconFadeIn'														=>	array(__('Icon fade in',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'itemFadeIn'														=>	array(__('Item fade in',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->attrItemURL=null;
		$this->attrItemURLTarget=null;

		$this->attrIconSize=null;
		$this->attrIconPosition=null;

		$this->attrLayout=null;
		$this->attrLayoutColumnIndex=0;
		
		$this->icon=(array)PBComponentData::get($this->getComponentId(),'icon');

		/***/
		
		$componentElement=array();
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
		{
			foreach($this->icon as $index=>$value)
				$this->icon[$index]['file']=PBComponentData::setFile($this->getComponentId(),'icon_feature_'.$index,$value['path']);			

			$componentElement[0]=null;
			
			$componentElement[1]=null;
			
			$componentElement[2]=array
			(
						'id'													=>	'item_icon',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->icon[PBComponentData::get($this->getComponentId(),'icon_size_default')]['file']
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@item_icon'
						)
			);			
		}

		if(in_array(PBComponentData::get($this->getComponentId(),'icon_type'),array('cf','fa')))
		{
			$componentElement[0]=array
			(
						'id'													=>	'element_even_icon_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Icon color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
			);		
			$componentElement[1]=array
			(
						'id'													=>	'element_odd_icon_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Icon color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
			);		
		}
		
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='fa')
		{
			$componentElement[2]=array
			(
						'id'													=>	'item_icon',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter name of the icon (you have to enter at least two characters to get best matched set of icons).',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'fa-icon'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@item_icon',
							'default'											=>	'check-square'
						)
			);			
		}
		elseif(PBComponentData::get($this->getComponentId(),'icon_type')==='cf')
		{
			$componentElement[2]=array
			(
						'id'													=>	'item_icon',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select icon.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->icon)
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@item_icon'
						)
			);		
		}
		
		/***/
		
		$this->component=array
		(
			'name'																=>	__('Features',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Features',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Features',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Carousel',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Waypoints',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Items',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Odd elements',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Styles for odd elements',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Even elements',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Styles for even elements',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Enter link and link target of feature ',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Item',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),	
				'element'														=>	array
				(
					array
					(
						'id'													=>	'layout',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Layout',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select layout of the features.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->layout,'name')
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
						'id'													=>	'icon_size',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Icon size',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->icon,'label')
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'icon_size_default')
						)	
					),
					array
					(
						'id'													=>	'icon_position',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Icon position',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=> PBHelper::extractDictionary($this->iconPosition)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'left'
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					)
					,						
					$componentElement[0]
					,
					array
					(
						'id'													=>	'element_even_icon_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Background color of icon in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),		
					array
					(
						'id'													=>	'element_even_icon_border_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border color of icon in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'element_even_icon_border_style',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border style of icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),
					array
					(
						'id'													=>	'element_even_icon_border_width',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border width of icon in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'3'
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),		
					array
					(
						'id'													=>	'element_even_icon_border_radius',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border radius of icon in percentage. Value -1 means that default value will be used.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	-1,
								'option'										=>	array
								(
									'min'										=>	-1,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	-1
						)
					)
					,			
					$componentElement[1]
					,
					array
					(
						'id'													=>	'element_odd_icon_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Background color of icon in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),		
					array
					(
						'id'													=>	'element_odd_icon_border_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border color of icon in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'element_odd_icon_border_style',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border style of icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Border->style),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),					
					array
					(
						'id'													=>	'element_odd_icon_border_width',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border width of icon in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'3'
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),
					array
					(
						'id'													=>	'element_odd_icon_border_radius',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border radius of icon in percentage. Value -1 means that default value will be used.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	-1,
								'option'										=>	array
								(
									'min'										=>	-1,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	-1
						)
					),	
					array
					(
						'id'													=>	'carousel_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Enable carousel',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable carousel',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),	
					array
					(
						'id'													=>	'carousel_autoplay_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Autoplay',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),						
					array
					(
						'id'													=>	'carousel_circular_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Circular',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the carousel should be circular',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),						
					array
					(
						'id'													=>	'carousel_infinite_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Infinite',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the carousel should be infinite',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),
					array
					(
						'id'													=>	'carousel_scroll_pause_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Pause on hover',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines whether the timeout between transitions should be paused',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1
						)
					),
					array
					(
						'id'													=>	'carousel_scroll_fx',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Scroll effect',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Indicates which effect to use for the transition',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($CarouFredSel->scrollFX)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'scroll'
						)
					),						
					array
					(
						'id'													=>	'carousel_scroll_easing',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Indicates which easing function to use for the transition',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Easing->easingType)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'easeInQuad'
						)
					),						
					array
					(
						'id'													=>	'carousel_scroll_duration',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Duration',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines the duration of the transition in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								)	
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'500'
						)
					),
					array
					(
						'id'													=>	'waypoint_type',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select animation',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->waypointType),
									'use_default'								=>	false
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'none'
						)
					),
					array
					(
						'id'													=>	'waypoint_offset_trigger',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Offset',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('This option determines how far the top of the element must be from the top of the viewport to trigger the animation',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	10
								)	
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'90%'
						)
					),					
					array
					(
						'id'													=>	'waypoint_duration',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Duration',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Duration of the animation in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								)	
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'500'
						)
					),
					array
					(
						'id'													=>	'waypoint_easing',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Easing',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Easing type of animation',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Easing->easingType)	
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'swing'
						)
					),	
					array
					(
						'id'													=>	'waypoint_opacity_initial',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Opacity',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Initial opacity value for "fade in" animations.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	10,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	10
						)
					),
					array
					(
						'id'													=>	'item_url',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@item_url'
						)
					),					
					array
					(
						'id'													=>	'item_url_target',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Target',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Window->linkTarget)
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@item_url_target',
							'default'											=>	'_blank'
						)
					),	
					$componentElement[2]
					,
					array
					(
						'id'													=>	'item_header',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_header/@content'
						)
					),	
					array
					(
						'id'													=>	'item_content',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'textarea',
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_content/@content'
						)
					)						
				)
			)
		);	

		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		if(PBComponentData::get($this->getComponentId(),'icon_type')!=='gr') return;
		
		$CSS=new PBCSS();

		$key=$retina ? 'url_retina' : 'url';
			
		$codeCurrent=null;
		foreach($this->icon as $iconSize=>$iconFile)
		{
			foreach($iconFile['file'] as $iconName)
			{
				$codeCurrent.=$CSS->create(array
				(
					'selector'	=>	array
					(
						'.pb-feature.pb-feature-icon-size-'.$iconSize.' ul>li>div>.pb-feature-icon.pb-feature-icon-'.PBHelper::createHash($iconName)
					),
					'property'	=>	array
					(
						'background-image'	=>	$this->icon[$iconSize][$key].$iconName,
					)
				));	
			}
		}
		
		if($retina) $codeCurrent=$CSS->getRetinaMediaQuery($codeCurrent);
		
		$code.=$codeCurrent;
		
		if((PBData::get('retina_ready')==1) && (!$retina))
		{
			$this->createCSS($code,true);
			return;
		}
		
		PBComponentData::set($this->getComponentId(),'css',$code);
	}
	
	/**************************************************************************/
	
	function processShortcodeFeature($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		
		$Border=new PBBorder();
		$Layout=new PBLayout();
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		$CarouFredSel=new PBCarouFredSel();
		
		/***/
		
		
		if(!array_key_exists($attribute['layout'],$this->layout)) return($html);
		
		if(isset($attribute['icon_size']))
		{
			if(!array_key_exists($attribute['icon_size'],$this->icon)) return($html);
		}
		if(isset($attribute['icon_position']))	
		{
			if(!array_key_exists($attribute['icon_position'],$this->iconPosition)) return($html);		
		}
		
		if(isset($attribute['carousel_enable']))	
		{
			if(!$Validation->isBool($attribute['carousel_enable'])) return($html);		
		}
		if(isset($attribute['carousel_autoplay_enable']))	
		{
			if(!$Validation->isBool($attribute['carousel_autoplay_enable'])) return($html);
		}
		if(isset($attribute['carousel_circular_enable']))	
		{
			if(!$Validation->isBool($attribute['carousel_circular_enable'])) return($html);
		}
		if(isset($attribute['carousel_infinite_enable']))	
		{
			if(!$Validation->isBool($attribute['carousel_infinite_enable'])) return($html);
		}
		if(isset($attribute['carousel_scroll_pause_hover']))	
		{
			if(!$Validation->isBool($attribute['carousel_scroll_pause_hover'])) return($html);
		}
			
		if(isset($attribute['carousel_scroll_fx']))
		{
			if(!array_key_exists($attribute['carousel_scroll_fx'],$CarouFredSel->scrollFX)) return($html);
		}
		if(isset($attribute['carousel_scroll_easing']))
		{
			if(!array_key_exists($attribute['carousel_scroll_easing'],$Easing->easingType)) return($html);
		}
		if(isset($attribute['carousel_scroll_duration']))
		{
			if(!$Validation->isNumber($attribute['carousel_scroll_duration'],0,99999)) return($html);
		}
		
		if(isset($attribute['waypoint_type']))
		{
			if(!array_key_exists($attribute['waypoint_type'],$this->waypointType)) return($html);
		}
		if(isset($attribute['waypoint_duration']))	
		{
			if(!$Validation->isNumber($attribute['waypoint_duration'],0,99999)) return($html);
		}
		if(isset($attribute['waypoint_opacity_initial']))
		{
			if(!$Validation->isNumber($attribute['waypoint_opacity_initial'],0,100)) return($html);		
		}

		/***/
		
		$this->attrLayout=$attribute['layout'];
		$this->attrLayoutColumnIndex=0;
		
		$option=array();

		$key=array
		(
			'carousel_enable',
			'carousel_autoplay_enable',
			'carousel_circular_enable',
			'carousel_infinite_enable',
			'carousel_scroll_pause_hover',
			'carousel_scroll_fx',
			'carousel_scroll_easing',
			'carousel_scroll_duration'
		);
		foreach($key as $index)
		{
			if(isset($attribute[$index]))
				$option['carousel'][$index]=$attribute[$index];
		}
		
		$key=array
		(
			'waypoint_type',
			'waypoint_easing',
			'waypoint_duration',
			'waypoint_offset_trigger',
			'waypoint_opacity_initial',
		);
		foreach($key as $index)
		{
			if(isset($attribute[$index]))
				$option['waypoint'][$index]=$attribute[$index];
		}
		
		/**/
		
		$this->style=array('odd'=>array(),'even'=>array());
		
		foreach($this->style as $index=>$value)
		{
			if(PBComponentData::get($this->getComponentId(),'icon_type')!=='gr')
			{
				if($Validation->isColor($attribute['element_'.$index.'_icon_color']))
					$this->style[$index]['color']=PBColor::getColor($attribute['element_'.$index.'_icon_color']);				
			}
			if($Validation->isColor($attribute['element_'.$index.'_icon_bg_color']))
				$this->style[$index]['background-color']=PBColor::getColor($attribute['element_'.$index.'_icon_bg_color']);
			if(array_key_exists($attribute['element_'.$index.'_icon_border_style'],$Border->style))
				$this->style[$index]['border-style']=$attribute['element_'.$index.'_icon_border_style'];
			if($Validation->isColor($attribute['element_'.$index.'_icon_border_color']))
				$this->style[$index]['border-color']=PBColor::getColor($attribute['element_'.$index.'_icon_border_color']);
			if($Validation->isNumber($attribute['element_'.$index.'_icon_border_width'],0,999))
				$this->style[$index]['border-width']=$attribute['element_'.$index.'_icon_border_width'].'px';			
			if($Validation->isNumber($attribute['element_'.$index.'_icon_border_radius'],0,100))
				$this->style[$index]['border-radius']=$attribute['element_'.$index.'_icon_border_radius'].'%';				
		}
		
		/**/
		
		if(isset($attribute['icon_size']))
			$this->attrIconSize=$attribute['icon_size'];
		
		if(isset($attribute['icon_position']))
			$this->attrIconPosition=$attribute['icon_position'];
	
		$id=PBHelper::createId('pb_feature');
		
		$class=array
		(
			array
			(
				'pb-feature',
				'pb-clear-fix',
			),
			array
			(
				$Layout->getLayoutCSSClass($attribute['layout']),
				'pb-reset-list',
				'pb-clear-fix'
			)
		);
		
		if(isset($attribute['icon_size']))
			array_push($class[0],'pb-feature-icon-size-'.$attribute['icon_size']);
		if(isset($attribute['icon_position']))
			array_push($class[0],'pb-feature-icon-position-'.$attribute['icon_position']);		
		
		array_push($class[0],'pb-feature-icon-type-'.PBComponentData::get($this->getComponentId(),'icon_type'));
		
		array_push($class[0],$attribute['css_class']);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</ul>
				<div class="pb-slider-pagination"></div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$("#'.$id.'").PBFeature('.json_encode($option).');
					});
				</script>
			</div>
		';		
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeFeatureItem($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Layout=new PBLayout();
		
		$this->attrItemURL=null;
		$this->attrItemURLTarget=null;
		
		if(isset($attribute['item_url']))
			$this->attrItemURL=$attribute['item_url'];
		
		if(isset($attribute['item_url_target']))
			$this->attrItemURLTarget=$attribute['item_url_target'];
		
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
		{
			if(!array_key_exists($attribute['item_icon'],$this->icon[$this->attrIconSize]['file'])) return($html);
		}
		elseif(PBComponentData::get($this->getComponentId(),'icon_type')==='cf')
		{
			if(!array_key_exists($attribute['item_icon'],$this->icon)) return($html);
		}
		
		$position=$this->attrLayoutColumnIndex%2==0 ? 'even' : 'odd';
		
		$class=array
		(
			array
			(
				'pb-layout-'.$Layout->getLayoutColumnCSSClass($this->attrLayout,$this->attrLayoutColumnIndex),
				'pb-feature-element-'.$position
			),
			array
			(
				'pb-feature-icon'
			)
		);
		
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='gr')
			array_push($class[1],'pb-feature-icon-'.PBHelper::createHash($attribute['item_icon']));
		elseif(PBComponentData::get($this->getComponentId(),'icon_type')==='cf')
			array_push($class[1],'pb-feature-icon-'.$attribute['item_icon']);
		
		$style=$this->style[$position];

		$element=array(null,null,null);
		
		$element[0]='<div'.PBHelper::createClassAttribute($class[1]).PBHelper::createStyleAttribute($style).'>';
			
		if(PBComponentData::get($this->getComponentId(),'icon_type')==='fa')
		{		
			$styleFontIcon=array();
			
			if(array_key_exists('color',$style))
				$styleFontIcon['color']=$style['color'];
				
			$element[1]='<i class="fa fa-'.esc_attr($attribute['item_icon']).'"'.PBHelper::createStyleAttribute($styleFontIcon).'></i>';
		}
		
		$element[2]=apply_filters('pb_component_feature_icon_inner_html','');
			
		$element[2].='</div>';
		
		$html=
		'
			<li'.PBHelper::createClassAttribute($class[0]).'>
				<div>
					'.($this->attrIconPosition!='bottom' ? join('',$element) : '').'
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
					'.($this->attrIconPosition=='bottom' ? join('',$element) : '').'
				</div>
			</li>
		';
		
		$this->attrLayoutColumnIndex++;

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));	
	}
	
	/**************************************************************************/
	
	function processShortcodeFeatureItemHeader($attribute,$content,$tag)
	{
		if(PBComponentData::get($this->getComponentId(),'field_item_header_enable')==0) return;
		
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Window=new PBWindow();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$content=do_shortcode($content);
		if($Validation->isNotEmpty($this->attrItemURL))
		{
			$class=array($Window->getTargetCSSClass($this->attrItemURLTarget));
			$content='<a href="'.esc_attr($this->attrItemURL).'"'.PBHelper::createClassAttribute($class).'>'.$content.'</a>';
		}
		
		$class=array
		(
			'pb-feature-header'
		);
		
		$html='<h'.PBComponentData::get($this->getComponentId(),'header_important_default').PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h'.PBComponentData::get($this->getComponentId(),'header_important_default').'>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeFeatureItemContent($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array
		(
			'pb-feature-content'
		);
		
		$html='<div'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/