<?php

/******************************************************************************/
/******************************************************************************/

class PBPost
{
	/**************************************************************************/

	function __construct() 
	{ 
		$this->postStatus=array
		(
			'auto-draft'														=>	array(__('Auto draft',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'draft'																=>	array(__('Draft',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'future'															=>	array(__('Future',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'inherit'															=>	array(__('Inherit',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'pending'															=>	array(__('Pending',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'private'															=>	array(__('Private',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'publish'															=>	array(__('Publish',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'trash'																=>	array(__('Trash',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$this->sortColumn=array
		(
			'author'															=>	array(__('Author',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'date'																=>	array(__('Date creation',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'modified'															=>	array(__('Date of modification',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'ID'																=>	array(__('ID',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'menu_order'														=>	array(__('Menu order',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'name'																=>	array(__('Slug',PLUGIN_PAGE_BUILDER_DOMAIN)),
			'title'																=>	array(__('Title',PLUGIN_PAGE_BUILDER_DOMAIN))
		);
		
		$postType=get_post_types(array(),'objects');
		
		$this->postType=array();
		foreach($postType as $value)
			$this->postType[$value->name]=$value->labels->name;	
	}

	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/