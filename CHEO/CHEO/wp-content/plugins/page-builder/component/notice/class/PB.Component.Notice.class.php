<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentNotice extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->icon_url=PBComponentData::get($this->getComponentId(),'icon_url');
		$this->icon_url_retina=PBComponentData::get($this->getComponentId(),'icon_url_retina');
		$this->icon_path=PBComponentData::get($this->getComponentId(),'icon_path');
		$this->icon_file=PBComponentData::setFile($this->getComponentId(),'icon_file',$this->icon_path);
		
		$this->script=array
		(
			'notice'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Notice.js',
				'dependencies'													=>	array('jquery'),
			),
			'jquery-countdown'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'jquery.countdown.min.js',
				'dependencies'													=>	array('jquery'),
			)				
		);
		
		$this->style=array
		(
			'notice'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	

		$this->component=array
		(
			'name'																=>	__('Notice',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Notice',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Notice',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Box',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						5														=>	array
						(
							'header'											=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN)
						),	
						6														=>	array
						(
							'header'											=>	__('Timeline',PLUGIN_PAGE_BUILDER_DOMAIN)
						),	
						7														=>	array
						(
							'header'											=>	__('Close button',PLUGIN_PAGE_BUILDER_DOMAIN)
						)	
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Border top',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border top settings (width, color) of the box',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Border right',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border right settings (width, color) of the box',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Border bottom',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border bottom settings (width, color) of the box',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						4														=>	array
						(
							'header'											=>	__('Border left',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Border left settings (width, color) of the box',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'box_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
							'path'												=>	'@box_bg_color'
						)
					),	
					array
					(
						'id'													=>	'box_border_top_width',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
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
							'path'												=>	'@box_border_top_width'
						)
					),
					array
					(
						'id'													=>	'box_border_top_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	1,
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
							'path'												=>	'@box_border_top_color'
						)
					),
					array
					(
						'id'													=>	'box_border_right_width',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	2,
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
							'path'												=>	'@box_border_right_width'
						)
					),
					array
					(
						'id'													=>	'box_border_right_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
							'group'												=>	2,
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
							'path'												=>	'@box_border_right_color'
						)
					),
					array
					(
						'id'													=>	'box_border_bottom_width',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
							'path'												=>	'@box_border_bottom_width'
						)
					),
					array
					(
						'id'													=>	'box_border_bottom_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
							'path'												=>	'@box_border_bottom_color'
						)
					),
					array
					(
						'id'													=>	'box_border_left_width',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
							'path'												=>	'@box_border_left_width'
						)
					),
					array
					(
						'id'													=>	'box_border_left_color',
						'ui'													=>	array
						(
							'panel'												=>	4,
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
							'path'												=>	'@box_border_left_color'
						) 
					),
					array
					(
						'id'													=>	'icon',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'text'												=>	array
							(
								'header'										=>	__('Icon',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select an icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->icon_file
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@icon',
							'default'											=>	'tick_alt.png'
						)
					),
					array
					(
						'id'													=>	'icon_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	5,
							'text'												=>	array
							(
								'header'										=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color of the icon',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@icon_bg_color'
						) 
					),
					array
					(
						'id'													=>	'timeline_enable',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'text'												=>	array
							(
								'header'										=>	__('Enable timeline',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@timeline_enable',
							'default'											=>	'0'
						) 
					),
					array
					(
						'id'													=>	'timeline_time_to_close',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'text'												=>	array
							(
								'header'										=>	__('Time to close',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Time to close in seconds',PLUGIN_PAGE_BUILDER_DOMAIN),
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
							'path'												=>	'@timeline_time_to_close'
						) 
					),
					array
					(
						'id'													=>	'timeline_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'text'												=>	array
							(
								'header'										=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color of the timeline in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@timeline_bg_color'
						) 
					),
					array
					(
						'id'													=>	'timeline_height',
						'ui'													=>	array
						(
							'panel'												=>	6,
							'text'												=>	array
							(
								'header'										=>	__('Timeline height',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Timeline height in pixels',PLUGIN_PAGE_BUILDER_DOMAIN),
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
							'path'												=>	'@timeline_height'
						) 
					),
					array
					(
						'id'													=>	'close_button_enable',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'text'												=>	array
							(
								'header'										=>	__('Enable close button',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'choice-2'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@close_button_enable',
							'default'											=>	'1'
						) 
					),
					array
					(
						'id'													=>	'close_button_text_color',
						'ui'													=>	array
						(
							'panel'												=>	7,
							'text'												=>	array
							(
								'header'										=>	__('Text color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Text color of the close button in HEX',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@close_button_text_color'
						) 
					),
				),
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
					'.pb-notice.pb-notice-icon.pb-notice-icon-'.PBHelper::createHash($value)
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
	
	function processShortcodeNotice($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		
		$Validation=new PBValidation();
		
		$style=array(array(),array());
		
		if($Validation->isColor($attribute['box_bg_color']))	
			$style[1]['background-color']=PBColor::getColor($attribute['box_bg_color']);	
		if($Validation->isNumber($attribute['box_border_top_width'],0,9999))
			$style[1]['border-top-width']=$attribute['box_border_top_width'].'px';
		if($Validation->isColor($attribute['box_border_top_color']))		
			$style[1]['border-top-color']=PBColor::getColor($attribute['box_border_top_color']);				
		if($Validation->isNumber($attribute['box_border_right_width'],0,9999))	
			$style[1]['border-right-width']=$attribute['box_border_right_width'].'px';		
		if($Validation->isColor($attribute['box_border_right_color']))		
			$style[1]['border-right-color']=PBColor::getColor($attribute['box_border_right_color']);	
		if($Validation->isNumber($attribute['box_border_bottom_width'],0,9999))
			$style[1]['border-bottom-width']=$attribute['box_border_bottom_width'].'px';	
		if($Validation->isColor($attribute['box_border_bottom_color']))		
			$style[1]['border-bottom-color']=PBColor::getColor($attribute['box_border_bottom_color']);			
		if($Validation->isNumber($attribute['box_border_left_width'],0,9999))	
			$style[1]['border-left-width']=$attribute['box_border_left_width'].'px';	
		if($Validation->isColor($attribute['box_border_left_color']))		
			$style[1]['border-left-color']=PBColor::getColor($attribute['box_border_left_color']);	

		$class=array('pb-notice',$attribute['css_class']);
		
		$id=PBHelper::createId('pb_notice');
		
		$timelineHTML=null;
		$closeButtonHTML=null;
		
		/***/
		
		if(isset($attribute['icon']))
		{
			if($Validation->isNotEmpty($attribute['icon']))
			{
				array_push($class,'pb-notice-icon','pb-notice-icon-'.PBHelper::createHash($attribute['icon']));

				if(isset($attribute['icon_bg_color']))
				{
					if($Validation->isColor($attribute['icon_bg_color']))
						$style[0]['background-color']=PBColor::getColor($attribute['icon_bg_color']);
			
				}
			}
		}
		
		/***/
		
		if(($attribute['timeline_enable']==1) && ($attribute['timeline_time_to_close']>0))
		{		
			$tStyle=array(array(),array());
			$tClass=array('pb-notice-timeline');
			
			if($Validation->isNumber($attribute['timeline_height'],0,9999))
				$tStyle[0]['height']=$attribute['timeline_height'].'px';
			if($Validation->isColor($attribute['timeline_bg_color']))		
				$tStyle[1]['background-color']=PBColor::getColor($attribute['timeline_bg_color']);	
		
			array_push($class,'pb-notice-time-to-close-'.(int)$attribute['timeline_time_to_close']);
			
			$timelineHTML=
			'
				<div>
					<div'.PBHelper::createClassAttribute($tClass).PBHelper::createStyleAttribute($tStyle[0]).'>
						<div'.PBHelper::createStyleAttribute($tStyle[1]).'></div>
					</div>
				</div>
			';
		}
		
		/***/
				
		$tStyle=array();
		$tClass=array('pb-notice-close-button');

		if($Validation->isColor($attribute['close_button_text_color']))		
			$tStyle['color']=PBColor::getColor($attribute['close_button_text_color']);	

		$label=$Validation->isNotEmpty($timelineHTML) ? sprintf(__('Close within <span>%s</span> seconds',PLUGIN_PAGE_BUILDER_DOMAIN),$attribute['timeline_time_to_close']) : __('Close',PLUGIN_PAGE_BUILDER_DOMAIN);

		if($attribute['close_button_enable']!=1)
			$tStyle['display']='none';
		
		$closeButtonHTML=
		'
			<div><a href="#"'.PBHelper::createClassAttribute($tClass).PBHelper::createStyleAttribute($tStyle).'>'.$label.'</a></div>
		';
			
		/***/

		$html=
		'
			<div'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style[0]).' id="'.esc_attr($id).'">
				<div class="pb-notice-content"'.PBHelper::createStyleAttribute($style[1]).'>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
					'.$timelineHTML.'
					'.$closeButtonHTML.'
				</div>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$("#'.$id.'").PBNotice();
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeNoticeFirstLine($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		$Validation=new PBValidation();
		
		if($Validation->isColor($attribute['text_color']))
			$style['color']=PBColor::getColor($attribute['text_color']);
		
		$class=array('pb-notice-first-line');
		
		$html='<div><h'.PBComponentData::get($this->getComponentId(),'first_line_header_important_default').PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h'.PBComponentData::get($this->getComponentId(),'first_line_header_important_default').'></div>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeNoticeSecondLine($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$style=array();
		$Validation=new PBValidation();
		
		if($Validation->isColor($attribute['text_color']))
			$style['color']=PBColor::getColor($attribute['text_color']);
		
		$class=array('pb-notice-second-line');
		
		$html='<div><p'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</p></div>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/