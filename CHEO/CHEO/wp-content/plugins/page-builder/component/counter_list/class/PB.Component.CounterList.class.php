<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentCounterList extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		
		$this->style=array
		(
			'counter-list'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'counter-list'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.CounterList.js'
			)
		);
		
		$this->component=array
		(
			'name'																=>	__('Counter List',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Counter List',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Counter List',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Waypoints',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
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
						'id'													=>	'character_before',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Character before',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter character which has to be visible before value on list.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'character_after',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Character after',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enter character which has to be visible after value on list.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'waypoint_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
							'panel'												=>	2,
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
						'id'													=>	'label',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Name',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@name'
						)
					),	
					array
					(
						'id'													=>	'value',
						'ui'													=>	array
						(
							'panel'												=>	3,
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
					)				
				)
			)
		);
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeCounterList($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$option=array();
		
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		
		$this->character=array('before'=>$attribute['character_before'],'after'=>$attribute['character_after']);
		
		$content=do_shortcode($content);
		
		if($Validation->isEmpty($content)) return($html);
		
		if(!$Validation->isBool($attribute['waypoint_enable'])) return($html);
		if(!$Validation->isNumber($attribute['waypoint_duration'],0,99999)) return($html);
		if(!array_key_exists($attribute['waypoint_easing'],$Easing->easingType)) return($html);
		
		$key=array
		(
			'waypoint_enable',
			'waypoint_duration',
			'waypoint_easing',
			'waypoint_offset_trigger',
			'character_before',
			'character_after'
		);
		foreach($key as $index)
			$option[$index]=$attribute[$index];
		
		$class=array
		(
			array
			(
				'pb-clear-fix',
				'pb-counter-list',
				$attribute['css_class']
			),
			array
			(
				'pb-reset-list'
			)
		);
		
		$id=PBHelper::createId('pb_counter_list');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</ul>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$("#'.$id.'").PBCounterList('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeCounterListItem($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($attribute['name'])) return($html);
		if(!$Validation->isNumber($attribute['value'],0,99999,false)) return($html);
		
		$lineCharacterAfter=null;
		$lineCharacterBefore=null;
		
		if($Validation->isNotEmpty($this->character['before']))
			$lineCharacterBefore='<span'.PBHelper::createClassAttribute(array('pb-counter-list-value-character-before')).'>'.esc_html($this->character['before']).'</span>';
		if($Validation->isNotEmpty($this->character['after']))
			$lineCharacterAfter='<span'.PBHelper::createClassAttribute(array('pb-counter-list-value-character-after')).'>'.esc_html($this->character['after']).'</span>';		
		
		$html=
		'
			<li class="pb-value-'.(int)$attribute['value'].'">
				<span class="pb-counter-list-label">'.esc_html($attribute['name']).'</span>
				<span class="pb-counter-list-value">
					'.$lineCharacterBefore.'
					<span class="pb-counter-list-value-value">'.(int)$attribute['value'].'</span>
					'.$lineCharacterAfter.'
				</span>
				<span class="pb-counter-list-foreground"></span>
				<span class="pb-counter-list-background"></span>
			</li>
		';

		return(PBHelper::formatHTML($html));
	}	
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/