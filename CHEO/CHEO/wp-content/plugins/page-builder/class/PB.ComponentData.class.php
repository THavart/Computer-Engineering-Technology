<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentData
{
	/**************************************************************************/
	
	static function prepare($componentId)
	{
		global $pb_data;
		
		if(!is_array($pb_data)) $pb_data=array();
		
		if(!array_key_exists('component',$pb_data)) 
			$pb_data['component']=array();
		
		if(!array_key_exists($componentId,$pb_data['component'])) 
			$pb_data['component'][$componentId]=array();		
	}
	
	/**************************************************************************/
	
	static function set($componentId,$name,$value,$refresh=true)
	{
		global $pb_data;
		
		PBComponentData::prepare($componentId);

		if((array_key_exists($name,$pb_data['component'][$componentId])) && ($refresh===false)) return;
		
		$pb_data['component'][$componentId][$name]=$value;
		
		return($pb_data['component'][$componentId][$name]);
	}
	
	/**************************************************************************/
	
	static function get($componentId,$name)
	{
		global $pb_data;
		
		PBComponentData::prepare($componentId);
		
		if(!is_array($pb_data['component'][$componentId])) return(false);
		if(!array_key_exists($name,$pb_data['component'][$componentId])) return(false);
		
		return($pb_data['component'][$componentId][$name]);
	}

	/**************************************************************************/
	
	static function setFile($componentId,$name,$path)
	{
		global $pb_data;
		
		PBComponentData::prepare($componentId);
		
		if(array_key_exists($name,$pb_data['component'][$componentId]))
			return($pb_data['component'][$componentId][$name]);
		
		$pb_data['component'][$componentId][$name]=array();
		
		$file=PBFile::scanDir($path);

		if(is_array($file))
		{
			foreach($file as $value)
				$pb_data['component'][$componentId][$name][$value]=$value;			
		}
		
		return($pb_data['component'][$componentId][$name]);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/