<?php

/******************************************************************************/
/******************************************************************************/

class PBFile
{
	/**************************************************************************/
	
	static function scanDir($dir)
	{
		if(!is_dir($dir)) return(false);
		
		$file=scandir($dir);
		
		unset($file[0],$file[1]);
		
		return($file);
	}
	
	/**************************************************************************/
	
	static function fileExist($path)
	{
		return(is_file($path) && file_exists($path));
	}
	
	/**************************************************************************/
	
	static function getImage($file)
	{
		$argument=array
		(
			'paged'				=>	1,	
			'post_type'			=>	'attachment',
			'post_status'		=>	'inherit', 
			'posts_per_page'	=>	-1,
			'post_mime_type'	=>	'image',
			'orderby'			=>	'date',
			'order'				=>	'desc'
		);

		if(is_array($file))
		{
			$order=$file;
			if(count($file))
			{
				$argument['paged']=1;
				$argument['post__in']=$file;
				$argument['posts_per_page']=-1;
			}
		}

		$query=new WP_Query($argument);
		if($query===false) return(false);
		
		if(count($order))
		{
			if(count($query->posts))
			{
				$result=$query->posts;
				$query->posts=array();
				
				foreach($order as $value)
				{
					foreach($result as $post)
					{
						if($value==$post->ID)
							$query->posts[]=$post;
					}
				}
			}
		}

		return($query);		
	}
	
	/**************************************************************************/
	
	static function isWPImage($name)
	{
		global $_wp_additional_image_sizes;
		return(array_key_exists($name,$_wp_additional_image_sizes) ? true : false);
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/