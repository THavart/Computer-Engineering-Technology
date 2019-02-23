<?php

/******************************************************************************/
/******************************************************************************/

class ThemeGoogleFont
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/

	function scheduleDownload()
	{
		$cTime=time();
		$oTime=(int)ThemeOption::getOption('font_google_time');

		if($cTime-$oTime>(THEME_GOOGLE_FONT_REFRESH_INTERVAL)) $this->download();
	}
	
	/**************************************************************************/		

	function download()
	{
		$response=wp_remote_get('http://quanticalabs.com/.tools/GoogleFont/font.txt',array('sslverify'=>false));
		
		ThemeOption::updateOption(array('font_google_time'=>time()));
		
		if(!$this->checkResponse($response)) return(false);
		
		update_option(THEME_OPTION_PREFIX_FONT,$response['body']);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function checkResponse($response)
	{
		if(is_wp_error($response)) return(false);
		
		if(!array_key_exists('body',$response)) return(false);
		
		$response=json_decode($response['body']);
		if(is_null($response)) return(false);
		
		return(true);
	}
	
	/**************************************************************************/
	
	function unpack()
	{
		$data=array();
		$font=json_decode(get_option(THEME_OPTION_PREFIX_FONT));

		foreach((array)$font->items as $value)
			$data[$value->family]=array('variant'=>$value->variants,'subset'=>$value->subsets);	

		return($data);
	}
	
	/**************************************************************************/
	
	function import()
	{
		$response=array('global'=>array('error'=>1));
		
		$Notice=new ThemeNotice();
		
		$result=$this->download();
		
		if($result)
		{
			$response['global']['error']=0;
		}
		else
		{
			$Notice->addError(ThemeHelper::getFormName('import_google_font',false),ThemeHelper::esc_html('Cannot import list of fonts'));

			$response['local']=$Notice->getError();
		}
			
		$response['global']['notice']=$Notice->createHTML(THEME_PATH_TEMPLATE.'notice.php');

		echo json_encode($response);
		exit;			
	}

	/**************************************************************************/
	
	function getFontByName()
	{
		$query=$_GET['query'];
		
		$data=array();
		$dictionary=$this->unpack();
		
		foreach($dictionary as $index=>$value)
		{
			if(preg_match('/^'.preg_quote($query,'/').'/i',$index,$result))
			{
				$data[]=array('label'=>$index,'value'=>$index,'variant'=>json_encode($value['variant']));
				if(count($data)==10) break;
			}
		}
		
		echo json_encode($data);
		exit;
	}
	
	/**************************************************************************/
	
	function setToStyle(&$style)
	{
		$Validation=new ThemeValidation();
		
		$download=array();
		$selector=array('base','h1','h2','h3','h4','h5','h6');
	
		$dictionary=$this->unpack();

		foreach($selector as $value)
		{
			$name=ThemeOption::getOption('font_'.$value.'_family_google');
			
			if(($Validation->isNotEmpty($name)) && (!in_array($name,$download)))
			{
				if(!isset($dictionary[$name])) continue;
				
				$subset=join(',',(array)$dictionary[$name]['subset']);
				$variant=join(',',(array)$dictionary[$name]['variant']);
				
				$download[]=$name;
				$style['google-font-'.preg_replace('/ /','-',strtolower($name))]=array
				(
					'use'				=>	2,
					'inc'				=>	true,
					'path'				=>	null,
					'file'				=>	'//fonts.googleapis.com/css?family='.urlencode($name).':'.$variant.'&subset='.$subset,
					'dependencies'		=>	array()
				);
			}
		}	
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/