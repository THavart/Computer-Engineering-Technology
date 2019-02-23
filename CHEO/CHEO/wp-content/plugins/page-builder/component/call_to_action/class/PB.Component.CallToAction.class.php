<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentCallToAction extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Header=new PBHeader();
		$Window=new PBWindow();
		
		$this->style=array
		(
			'call-to-action'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'call-to-action'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.CallToAction.js'
			)
		);

		$this->component=array
		(
			'name'																=>	__('Call To Action',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Call To Action box',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Call To Action',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('First line',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Second line',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Button',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Box',PLUGIN_PAGE_BUILDER_DOMAIN)
						),	
						6														=>	array
						(
							'header'											=>	__('Border',PLUGIN_PAGE_BUILDER_DOMAIN)
						)	
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Colors',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Colors of button elements in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Padding',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Padding of the box in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Border top',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Border right',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Border bottom',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						6														=>	array
						(
							'header'											=>	__('Border left',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						7														=>	array
						(
							'header'											=>	__('Padding',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Padding of the button in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						8														=>	array
						(
							'header'											=>	__('Margin',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Margin of the button in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
					),
					array
					(
						'id'													=>	'first_line_text',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('First line',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the first line',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'first_line/@content',
						)
					),	
					array
					(
						'id'													=>	'first_line_text_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Text color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Text color of the first line in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'first_line/@text_color'
						)
					),
					array
					(
						'id'													=>	'first_line_header_important',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Importance of the header',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Header->important),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'first_line_header_important_default'),
							'path'												=>	'first_line/@header_important'
						)
					),
					array
					(
						'id'													=>	'second_line_text',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Second line',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Content of the second line',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'second_line/@content'
						)
					),	
					array
					(
						'id'													=>	'second_line_text_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Text color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Text color of the second line in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'second_line/@text_color'
						)
					),	
					array
					(
						'id'													=>	'second_line_header_important',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'text'												=>	array
							(
								'header'										=>	__('Importance of the header',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Header->important),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	PBComponentData::get($this->getComponentId(),'second_line_header_important_default'),
							'path'												=>	'second_line/@header_important'
						)
					),
					array
					(
						'id'													=>	'button_src',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL of the button',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@src'
						)
					),	
					array
					(
						'id'													=>	'button_target',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Target',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Target of the URL',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Window->linkTarget),
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@src_target'
						)
					),
					array
					(
						'id'													=>	'button_label',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'text'												=>	array
							(
								'header'										=>	__('Label',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Label of the button',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@content'
						)
					),	
					array
					(
						'id'													=>	'button_text_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Text color',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@text_color'
						)
					),						
					array
					(
						'id'													=>	'button_text_color_hover',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Text color (on hover)',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@text_color_hover'
						)
					),						
					array
					(
						'id'													=>	'button_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@bg_color'
						)
					),	
					array
					(
						'id'													=>	'button_bg_color_hover',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Background color (on hover)',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@bg_color_hover'
						)
					),	
					array
					(
						'id'													=>	'button_border_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border color',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@border_color'
						)
					),	
					array
					(
						'id'													=>	'button_border_color_hover',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border color (on hover)',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@border_color_hover'
						)
					),
					array
					(
						'id'													=>	'button_padding_top',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	7,
							'text'												=>	array
							(
								'label'											=>	__('Top',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@padding_top'
						)
					),						
					array
					(
						'id'													=>	'button_padding_right',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	7,
							'text'												=>	array
							(
								'label'											=>	__('Right',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@padding_right'
						)
					),	
					array
					(
						'id'													=>	'button_padding_bottom',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	7,
							'text'												=>	array
							(
								'label'											=>	__('Bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@padding_bottom'
						)
					),	
					array
					(
						'id'													=>	'button_padding_left',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	7,
							'text'												=>	array
							(
								'label'											=>	__('Left',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@padding_left'
						)
					),
					array
					(
						'id'													=>	'button_margin_top',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	8,
							'text'												=>	array
							(
								'label'											=>	__('Top',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@margin_top'
						)
					),	
					array
					(
						'id'													=>	'button_margin_bottom',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	8,
							'text'												=>	array
							(
								'label'											=>	__('Bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'button/@margin_bottom'
						)
					),					
					array
					(
						'id'													=>	'box_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'text'												=>	array
							(
								'header'										=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@bg_color'
						)
					),	
					array
					(
						'id'													=>	'box_padding_top',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Top',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@padding_top'
						)
					),						
					array
					(
						'id'													=>	'box_padding_right',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Right',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@padding_right'
						)
					),	
					array
					(
						'id'													=>	'box_padding_bottom',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@padding_bottom'
						)
					),	
					array
					(
						'id'													=>	'box_padding_left',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Left',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@padding_left'
						)
					),
					array
					(
						'id'													=>	'box_border_top_width',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_top_width'
						)
					),
					array
					(
						'id'													=>	'box_border_top_color',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_top_color'
						)
					),
					array
					(
						'id'													=>	'box_border_right_width',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_right_width'
						)
					),
					array
					(
						'id'													=>	'box_border_right_color',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	4,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_right_color'
						)
					),
					array
					(
						'id'													=>	'box_border_bottom_width',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_bottom_width'
						)
					),
					array
					(
						'id'													=>	'box_border_bottom_color',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	5,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_bottom_color'
						)
					),
					array
					(
						'id'													=>	'box_border_left_width',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	6,
							'text'												=>	array
							(
								'label'											=>	__('Width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'4'
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_left_width'
						)
					),
					array
					(
						'id'													=>	'box_border_left_color',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'group'												=>	6,
							'text'												=>	array
							(
								'label'											=>	__('Color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@border_left_color'
						) 
					)
				),
			)
		);
		
		parent::__construct();		
	}

	/**************************************************************************/
	
	function processShortcodeCallToAction($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);

		$style=array(array(),array());
		$class=array(array('pb-call-to-action','pb-clear-fix',$attribute['css_class']),array('pb-call-to-action-box','pb-clear-fix'));
		
		$Validation=new PBValidation();
				
		if($Validation->isColor($attribute['bg_color']))		
			$style[0]['background-color']=PBColor::getColor($attribute['bg_color']);	
		if($Validation->isNumber($attribute['border_top_width'],0,9999))
			$style[0]['border-top-width']=$attribute['border_top_width'].'px';
		if($Validation->isColor($attribute['border_top_color']))		
			$style[0]['border-top-color']=PBColor::getColor($attribute['border_top_color']);				
		if($Validation->isNumber($attribute['border_right_width'],0,9999))	
			$style[0]['border-right-width']=$attribute['border_right_width'].'px';		
		if($Validation->isColor($attribute['border_right_color']))		
			$style[0]['border-right-color']=PBColor::getColor($attribute['border_right_color']);	
		if($Validation->isNumber($attribute['border_bottom_width'],0,9999))
			$style[0]['border-bottom-width']=$attribute['border_bottom_width'].'px';	
		if($Validation->isColor($attribute['border_bottom_color']))		
			$style[0]['border-bottom-color']=PBColor::getColor($attribute['border_bottom_color']);			
		if($Validation->isNumber($attribute['border_left_width'],0,9999))	
			$style[0]['border-left-width']=$attribute['border_left_width'].'px';	
		if($Validation->isColor($attribute['border_left_color']))		
			$style[0]['border-left-color']=PBColor::getColor($attribute['border_left_color']);		
		
		if($Validation->isNumber($attribute['padding_top'],0,9999))		
			$style[0]['padding-top']=$attribute['padding_top'].'px';		
		if($Validation->isNumber($attribute['padding_right'],0,9999))		
			$style[0]['padding-right']=$attribute['padding_right'].'px';
		if($Validation->isNumber($attribute['padding_bottom'],0,9999))		
			$style[0]['padding-bottom']=$attribute['padding_bottom'].'px';
		if($Validation->isNumber($attribute['padding_left'],0,9999))		
			$style[0]['padding-left']=$attribute['padding_left'].'px';
		
		$id=PBHelper::createId('pb_call_to_action');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).PBHelper::createStyleAttribute($style[0]).' id="'.esc_attr($id).'">
				<div'.PBHelper::createClassAttribute($class[1]).PBHelper::createStyleAttribute($style[1]).'>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#'.$id.'").PBCallToAction();
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeCallToActionFirstLine($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		
		$Header=new PBHeader();
		$Validation=new PBValidation();
		
		if($Validation->isColor($attribute['text_color']))
			$style['color']=PBColor::getColor($attribute['text_color']);
		if(!array_key_exists($attribute['header_important'],$Header->important)) return;
		
		$class=array('pb-call-to-action-box-first-line');
		
		$html=
		'
			<h'.$attribute['header_important'].PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h'.$attribute['header_important'].'>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeCallToActionSecondLine($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		
		$Header=new PBHeader();
		$Validation=new PBValidation();
		
		if($Validation->isColor($attribute['text_color']))
			$style['color']=PBColor::getColor($attribute['text_color']);
		if(!array_key_exists($attribute['header_important'],$Header->important)) return;
		
		$class=array('pb-call-to-action-box-second-line');
		
		$html=
		'
			<h'.$attribute['header_important'].PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h'.$attribute['header_important'].'>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeCallToActionButton($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		$option=array();
		
		$Window=new PBWindow();
		$Validation=new PBValidation();
		
		$src=!$Validation->isEmpty($attribute['src']) ? $attribute['src'] : '#';
		
		$class=array($Window->getTargetCSSClass($attribute['src_target']));
	
		if($Validation->isColor($attribute['text_color']))
		{
			$style['color']=PBColor::getColor($attribute['text_color']);
			$option['out']['color']=$style['color'];
		}
		if($Validation->isColor($attribute['bg_color']))
		{
			$style['background-color']=PBColor::getColor($attribute['bg_color']);
			$option['out']['background-color']=$style['background-color'];
		}
		if($Validation->isColor($attribute['border_color']))
		{
			$style['border-color']=PBColor::getColor($attribute['border_color']);
			$option['out']['border-color']=$style['border-color'];
		}
		
		if($Validation->isColor($attribute['text_color_hover']))
			$option['in']['color']=PBColor::getColor($attribute['text_color_hover']);
		if($Validation->isColor($attribute['bg_color_hover']))
			$option['in']['background-color']=PBColor::getColor($attribute['bg_color_hover']);
		if($Validation->isColor($attribute['border_color_hover']))
			$option['in']['border-color']=PBColor::getColor($attribute['border_color_hover']);

		if($Validation->isNumber($attribute['padding_top'],0,9999))
			$style['padding-top']=$attribute['padding_top'].'px';
		if($Validation->isNumber($attribute['padding_right'],0,9999))
			$style['padding-right']=$attribute['padding_right'].'px';
		if($Validation->isNumber($attribute['padding_bottom'],0,9999))
			$style['padding-bottom']=$attribute['padding_bottom'].'px';
		if($Validation->isNumber($attribute['padding_left'],0,9999))
			$style['padding-left']=$attribute['padding_left'].'px';
		
		if($Validation->isNumber($attribute['margin_top'],-9999,9999))
			$style['margin-top']=$attribute['margin_top'].'px';
		if($Validation->isNumber($attribute['margin_bottom'],-9999,9999))
			$style['margin-bottom']=$attribute['margin_bottom'].'px';
		
		$html=
		'
			<div>
				<a href="'.$src.'"'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'<i class="pb-button-arrow pb-button-arrow-right"></i></a>
				<input type="hidden" value="'.esc_attr(json_encode($option)).'"/>
			</div>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/