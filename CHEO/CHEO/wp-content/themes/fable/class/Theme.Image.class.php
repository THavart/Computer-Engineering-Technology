<?php

/******************************************************************************/
/******************************************************************************/

class ThemeImage
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->image=array
		(
			'image-1050-630'		=>	array(1050,630,__('Blog - 100% (1050x630)',THEME_DOMAIN),1,true),	
			'image-525-315'			=>	array(525,315,__('Blog - 50% (525x315)',THEME_DOMAIN),1,true),
			'image-690-414'			=>	array(690,414,__('Blog - Sidebar (690x414)',THEME_DOMAIN),1,true),		
			'image-1050-770'		=>	array(1050,770,__('Gallery - 100% (1050x770)',THEME_DOMAIN),1,true),
			'image-690-506'			=>	array(690,506,__('Gallery - Sidebar (690x506)',THEME_DOMAIN),1,true),
			'image-525-385'			=>	array(525,385,__('Gallery - 50% (525x385)',THEME_DOMAIN),1,true),
			'image-525-560'			=>	array(525,560,__('Team (525x560)',THEME_DOMAIN),1,true)
		);
	}
	
	/**************************************************************************/
	
	function register()
	{
		foreach($this->image as $index=>$data)
			add_image_size($index,$data[0],$data[1],$data[3]);
	}
	
	/**************************************************************************/
	
	function addImageSupport($size)
	{
		$addsize=array();
		foreach($this->image as $index=>$data)
			$addsize[$index]=$data[2];
		
		return(array_merge($size,$addsize));
	}
	
	/**************************************************************************/
	
	function getImageDimension($id)
	{
		return(array($this->image[$id][0],$this->image[$id][1]));
	}
	
	/**************************************************************************/
	
	function itemExist($id)
	{
		return((bool)$this->image[$id]);
	}
	
	/**************************************************************************/
	
	function getImageNameByColumnCount($columnCount)
	{
		foreach($this->image as $index=>$value)
		{
			if($value[4]==$columnCount) return($index);
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/