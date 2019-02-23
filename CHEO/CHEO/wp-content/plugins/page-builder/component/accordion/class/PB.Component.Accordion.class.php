<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentAccordion extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		
		$this->style=array
		(
			'accordion'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'accordion'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Accordion.js'
			)
		);
		
		$this->heightStyle=array
		(
			'content'															=>	array(__('Content: Each panel will be only as tall as its content',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'auto'																=>	array(__('Auto: all panels will be set to the height of the tallest panel',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'fill'																=>	array(__('Fill:	Expand to the available height based on the parent height',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->component=array
		(
			'name'																=>	__('Accordion',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays accordion',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Accordion',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Animations',PLUGIN_PAGE_BUILDER_DOMAIN)
						),						
						3														=>	array
						(
							'header'											=>	__('Panels',PLUGIN_PAGE_BUILDER_DOMAIN)
						)					
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Content of the panel',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'active',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Active',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('The zero-based index of the panel that is active (open).',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),
					array
					(
						'id'													=>	'close_at_start',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Close at start',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Close all panels at start. This requires collapsible option to be enable.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2',
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),
					array
					(
						'id'													=>	'collapsible',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Collapsible',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Whether all the sections can be closed at once. Allows collapsing the active section.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2',
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),
					array
					(
						'id'													=>	'disabled',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Disabled',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Disable entire accordion',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2',
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
						)
					),
					array
					(
						'id'													=>	'height_style',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Height style',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Controls the height of the accordion and each panel',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->heightStyle)	
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'content'
						)
					),
					array
					(
						'id'													=>	'header_font_size',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header font size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Font size in pixels. If value 0 will be selected, then default font size will be applied.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	0,
								'option'										=>	array
								(
									'min'										=>	0,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	0
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
						'id'													=>	'animation_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Animation',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Enable or disable animation',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_duration',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Duration',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Duration of animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	5
								),
							)							
						),
						'shortcode'												=>	array
						(
							'default'											=>	'0'
						)
					),					
					array
					(
						'id'													=>	'animation_easing',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Easing type',PLUGIN_PAGE_BUILDER_DOMAIN),
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
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Header of the panel',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*panel/panel_header/@content'
						)
					),	
					array
					(
						'id'													=>	'content',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Content',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the panel',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*panel/panel_content/@content'
						)
					)				
				)
			)
		);
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeAccordion($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Easing=new PBEasing();
		$Validation=new PBValidation();

		if(!$Validation->isNumber($attribute['active'],0,999)) return($html);
		
		if(!$Validation->isBool($attribute['disabled'])) return($html);
		if(!$Validation->isBool($attribute['collapsible'])) return($html);
		if(!$Validation->isBool($attribute['close_at_start'])) return($html);

		if(!array_key_exists($attribute['height_style'],$this->heightStyle)) return($html);
		
		if(!$Validation->isBool($attribute['animation_enable'])) return($html);
		if(!$Validation->isNotEmpty($attribute['animation_duration'],0,99999)) return($html);
		if(!array_key_exists($attribute['animation_easing'],$Easing->easingType)) return($html);

		if(!$Validation->isNumber($attribute['header_font_size'],0,100)) return($html);
		
		$key=array
		(
			'active',
			'disabled',
			'collapsible',
			'height_style',
			'close_at_start',
			'animation_enable',
			'animation_duration',
			'animation_easing'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];
		
		$option['header_important_default']=PBComponentData::get($this->getComponentId(),'header_important_default');
		
		$id=PBHelper::createId('pb_accordion');
		$class=array('pb-accordion','pb-clear-fix',$attribute['css_class']);
		
		PBComponentData::set('accordion','header_font_size',$attribute['header_font_size'],true);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).' id="'.esc_attr($id).'">
				'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#'.$id.'").PBAccordion('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeAccordionPanel($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=do_shortcode($content);

		return($html);
	}	
	
	/**************************************************************************/
	
	function processShortcodeAccordionPanelHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		$Validation=new PBValidation();
		
		if($Validation->isNumber(PBComponentData::get('accordion','header_font_size'),1,100,false))
			$style['font-size']=PBComponentData::get('accordion','header_font_size').'px';
		
		$html=
		'
			<h'.PBComponentData::get($this->getComponentId(),'header_important_default').'><a href="#"'.PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'<span></span></a></h'.PBComponentData::get($this->getComponentId(),'header_important_default').'>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeAccordionPanelContent($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
	
		$html=
		'
			<div class="pb-clear-fix">'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/