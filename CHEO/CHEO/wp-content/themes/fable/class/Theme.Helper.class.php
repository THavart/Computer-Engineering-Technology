<?php

/******************************************************************************/
/******************************************************************************/

class ThemeHelper
{
	/**************************************************************************/

	static function esc_html($text)
	{
		return(esc_html($text));
	}
	
	/**************************************************************************/

	static function esc_attr($text)
	{
		return(esc_attr($text));
	}
	
	/**************************************************************************/
	
	static function checkSavePost($post_id,$name,$action=null)
	{
		if((defined('DOING_AUTOSAVE')) && (DOING_AUTOSAVE)) return(false);

		if(!array_key_exists($name,$_POST)) return(false);
		
		if(!wp_verify_nonce($_POST[$name],$action)) return(false);

		unset($_POST[$name]);
		
		if(!current_user_can('edit_post',$post_id)) return(false);
		
		return(true);
	}
	
	/**************************************************************************/

	static function createId($prefix=null)
	{
		return((is_null($prefix) ? null : $prefix.'_').strtoupper(md5(microtime().rand())));
	}
	
	/**************************************************************************/
	
	static function createHash($value)
	{
		return(strtoupper(md5($value)));
	}
	
	/**************************************************************************/
	
	static function getPostOption($prefix=null)
	{
		if(!is_null($prefix)) $prefix='_'.$prefix.'_';
		
		$option=array();
		foreach($_POST as $key=>$value)
		{
			if(preg_match('/^'.THEME_OPTION_PREFIX.$prefix.'/',$key,$result)) 
			{
				$index=preg_replace('/^'.THEME_OPTION_PREFIX.'_/','',$key);
				$option[$index]=$value;
			}
		}	
		
		$option=ThemeHelper::stripslashesPOST($option);
		
		return($option);
	}

	/**************************************************************************/
	
	static function setDefaultOption(&$option,$index,$value)
	{
		if(array_key_exists($index,(array)$option)) return;
		$option[$index]=$value;
	}
	
	/**************************************************************************/
	
	static function stripslashesPOST($value)
	{
		return(stripslashes_deep($value));
	}

	/**************************************************************************/
	
	static function formatCode($value)
	{
		return($value);
	}
	
	/**************************************************************************/
	
	static function getFormName($name,$display=true)
	{
		if(!$display) return(THEME_OPTION_PREFIX.'_'.$name);
		echo THEME_OPTION_PREFIX.'_'.$name;
	}
	
	/**************************************************************************/
	
	static function displayIf($value,$testValue,$text,$display=true)
	{
		if(is_array($value))
		{
			foreach($value as $v)
			{
				if(strcmp($v,$testValue)==0) 
				{
					if($display) echo $text;
					else return($text);
					return;
				}	
			}
		}
		else 
		{
			if(strcmp($value,$testValue)==0) 
			{
				if($display) echo $text;
				else return($text);
			}
		}
	}
	
	/**************************************************************************/
	
	static function disabledIf($value,$testValue,$display=true)
	{
		return(ThemeHelper::displayIf($value,$testValue,' disabled ',$display));
	}
	
	/**************************************************************************/

	static function checkedIf($value,$testValue=1,$display=true)
	{
		return(ThemeHelper::displayIf($value,$testValue,' checked ',$display));
	}
	
	/**************************************************************************/
	
	static function selectedIf($value,$testValue=1,$display=true)
	{
		return(ThemeHelper::displayIf($value,$testValue,' selected ',$display));
	}
		
	/**************************************************************************/
	
	static function removeUIndex(&$data)
	{
		$argument=array_slice(func_get_args(),1);
		
		$data=(array)$data;
		
		foreach($argument as $index)
		{
			if(!is_array($index))
			{
				if(!array_key_exists($index,$data))
					$data[$index]='';
			}
			else
			{
				if(!array_key_exists($index[0],$data))
					$data[$index[0]]=$index[1];				
			}
		}
	}
	
	/**************************************************************************/
	
	static function addProtocolName($value,$protocol='http://')
	{
		if(!preg_match('/^'.preg_quote($protocol,'/').'/',$value)) return($protocol.$value);
		return($value);
	}
	
	/**************************************************************************/
	
	static function getPageNumber()
	{
		$page=1;
		
		if(get_query_var('paged')) $page=get_query_var('paged');
		elseif (get_query_var('page')) $page=get_query_var('page');

		return($page);
	}
	
	/**************************************************************************/

	static function limitChar($text,$limit)
	{
		return(mb_substr($text,0,$limit,'UTF-8'));
	}
	
	/**************************************************************************/
	
	static function limitWord($text,$limit)
	{
		$words=explode(' ',$text,($limit+1));
		if(count($words)>$limit) array_pop($words);
		return implode(' ',$words);
	}
	
	/**************************************************************************/
	
	static function escapeShortcodeAttr($value)
	{
		return(esc_attr($value));
	}
	
	/**************************************************************************/
	
	static function createTermDictionary($term,$arg=array(),$data=array(),$element=array(),$key='slug')
	{
		$dictionary=array();

		$default=array
		(
			'hide_empty'	=>	false
		);
		
		$argument=array_merge($default,$arg);
		$result=get_terms(array($term),$argument);	
		
		if(in_array('useNone',$element)) $dictionary[-1]=__('[None]',THEME_DOMAIN);
		if(in_array('useSelect',$element)) $dictionary[-1]=__('[Select]',THEME_DOMAIN);
		if(in_array('useDefault',$element)) $dictionary[-1]=__('[Use default settings]',THEME_DOMAIN);
		
		if($result)
		{		
			if(is_array($result))
			{
				foreach($result as $post)
				{
					if($key=='id') $dictionary[$post->term_id]=$post->name;
					if($key=='slug') $dictionary[$post->slug]=$post->name;
				}
			}
		}
			
		return($dictionary);		
	}
	
	/**************************************************************************/
	
	static function createDictionary($arg,$data=array(),$element=array())
	{
		$data=(array)$data;
		
		$default=array
		(
			'posts_per_page'	=>	-1,
			'orderby'			=>	'title',
			'order'				=>	'asc'
		);
		
		$argument=array_merge($default,$arg);
		
		$dictionary=array();
		
		$result=new WP_Query($argument);	
		
		if(in_array('useNone',$element)) $dictionary[-1]=__('[None]',THEME_DOMAIN);
		if(in_array('useSelect',$element)) $dictionary[-1]=__('[Select]',THEME_DOMAIN);
		if(in_array('useDefault',$element)) $dictionary[-1]=__('[Use default settings]',THEME_DOMAIN);
		
		if(count($result->posts))
		{			
			foreach($result->posts as $post)
				$dictionary[$post->ID]=$post->post_title;
		}
			
		return($dictionary);		
	}
	
	/**************************************************************************/
	
	static function createClassAttribute($class)
	{
		$Validation=new ThemeValidation();
		
		$class=trim(implode(' ',$class));
		
		return($Validation->isEmpty($class) ? null : ' class="'.$class.'"');
	}
	
	/**************************************************************************/
	
	static function createStyleAttribute($style)
	{
		$ret=null;
		$Validation=new ThemeValidation();
		
		foreach($style as $index=>$value)
		{
			if($Validation->isEmpty($value)) continue;
			$ret.=$index.':'.$value.';';
		}
		
		return($Validation->isEmpty($ret) ? null : ' style="'.$ret.'"');
	}
	
	/**************************************************************************/
	
	static function closeMetaBox($classes)
	{
		array_push($classes,'closed');
		return($classes);
	}
	
	/**************************************************************************/
	
	static function getVisitorIP()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		
		$ip=$_SERVER['REMOTE_ADDR'];
		
		return($ip);		
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/