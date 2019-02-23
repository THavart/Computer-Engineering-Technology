<?php

/******************************************************************************/
/******************************************************************************/

class PBValidation
{
	/**************************************************************************/

	function __construct($notice=null) 
	{ 
		$this->notice=$notice;
	}

	/**************************************************************************/

	function isNumber($value,$minValue,$maxValue,$empty=false)
	{
		if(($empty) && ($this->isEmpty($value))) return(true);
		if(!preg_match('/^(-)?[0-9]{1,}$/',$value,$result)) return(false);
		if(!(($value>=$minValue) && ($value<=$maxValue))) return(false);

		return(true);
	}
	
	/**************************************************************************/
	
	function isFloat($value,$minValue,$maxValue,$empty=false)
	{
		$value=preg_replace('/,/','.',$value);
		
		if($this->isEmpty($value)) return($empty);
		if(floatval($value)!=$value) return(false);
		if(!(($value>=$minValue) && ($value<=$maxValue))) return(false);
		
		return(true);
	}

	/**************************************************************************/

	function isEmpty($value)
	{
		return(strlen(trim(strval($value))) ? false : true);
	}
	
	/**************************************************************************/

	function isNotEmpty($value)
	{
		return(!$this->isEmpty($value));
	}
	
	/**************************************************************************/
	
	function isEmailAddress($value,$empty=false)
	{
		if(($empty) && ($this->isEmpty($value))) return(true);
        if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i',$value)) return(false);
        
		return(true);
	}
	
	/**************************************************************************/
	
	function isColor($value,$empty=false)
	{
		if(($empty) && ($this->isEmpty($value))) return(true);

		if($value=='transparent') return(true);
		if(preg_match('/^[a-f0-9]{6,8}$/i',$value)) return(true);

		return(false);
	}
	
	/**************************************************************************/
	
	function isURL($value,$empty=false)
	{
		if(($empty) && ($this->isEmpty($value))) return(true);
		if(!preg_match('|^(http(s)?://)?[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i',$value)) return(false);
	
		return(true);
	}
	
	/**************************************************************************/
	
	function isBool($value,$empty=false,$strict=false)
	{
		if(($empty) && ($this->isEmpty($value))) return(true);
		
		if($strict)
			return(in_array($value,array(false,true),true));
		else
			return(in_array($value,array(0,1),false));
	}
	
	/**************************************************************************/
	
	static function isVideoURL($url)
	{
		$data=array();
		$result=array();
		
		if(preg_match('/(youtube\.com|youtu\.be)\/(watch\?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*)).*/i',$url,$result))
			$data=array('type'=>'youtube','url'=>'http://www.youtube.com/embed/'.$result[3]);
		if(preg_match('/(?:vimeo(?:pro)?.com)\/(?:[^\d]+)?(\d+)(?:.*)/',$url,$result))
			$data=array('type'=>'vimeo','url'=>'http://player.vimeo.com/video/'.$result[1]);
		if(preg_match('/metacafe.com\/(?:watch|fplayer)\/([\w\-]{1,10})/',$url,$result))
			$data=array('type'=>'metacafe','url'=>'http://www.metacafe.com/fplayer/'.$result[1].'/.swf');
		if(preg_match('/dailymotion.com\/video\/(.*)\/?(.*)/',$url,$result))
			$data=array('type'=>'dailymotion','url'=>'http://www.dailymotion.com/swf/video/'.$result[1]);
		
		return($data);
	}
	
	/**************************************************************************/

	function notice($functionName,$functionArgument,$noticeArgument)
	{
		$result=call_user_func_array(array($this,$functionName),$functionArgument);
		if(!$result) $this->notice->addError($noticeArgument[0],$noticeArgument[1]);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/