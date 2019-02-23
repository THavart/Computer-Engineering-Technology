<?php

/******************************************************************************/
/******************************************************************************/

class PBImage
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->build();
	}
	
	/**************************************************************************/
	
	function build()
	{
		$this->image=array();
		
		global $_wp_additional_image_sizes;
   
        $image=get_intermediate_image_sizes();

        foreach($image as $value) 
		{
			if(in_array($value,array('thumbnail','medium','large')))
			{
				$this->image[$value]['crop']=get_option($value.'_crop');
				$this->image[$value]['width']=get_option($value.'_size_w');
				$this->image[$value]['height']=get_option($value.'_size_h');
			} 
			elseif(isset($_wp_additional_image_sizes[$value]))
			{
				$this->image[$value]=array
				( 
					'crop'		=>	$_wp_additional_image_sizes[$value]['crop'],
					'width'		=>	$_wp_additional_image_sizes[$value]['width'],
					'height'	=>	$_wp_additional_image_sizes[$value]['height']
				);
			}
        }	
	}
	
	/**************************************************************************/
	
	function getImageDimension($id)
	{
		return(array_key_exists($id,$this->image) ? array('width'=>$this->image[$id]['width'],'height'=>$this->image[$id]['height']) : false);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/