<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentTestimonial extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$Layout=new PBLayout();
		$Easing=new PBEasing();
		$CarouFredSel=new PBCarouFredSel();
		
		$this->style=array
		(
			'testimonial'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'testimonial'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.Testimonial.js'
			)
		);
		
		$this->layout=$Layout->getMainLayout();

		$this->component=array
		(
			'name'																=>	__('Testimonials',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Testimonials',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Testimonials',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('Select layout of the testimonials',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'default'											=>	'easeInQuad'
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
						'id'													=>	'content',
						'ui'													=>	array
						(
							'panel'												=>	3,
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
						'id'													=>	'author_name',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Author name',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_author/item_author_name/@content'
						)
					),						
					array
					(
						'id'													=>	'author_position',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Author position',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_author/item_author_position/@content'
						)
					),
					array
					(
						'id'													=>	'author_company',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Author company',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*item/item_author/item_author_company/@content'
						)
					)
				)
			)
		);		
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonial($attribute,$content,$tag)
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
			$option[$index]=$attribute[$index];
		
		/***/
		
		$class=array
		(
			array
			(
				'pb-clear-fix',
				'pb-testimonial',
				$attribute['css_class']
			),
			array
			(
				'pb-reset-list',
				$Layout->getLayoutCSSClass($attribute['layout'])
			)
		);
		
		$id=PBHelper::createId('pb_testimonial');
		
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
						$("#'.$id.'").PBTestimonial('.json_encode($option).');
					});
				</script>
			</div>			
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonialItem($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Layout=new PBLayout();
		
		$html=null;
		
		$class=array
		(
			array
			(
				'pb-layout-'.$Layout->getLayoutColumnCSSClass($this->layout,$this->layoutColumnIndex)
			),
			array
			(
				'pb-testimonial-cite-up'
			)
		);
		
		$html=
		'
			<li'.PBHelper::createClassAttribute($class[0]).'>
				<div>
					<div'.PBHelper::createClassAttribute($class[1]).'></div>
					'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'
				</div>
			</li>
		';
		
		$this->layoutColumnIndex++;

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonialItemContent($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		
		$html.=PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT;
		$html.='<div'.PBHelper::createClassAttribute(array('pb-testimonial-cite-down')).'></div>';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content)));
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonialItemAuthor($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);
		return(PBHelper::formatContent($content,true,false,false));
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonialItemAuthorName($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$html='<div'.PBHelper::createClassAttribute(array('pb-testimonial-author-name')).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonialItemAuthorPosition($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$html='<div'.PBHelper::createClassAttribute(array('pb-testimonial-author-position')).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';

		return(PBHelper::formatHTML($html,$content));
	}
	
	/**************************************************************************/
	
	function processShortcodeTestimonialItemAuthorCompany($attribute,$content,$tag)
	{	
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		
		$html='<div'.PBHelper::createClassAttribute(array('pb-testimonial-author-company')).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';

		return(PBHelper::formatHTML($html,$content));
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/