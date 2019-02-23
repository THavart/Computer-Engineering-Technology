<?php

/******************************************************************************/
/******************************************************************************/

class PBResponsiveMode
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->responsiveMode=PBData::get('responsive_mode');
	}
	
	/**************************************************************************/
	
	function getMedia()
	{
		$i=1;
		$media=array($i=>array());
		
		foreach($this->responsiveMode as $value)
		{
			$i++;
			
			$maxWidth=$value-1;
			$minWidth=isset($this->responsiveMode[$i-1]) ? $this->responsiveMode[$i-1] : 0;
			
			$media[$i]=array('min-width'=>$minWidth,'max-width'=>$maxWidth);
		}
		
		return($media);
	}
	
	/**************************************************************************/
	
	function getDictionary()
	{
		$dictionary=array();
		
		foreach($this->responsiveMode as $value)
			$dictionary[$value]=array($value);
		
		return($dictionary);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/