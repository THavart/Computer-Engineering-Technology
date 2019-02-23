<?php

/******************************************************************************/
/******************************************************************************/

class TIInclude
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
		if(TIFile::fileExist($path)!==true) return(false);
		if(self::isPHPFile($path)!==true) return(false);
	
		require_once($path);
		
		return(true);
	}
	
	/**************************************************************************/
	
	static function includeFileFromDir($path)
	{
		$file=TIFile::scanDir($path);
		if($file===false) return(false);
		
		foreach($file as $value)
			self::includeFile($path.$value);
		
		return(true);
	}
	
	/**************************************************************************/
	
	static function includeClassFromTheme($className)
	{
		$classPath=get_template_directory().'/class/Theme.'.$className.'.class.php';
		self::includeClass($classPath);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/