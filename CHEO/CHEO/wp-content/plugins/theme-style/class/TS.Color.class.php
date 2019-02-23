<?php

/******************************************************************************/
/******************************************************************************/

class TSColor
{
	/**************************************************************************/
	
	static function getColor($color) 
	{
		$Validation=new TSValidation();
		
		if(!$Validation->isColor($color,false)) return(false);
		
		if($color==='transparent') return($color);
		
		$length=strlen($color);
		
		if($length==6) return('#'.$color);
		if($length==8) return(self::HEX2RGBA($color));
		
		return(false);
	}
	
	/**************************************************************************/
	
	static function HEX2RGBA($color) 
	{
		$hex=array($color[0].$color[1],$color[2].$color[3],$color[4].$color[5]);
        
        $rgb=array_map('hexdec',$hex);

        $output='rgba('.implode(',',$rgb).','.(hexdec($color[6].$color[7])/255).')';
        
        return($output);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/