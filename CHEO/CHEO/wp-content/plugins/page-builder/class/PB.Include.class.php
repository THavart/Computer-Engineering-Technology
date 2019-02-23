<?php

/******************************************************************************/
/******************************************************************************/

class PBInclude
{
	/**************************************************************************/
	
	static function isPHPFile($path)
	{
		return(strtolower(substr($path,-3,3))=='php' ? true : false);
	}
	
	/**************************************************************************/
	
	static function includeClass($path,$class=array())
	{
		foreach($class as $className)
		{
			if(class_exists($className)) return(false);
		}
		
		return(self::includeFile($path));
	}
	
	/**************************************************************************/
	
	static function includeFile($path)
	{
		if(PBFile::fileExist($path)!==true) return(false);
		if(self::isPHPFile($path)!==true) return(false);
		
		require_once($path);
		
		return(true);
	}
	
	/**************************************************************************/
	
	static function includeFileFromDir($path)
	{
		$file=PBFile::scanDir($path);
		if($file===false) return(false);
		
		foreach($file as $value)
			self::includeFile($path.$value);
		
		return(true);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/