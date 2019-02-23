<?php

/******************************************************************************/
/******************************************************************************/

class TSOption
{
	/**************************************************************************/
	
	static function updateOption($option)
	{
		update_option(PLUGIN_THEME_STYLE_OPTION_NAME,$option);
		self::refreshOption();
	}
	
	/**************************************************************************/
	
	static function getOption($name=null)
	{
		global $ts_option;
		
		if(!is_array($ts_option))
			self::refreshOption();
		
		if(is_null($name)) return($ts_option);
		if(array_key_exists($name,$ts_option)) return($ts_option[$name]);
		
		return(false);
	}
	
	/**************************************************************************/
	
	static function refreshOption()
	{
		global $ts_option;
		$ts_option=(array)get_option(PLUGIN_THEME_STYLE_OPTION_NAME);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/