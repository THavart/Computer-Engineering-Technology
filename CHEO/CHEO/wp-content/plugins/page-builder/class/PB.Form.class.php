<?php

/******************************************************************************/
/******************************************************************************/

class PBForm
{
	/**************************************************************************/
	
	function __construct($componentId,$componentData,$componentValue)
	{
		$this->componentId=$componentId;
		$this->componentData=$componentData;
		$this->componentValue=$componentValue;
		
		$this->multiFieldIndex=array();
	}
	
	/**************************************************************************/
	
	function create()
	{
		$html=null;
		
		$element=array();
		$panelHTML=array();
		
		$Validation=new PBValidation();
		
		foreach($this->componentData['structure']['element'] as $elementData)
		{
			$panelId=$elementData['ui']['panel'];
			$multiId=$elementData['ui']['multi'];
			$groupId=$elementData['ui']['group'];
			$element[$panelId][$multiId][$groupId][]=$elementData;
		}

		foreach($element as $panelId=>$panelData)
		{
			foreach($panelData as $multiId=>$multiData)
			{
				if($multiId!=0)
				{
					if(!isset($panelHTML[$panelId])) $panelHTML[$panelId]=null;
					
					$elementMultiId=array();
					foreach($multiData as $groupData)
					{
						foreach($groupData as $elementData)
							$elementMultiId[$elementData['id']]=$elementData['id'];
					}
	
					$count=1;
					foreach($elementMultiId as $elementMultiIdId)
					{
						if(array_key_exists($elementMultiIdId,$this->componentValue))
							$count=count($this->componentValue[$elementMultiIdId])>$count ? count($this->componentValue[$elementMultiIdId]) : $count;
					}
					
					for($j=0;$j<$count;$j++)
					{
						$elementHTML=null;
						
						$i=0;
						$fieldCount=0;
						
						foreach($multiData as $groupId=>$groupData)
						{
							foreach($groupData as $elementData)
							{
								if($this->displayField($elementData['visibility']))
								{
									if($groupId==0)
										$fieldCount+=count($groupData);
									else $fieldCount++;
							
									break;
								}
							}
						}
						
						foreach($multiData as $groupId=>$groupData)
						{
							if($groupId!=0)
							{
								$html=null;

								foreach($groupData as $elementData)
								{
									if(!$this->displayField($elementData['visibility'])) continue;
									
									$id=$elementData['id'];
									$this->setComponentValueMultiField($elementData,$j);
									
									$html.=
									'
										<div>
											'.$this->createFieldLegend($elementData['ui']['text']['label']).'
											'.$this->createField($elementData,$this->componentValue[$id][$j]).'
										</div>
									';	
								}	

								PBHelper::removeUIndex($this->componentData['structure']['ui']['group'][$groupId],'header','subheader');

								if($Validation->isNotEmpty($html))
								{
									$i++;
									
									$elementHTML.=
									'
										<li>
											'.$this->createGroupHeader($this->componentData['structure']['ui']['group'][$groupId]['header']).'
											'.$this->createGroupSubheader($this->componentData['structure']['ui']['group'][$groupId]['header'],$this->componentData['structure']['ui']['group'][$groupId]['subheader']).'
											'.$html.'
											'.(($i==$fieldCount) ? '<a href="#" class="pb-link-remove">'.__('Remove',PLUGIN_PAGE_BUILDER_DOMAIN).'</a>' : null).'
										</li>
									';	
								}
							}
							else
							{
								foreach($groupData as $elementData)
								{
									if(!$this->displayField($elementData['visibility'])) continue;

									$i++;
									
									$id=$elementData['id'];
									$this->setComponentValueMultiField($elementData,$j);
									
									PBHelper::removeUIndex($this->componentValue[$id],$j);

									$elementHTML.=
									'
										<li>
											'.$this->createGroupHeader($elementData['ui']['text']['header']).'
											'.$this->createGroupSubheader($elementData['ui']['text']['header'],$elementData['ui']['text']['subheader']).'
											<div>
												'.$this->createFieldLegend($elementData['ui']['text']['label']).'
												'.$this->createField($elementData,$this->componentValue[$id][$j]).'
											</div>
											'.(($i==$fieldCount) ? '<a href="#" class="pb-link-remove">'.__('Remove',PLUGIN_PAGE_BUILDER_DOMAIN).'</a>' : null).'
										</li>
									';	
								}		
							}
						}
		
						if($Validation->isNotEmpty($elementHTML))
						{
							$panelHTML[$panelId].=
							'
								<div>
									<h3>'.$this->componentData['structure']['ui']['multi'][$multiId]['header'].'</h3>
									<ul class="pb-field-list">	
										'.$elementHTML.'
									</ul>
								</div>
							';
						}	
					}
					
					if($Validation->isNotEmpty($panelHTML[$panelId]))
					{					
						$panelHTML[$panelId]=
						'
							<li>
								<div class="pb-multi-field pb-accordion">
									'.$panelHTML[$panelId].'
								</div>
								<a href="#" class="pb-link-add">'.__('Add new',PLUGIN_PAGE_BUILDER_DOMAIN).'</a>
							</li>
						';
					}
				}
				else
				{
					foreach($multiData as $groupId=>$groupData)
					{
						if(!isset($panelHTML[$panelId])) $panelHTML[$panelId]=null;

						if($groupId!=0)
						{
							$elementHTML=null;

							foreach($groupData as $elementData)
							{
								if(!$this->displayField($elementData['visibility'])) continue;
								
								$id=$elementData['id'];
								
								$this->setComponentValue($elementData);

								$elementHTML.=
								'
									<div>
										'.$this->createFieldLegend($elementData['ui']['text']['label']).'
										'.$this->createField($elementData,$this->componentValue[$id]).'
									</div>
								';	
							}	

							PBHelper::removeUIndex($this->componentData['structure']['ui']['group'][$groupId],'header','subheader');

							if($Validation->isNotEmpty($elementHTML))
							{
								$panelHTML[$panelId].=
								'
									<li>
										'.$this->createGroupHeader($this->componentData['structure']['ui']['group'][$groupId]['header']).'
										'.$this->createGroupSubheader($this->componentData['structure']['ui']['group'][$groupId]['header'],$this->componentData['structure']['ui']['group'][$groupId]['subheader']).'
										'.$elementHTML.'
									</li>
								';	
							}
						}
						else
						{
							foreach($groupData as $elementData)
							{
								if(!$this->displayField($elementData['visibility'])) continue;
								
								$id=$elementData['id'];
								
								$this->setComponentValue($elementData);
								
								$panelHTML[$panelId].=
								'
									<li>
										'.$this->createGroupHeader($elementData['ui']['text']['header']).'
										'.$this->createGroupSubheader($elementData['ui']['text']['header'],$elementData['ui']['text']['subheader']).'
										<div>
											'.$this->createFieldLegend($elementData['ui']['text']['label']).'
											'.$this->createField($elementData,$this->componentValue[$id]).'
										</div>
									</li>
								';	
							}							
						}
					}
				}
			}
		}
		
		if(PBHelper::isArray($this->componentData['structure'],array('ui','panel')))
		{
			$tabBar=null;
			$tabContent=null;
			
			foreach($panelHTML as $index=>$value)
			{
				$tabBar.=
				'
					<li>
						<a href="#tab-'.$index.'">'.$this->componentData['structure']['ui']['panel'][$index]['header'].'</a>
					</li>
				';
					
				$tabContent.=
				'
					<div id="tab-'.$index.'">
						<div>
							<ul class="pb-reset-list pb-field-list">
								'.$value.'
							</ul>
						</div>
					</div>
				';
			}
			
			$html=
			'
				<div class="pb-tab">
				
					<ul>
						'.$tabBar.'
					</ul>
					
					'.$tabContent.'

				</div>
			';
		}
		else 
		{
			$html=
			'
				<ul class="pb-reset-list pb-field-list">
					'.$panelHTML[0].'
				</ul>
			';
		}
			
		$html=
		'
			<div class="pb">
				<form name="pb-component-edit-form" id="pb-component-edit-form" action="">
					'.$html.'
				</form>
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function setComponentValue($elementData)
	{
		$id=$elementData['id'];
		
		if(!array_key_exists($id,$this->componentValue))
		{
			if(array_key_exists('element',$elementData['ui']))
			{
				if(array_key_exists('value',$elementData['ui']['element']))
					$this->componentValue[$id]=$elementData['ui']['element']['value'];
			}
		}	
		
		PBHelper::removeUIndex($this->componentValue,$id);
	}
	
	/**************************************************************************/
	
	function setComponentValueMultiField($elementData,$index)
	{
		$id=$elementData['id'];
		
		if(!array_key_exists($id,$this->componentValue))
			$this->componentValue[$id]=array();
		
		if(!is_array($this->componentValue[$id]))
			$this->componentValue[$id]=array();		
		
		if(!array_key_exists($index,$this->componentValue[$id]))
		{
			if(array_key_exists('element',$elementData['ui']))
			{
				if(array_key_exists('value',$elementData['ui']['element']))
					$this->componentValue[$id][$index]=$elementData['ui']['element']['value'];
			}
		}	
		
		PBHelper::removeUIndex($this->componentValue[$id],$index);
	}	

	/**************************************************************************/
	
	function createFieldName($data)
	{
		$suffix=null;
		
		if($data['ui']['multi'])
		{
			switch($data['ui']['element']['type'])
			{
				case 'term':
				case 'radio':
				case 'choice-1':
				case 'choice-2':
				case 'checkbox':
				case 'image-size':
					
					if(!array_key_exists($data['id'],$this->multiFieldIndex))
						$this->multiFieldIndex[$data['id']]=0;
					else $this->multiFieldIndex[$data['id']]++;
					
					$suffix='['.$this->multiFieldIndex[$data['id']].']';
					
				break;
				
				default:
					
					$suffix='[]';
			}
		}
		else
		{
			switch($data['ui']['element']['type'])
			{
				case 'term':
				case 'checkbox':
					
					$suffix='[]';
					
				break;
			}			
			
		}
		
		return($data['id'].$suffix);
	}
	/**************************************************************************/
	
	function createField($data,$value)
	{
		$html=null;
		$name=$this->createFieldName($data);
		
		switch($data['ui']['element']['type'])
		{
			case 'choice-1':
				$data['ui']['element']['dictionary']['source']=array(1=>__('Yes',PLUGIN_PAGE_BUILDER_DOMAIN),0=>__('No',PLUGIN_PAGE_BUILDER_DOMAIN));
			break;
			case 'choice-2':	
				$data['ui']['element']['dictionary']['source']=array(1=>__('Enable',PLUGIN_PAGE_BUILDER_DOMAIN),0=>__('Disable',PLUGIN_PAGE_BUILDER_DOMAIN));
			break;
		}
		
		if($data['ui']['element']['dictionary']['use_default'])
		{
			switch($data['ui']['element']['type'])
			{
				case 'term':
				case 'radio':
				case 'choice-1':
				case 'choice-2':
				case 'checkbox':
				case 'select-one':
				case 'image-size':
					
					$data['ui']['element']['dictionary']['source']=array(-1=>__('- Use default -',PLUGIN_PAGE_BUILDER_DOMAIN))+$data['ui']['element']['dictionary']['source'];
					
				break;
			}
		}
		
		$data['ui']['element']['value']=$value;
		
		switch($data['ui']['element']['type'])
		{
			case 'text'	:
				
				$html=$this->createFieldTypeText($name,$data);
				
			break;
		
			case 'textarea':
				
				$html=$this->createFieldTypeTextarea($name,$data);
			
			break;
		
			case 'select-one':
				
				$html=$this->createFieldTypeSelect($name,$data);
			
			break;
		
			case 'radio':
				
				$html=$this->createFieldTypeRadio($name,$data);
			
			break;
				
			case 'checkbox':
				
				$html=$this->createFieldTypeCheckbox($name,$data);
				
			break;
		
			case 'choice-1':
				
				$html=$this->createFieldTypeRadio($name,$data);
				
			break;
		
			case 'choice-2':
				
				$html=$this->createFieldTypeRadio($name,$data);
				
			break;
		
			case 'color-picker':

				$data['ui']['element']['attribute']['class']='pb-color-picker';
				$data['ui']['element']['attribute']['maxlength']=11;
				
				$html=$this->createFieldTypeText($name,$data);
				
			break;
		
			case 'fa-icon':
				
				$data['ui']['element']['attribute']['class']='pb-fa-icon';
				
				$html=$this->createFieldTypeText($name,$data);
				
			break;
		
			case 'slider':
				
				$html=$this->createSlider($name,$data);
				
			break;
		
			case 'editor':

				$html=$this->createEditor($name,$data);
			
			break;
		
			case 'select-image':
				
				$data['ui']['element']['attribute']['class']='pb-select-field';
				$html=$this->createSelectImage($name,$data);
			
			break;
		
			case 'select-gallery':
				
				$html=$this->createSelectGallery($name,$data);
				
			break;
		
			case 'select-file':
				
				$data['ui']['element']['attribute']['class']='pb-select-field';
				$html=$this->createSelectFile($name,$data);
				
			break;
		
			case 'image-size':
				
				$html=$this->createImageSize($name,$data);
				
			break;
		
			case 'term':
				
				$html=$this->createTerm($name,$data);
				
			break;
		
		}
		
		return('<div class="pb-clear-fix">'.$html.'</div>');
	}
	
	/**************************************************************************/
	
	function createTerm($name,$data)
	{
		$data['ui']['element']['dictionary']['source']+=PBHelper::getTerm($data['ui']['element']['dictionary']['term']);
		return($this->createFieldTypeCheckbox($name,$data));
	}		
	
	/**************************************************************************/
	
	function createImageSize($name,$data)
	{
		global $_wp_additional_image_sizes;
		
		$image=get_intermediate_image_sizes();
		
		foreach($image as $value)
		{
			if(in_array($value,array('thumbnail','medium','large','medium_large'))) continue;
			$data['ui']['element']['dictionary']['source'][$value]=$_wp_additional_image_sizes[$value]['width'].'x'.$_wp_additional_image_sizes[$value]['height'];
		}
		
		return($this->createFieldTypeRadio($name,$data));
	}
	
	/**************************************************************************/
	
	function createSelectGallery($name,$data)
	{
		$html=
		'
			<input type="button" value="'.__('Build gallery',PLUGIN_PAGE_BUILDER_DOMAIN).'" class="pb-select-button pb-select-gallery"/>
			<input type="hidden" value="'.esc_attr($data['ui']['element']['value']).'" name="'.$name.'"'.$this->createHTMLAttributes($data['ui']['element']['attribute']).'/>
		';
		
		return($html);
	}
	
	/**************************************************************************/	
	
	function createSelectImage($name,$data)
	{
		$html=
		'
			<input type="text" value="'.esc_attr($data['ui']['element']['value']).'" name="'.$name.'"'.$this->createHTMLAttributes($data['ui']['element']['attribute']).'/>
			<input type="button" value="'.__('Browse',PLUGIN_PAGE_BUILDER_DOMAIN).'" class="pb-select-button pb-select-image"/>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createSelectFile($name,$data)
	{
		$html=
		'
			<input type="text" value="'.esc_attr($data['ui']['element']['value']).'" name="'.$name.'"'.$this->createHTMLAttributes($data['ui']['element']['attribute']).'/>
			<input type="button" value="'.__('Browse',PLUGIN_PAGE_BUILDER_DOMAIN).'" class="pb-select-button pb-select-file"/>
		';
		
		return($html);		
	}
	
	/**************************************************************************/
	
	function createEditor($name,$data)
	{
        ob_start();
		echo media_buttons($name);
        $output=ob_get_contents();
		ob_end_clean();	
		
		$data['ui']['element']['attribute']['class']=' pb-editor';
		return($output.$this->createFieldTypeTextarea($name,$data));
	}
		
	/**************************************************************************/
	
	function createFieldTypeText($name,$data)
	{
		return('<input type="text" value="'.esc_attr($data['ui']['element']['value']).'" name="'.$name.'"'.$this->createHTMLAttributes($data['ui']['element']['attribute']).'/>');
	}

	/**************************************************************************/
	
	function createFieldTypeTextarea($name,$data)
	{
		return('<textarea cols="0" rows="0" name="'.$name.'"'.$this->createHTMLAttributes($data['ui']['element']['attribute']).'>'.esc_html($data['ui']['element']['value']).'</textarea>');
	}
	
	/**************************************************************************/
	
	function createFieldTypeSelect($name,$data)
	{
		$html=null;
		
		foreach($data['ui']['element']['dictionary']['source'] as $index=>$value)
		{
			$html.=
			'
				<option value="'.$index.'" '.PBHelper::returnIf($data['ui']['element']['value'],$index,'selected').'>'.$value.'</option>
			';
		}
		
		$data['ui']['element']['attribute']['id']=PBHelper::createId($name);
		
		$html=
		'
			<select name="'.$name.'"'.$this->createHTMLAttributes($data['ui']['element']['attribute']).'>
				'.$html.'
			</select>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createFieldTypeRadio($name,$data)
	{
		$i=0;
		$html=null;
		
		foreach($data['ui']['element']['dictionary']['source'] as $index=>$value)
		{
			$id=$name.'_'.(++$i);
			
			$html.=
			'
				<input type="radio" name="'.$name.'" id="'.$id.'" value="'.$index.'" '.PBHelper::returnIf($data['ui']['element']['value'],$index,'checked').$this->createHTMLAttributes($data['ui']['element']['attribute']).'/>
				<label for="'.$id.'">'.$value.'</label>
			';
		}		
				
		$html=
		'
			<div class="pb-radio-button pb-clear-fix">
				'.$html.'
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createFieldTypeCheckbox($name,$data)
	{
		$i=0;
		$html=null;
		
		foreach($data['ui']['element']['dictionary']['source'] as $index=>$value)
		{
			$id=$name.'_'.(++$i);
			
			$html.=
			'
				<input type="checkbox" name="'.$name.'" id="'.$id.'" value="'.$index.'" '.PBHelper::returnIf((array)$data['ui']['element']['value'],$index,'checked').'/>
				<label for="'.$id.'">'.$value.'</label>
			';
		}		
				
		$html=
		'
			<div class="pb-checkbox-button pb-clear-fix">
				'.$html.'
			</div>
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createSlider($name,$data)
	{
		$html=
		'
			<div id="'.$name.'_slider" class="pb-slider"></div>
			<input type="hidden" name="'.$name.'_slider_option" value="'.esc_attr(json_encode($data['ui']['element']['option'])).'"/>
			<input type="text" name="'.$name.'" id="'.$name.'" class="pb-slider-value" value="'.(int)$data['ui']['element']['value'].'" readonly />
		';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createHTMLAttributes($attribute)
	{
		if(!is_array($attribute)) return;
		
		$html=null;
		foreach($attribute as $name=>$value)
			$html.=' '.$name.'="'.htmlspecialchars($value).'"';
		
		return($html);
	}
	
	/**************************************************************************/
	
	function createGroupHeader($header)
	{
		return('<h5 class="pb-group-header">'.$header.'</h5>');
	}
	
	/**************************************************************************/
	
	function createGroupSubheader($header,$subheader)
	{
		$html=null;
		$Validation=new PBValidation();
		
		if(is_array($subheader))
		{
			foreach($subheader as $value)
			{
				if(!is_null($html)) $html.='<br/>';
				$html.=$this->addCharToEnd($value);	
			}
		}
		elseif($Validation->isEmpty($subheader))
		{
			if($Validation->isEmpty($header)) return(null);
			$html=$this->addCharToEnd($header);
		}
		else $html=$this->addCharToEnd($subheader);
		
		return('<span class="pb-group-subheader">'.$html.'</span>');
	}
	
	/**************************************************************************/
	
	function createFieldLegend($legend)
	{
		$Validation=new PBValidation();
		if($Validation->isEmpty($legend)) return(null);
		
		return('<span class="pb-field-legend">'.$this->addCharToEnd($legend,':').'</span>');
	}
	
	/**************************************************************************/
	
	function addCharToEnd($text,$char='.')
	{
		if(substr($text,-1,1)!=$char) $text.=$char;
		return($text);
	}
	
	/**************************************************************************/
	
	function displayField($visibility)
	{
		if($visibility==3) return(true);
		
		$source=1;
		
		if(array_key_exists('source',$_POST))
		{
			if(in_array($_POST['source'],array(1,2)))
				$source=$_POST['source'];
		}
		
		if($visibility==$source) return(true);
		
		return(false);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/