<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentButton extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Font=new PBFont();
		$Border=new PBBorder();
		$Window=new PBWindow();
		
		$this->style=array
		(
			'button'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->script=array
		(
			'button'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Button.js'
			)
		);
		
		$this->buttonSize=array
		(
			'tiny'																=>	array(__('Tiny',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'small'																=>	array(__('Small',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'medium'															=>	array(__('Medium',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'large'																=>	array(__('Large',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->buttonIconPosition=array
		(
			'left'																=>	array(__('Left',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'right'																=>	array(__('Right',PLUGIN_PAGE_BUILDER_DOMAIN))
		);

		$this->buttonStyle=PBComponentData::get($this->getComponentId(),'style');
		
		$this->icon_url=PBComponentData::get($this->getComponentId(),'icon_url');
		$this->icon_url_retina=PBComponentData::get($this->getComponentId(),'icon_url_retina');
		$this->icon_path=PBComponentData::get($this->getComponentId(),'icon_path');
		$this->icon_file=PBComponentData::setFile($this->getComponentId(),'icon_file',$this->icon_path);

		$this->component=array
		(
			'name'																=>	__('Button',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays button',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Button',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						)						
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Normal state',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Styles used in normal (default) state',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Hover state',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Styles used in hover state',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
					)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'label',
						'ui'													=>	array
						(
							'panel'													=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Label',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Label of the button',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@content'
						)
					),
					array
					(
						'id'													=>	'src',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL address of a link',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'src_target',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('URL target',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=> PBHelper::extractDictionary($Window->linkTarget)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'_self'
						)
					),
					array
					(
						'id'													=>	'size',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Button size',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->buttonSize)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'medium'
						)
					),
					array
					(
						'id'													=>	'style',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Button style',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->buttonStyle)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'medium'
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
						'id'													=>	'arrow_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Enable arrow',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'icon_enable',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Enable icon',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'icon',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->icon_file)
								)
							)
						)
					),					
					array
					(
						'id'													=>	'icon_position',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'text'												=>	array
							(
								'header'										=>	__('Icon position',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->buttonIconPosition)
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
						'id'													=>	'text_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Text color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'bg_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Background color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),		
					array
					(
						'id'													=>	'border_style',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border style:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
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
						'id'													=>	'border_color',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),						
					array
					(
						'id'													=>	'border_width',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'0'
						)
					),		
					array
					(
						'id'													=>	'border_radius',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Border radius in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'0'
						)
					),						
					array
					(
						'id'													=>	'font_weight',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Font weight',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Font->weight),
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
						'id'													=>	'text_color_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Text color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),
					array
					(
						'id'													=>	'bg_color_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Background color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'border_style_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border style:',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
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
						'id'													=>	'border_color_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),						
					array
					(
						'id'													=>	'border_width_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border width in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'0'
						)
					),	
					array
					(
						'id'													=>	'border_radius_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Border radius in pixels',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'0'
						)
					),						
					array
					(
						'id'													=>	'font_weight_hover',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Font weight',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Font->weight),
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'-1'
						)
					),						
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function createCSS($code=null,$retina=false)
	{
		$CSS=new PBCSS();

		$url=$retina ? $this->icon_url_retina : $this->icon_url;
			
		$codeCurrent=null;
		foreach($this->icon_file as $value)
		{
			$codeCurrent.=$CSS->create(array
			(
				'selector'	=>	array
				(
					'.pb-button>a>span.pb-button-box>span.pb-button-icon.pb-button-icon-'.PBHelper::createHash($value)
				),
				'property'	=>	array
				(
					'background-image'	=>	$url.$value,
				)
			));	
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
	
	function processShortcodeButton($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$html=null;
		
		$option=array();
		
		$class=array_fill(0,4,array());
		$style=array_fill(0,4,array());
		
		$Font=new PBFont();
		$Window=new PBWindow();
		$Border=new PBBorder();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if($Validation->isEmpty($attribute['src'])) return($html);
		
		if(!array_key_exists($attribute['src_target'],$Window->linkTarget)) return($html);
		
		if(isset($attribute['size']))
		{
			if(!array_key_exists($attribute['size'],$this->buttonSize)) return($html);
		}
		
		if(isset($attribute['style']))
		{
			if(!array_key_exists($attribute['style'],$this->buttonStyle)) return($html);
		}
		
		if(isset($attribute['arrow_enable']))
		{
			if(!$Validation->isBool($attribute['arrow_enable'])) return($html);
		}
			
		if(isset($attribute['icon_enable']))
		{
			if(!$Validation->isBool($attribute['icon_enable'])) return($html);
			
			if($attribute['icon_enable']==1)
			{
				if($Validation->isEmpty($attribute['icon'])) return($html);
				if(!in_array($attribute['icon_position'],array_keys($this->buttonIconPosition))) return($html);
			}
		}
			
		/***/

		if($Validation->isColor($attribute['text_color']))
		{
			$style[1]['color']=PBColor::getColor($attribute['text_color']);
			$option['out']['color']=$style[1]['color'];
		}		
		if($Validation->isColor($attribute['bg_color']))
		{
			$style[1]['background-color']=PBColor::getColor($attribute['bg_color']);
			$option['out']['background-color']=$style[1]['background-color'];
		}		
		if($attribute['border_style']!=-1)
		{
			if(array_key_exists($attribute['border_style'],$Border->style))
			{
				$style[1]['border-style']=$attribute['border_style'];
				$option['out']['border-style']=$style[1]['border-style'];			
			}
		}
		if($Validation->isColor($attribute['border_color']))
		{
			$style[1]['border-color']=PBColor::getColor($attribute['border_color']);
			$option['out']['border-color']=$style[1]['border-color'];
		}	
		if($Validation->isNumber($attribute['border_width'],0,999))
		{
			$style[1]['border-width']=$attribute['border_width'].'px';
			$option['out']['border-width']=$style[1]['border-width'];
		}
		if($Validation->isNumber($attribute['border_radius'],0,999))
		{
			$style[1]['border-radius']=$attribute['border_radius'].'px';
			$option['out']['border-radius']=$style[1]['border-radius'];
		}
		if($attribute['font_weight']!=-1)
		{
			if(array_key_exists($attribute['font_weight'],$Font->weight))
			{
				$style[1]['font-weight']=$attribute['font_weight'];
				$option['out']['font-weight']=$style[1]['font-weight'];			
			}
		}
		
		/***/
		
		if($Validation->isColor($attribute['text_color_hover']))
		{
			$option['in']['color']=PBColor::getColor($attribute['text_color_hover']);
		}		
		if($Validation->isColor($attribute['bg_color_hover']))
		{
			$option['in']['background-color']=PBColor::getColor($attribute['bg_color_hover']);
		}		
		if($attribute['border_style_hover']!=-1)
		{
			if(array_key_exists($attribute['border_style_hover'],$Border->style))
			{
				$option['in']['border-style']=$attribute['border_style_hover'];			
			}
		}
		if($Validation->isColor($attribute['border_color_hover']))
		{
			$option['in']['border-color']=PBColor::getColor($attribute['border_color_hover']);
		}	
		if($Validation->isNumber($attribute['border_width_hover'],0,999))
		{
			$option['in']['border-width']=$attribute['border_width_hover'].'px';
		}
		if($Validation->isNumber($attribute['border_radius_hover'],0,999))
		{
			$option['in']['border-radius']=$attribute['border_radius_hover'].'px';
		}
		if($attribute['font_weight']!=-1)
		{
			if(array_key_exists($attribute['font_weight_hover'],$Font->weight))
			{
				$option['in']['font-weight']=$attribute['font_weight_hover'];		
			}
		}
	
		/***/

		$class[0]=array('pb-button');
		$class[1]=array($Window->getTargetCSSClass($attribute['src_target']));
		$class[2]=array('pb-button-icon');
		$class[3]=array('pb-button-content');
		
		if(isset($attribute['size']))
			array_push($class[0],'pb-button-size-'.$attribute['size']);
		if(isset($attribute['style']))
			array_push($class[0],'pb-button-style-'.$attribute['style']);		
		
		
		if(isset($attribute['icon_enable']))
		{
			if($attribute['icon_enable']==1)
			{
				array_push($class[0],'pb-button-icon');
				array_push($class[0],'pb-button-icon-position-'.$attribute['icon_position']);

				array_push($class[2],'pb-button-icon-'.PBHelper::createHash($attribute['icon']));
			}
		}
		
		$class[0][]=$attribute['css_class'];
		
		$id=PBHelper::createId('pb_button');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.$id.'">
				<a href="'.esc_attr($attribute['src']).'"'.PBHelper::createClassAttribute($class[1]).PBHelper::createStyleAttribute($style[1]).'>
					<span class="pb-button-box">
						<span'.PBHelper::createClassAttribute($class[2]).PBHelper::createStyleAttribute($style[2]).'></span>
						<span'.PBHelper::createClassAttribute($class[3]).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.((isset($attribute['arrow_enable']) && ($attribute['arrow_enable']==1)) ? '<i class="pb-button-arrow pb-button-arrow-right"></i>' : null).'</span>
					</span>
				</a>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$(\'#'.$id.'\').PBButton('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/