<?php

/******************************************************************************/
/******************************************************************************/

class PBSession
{
	/**************************************************************************/

	function __construct() 
	{ 
	
	}
	
	/**************************************************************************/
	
	function create()
	{
		if(!session_id()) session_start();
	}
	
	/**************************************************************************/
	
	function destroy()
	{
		session_destroy();
	}
	
	/**************************************************************************/
	
	function setValue($componentId,$key,$value,&$array=null)
	{
		if(!is_array($key)) $key=array($key);
		if(is_null($array))
		{
			if(!array_key_exists($componentId,$_SESSION)) $_SESSION[$componentId]=array();
			$array=&$_SESSION[$componentId];
		}
		
		$index=$key[0];
		if(!array_key_exists($index,$array)) $array[$index]=array();
		
		if(count($key)==1)
		{
			foreach($value as $a=>$b) $array[$index][$a]=$b;
		}
		else
		{
			$key=array_slice($key,1);
			$this->setValue($componentId,$key,$value,$array[$index]);
		}
	}
	
	/*************************************************************************/
	
	function getValue($componentId,$key,$data=null,&$value=null)
	{
		if(!is_array($key)) $key=array($key);
		if(is_null($data)) $data=$_SESSION[$componentId];
		
		$index=$key[0];
		
		if(count($key)==1)
		{
			PBHelper::removeUIndex($data,$index);
			return($data[$index]);
		}
		else
		{
			$key=array_slice($key,1);
			return($this->getValue($componentId,$key,$data[$index]));
		}	
		
		return(false);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/