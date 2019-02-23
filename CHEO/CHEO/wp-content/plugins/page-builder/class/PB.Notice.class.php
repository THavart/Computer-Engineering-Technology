<?php

/******************************************************************************/
/******************************************************************************/

class PBNotice
{
	/**************************************************************************/

	function __construct()
	{
		$this->error=array();
	}

	/**************************************************************************/

	function addError($fieldName,$errorMessage)
	{
		$this->error[]=array($fieldName,$errorMessage);
	}

	/**************************************************************************/

	function getError()
	{
		return($this->error);
	}

	/**************************************************************************/

	function isError()
	{
		return(count($this->error));
	}
	
	/**************************************************************************/
	
	function createHTML($templatePath)
	{
		$data=array();
		
		$data['type']=$this->isError() ? 'error' : 'success';
		
		if($this->isError())
		{
			$data['title']=esc_html__('Error',PLUGIN_PAGE_BUILDER_DOMAIN);
			$data['subtitle']=esc_html__('Changes can not be saved.',PLUGIN_PAGE_BUILDER_DOMAIN);				
		}
		else
		{
			$data['title']=esc_html__('Success',PLUGIN_PAGE_BUILDER_DOMAIN);
			$data['subtitle']=esc_html__('All changes have been saved.',PLUGIN_PAGE_BUILDER_DOMAIN);			
		}
		
		$Template=new PBTemplate($data,$templatePath);
		return($Template->output());
	}
	
	/**************************************************************************/
	
	function createCustomHTML($templatePath,$type,$title,$subtitle)
	{
		$data=array();
		
		$data['type']=$type;
		$data['title']=$title;
		$data['subtitle']=$subtitle;		
		
		$Template=new PBTemplate($data,$templatePath);
		return($Template->output());		
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/