<?php

/******************************************************************************/
/******************************************************************************/

class PBOption
{
	/**************************************************************************/
	
	static function createOption($refresh=false)
	{
		$option=PBData::get(PLUGIN_PAGE_BUILDER_OPTION);
		if(($option===false) || ($refresh))
		{
			$option=(array)get_option(PLUGIN_PAGE_BUILDER_OPTION);
			PBData::set(PLUGIN_PAGE_BUILDER_OPTION,$option,$refresh);
		}
		else $option=PBData::get(PLUGIN_PAGE_BUILDER_OPTION);
		
		return($option);
	}

	/**************************************************************************/
	
	static function getOption($name)
	{
		$option=PBOption::createOption();
		
		if(!array_key_exists($name,$option)) return(null);
		return($option[$name]);		
	}
	
	/**************************************************************************/

	static function updateOption($option)
	{
		$nOption=array();
		foreach($option as $index=>$value) $nOption[$index]=$value;
		
		$oOption=self::createOption(true);
		
		update_option(PLUGIN_PAGE_BUILDER_OPTION,array_merge($oOption,$nOption));

		return(self::createOption(true));
	}
	
	/**************************************************************************/
	
	static function resetOption()
	{
		update_option(PLUGIN_PAGE_BUILDER_OPTION,array());
		return(self::createOption(true));		
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/