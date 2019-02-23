<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentScreenPreloader extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->style=array
		(
			'screen-preloader'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->script=array
		(
			'screen-preloader'													=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getScriptURL(),
				'file'															=>	'PB.ScreenPreloader.js'
			)
		);
		
		$this->component=array
		(
			'name'																=>	__('Screen Preloader',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Screen Preloader',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Screen Preloader',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'bg_color',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Background color',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Background color in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'FFFFFF'
						)
					),
					array
					(
						'id'													=>	'z_index',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Z-index',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Z-index of preloader layer',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	'6'
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'100000'
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
					)					
				)
			)
		);	
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeScreenPreloader($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		
		$Validation=new PBValidation();

		if(!$Validation->isColor($attribute['bg_color'])) return($html);
		if(!$Validation->isNumber($attribute['z_index'],0,999999)) return($html);

		$style=array();
		$class=array('pb-screen-preloader',$attribute['css_class']);
		
		$style['z-index']=$attribute['z_index'];
		$style['background-color']=PBColor::getColor($attribute['bg_color']);			
		
		$id=PBHelper::createId('pb_screen_preloader');

		$html=
		'
			<div'.PBHelper::createStyleAttribute($style).PBHelper::createClassAttribute($class).' id="'.esc_attr($id).'"></div>
			<div class="pb-script-tag">
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$(\'#'.$id.'\').PBScreenPreloader();
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