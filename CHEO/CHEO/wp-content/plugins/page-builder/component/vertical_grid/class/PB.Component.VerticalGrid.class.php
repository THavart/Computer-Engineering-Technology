<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentVerticalGrid extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->lineNumber=0;
		$this->lineStyle=array('odd'=>null,'even'=>null);
		
		$this->style=array
		(
			'vertical-grid'														=>	array
			(
				'use'															=>	2,
				'path'															=>	$this->getStyleURL(),
				'file'															=>	'style.css'
			)
		);	
		
		$this->component=array
		(
			'name'																=>	__('Vertical Grid',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Displays Vertical Grid',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Vertical Grid',PLUGIN_PAGE_BUILDER_DOMAIN)
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
							'header'											=>	__('Styles',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Values',PLUGIN_PAGE_BUILDER_DOMAIN)
						)					
					),
					'multi'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Values',PLUGIN_PAGE_BUILDER_DOMAIN)
						)
					),
					'group'														=>	array
					(
						1														=>	array
						(
							'header'											=>	__('Dimensions',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Width of columns (in percentage of parent width).',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						2														=>	array
						(
							'header'											=>	__('Even lines',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Styles for even lines.',PLUGIN_PAGE_BUILDER_DOMAIN)
						),
						3														=>	array
						(
							'header'											=>	__('Odd lines',PLUGIN_PAGE_BUILDER_DOMAIN),
							'subheader'											=>	__('Styles for an odd lines.',PLUGIN_PAGE_BUILDER_DOMAIN)
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
								'subheader'										=>	__('List of CSS classes defined in CSS files separated by space.',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'column_name_width',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Width of the column name',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	'50',
								'option'										=>	array
								(
									'min'										=>	1,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'50'
						)
					),	
					array
					(
						'id'													=>	'column_value_width',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	1,
							'text'												=>	array
							(
								'label'											=>	__('Width of the column value',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'slider',
								'value'											=>	'50',
								'option'										=>	array
								(
									'min'										=>	1,
									'max'										=>	100
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'50'
						)
					),						
					array
					(
						'id'													=>	'line_even_column_name_text_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Text color for column name in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'line_even_column_value_text_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Text color for column value in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'line_even_column_name_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Background color for column name in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),						
					array
					(
						'id'													=>	'line_even_column_value_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	2,
							'text'												=>	array
							(
								'label'											=>	__('Background color for column value in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),					
					array
					(
						'id'													=>	'line_odd_column_name_text_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Text color for column name in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'line_odd_column_value_text_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Text color for column value in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'line_odd_column_name_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Background color for column name in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),						
					array
					(
						'id'													=>	'line_odd_column_value_bg_color',
						'ui'													=>	array
						(
							'panel'												=>	2,
							'group'												=>	3,
							'text'												=>	array
							(
								'label'											=>	__('Background color for column value in HEX',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'color-picker'
							)
						)
					),	
					array
					(
						'id'													=>	'name',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Name',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Name of the value',PLUGIN_PAGE_BUILDER_DOMAIN),
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*line/line_name/@content'
						)
					),	
					array
					(
						'id'													=>	'value',
						'ui'													=>	array
						(
							'panel'												=>	3,
							'multi'												=>	1,
							'text'												=>	array
							(
								'header'										=>	__('Value',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('Value',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'type'											=>	'textarea'
							)
						),
						'shortcode'												=>	array
						(
							'path'												=>	'*line/line_value/@content'
						)
					)				
				)
			)
		);
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeVerticalGrid($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$html=null;
		$Validation=new PBValidation();
		
		$this->lineNumber=0;
		$this->lineStyle=array('even'=>array('name'=>null,'value'=>null),'odd'=>array('name'=>null,'value'=>null));
		
		if($Validation->isEmpty($content)) return($html);
		
		$style=array();
		
		if($Validation->isNumber($attribute['column_name_width'],1,100))
		{
			$style['odd']['name']['width']=$attribute['column_name_width'].'%';
			$style['even']['name']['width']=$attribute['column_name_width'].'%';
		}
		if($Validation->isNumber($attribute['column_value_width'],1,100))
		{
			$style['odd']['value']['width']=$attribute['column_value_width'].'%';
			$style['even']['value']['width']=$attribute['column_value_width'].'%';
		}
			
		if($Validation->isColor($attribute['line_even_column_name_text_color']))
			$style['even']['name']['color']=PBColor::getColor($attribute['line_even_column_name_text_color']);		
		if($Validation->isColor($attribute['line_even_column_value_text_color']))
			$style['even']['value']['color']=PBColor::getColor($attribute['line_even_column_value_text_color']);				
		if($Validation->isColor($attribute['line_even_column_name_bg_color']))
			$style['even']['name']['background-color']=PBColor::getColor($attribute['line_even_column_name_bg_color']);		
		if($Validation->isColor($attribute['line_even_column_value_bg_color']))
			$style['even']['value']['background-color']=PBColor::getColor($attribute['line_even_column_value_bg_color']);	
		
		if($Validation->isColor($attribute['line_odd_column_name_text_color']))
			$style['odd']['name']['color']=PBColor::getColor($attribute['line_odd_column_name_text_color']);		
		if($Validation->isColor($attribute['line_odd_column_value_text_color']))
			$style['odd']['value']['color']=PBColor::getColor($attribute['line_odd_column_value_text_color']);				
		if($Validation->isColor($attribute['line_odd_column_name_bg_color']))
			$style['odd']['name']['background-color']=PBColor::getColor($attribute['line_odd_column_name_bg_color']);		
		if($Validation->isColor($attribute['line_odd_column_value_bg_color']))
			$style['odd']['value']['background-color']=PBColor::getColor($attribute['line_odd_column_value_bg_color']);		
		
		$this->lineStyle['even']['name']=PBHelper::createStyleAttribute($style['even']['name']);
		$this->lineStyle['even']['value']=PBHelper::createStyleAttribute($style['even']['value']);
		$this->lineStyle['odd']['name']=PBHelper::createStyleAttribute($style['odd']['name']);
		$this->lineStyle['odd']['value']=PBHelper::createStyleAttribute($style['odd']['value']);		
		
		$class=array('pb-vertical-grid','pb-clear-fix',$attribute['css_class']);
		
		$html=
		'
			<div'.PBHelper::createClassAttribute($class).'>
				<ul'.PBHelper::createClassAttribute(array('pb-reset-list')).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</ul>
			</div>
		';
		
		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}
	
	/**************************************************************************/
	
	function processShortcodeVerticalGridLine($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$class=array('pb-clear-fix','pb-vertical-grid-line-'.($this->lineNumber%2==0 ? 'even' : 'odd'));
		
		$html='<li'.PBHelper::createClassAttribute($class).'>'.do_shortcode($content).'</li>';
		
		$this->lineNumber++;

		return(PBHelper::formatHTML($html,PBHelper::formatContent($content,true,false,false)));
	}	
	
	/**************************************************************************/
	
	function processShortcodeVerticalGridLineName($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$class=array('pb-vertical-grid-column-name');
		
		$html='<div'.PBHelper::createClassAttribute($class).($this->lineNumber%2==0 ? $this->lineStyle['even']['name'] : $this->lineStyle['odd']['name']).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';

		return(PBHelper::formatHTML($html,nl2br($content)));
	}
	
	/**************************************************************************/
	
	function processShortcodeVerticalGridLineValue($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);

		$class=array('pb-vertical-grid-column-value');
		
		$html='<div'.PBHelper::createClassAttribute($class).($this->lineNumber%2==0 ? $this->lineStyle['even']['value'] : $this->lineStyle['odd']['value']).'>'.PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT.'</div>';
		
		return(PBHelper::formatHTML($html,nl2br($content)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/