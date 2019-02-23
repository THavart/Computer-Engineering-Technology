<?php

/******************************************************************************/
/******************************************************************************/

class TSData
{
	/**************************************************************************/
	
	static function create()
	{
		global $ts_data;
		
		if(!is_array($ts_data)) $ts_data=array();
		if(!array_key_exists('data',$ts_data)) $ts_data['data']=array();
	}
	
	/**************************************************************************/
	
	static function set($name,$value,$refresh=true)
	{
		global $ts_data;
		
		self::create();

		if((array_key_exists($name,$ts_data['data'])) && ($refresh===false)) return;
		
		$ts_data['data'][$name]=$value;
		
		return($ts_data['data'][$name]);
	}
	
	/**************************************************************************/
	
	static function get($name)
	{
		global $ts_data;
		
		self::create();
		
		if(!array_key_exists($name,$ts_data['data'])) return(false);
		
		return($ts_data['data'][$name]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/