<?php

/******************************************************************************/
/******************************************************************************/

class PBCSS
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
		
		PBHelper::removeUIndex($option,array('media',array()),array('selector',array()),'property');
		
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
		$Validation=new	PBValidation();
		
		foreach($property as $name=>$value)
		{
			$unit='px';
			
			if(is_array($value))
			{
				if(isset($value['unit'])) $unit=$value['unit'];
				if(isset($value['value'])) $value=$value['value'];
			}

			switch($name)
			{
				case 'left':
				case 'width':
				case 'height':
				case 'font-size':
				case 'padding-top':
				case 'padding-left':
				case 'padding-right':
				case 'padding-bottom':

					if($Validation->isNumber($value,0,9999)) $data[$name]=$value.$unit;
				
				break;
				
				case 'top':
				case 'margin-top':
				case 'margin-left':
				case 'margin-right':
				case 'margin-bottom':
					
					if($Validation->isNumber($value,-9999,9999)) $data[$name]=$value.$unit;
					
				break;
				
				case 'color':
				case 'border-color':
				case 'border-top-color':
				case 'border-right-color':
				case 'border-bottom-color':
				case 'border-left-color':	
				case 'outline-color':
				case 'background-color':
					
					$value=PBColor::getColor($value);
					if($Validation->isNotEmpty($value)) $data[$name]=$value;
					
				break;

				case 'font-family':
					
					foreach((array)$value as $family)
					{
						if($Validation->isNotEmpty($family)) 
						{
							PBHelper::removeUIndex($data,$name);
							
							if($Validation->isNotEmpty($data[$name])) $data[$name].=',';
							$data[$name].='\''.$family.'\'';
						}
					}
					
				break;
				
				case 'font-style':
					
					if(isset($this->fontStyle[$value])) $data[$name]=$value;
	
				break;
				
				case 'font-weight':
					
					if(isset($this->fontWeight[$value])) $data[$name]=$value;
	
				break;
				
				case 'display':
				case 'background':
				case 'background-repeat':
				case 'background-position':
					
					if($Validation->isNotEmpty($value)) $data[$name]=$value;
					
				break;
				
				case 'background-image':
					
					if($Validation->isNotEmpty($value)) $data[$name]='url(\''.$value.'\')';
					
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
	
	function getRetinaMediaQuery($code)
	{
		$code=
		'
			@media only screen and (min--moz-device-pixel-ratio:2),only screen and (-o-min-device-pixel-ratio:2/1),only screen and (-webkit-min-device-pixel-ratio:2),only screen and (min-device-pixel-ratio:2)
			{
				'.$code.'
			}
		';
		
		return($code);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/