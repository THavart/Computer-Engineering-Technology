<?php

/******************************************************************************/
/******************************************************************************/

class PBMenuResponsiveWalker extends Walker_Nav_Menu 
{
	/**************************************************************************/

	function start_lvl(&$output,$depth=0,$args=array()) 
	{
		$output.='';
	}

	/**************************************************************************/
	
	function end_lvl(&$output,$depth=0,$args=array()) 
	{
		$output.='';
	}

	/**************************************************************************/
	
	function start_el(&$output,$object,$depth=0,$args=array(),$current_object_id=0) 
	{		
		$level=null;
		
		$Validation=new PBValidation();
		
		for($i=0;$i<$depth;$i++) $level.='--';
		if(!is_null($level)) $level.=' ';
		
		$linkClass=array();
		if($Validation->isNotEmpty($object->target))
			array_push($linkClass,'pb-window-target-blank');
		
		$output.=
		'
			<li class="'.join(' ',(array)$object->classes).'">
				<a href="'.esc_attr($object->url).'"'.PBHelper::createClassAttribute($linkClass).'>'.$level.$object->title.'</a>
			</li>
		';
	}

	/**************************************************************************/
	
	function end_el(&$output,$object,$depth=0,$args=array())
	{
		$output.='';
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/