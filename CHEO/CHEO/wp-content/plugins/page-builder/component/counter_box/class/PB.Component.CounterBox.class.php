<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentCounterBox extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Layout=new PBLayout();
		$Easing=new PBEasing();
		$CarouFredSel=new PBCarouFredSel();
		
		$this->style=array
		(
			'counter-box'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'counter-box'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.CounterBox.js'
			)
		);
		
		$this->layout=$Layout->getMainLayout();

		$this->component=array
		(
			'name'																=>	__('Counter Box',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Counter Box',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Counter Box',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Carousel',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Waypoints',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Items',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
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
								'subheader'										=>	__('Select layout of the counter boxes.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
					),
					array
					(
						'id'													=>	'carousel_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
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
							'default'											=>	1
						)
					),	
					array
					(
						'id'													=>	'carousel_autoplay_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'default'											=>	'swing'
						)
					),						
					array
					(
						'id'													=>	'carousel_scroll_duration',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Duration',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Determines the duration of the transition in milliseconds',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'500'
						)
					),	
					array
					(
						'id'													=>	'waypoint_enable',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Run animation on start',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'waypoint_offset_trigger',
						'ui'													=>	array
						(
							'panel'												=>	3,
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
							'panel'												=>	3,
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
							'panel'												=>	3,
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
						'id'													=>	'header',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
						'id'													=>	'content',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
					),		
					array
					(
						'id'													=>	'value',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Value',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'path'												=>	'*item/@value'
						)
					),
					array
					(
						'id'													=>	'character_before',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Character before',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter character which has to be visible before value.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@character_before'
						)
					),
					array
					(
						'id'													=>	'character_after',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Character after',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter character which has to be visible after value.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@character_after'
						)
					),
					array
					(
						'id'													=>	'text_counter_enable',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Enable text counter',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable text counter.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1,
							'path'												=>	'*item/@text_counter_enable'
						)
					),					
					array
					(
						'id'													=>	'graphic_counter_enable',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Enable graphic counter',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable graphic counter.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	1,
							'path'												=>	'*item/@graphic_counter_enable'
						)
					)						
				)
			)
		);		
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeCounterBox($attribute,$content,$tag)
	{
		$html=null;
		
		$Layout=new PBLayout();
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		$CarouFredSel=new PBCarouFredSel();
		
		$attribute=$this->processAttribute($tag,$attribute);
		
		if(!$Layout->isLayout($attribute['layout'])) return($html);
		
		if(!$Validation->isBool($attribute['carousel_enable'])) return($html);

		if(!$Validation->isBool($attribute['carousel_autoplay_enable'])) return($html);
		if(!$Validation->isBool($attribute['carousel_circular_enable'])) return($html);
		if(!$Validation->isBool($attribute['carousel_infinite_enable'])) return($html);
		
		if(!$Validation->isBool($attribute['carousel_scroll_pause_hover'])) return($html);
		
		if(!array_key_exists($attribute['carousel_scroll_fx'],$CarouFredSel->scrollFX)) return($html);
		if(!array_key_exists($attribute['carousel_scroll_easing'],$Easing->easingType)) return($html);
		if(!$Validation->isNumber($attribute['carousel_scroll_duration'],0,99999)) return($html);		
		
		if(!$Validation->isBool($attribute['waypoint_enable'])) return($html);
		if(!$Validation->isNumber($attribute['waypoint_duration'],0,99999)) return($html);
		if(!array_key_exists($attribute['waypoint_easing'],$Easing->easingType)) return($html);
		
		/***/
		
		$this->layout=$attribute['layout'];
		$this->layoutColumnIndex=0;
		
		$option=array('carousel'=>array(),'animation'=>array());
		
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
			$option['carousel'][$index]=$attribute[$index];
		
		$key=array
		(
			'waypoint_enable',
			'waypoint_easing',
			'waypoint_duration',
			'waypoint_offset_trigger'
		);
		foreach($key as $index)
			$option['waypoint'][$index]=$attribute[$index];		
	
		/***/
		
		$class=array
		(
			array
			(
				'pb-clear-fix',
				'pb-counter-box',
				$attribute['css_class']
			),
			array
			(
				'pb-reset-list',
				$Layout->getLayoutCSSClass($attribute['layout'])
			)
		);
		
		$id=PBHelper::createId('pb_counter_box');
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</ul>
				<div class="pb-slider-pagination"></div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$("#'.$id.'").PBCounterBox('.json_encode($option).');
					});
				</script>
			</div>			
		';

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeCounterBoxItem($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		
		if(!$Validation->isNumber($attribute['value'],0,99999,false)) return($html);
		if(!$Validation->isBool($attribute['text_counter_enable'])) return($html);
		if(!$Validation->isBool($attribute['graphic_counter_enable'])) return($html);
		
		/***/

		$characterAfterHtml=null;	
		$characterBeforeHtml=null;

		if($Validation->isNotEmpty($attribute['character_before']))
			$characterBeforeHtml='<span'.PBHelper::createClassAttribute(array('pb-counter-box-text-counter-character-before')).'>'.$attribute['character_before'].'</span>';
		if($Validation->isNotEmpty($attribute['character_after']))
			$characterAfterHtml='<span'.PBHelper::createClassAttribute(array('pb-counter-box-text-counter-character-after')).'>'.$attribute['character_after'].'</span>';			

		$class=array('pb-counter-box-text-counter');
		if($attribute['text_counter_enable']==0)
			array_push($class,'pb-hidden');
			
		$counterTextHtml=
		'
			<div'.PBHelper::createClassAttribute($class).'>
				'.$characterBeforeHtml.'
				<span'.PBHelper::createClassAttribute(array('pb-counter-box-text-counter-value')).'></span>
				'.$characterAfterHtml.'
			</div>
		';
		
		/***/
		
		$class=array('pb-counter-box-graphic-counter');
		if($attribute['graphic_counter_enable']==0)
			array_push($class,'pb-hidden');

		$counterGraphicHtml=
		'
			<div'.PBHelper::createClassAttribute($class).'>
				<div'.PBHelper::createClassAttribute(array('pb-counter-box-graphic-counter-background')).'></div>
				<div'.PBHelper::createClassAttribute(array('pb-counter-box-graphic-counter-foreground')).'></div>
			</div>
		';
		
		/***/
		
		$class=array
		(
			'pb-layout-'.$Layout->getLayoutColumnCSSClass($this->layout,$this->layoutColumnIndex),
			'pb-value-'.(int)$attribute['value']
		);
		
		$html=
		'
			<li'.PBHelper::createClassAttribute($class).'>
				<div>
					'.$counterTextHtml.'
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
					'.$counterGraphicHtml.'
				</div>
			</li>
		';
		
		$this->layoutColumnIndex++;

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeCounterBoxItemHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$html=
		'
			<h'.PBComponentData::get($this->getComponentId(),'header_important_default').PBHelper::createClassAttribute(array('pb-counter-box-header')).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h'.PBComponentData::get($this->getComponentId(),'header_important_default').'>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeCounterBoxItemContent($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		return(PBHelper::formatContent($content));
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/