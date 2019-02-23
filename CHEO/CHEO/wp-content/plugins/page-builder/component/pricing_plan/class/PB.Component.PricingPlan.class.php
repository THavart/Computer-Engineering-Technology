<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentPricingPlan extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Background=new PBBackground();
		
		$bullet=(array)PBComponentData::get($this->getComponentId(),'bullet');
		
		$this->bullet=array();
	
		$this->bullet['url']=$bullet['url'];
		$this->bullet['url_retina']=$bullet['url_retina'];
		
		$this->bullet['path']=$bullet['path'];

		$file=PBFile::scanDir($bullet['path']);

		$this->bullet['file']=array();
		if(is_array($file)) $this->bullet['file']=array_combine($file,$file);

		$Layout=new PBLayout();
		
		$this->currentIndex=0;
		$this->currentLayout=null;
		
		$this->style=array
		(
			'pricing-plan'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'pricing-plan'															=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.PricingPlan.js'
			)
		);
		
		$this->type=array
		(
			'1'																	=>	array(__('Type 1',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'2'																	=>	array(__('Type 2',PLUGIN_PAGE_BUILDER_DOMAIN)),
		);
		
		$this->layout=$Layout->getMainLayout();
		
		$this->component=array
		(
			'name'																=>	__('Pricing Plan',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Pricing Plan',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Pricing Plan',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Plans',PLUGIN_PAGE_BUILDER_DOMAIN)
						)					
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Content of the plan',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('Select layout of the pricing plan.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'50x50'
						)
					),		
					array
					(
						'id'													=>	'type',
						'ui'													=>	array
						(
							'panel'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Type',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select one from the available types.',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'radio',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($this->type)
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'1'
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
						'id'													=>	'item_header',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Header',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_header/@content'
						)
					),	
					array
					(
						'id'													=>	'item_description',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Description',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_description/@content'
						)
					),
					array
					(
						'id'													=>	'item_feature',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Feature list',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of features separated by new line.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_feature/@content'
						)
					),	
					array
					(
						'id'													=>	'item_feature_bullet',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Feature list bullet',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Bullet for the feature list elements',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	$this->bullet['file'],
									'use_default'								=>	false
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_feature/@bullet'
						)
					),					
					array
					(
						'id'													=>	'item_image_url',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Image URL',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select image of the background. This option works only with type named "Style 2".',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-image',
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@image_url'
						)
					),
					array
					(
						'id'													=>	'item_image_position',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Image position',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@image_position',
						)
					),	
					array
					(
						'id'													=>	'item_image_repeat',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Image repeat',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Select type of background repeat.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Background->backgroundRepeat)
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@image_repeat',
						)
					),						
					array
					(
						'id'													=>	'item_image_size_a',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Image size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Specify the image size. For options "Length" and "Percentage" you have to specify these values in next field.',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'select-one',
								'dictionary'									=>	array
								(
									'source'									=>	PBHelper::extractDictionary($Background->backgroundSize)
								)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@image_size_a'
						)
					),	
					array
					(
						'id'													=>	'item_image_size_b',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Image size',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('Sets the width and height of the background image.',PLUGIN_PAGE_BUILDER_DOMAIN),__('Sets the width and height of the background image in percent of the parent element.',PLUGIN_PAGE_BUILDER_DOMAIN),__('The first value sets the width, the second value sets the height. If only one value is given, the second is set to "auto"',PLUGIN_PAGE_BUILDER_DOMAIN))
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/@image_size_b'
						)
					),
					array
					(
						'id'													=>	'item_button_label',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Button label',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_button/@content'
						)
					),						
					array
					(
						'id'													=>	'item_button_url',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Button URL',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_button/@url'
						)
					),
					array
					(
						'id'													=>	'item_price_value',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Price',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_price/item_price_value/@content'
						)
					),						
					array
					(
						'id'													=>	'item_price_suffix',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Price suffix',PLUGIN_PAGE_BUILDER_DOMAIN),
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_price/item_price_suffix/@content'
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
		$CSS=new PBCSS();

		$key=$retina ? 'url_retina' : 'url';
			
		$codeCurrent=null;
		foreach((array)$this->bullet['file'] as $file)
		{
			$codeCurrent.=$CSS->create(array
			(
				'selector'	=>	array
				(
					'.pb-pricing-plan .pb-pricing-plan-item-feature-list.pb-pricing-plan-item-feature-list-'.PBHelper::createHash($file).' ul li'
				),
				'property'	=>	array
				(
					'background-image'	=>	$this->bullet[$key].$file,
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
	
	function processShortcodePricingPlan($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		if(!array_key_exists($attribute['type'],$this->type)) return($html);
		if(!array_key_exists($attribute['layout'],$this->layout)) return($html);
		
		$option=array();
		
		$this->currentIndex=0;
		$this->currentLayout=$attribute['layout'];
		
		$id=PBHelper::createId('pb_pricing_plan');
		
		$class=array
		(
			array('pb-pricing-plan','pb-pricing-plan-type-'.$attribute['type'],'pb-clear-fix',$attribute['css_class']),
			array('pb-reset-list','pb-clear-fix',$Layout->getLayoutCSSClass($attribute['layout']))
		);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class[0]).' id="'.esc_attr($id).'">
				<ul'.PBHelper::createClassAttribute($class[1]).'>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</ul>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#'.$id.'").PBPricingPlan('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItem($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Layout=new PBLayout();
		$Background=new PBBackground();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array('pb-layout-'.$Layout->getLayoutColumnCSSClass($this->currentLayout,$this->currentIndex));

		$style=array();
		if($Validation->isNotEmpty($attribute['image_url']))
			$style['background-image']='url(\''.$attribute['image_url'].'\')';
		if($Validation->isNotEmpty($attribute['image_position']))
			$style['background-position']=$attribute['image_position'];
		if(array_key_exists($attribute['image_repeat'],$Background->backgroundRepeat))
			$style['background-repeat']=$attribute['image_repeat'];
		if(array_key_exists($attribute['image_size_a'],$Background->backgroundSize))
		{
			if(in_array($attribute['image_size_a'],array('length','percentage')))
			{
				if($Validation->isNotEmpty($attribute['image_size_b']))
					$style['background-size']=$attribute['image_size_b'];
			}	
			else $style['background-size']=$attribute['image_size_a'];
		}
		
		$html=
		'
			<li'.PBHelper::createClassAttribute($class).PBHelper::createStyleAttribute($style).'>
				<div>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>
			</li>
		';
		
		$this->currentIndex++;

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemHeader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array('pb-pricing-plan-item-header');
		
		$html='<h5'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h5>';

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemDescription($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);		
		
		$class=array('pb-pricing-plan-item-description');
		
		$html='<div'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemFeature($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$item=explode("\n",$content);
		
		$content=null;
		foreach($item as $value)
			$content.='<li>'.do_shortcode($value).'</li>';
		
		$class=array('pb-reset-list');
		
		$html=
		'
			<ul'.PBHelper::createClassAttribute($class).'>
				'.$content.'
			</ul>
		';
		
		if(array_key_exists($attribute['bullet'],$this->bullet['file']))
		{
			$class=array('pb-pricing-plan-item-feature-list','pb-pricing-plan-item-feature-list-'.PBHelper::createHash($attribute['bullet']));
			$html=
			'
				<div'.PBHelper::createClassAttribute($class).'>
					'.$html.'
				</div>
			';
		}

		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemButton($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if($Validation->isEmpty($attribute['url'])) return($html);
		
		$class=array('pb-pricing-plan-item-button');
		
		$html='<div'.PBHelper::createClassAttribute($class).'><a href="'.esc_attr($attribute['url']).'">'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'<i class="pb-button-arrow pb-button-arrow-right"></i></a></div>';

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemPrice($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array('pb-pricing-plan-item-price-box');
		
		$html='<div'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemPriceValue($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array('pb-pricing-plan-item-price-box-value');
		
		$html='<span'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</span>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodePricingPlanItemPriceSuffix($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array('pb-pricing-plan-item-price-box-suffix');
		
		$html='<span'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</span>';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/