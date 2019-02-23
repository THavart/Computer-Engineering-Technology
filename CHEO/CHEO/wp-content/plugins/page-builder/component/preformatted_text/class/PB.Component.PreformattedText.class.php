<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentPreformattedText extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'preformatted-text'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);
		
		$this->script=array
		(
			'preformatted-text'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.PreformattedText.js'
			)
		);

		$this->component=array
		(
			'name'																=>	__('Preformatted Text',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Preformatted Text',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Preformatted Text',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'label_open',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Label open',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Label of the button (link) when text area is closed.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	__('- Hide code',PLUGIN_PAGE_BUILDER_DOMAIN),
						)
					),
					array
					(
						'id'													=>	'label_close',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Label close',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Label of the button (link) when text area is opened.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	__('+ Show code',PLUGIN_PAGE_BUILDER_DOMAIN),
						)
					),
					array
					(
						'id'													=>	'open_default',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Open start',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Open at start',PLUGIN_PAGE_BUILDER_DOMAIN)
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
						'id'													=>	'text',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Preformatted text',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'@content'
						)
					),
					array
					(
						'id'													=>	'css_class',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('CSS class',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),					
				)
			)
		);		
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodePreformattedText($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		if($Validation->isEmpty($content)) return($html);
		if(!$Validation->isBool($attribute['open_default'])) return($html);
		
		$class=array('pb-preformatted-text');
		
		if($attribute['open_default']==1)
			array_push($class,'pb-preformatted-text-visible');
		
		array_push($class,$attribute['css_class']);
		
		$id=PBHelper::createId('pb_preformatted_text');
		
		$content=nl2br(trim(preg_replace(array('/\[/','/\]/'),array('&#91;','&#93;'),htmlspecialchars($content))));
		
		$html=
		'
			<div id="'.$id.'"'.PBHelper::createClassAttribute($class).'>
				<div>
					<a href="#">
						<span class="pb-preformatted-text-label-open">'.esc_html($attribute['label_open']).'</span>
						<span class="pb-preformatted-text-label-close">'.esc_html($attribute['label_close']).'</span>
					</a>
				</div>
				<pre>'.wp_kses_normalize_entities($content).'</pre>
			</div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($) 
					{
						$("#'.$id.'").PBPreformattedText();
					});
				</script>
			</div>
		';
		
		return(PBHelper::formatHTML($html));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/