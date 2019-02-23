<?php

/******************************************************************************/
/******************************************************************************/

class PBHelper
{
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
	
	static function extractDictionary($data,$labelIndex=0)
	{
		$dictionary=array();
		
		if(is_array($dictionary))
		{
			foreach($data as $index=>$value)
			{
				if(is_array($value))
				{
					if(array_key_exists($labelIndex,$value))
						$dictionary[$index]=$value[$labelIndex];
				}
				else $dictionary[$index]=$value;
			}
		}
		
		return($dictionary);
	}
	
	/**************************************************************************/
	
	static function isArray($array,$key,$index=0)
	{
		if($index>=count($key)) return(true);
		
		if(array_key_exists($key[$index],$array))
			return(PBHelper::isArray($array[$key[$index]],$key,++$index));
		
		return(false);
	}
	
	/**************************************************************************/
	
	static function returnIf($value,$testValue,$text='checked')
	{
		if(is_array($value))
		{
			foreach($value as $v)
			{
				if(strcmp($v,$testValue)==0) return($text);
			}
		}
		else 
		{
			if(strcmp($value,$testValue)==0) return($text);
		}
	}
	
	/**************************************************************************/
	
	static function createClassAttribute($class)
	{
		$Validation=new PBValidation();
		
		$class=trim(implode(' ',$class));
		
		return($Validation->isEmpty($class) ? null : ' class="'.$class.'"');
	}
	
	/**************************************************************************/
	
	static function createStyleAttribute($style)
	{
		$ret=null;
		$Validation=new PBValidation();
		
		foreach($style as $index=>$value)
		{
			if($Validation->isEmpty($value)) continue;
			$ret.=$index.':'.$value.';';
		}
		
		return($Validation->isEmpty($ret) ? null : ' style="'.$ret.'"');
	}
	
	/**************************************************************************/
	
	static function createHash($value)
	{
		return(strtoupper(md5($value)));
	}
	
	/**************************************************************************/
	
	static function createId($prefix=null)
	{
		return((is_null($prefix) ? null : $prefix.'_').strtoupper(md5(microtime().rand())));
	}
	
	/**************************************************************************/
	
	static function linkify($text)
    {
		$text=preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is","$1$2<a href=\"$3\" >$3</a>",$text);  
		$text=preg_replace("/(^|[\n ])([\w]*?)((www)\.[^ \,\"\t\n\r<]*)/is","$1$2<a href=\"http://$3\" >$3</a>",$text);
		$text=preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is","$1$2<a href=\"ftp://$3\" >$3</a>",$text);  
        $text=preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i","$1<a href=\"mailto:$2@$3\">$2@$3</a>",$text);  
        return($text);  
    }
	
	/**************************************************************************/
	
	static function getValueFromArray($array,$key)
	{
		$data=array();
		foreach($key as $value)
			$data[$value]=$array[$value];
		
		return($data);
	}
			
	/**************************************************************************/
	
	static function getTerm($term,$argument=array())
	{
		$data=get_terms(array($term),$argument);
		
		if(is_wp_error($data)) return(array());

		$result=array();
		foreach($data as $value)
			$result[$value->slug]=$value->name;

		return($result);
	}
	
	/**************************************************************************/
	
	static function setDeafultOption(&$option,$index,$value)
	{
		if(array_key_exists($index,(array)$option)) return;
		$option[$index]=$value;
	}
	
	/**************************************************************************/
	
	static function getFormName($name,$display=true)
	{
		if(!$display) return(PLUGIN_PAGE_BUILDER_CONTEXT.'_'.$name);
		echo PLUGIN_PAGE_BUILDER_CONTEXT.'_'.$name;
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
	
	static function getPOSTOption($prefix=null)
	{
		if(!is_null($prefix)) $prefix='_'.$prefix.'_';
		
		$option=array();
		foreach($_POST as $key=>$value)
		{
			if(preg_match('/^'.PLUGIN_PAGE_BUILDER_CONTEXT.$prefix.'/',$key,$result)) 
			{
				$index=preg_replace('/^'.PLUGIN_PAGE_BUILDER_CONTEXT.'_/','',$key);
				$option[$index]=$value;
			}
		}	
		
		$option=PBHelper::stripslashesPOST($option);
		
		return($option);
	}
	
	/**************************************************************************/
	
	static function formatCode($value)
	{
		return($value);
	}
	
	/**************************************************************************/
	
	static function formatHTML($html)
	{
		$html=preg_replace('/\t/','',$html);
		$html=preg_replace('~[\r\n\r\n]+~','',$html);
	
		$argumentCount=func_num_args();
		if($argumentCount>1)
		{
			$count=1;
			$argument=func_get_args();
			for($i=1;$i<$argumentCount;$i++)
				$html=str_replace(PLUGIN_PAGE_BUILDER_SHORTCODE_CONTENT_ESCAPE,$argument[$i],$html,$count);
		}
		
		return($html);	
	}
	
	/**************************************************************************/
	
	static function formatContent($content,$do_shortcode=true,$shortcode_unautop=true,$the_content=true)
	{
		if($the_content) 
			$content=apply_filters('the_content',$content);
		if($shortcode_unautop)
			$content=shortcode_unautop($content);
		if($do_shortcode) 
			$content=do_shortcode($content);
		
		return($content);
	}
	
	/**************************************************************************/
	
	static function stripslashesPOST($value)
	{
		return(stripslashes_deep($value));
	}
	
	/**************************************************************************/
	
	static function isNumericArray($array)
	{
		if(!is_array($array)) return(false);
		return(array_values($array)===$array);
	}
	
	/**************************************************************************/
	
	static function ajaxResponse($response)
	{
        $json=json_encode($response);
		$buffer=ob_get_clean();
		if(ob_get_contents()) ob_end_clean();
		
		echo $json;
		if($response['debug']==1) echo "\n\n".$buffer;
        exit;
	}
	
	/**************************************************************************/
	
	static function orderArrayByElement($source,$orderIndex)
	{
		$target=array(array(),array());
		
		foreach($source as $value)
		{
			$order=(int)$value[$orderIndex];
			
			if($order<=0) array_push($target[1],$value);
			else 
			{
				if(isset($target[0][$order])) array_push($target[0],$value);
				else $target[0][$order]=$value;
			}
		}
		
		ksort($target[0]);
	
		return($target[0]+$target[1]);
	}
	
	/**************************************************************************/
	
	static function formatNewLine(&$value)
	{
		array_walk_recursive($value,array('PBHelper','replaceNewLine'));
	}
	
	/**************************************************************************/
	
	static function replaceNewLine(&$item,$key)
	{
		$item=str_replace("\r","",$item);
	}
	
	/**************************************************************************/
	
	static function unsetComponentElementById(&$element,$id)
	{
		foreach($element as $elementIndex=>$elementData)
		{
			if(in_array($elementData['id'],$id))
				unset($element[$elementIndex]);
		}
		
		$element=array_values($element);
	}
	
	/**************************************************************************/
	
	static function isComponent($name)
	{
		return(class_exists('PBComponent'.ucfirst($name)));
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/