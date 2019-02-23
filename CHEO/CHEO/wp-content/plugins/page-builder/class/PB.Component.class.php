<?php

/******************************************************************************/
/******************************************************************************/

class PBComponent
{
	/**************************************************************************/
	
	protected $style=null;
	protected $script=null;
	
	protected $component;
	
	protected $componentDefault=array
	(
		'id'								=>	'',
		'ui'								=>	array
		(
			'panel'							=>	0,
			'group'							=>	0,
			'multi'							=>	0,
			'text'							=>	array
			(
				'label'						=>	null,
				'header'					=>	null,
				'subheader'					=>	null,
				'infieldlabel'				=>	null	
			),
			'element'						=>	array
			(
				'type'						=>	'text',
				'value'						=>	null,
				'option'					=>	array(),
				'attribute'					=>	array(),
				'dictionary'				=>	array
				(
					'term'					=>	null,
					'source'				=>	array(),
					'use_default'			=>	true
				)
			),
		),
		'visibility'						=>	3,
		'shortcode'							=>	array
		(
			'path'							=>	'@param',
			'default'						=>	null
		)
	);
	
	protected $componentDescription=array
	(
		'id'								=>	'component_description'
	);
	
	/**************************************************************************/

	function __construct()
	{
		$i=0;
		
		foreach($this->component['structure']['element'] as $index=>$value)
		{
			if(!is_array($value)) unset($this->component['structure']['element'][$index]);
			
			if(is_null($value))
			{
				unset($this->component['structure']['element'][$index]);
				continue;
			}
			
			$id=$this->component['structure']['element'][$index]['id'];

			if(PBComponentData::get($this->getComponentId(),'field_'.$id.'_enable')===false) continue;
			if(PBComponentData::get($this->getComponentId(),'field_'.$id.'_enable')==0)
				unset($this->component['structure']['element'][$index]);
		}
		
		$this->component['structure']['element']=array_values($this->component['structure']['element']);
		
		foreach($this->component['structure']['element'] as $index=>$value)
		{
			$this->setDefaultElement($this->componentDefault,$value);
			
			if($i==0)
			{
				$this->setDefaultElement($this->componentDefault,$this->componentDescription);
				
				$this->componentDescription['ui']['panel']=$value['ui']['panel'];
				
				$this->componentDescription['ui']['text']['header']=__('Description',PLUGIN_PAGE_BUILDER_DOMAIN);
				$this->componentDescription['ui']['text']['subheader']=__('Description of used component',PLUGIN_PAGE_BUILDER_DOMAIN);
				
				$this->component['structure']['element'][$i]=$this->componentDescription;				
			}
			
			$i++;
			
			$this->component['structure']['element'][$i]=$value;
		}
		
		$function=PBComponentData::get($this->getComponentId(),'component_construct');
		
		if(is_callable($function))
			$this->component=call_user_func($function,$this->component);
	}
	
	/**************************************************************************/
	
	function createCSS()
	{
		
	}
	
	/**************************************************************************/
	
	function setDefaultElement($default,&$element)
	{
		if(is_array($default))
		{
			foreach($default as $index=>$value)
			{
				if(!isset($element[$index]))
					$element[$index]=$value;
				
				$this->setDefaultElement($default[$index],$element[$index]);
			}
		}
	}
	
	/**************************************************************************/
	
	function getComponentId()
	{
		$repeat=1;
		$id=preg_replace('/([A-Z])/','_$1',str_replace('PBComponent','',get_called_class(),$repeat));
		$id=strtolower(substr($id,1));
		return($id);
	}
	
	/**************************************************************************/
	
	function processAttribute($shortcode,$attr)
	{
		$default=array();
		
		$Validation=new PBValidation();
		
		$repeat=1;
		$shortcode=str_replace(PLUGIN_PAGE_BUILDER_SHORTCODE_PREFIX.$this->getComponentId(),'',$shortcode,$repeat);
		
		if(substr($shortcode,0,1)=='_')
			$shortcode=substr($shortcode,1);
		
		foreach($this->component['structure']['element'] as $element)
		{
			$path=explode('/',preg_replace('/\*/','',$element['shortcode']['path']));
			
			$count=count($path);
			
			if(!((substr($path[$count-1],0,1)=='@') && ($path[$count-1]!='@content'))) continue;
	
			$name=substr($path[$count-1],1);
	
			if($name=='param') $name=$element['id'];
			
			if($count==1) 
			{
				if($Validation->isEmpty($shortcode))
					$default[$name]=$element['shortcode']['default'];
			}
			else
			{
				if($shortcode==$path[$count-2])
					$default[$name]=$element['shortcode']['default'];
			}
		}
		
		return(shortcode_atts($default,$attr));
	}
	
	/**************************************************************************/
	
	function addScript()
	{
		$script=array();
		
		if(is_array($this->script))
		{
			foreach($this->script as $index=>$value)
			{
				$script[PLUGIN_PAGE_BUILDER_COMPONENT_LIBRARY_PREFIX.$index]=$value;
			}
		}

		return($script);
	}
	
	/**************************************************************************/
	
	function addStyle()
	{
		$style=array();
		
		if(is_array($this->style))
		{
			foreach($this->style as $index=>$value)
				$style[PLUGIN_PAGE_BUILDER_COMPONENT_LIBRARY_PREFIX.$index]=$value;
		}
		
		return($style);
	}
	
	/**************************************************************************/
	
	function init()
	{
		return($this->component);
	}
	
	/**************************************************************************/
	
	function getScriptURL()
	{
		return(PLUGIN_PAGE_BUILDER_URL.'/component/'.$this->getComponentId().'/script/');
	}
	
	/**************************************************************************/
	
	function getStyleURL()
	{
		return(PLUGIN_PAGE_BUILDER_URL.'/component/'.$this->getComponentId().'/style/');
	}
	
	/**************************************************************************/
	
	function getTemplateFullPath($name)
	{
		return(PLUGIN_PAGE_BUILDER_PATH.'component/'.$this->getComponentId().'/template/'.$name.'.php');
	}
	
	/**************************************************************************/
	
	function includeLibrary($path)
	{
		PBInclude::includeFile(PLUGIN_PAGE_BUILDER_PATH.'component/'.$this->getComponentId().'/library/'.$path);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/