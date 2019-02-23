<?php

/******************************************************************************/
/******************************************************************************/

class PBMenuWalker extends Walker_Nav_Menu 
{
	/**************************************************************************/
	
	var $mega_menu_enable=0;
	var $mega_menu_layout=null;
	
	var $mega_menu_layout_column_index=0;
	
	/**************************************************************************/
	
	function start_lvl(&$output,$depth=0,$args=array()) 
	{
		if($this->mega_menu_enable==1)
		{
			if($depth==0)
			{
				$Layout=new PBLayout();
				
				$class=array('sf-mega','pb-layout-responsive-0',$Layout->getLayoutCSSClass($this->mega_menu_layout));
				
				$output.=
				'
					<div'.PBHelper::createClassAttribute($class).'>
				';
			}
			if($depth==1)
			{
				$output.=
				'
					<ul>
				';
			}
		}
		else
		{
			$output.=
			'
				<ul>
			';			
		}
	}

	/**************************************************************************/
	
	function end_lvl(&$output,$depth=0,$args=array()) 
	{
		if($this->mega_menu_enable==1)
		{
			if($depth==0)
			{
				$output.=
				'
					</div>
				';
			}
			if($depth==1)
			{
				$output.=
				'
					</ul>
				';
			}
		}
		else
		{
			$output.=
			'
				</ul>
			';			
		}
	}

	/**************************************************************************/
	
	function start_el(&$output,$object,$depth=0,$args=array(),$current_object_id=0) 
	{	
		$this->iconClass=null;
		
		$Validation=new PBValidation();
		
		if($depth==0)
		{
			$this->icon=$object->icon;
			
			$this->mega_menu_layout_column_index=0;
			
			$this->mega_menu_enable=$object->mega_menu_enable;
			$this->mega_menu_layout=$object->mega_menu_layout;
			
			if($object->icon!='-1')
				$this->iconClass='pb-menu-icon pb-menu-icon-'.PBHelper::createHash($object->icon);
		}
		
		$linkClass=array();
		if($Validation->isNotEmpty($object->target))
			array_push($linkClass,'pb-window-target-blank');

		if($this->mega_menu_enable==1)
		{
			if($depth==0 || $depth==2)
			{
				$output.='<li class="'.join(' ',(array)$object->classes).($depth==0 ? ' sf-mega-enable-1' : null).' '.$this->iconClass.' '.'">';
			}
			if($depth==1)
			{
				$Layout=new PBLayout();
				
				$class=array('sf-mega-section','pb-layout-'.$Layout->getLayoutColumnCSSClass($this->mega_menu_layout,$this->mega_menu_layout_column_index));
				
				$output.=
				'
					<div'.PBHelper::createClassAttribute($class).'>
				';
				
				$this->mega_menu_layout_column_index++;
			}	
			
			if($depth==1)
			{
				$output.=
				'
					<span class="sf-mega-header">'.esc_html($object->title).'</span>
				';				
			}
			else
			{
				$output.=
				'
					<a href="'.esc_attr($object->url).'"'.PBHelper::createClassAttribute($linkClass).'><span></span>'.$object->title.'</a>
				';
			}
		}
		else
		{
			$output.=
			'
				<li class="'.join(' ',(array)$object->classes).($depth==0 ? ' sf-mega-enable-0' : null).' '.$this->iconClass.' '.'">
					<a href="'.esc_attr($object->url).'"'.PBHelper::createClassAttribute($linkClass).'><span></span>'.$object->title.'</a>
			';
		}
	}

	/**************************************************************************/
	
	function end_el(&$output,$object,$depth=0,$args=array())
	{
		if($this->mega_menu_enable==1)
		{
			if($depth==0 || $depth==2)
			{
				$output.=
				'
					</li>
				';
			}
			if($depth==1)
			{
				$output.=
				'
					</div>
				';
			}
		}
		else
		{
			$output.=
			'
				</li>
			';			
		}
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/