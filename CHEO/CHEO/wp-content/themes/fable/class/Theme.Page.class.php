<?php

/******************************************************************************/
/******************************************************************************/

class ThemePage
{
	/**************************************************************************/

	function __construct()
	{

	}
	
	/**************************************************************************/
	
	function adminInitMetaBox()
	{
		add_meta_box('meta_box_page',__('Page options',THEME_DOMAIN),array($this,'adminCreateMetaBoxPage'),'page','normal','low');	
	}
	
	/**************************************************************************/

	function adminCreateMetaBoxPage() 
	{
		global $post;
		
		$data=array();
	
		$data['option']=ThemeOption::getPostMeta($post);
		
		$data['dictionary']['postCategory']=ThemeHelper::createTermDictionary('category',array(),array(),array(),'id');
		
		$this->setPostMetaDefault($data['option'],'all');
		
		ThemeHelper::setDefaultOption($data['option'],'post_category',array());
		
		$Template=new ThemeTemplate($data,THEME_PATH_TEMPLATE.'admin/meta_box_page.php');
		echo $Template->output();	
	}
	
	/**************************************************************************/
	
	function getImageClass($sidebar)
	{
		if($sidebar==0) return('image-1050-770');
		else return('image-690-414');
	}
		
	/**************************************************************************/
	
	function displayHeader($post)
	{
		$html=null;
		
		if(is_home()) return($html);
		
		$option=ThemeOption::getPostMeta($post);
		
		$Validation=new ThemeValidation();
		
		if(ThemeOption::getGlobalOption($post,'header_enable'))
		{
			ThemeHelper::removeUIndex($option,'header_background_color','header_background_image_src','header_background_image_position','header_background_image_size_1','header_background_image_size_2','header_text_color','header_subheader_text_color','header_subheader');
			
			$subheaderHTML=null;
			$style=array(array(),array(),array());
			
			if($Validation->isColor($option['header_background_color']))
				$style[0]['background-color']=ThemeColor::getColor($option['header_background_color']);

			if(!in_array($option['header_background_image_src'],array('-1','none')))
			{
				if($Validation->isNotEmpty($option['header_background_image_src']))
					$style[0]['background-image']='url(\''.$option['header_background_image_src'].'\')';
				elseif($Validation->isNotEmpty(ThemeOption::getGlobalOption(null,'header_background_image_src')))
					$style[0]['background-image']='url(\''.ThemeOption::getGlobalOption(null,'header_background_image_src').'\')';	
			}
			
			if(array_key_exists('background-image',$style[0]))
			{
				$style[0]['background-repeat']=ThemeOption::getGlobalOption($post,'header_background_image_repeat');
				
				if($Validation->isNotEmpty($option['header_background_image_position']))
					$style[0]['background-position']=$option['header_background_image_position'];
				elseif($Validation->isNotEmpty(ThemeOption::getGlobalOption(null,'header_background_image_position')))
					$style[0]['background-position']=ThemeOption::getGlobalOption(null,'header_background_image_position');

				$style[0]['background-size']=ThemeOption::getGlobalOption($post,'header_background_image_size_1');
								
				if(in_array($style[0]['background-size'],array('length','percentage')))
				{
					if($Validation->isNotEmpty($option['header_background_image_size_2']))
						$style[0]['background-size']=$option['header_background_image_size_2'];
					elseif($Validation->isNotEmpty(ThemeOption::getGlobalOption(null,'header_background_image_size_2')))
						$style[0]['background-size']=ThemeOption::getGlobalOption(null,'header_background_image_size_2');					
				}
			}
			
			if($Validation->isColor($option['header_text_color']))
				$style[1]['color']=ThemeColor::getColor($option['header_text_color']);
			if($Validation->isColor($option['header_subheader_text_color']))
				$style[2]['color']=ThemeColor::getColor($option['header_subheader_text_color']);

			if($Validation->isNotEmpty($option['header_subheader']))
				$subheaderHTML='<h6'.ThemeHelper::createStyleAttribute($style[2]).'>'.$option['header_subheader'].'</h6>';
			elseif($post->post_type=='post')
				$subheaderHTML='<h6'.ThemeHelper::createStyleAttribute($style[2]).'>'.get_the_date().'</h6>';

			$html=
			'
				<div class="theme-page-header" '.ThemeHelper::createStyleAttribute($style[0]).'>
					<div class="theme-main">
						<h1 '.ThemeHelper::createStyleAttribute($style[1]).'>'.$post->post_title.'</h1>
						'.$subheaderHTML.'
					</div>
				</div>
			';
		}
		
		return($html);
	}
	
	/**************************************************************************/
	
	function displayTitle($title)
	{
		$Validation=new ThemeValidation();
		
		global $fable_parentPost;
		
		$title=get_bloginfo('name');
		
		if(!$Validation->isEmpty($title)) $title.=' | ';
		$title.=$fable_parentPost->post->post_title;

		return($title);
	}
	
	/**************************************************************************/
	
	function getCurrentTemplate()
	{
		global $fable_parentPost;
		return(basename(get_post_meta($fable_parentPost->post->ID,'_wp_page_template',true)));
	}
	
	/**************************************************************************/
	
	function setPostMetaDefault(&$meta,$part='all')
	{
		if(in_array($part,array('page','all')))
		{
			ThemeHelper::setDefaultOption($meta,'post_category',array());
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/