<?php

/******************************************************************************/
/******************************************************************************/

class PBComponentRedirect extends PBComponent
{
	/**************************************************************************/

	function __construct()
	{
		$this->component=array
		(
			'name'																=>	__('Redirect',PLUGIN_PAGE_BUILDER_DOMAIN),
			'description'														=>	__('Creates Redirect',PLUGIN_PAGE_BUILDER_DOMAIN),
			'structure'															=>	array
			(
				'window'														=>	array
				(
					'title'														=>	__('Redirect',PLUGIN_PAGE_BUILDER_DOMAIN)
				),
				'element'														=>	array
				(
					array
					(
						'id'													=>	'url',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('URL',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('URL of target site',PLUGIN_PAGE_BUILDER_DOMAIN)
							)
						)
					),
					array
					(
						'id'													=>	'post_id',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Post ID',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('ID of the post to which user has to be redirected',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	8
								)
							)
						)
					),
					array
					(
						'id'													=>	'status',
						'ui'													=>	array
						(
							'text'												=>	array
							(
								'header'										=>	__('Status',PLUGIN_PAGE_BUILDER_DOMAIN),
								'subheader'										=>	__('The status code to use',PLUGIN_PAGE_BUILDER_DOMAIN)
							),
							'element'											=>	array
							(
								'attribute'										=>	array
								(
									'maxlength'									=>	3
								)
							)
						),
						'shortcode'												=>	array
						(
							'default'											=>	'302'
						)
					)	
				)
			)
		);		
		
		parent::__construct();
	}
	
	/**************************************************************************/
	
	function processShortcodeRedirect($attribute,$content,$tag)
	{
		$attribute=$this->processAttribute($tag,$attribute);
		
		$Validation=new PBValidation();
		
		if(($Validation->isEmpty($attribute['url'])) && ($Validation->isEmpty($attribute['post_id']))) return;
		
		if($Validation->isEmpty($attribute['url']))
		{	
			if($Validation->isNumber($attribute['post_id'],1,99999999))
				$url=get_permalink($attribute['post_id']);
			else return;
		}
		else $url=$attribute['url'];

		if(ob_get_contents()) ob_clean();
		wp_redirect($url,$attribute['status']);
		ob_end_flush();
		exit;
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/