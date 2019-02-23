<?php

/******************************************************************************/
/******************************************************************************/

class PBData
{
	/**************************************************************************/
	
	static function create()
	{
		global $pb_data;
		
		if(!is_array($pb_data)) $pb_data=array();
		if(!array_key_exists('data',$pb_data)) $pb_data['data']=array();
	}
	
	/**************************************************************************/
	
	static function set($name,$value,$refresh=true)
	{
		global $pb_data;
		
		self::create();

		if((array_key_exists($name,$pb_data['data'])) && ($refresh===false)) return;
		
		$pb_data['data'][$name]=$value;
		
		return($pb_data['data'][$name]);
	}
	
	/**************************************************************************/
	
	static function get($name)
	{
		global $pb_data;
		
		self::create();
		
		if(!array_key_exists($name,$pb_data['data'])) return(false);
		
		return($pb_data['data'][$name]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/