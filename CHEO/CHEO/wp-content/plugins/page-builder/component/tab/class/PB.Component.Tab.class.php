<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentTab extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Easing=new PBEasing();
		
		$this->style=array
		(
			'tab'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'tab'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Tab.js'
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
			'name'																=>	__('Tab',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Tab',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Tab',PLUGIN_PAGE_BUILDER_DOMAIN)
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
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Show',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Options describe how to animate the showing of the panel.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Hide',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Options describe how to animate the hiding of the panel.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'header_font_size',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header font size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Font size in pixels. If value 0 will be selected, then default font size for H5 header will be applied.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('Disable all tabs',PLUGIN_PAGE_BUILDER_DOMAIN),
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
								'subheader'										=>	__('Controls the height of the tabs',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_show_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Enable or disable animation',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_show_duration',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Duration of animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN),
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
							'default'											=>	'300'
						)
					),	
					array
					(
						'id'													=>	'animation_show_delay',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Delay of animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_show_easing',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Easing type of animation',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_hide_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Enable or disable animation',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_hide_duration',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Duration of animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN),
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
							'default'											=>	'200'
						)
					),	
					array
					(
						'id'													=>	'animation_hide_delay',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Delay of animation in miliseconds',PLUGIN_PAGE_BUILDER_DOMAIN),
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
						'id'													=>	'animation_hide_easing',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Easing type of animation',PLUGIN_PAGE_BUILDER_DOMAIN),
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
							'path'												=>	'navigation/*navigation_header/@content'
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
							'path'												=>	'panel/*panel_content/@content'
						)
					)				
				)
			)
		);
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeTab($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Easing=new PBEasing();
		$Validation=new PBValidation();
		
		if(!$Validation->isNumber($attribute['header_font_size'],0,100)) return($html);
		
		if(!$Validation->isBool($attribute['collapsible'])) return($html);
		if(!$Validation->isBool($attribute['disabled'])) return($html);
		
		if(!array_key_exists($attribute['height_style'],$this->heightStyle)) return;
		
		if(!$Validation->isBool($attribute['animation_show_enable'])) return;
		if(!$Validation->isNumber($attribute['animation_show_delay'],0,99999)) return;
		if(!$Validation->isNumber($attribute['animation_show_duration'],0,99999)) return;
		if(!array_key_exists($attribute['animation_show_easing'],$Easing->easingType)) return;

		if(!$Validation->isBool($attribute['animation_hide_enable'])) return;
		if(!$Validation->isNumber($attribute['animation_hide_delay'],0,99999)) return;
		if(!$Validation->isNumber($attribute['animation_hide_duration'],0,99999)) return;
		if(!array_key_exists($attribute['animation_hide_easing'],$Easing->easingType)) return;
		
		$key=array
		(
			'active',
			'disabled',
			'collapsible',
			'height_style',
			'animation_show_enable',
			'animation_show_delay',
			'animation_show_duration',
			'animation_show_easing',
			'animation_hide_enable',
			'animation_hide_delay',
			'animation_hide_duration',
			'animation_hide_easing'
		);
		
		foreach($key as $index)
			$option[$index]=$attribute[$index];
		
		$id=PBHelper::createId('pb_tab');
		$class=array('pb-tab','pb-clear-fix',$attribute['css_class']);
		
		PBComponentData::set('tab','header_font_size',$attribute['header_font_size'],true);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).' id="'.esc_attr($id).'">
				'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#'.$id.'").PBTab('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeTabNavigation($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=
		'
			<ul class="pb-reset-list">
				'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
			</ul>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeTabNavigationHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
	
		$style=array();
		$Validation=new PBValidation();
		
		if($Validation->isNumber(PBComponentData::get('tab','header_font_size'),1,100,false))
			$style['font-size']=PBComponentData::get('tab','header_font_size').'px';
		
		$html=
		'
			<li><a href="#"'.PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</a><span></span></li>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeTabPanel($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		return(PBHelper::formatContent($content,true,false,false));
	}
	
	/**************************************************************************/
	
	function processShortcodeTabPanelContent($attribute,$content,$tag)
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