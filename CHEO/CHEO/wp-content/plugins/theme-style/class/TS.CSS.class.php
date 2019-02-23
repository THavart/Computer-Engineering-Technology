<?php

/******************************************************************************/
/******************************************************************************/

class TSCSS
{
	/**************************************************************************/

	function __construct()
	{

	}

	/**************************************************************************/
	
	function create($option)
	{
		$option['property']=$this->validateProperty($option['property']);
		
		if(!count($option['property'])) return;
		
		TSHelper::removeUIndex($option,array('media',array()),array('selector',array()),'property');
		
		$output=null;
		
		$output.=$this->createMedia($option['media']);
		$output.=$this->createSelector($option['selector']);
		$output.=$this->createProperty($option['property']);
		$output.=$this->createMedia($option['media'],false);
		
		return($output);
	}
	
	/**************************************************************************/
	
	function validateProperty($property)
	{
		$data=array();
		$Validation=new	TSValidation();
		
		foreach($property as $name=>$value)
		{
			switch($name)
			{
				case 'color'				:
				case 'border-color'			:
				case 'outline-color'		:
				case 'background-color'		:
				case 'border-top-color'		:
				case 'border-right-color'	:
				case 'border-bottom-color'	:
				case 'border-left-color'	:	
				
					$value=TSColor::getColor($value);
					if($value!==false) $data[$name]=$value;
					
				break;
				case 'outline-width'		:
				case 'border-width'			:
				case 'padding-top'			:
				case 'padding-right'		:
				case 'padding-bottom'		:
				case 'padding-left'			:					
				case 'border-top-width'		:
				case 'border-right-width'	:
				case 'border-bottom-width'	:
				case 'border-left-width'	:
					
					if($Validation->isNumber($value,0,9999)) $data[$name]=$value.'px';
					
				break;
				case 'border-style'			:
				case 'outline-style'		:
				case 'border-top-style'		:
				case 'border-right-style'	:
				case 'border-bottom-style'	:
				case 'border-left-style'	:
					
					$data[$name]=$value;
					
				break;
			}
		}
		
		return($data);
	}
	
	/**************************************************************************/
	
	function createSelector($selector)
	{
		$output=null;
		
		foreach($selector as $name)
		{
			if(!is_null($output)) $output.=",\n";
			$output.=$name;
		}
		
		return("\n".$output."\n{\n");
	}
	
	/**************************************************************************/
	
	function createProperty($property)
	{
		$output=null;
		
		foreach($property as $name=>$value)
		{
			if(!is_null($output)) $output.="\n";
			$output.="\t".$name.':'.$value.';';
		}
		
		return($output."\n}\n");		
	}
	
	/**************************************************************************/
	
	function createMedia($media,$start=true)
	{
		if(!count($media)) return;
		
		if($start)
		{
			$output=null;
			foreach($media as $index=>$value)
				$output.=' and ('.$index.':'.$value.'px)';
	
			$output="@media only screen ".$output."\n{\n";
		}
		else $output="}\n\n";
		
		return($output);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/