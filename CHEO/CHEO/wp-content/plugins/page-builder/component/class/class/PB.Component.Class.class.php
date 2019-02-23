<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentClass extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Layout=new PBLayout();
		$Background=new PBBackground();
		
		$this->style=array
		(
			'class'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'class'																=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Class.js'
			)
		);
		
		$this->currentIndex=0;
		$this->currentLayout=null;
		
		$this->layout=$Layout->getMainLayout();

		$this->component=array
		(
			'name'																=>	__('Class',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Class',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Class',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Classes',PLUGIN_PAGE_BUILDER_DOMAIN)
						)					
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Class details',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('Select layout of the classes.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'class_name',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Class name',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_name/@content'
						)
					),	
					array
					(
						'id'													=>	'class_label',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Class label',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Caption displayed under name of the class',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_label/@content',
							'default'											=>	__('Class name',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),	
					array
					(
						'id'													=>	'item_attribute',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Attributes',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	array(__('List of attributes (pairs in format name:value) separated by new line. E.g: Class size:15 &lt;NEW_LINE&gt; Years old:2-3',PLUGIN_PAGE_BUILDER_DOMAIN)),
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_attribute/@content'
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
								'header'										=>	__('Button label',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_button/@content',
							'default'											=>	__('Read more',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'header'										=>	__('Button URL',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_button/@url'
						)
					)					
				)
			)
		);
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeClass($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		if(!array_key_exists($attribute['layout'],$this->layout)) return($html);
		
		$option=array();
		
		$this->currentIndex=0;
		$this->currentLayout=$attribute['layout'];
		
		$id=PBHelper::createId('pb_class');
		
		$class=array
		(
			array('pb-class','pb-clear-fix',$attribute['css_class']),
			array('pb-reset-list',$Layout->getLayoutCSSClass($attribute['layout']))
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
						$("#'.$id.'").PBClass('.json_encode($option).');
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeClassItem($attribute,$content,$tag)
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
	
	function processShortcodeClassItemName($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$class=array('pb-class-item-name');
		
		$html='<h5'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</h5>';

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeClassItemLabel($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);		
		
		$class=array('pb-class-item-label');
		
		$html='<div'.PBHelper::createClassAttribute($class).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeClassItemAttribute($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$i=0;
		$html=null;
		$Layout=new PBLayout();
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$line=explode("\n",$content);
		
		foreach($line as $value)
		{
			$attribute=explode(':',$value);
			
			if((!isset($attribute[0])) || (!isset($attribute[1]))) continue;
			if(($Validation->isEmpty($attribute[0])) || ($Validation->isEmpty($attribute[1]))) continue;
			
			$html.=
			'
				<li'.PBHelper::createClassAttribute(array('pb-layout-'.$Layout->getLayoutColumnCSSClass('50x50',$i))).'>
					<div class="pb-class-item-attribute-value">'.$attribute[1].'</div>
					<div class="pb-class-item-attribute-name">'.$attribute[0].'</div>
				</li>
			';
			
			$i++;
		}
		
		if($Validation->isEmpty($html)) return($html);
		
		$class=array('pb-reset-list','pb-clear-fix','pb-class-item-attribute',$Layout->getLayoutCSSClass('50x50'),'pb-layout-responsive-0');
		
		$html=
		'
			<ul'.PBHelper::createClassAttribute($class).'>
				'.$html.'
			</ul>
		';
	
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
	
	function processShortcodeClassItemButton($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if($Validation->isEmpty($attribute['url'])) return($html);
		
		$class=array('pb-class-item-button');
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).'>
				<a href="'.esc_attr($attribute['url']).'">'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'<i class="pb-button-arrow pb-button-arrow-right"></i></a>
			</div>
		';
		
		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/