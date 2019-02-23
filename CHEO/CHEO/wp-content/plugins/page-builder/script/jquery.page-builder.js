/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var $this;
	var $options;
  
 	var $optionDefault=
	{
		init		:	true
	};
  
	/**************************************************************************/
  
	function PageBuilder(component,options) 
	{
		$this=this;
		
		$optionDefault.text=pbText;
		$optionDefault.cssClass=cssClass;
		
		$options=$.extend($optionDefault,options); 
		
		$this.blockRequest=false;
		$this.useBlockRequest=true;
		
		var dialogEditShortcodeId='pb-dialog-edit-shortcode';
		
		if(parseInt($('#'+dialogEditShortcodeId).length)!==1)
			$('body').append($('<div id="'+dialogEditShortcodeId+'"></div>'));
		
		if($options.init) this.init();
	}
	
	/**************************************************************************/
	
	PageBuilder.prototype.setContentCaption=function() 
	{
		var list=$('#pb-content>ul');
		var caption=$('#pb-content-caption');
		
		if(list.children('li').length) caption.hide();
		else caption.show();
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.setColumnCaption=function() 
	{
		$('#pb-content .pb-content-column-box').each(function() 
		{
			var caption=$(this).children('.pb-content-column-box-caption');	
			
			if($(this).children('ul').children('li').length) caption.hide();
			else caption.show(); 
		});
	};
	
	/**************************************************************************/

	PageBuilder.prototype.init=function() 
	{
		/****/
		
		$this.createScrollBar('#pb-tab-layout');
		$this.createScrollBar('#pb-tab-component');

		$('.pb-tab').tabs();
		
		$('.pb.pb-meta-box>.pb-tab').waypoint('sticky',
		{
			wrapper		:	'<div>',
			stuckClass	:	'pb-tab-fixed',
			offset		:	'32px'
		});		
		
		$(window).resize(function() 
		{
			$.waypoints('refresh');
		});
		
		$().windowDimensionListener({'change':function(width,height) 
		{
			if(height) $.waypoints('refresh');
		}});
		
		/****/
		
		$('#pb-content>ul').droppable(
		{
			tolerance			:	'pointer',
			accept				:	'.pb-layout.pb-layout-source,#pb-content>ul>li',
			drop				:	function(event,ui) 
			{	
				$this.dropLayout=$(ui.draggable);
			}
		});
		
		$('#pb-content>ul').sortable(
		{
			delay					:	150,
			revert					:	200,
			helper					:	'original',
			cursor					:	'move',
			opacity					:	0.8, 
			connectWith				:	'#pb-content>ul',
			placeholder				:	'pb-layout-placeholder',
			forceHelperSize			:	false,
			forcePlaceholderSize	:	false,
			tolerance				:	'pointer',
			update					:	function(event,ui)
			{
				var position=$(this).children('li').index($this.dropLayout);
					
				if($this.dropLayout.hasClass('pb-layout-source'))
				{
					var layout=$this.getValueFromClass($this.dropLayout.find('.pb-layout-icon'),'pb-layout-icon-layout-');
					
					$this.dropLayout.attr('class','pb-layout-placeholder');
					$this.dropLayout.children().remove();
					
					$this.dropLayout.append($('<div>'));
					$this.dropLayout.addClass('pb-layout-preloader');
			
					$this.lineAdd({layout:layout,position:position});
				}
				else
				{
					var lineId=ui.item.attr('id');
					position=$('#pb-content>ul>li').index(ui.item);

					$this.lineReorder({'lineId':lineId,'position':position});
				}
			}
		});
		
		$('.pb-layout.pb-layout-source').draggable(
		{
			revert				:	'invalid',
			distance			:	20,
			revertDuration		:	200,
			cursor				:	'move',
			helper				:	'clone',			
			appendTo			:	'#pb-content',
			connectToSortable	:	'#pb-content>ul'
		});
		
		$(document).on('click','.pb-content-line-bar>.pb-content-remove-button',function(e)
		{
			e.preventDefault();
			
			var lineId=$(this).parents('.pb-content-line:first').attr('id');
			
			$('#pb-dialog-line-remove').dialog(
			{
				show			:	200,
				hide			:	100,
				modal			:	true,
				resizable		:	false,
				closeOnEscape	:	true,
				dialogClass		:	'pb pb-dialog pb-dialog-confirm',
				minWidth		:	600,
				minHeight		:	200,
				buttons			: 
				[
					{
						id		:	'Cancel',
						text	:	$options.text['cancel'],
						click	:	function() 
						{
							$(this).dialog('close');
						}
					},
					{
						id		:	'Delete',
						text	:	$options.text['delete'],					
						click	:	function() 
						{
							$this.lineRemove({lineId:lineId});
							$(this).dialog('close');
						}
					}
				]
			});
		});
		
		/****/
		
		$(document).on('click','.pb-component-bar>.pb-content-clone-button',function(e)
		{
			e.preventDefault();
			
			var componentId=$(this).parents('.pb-component:first').attr('id');
			
			$this.componentClone({componentId:componentId});
		});
		
		/****/
		
		$(document).on('click','.pb-component-bar>.pb-content-edit-button',function(e)
		{
			e.preventDefault();
			
			var componentId=$(this).parents('.pb-component:first').attr('id');
			
			$this.componentEdit({componentId:componentId});
		});
		
		/****/

		$(document).on('click','.pb-component-bar>.pb-content-remove-button',function(e)
		{
			e.preventDefault();
			
			var componentId=$(this).parents('.pb-component:first').attr('id');
			
			$('#pb-dialog-component-remove').dialog(
			{
				show			:	200,
				hide			:	100,
				modal			:	true,
				resizable		:	false,
				closeOnEscape	:	true,
				dialogClass		:	'pb pb-dialog pb-dialog-confirm',
				minWidth		:	600,
				minHeight		:	200,
				buttons			: 
				[
					{
						id		:	'Cancel',
						text	:	$options.text['cancel'],
						click	:	function() 
						{
							$(this).dialog('close');
						}
					},
					{
						id		:	'Delete',
						text	:	$options.text['delete'],					
						click	:	function() 
						{
							$this.componentRemove({componentId:componentId});
							$(this).dialog('close');
						}
					}
				]
 			});
		});
		
		/****/
		
		$(document).on('click','.pb-content-line-bar>.pb-content-edit-button',function(e)
		{
			e.preventDefault();
			
			var lineId=$(this).parents('.pb-content-line:first').attr('id');
			
			$this.lineEdit({lineId:lineId});
		});
		
		/****/
		
		$(document).on('click','.pb-content-line-bar>.pb-content-clone-button',function(e)
		{
			e.preventDefault();
			
			var lineId=$(this).parents('.pb-content-line:first').attr('id');
			
			$this.lineClone({lineId:lineId});
		});
		
		/****/
		
		$(document).on('click','.pb-content-column-bar>.pb-content-remove-button',function(e)
		{
			e.preventDefault();
			
			var columnId=$(this).parents('.pb-content-column:first').attr('id');
			
			$('#pb-dialog-component-all-in-column-remove').dialog(
			{
				show			:	200,
				hide			:	100,
				modal			:	true,
				resizable		:	false,
				closeOnEscape	:	true,
				dialogClass		:	'pb pb-dialog pb-dialog-confirm',
				minWidth		:	600,
				minHeight		:	200,
				buttons			: 
				[
					{
						id		:	'Cancel',
						text	:	$options.text['cancel'],
						click	:	function() 
						{
							$(this).dialog('close');
						}
					},
					{
						id		:	'Delete',
						text	:	$options.text['delete'],					
						click	:	function() 
						{
							$this.componentAllInColumnRemove({columnId:columnId});
							$(this).dialog('close');
						}
					}
				]
 			});
		});
		
		/****/
				
		$(document).on('click','#pb-switch',function(e)
		{
			e.preventDefault();
			
			var data={'switch':1};
			
			$this.pageBuilderSwitch(data);
		});
	
		if($('#pb-switch').length===1)
			$this.pageBuilderSwitch({'switch':0});
	
		/****/

		$this.reInit();
		
		$this.setContentCaption();
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.pageBuilderSwitch=function(data)
	{
		$this.sendRequest('switch',data,function(response) 
		{
			if(parseInt(response.error)===1) return;
				
			var box=$('#wp-content-wrap');
			var state={'0':(parseInt(response.enable)===1 ? 'none' : 'block'),1:(parseInt(response.enable)===1 ? 'block' : 'none')};
					
			box.find('.wp-editor-tabs').css('display',state[0]);
			box.next('#post-status-info').css('display',state[0]);
			box.find('#wp-content-editor-container').css('display',state[0]);
					
			$('.pb.pb-meta-box').css('display',state[1]);
			
			$('#pb-switch').html(response.buttonLabel);
			
			try
			{
				parent.tinyMCE.activeEditor.setContent(response.content,{format:'html'});				
			}
			catch(e) { }
		});				
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.reInit=function()
	{
		$('li.pb-content-column>div.pb-content-column-box>ul').sortable(
		{
			delay					:	150,
			revert					:	0,
			helper					:	'clone',
			cancel					:	'.pb-component-preloader',
			connectWith				:	'div.pb-content-column-box>ul',
			placeholder				:	'pb-component-placeholder',
			forceHelperSize			:	true,
			forcePlaceholderSize	:	true,
			tolerance				:	'pointer',
			receive					:	function(event,ui)
			{
				var position=$(this).children('li').index($this.dropComponent);
				
				var componentId=$this.getValueFromClass($this.dropComponent.find('div.pb-component-icon'),'pb-component-icon-');
					
				var lineId=$this.dropComponent.parents('li.pb-content-line:first').attr('id');
				var columnId=$this.dropComponent.parents('li.pb-content-column:first').attr('id');

				if($this.dropComponent.hasClass('pb-component-source'))
				{
					$this.dropComponent.attr('class','pb-component-placeholder');
					$this.dropComponent.children().remove();
					
					$this.dropComponent.addClass('pb-component-preloader');
					$this.dropComponent.append($('<div>'));
					
					$this.componentAdd({'lineId':lineId,'columnId':columnId,'componentId':componentId,'position':position});
				}
				else
				{
					$this.dropComponent.attr('class','pb-component-placeholder');
					$this.dropComponent.children().remove();
				
					$this.dropComponent.addClass('pb-component-preloader');
					$this.dropComponent.append($('<div>'));
				
					componentId=ui.item.attr('id');
					
					$(ui.item).remove();
					
					position=$(this).children('li').index($this.dropComponent);
				
					$this.componentMove({'lineId':lineId,'columnId':columnId,'componentId':componentId,'position':position});
				}
			}
		});		

		$('.pb-component').draggable(
		{
			revert				:	'invalid',
			revertDuration		:	200,
			distance			:	20,
			cursor				:	'move',
			helper				:	'clone',
			appendTo			:	$('#pb-content'),
			connectToSortable	:	'li.pb-content-column>div.pb-content-column-box>ul',
			start				:	function()
			{
				
			}
		});

		$('li.pb-content-column>div.pb-content-column-box>ul').droppable(
		{
			tolerance			:	'pointer',
			accept				:	'.pb-component',
			drop				:	function(event,ui) 
			{	
				$this.dropComponent=$(ui.draggable);
			}
		});
	};
	
	/**************************************************************************/
	/**************************************************************************/
	
	PageBuilder.prototype.lineAdd=function(data)
	{
		$this.setContentCaption();
		
		$this.sendRequest('line_add',data,function(response) 
		{
			if(parseInt(response.error)===1) return;
			
			$('#pb-content>ul>li:eq('+response.position+')').replaceWith(response.html);
			
			$this.reInit();
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.lineClone=function(data)
	{
		$this.sendRequest('line_clone',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;

			var line=$('#pb-content>ul>li:eq('+(parseInt(response.position)-1)+')');

			line.after(response.html);
			
			$.scrollTo(line.next('li'),{duration:0,offset:-1*$this.getStickyMenuOffset()});
			
			$this.reInit();			
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.lineRemove=function(data)
	{
		$('#'+data.lineId).remove(); 
		$this.setContentCaption();
		
		$this.sendRequest('line_remove',data,function(response) 
		{
			if(parseInt(response.error)===1) return;
		});		
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.lineReorder=function(data)
	{
		$this.sendRequest('line_reorder',data,function(response) 
		{
			if(parseInt(response.error)===1) return;
		});		
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.lineEdit=function(data)
	{
		$this.sendRequest('line_edit',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
			
			var button=
			[
				{
					id		:	'Cancel',
					text	:	$options.text['cancel'],
					click	:	function() 
					{
						$(this).dialog('close');
					}
				},
				{
					id		:	'Save',
					text	:	$options.text['save'],				
					click	:	function() 
					{
						$(this).dialog('close');
						$this.lineSave({lineId:response.lineId,complete:function() 
						{

						}});
					}
				}
			];
			
			$this.componentEditDialog(response,'pb-dialog-edit',button);
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.lineSave=function(data)
	{
		data.form=$this.serializeForm();
		
		$this.sendRequest('line_save',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
		});				
	};
	
	/**************************************************************************/
	/**************************************************************************/
	
	PageBuilder.prototype.componentAdd=function(data)
	{
		$this.setColumnCaption();
		
		$this.sendRequest('component_add',data,function(response) 
		{
			if(parseInt(response.error)===1) return;
			
			$('#'+response.columnId+'>div>ul>li:eq('+response.position+')').replaceWith(response.html);
			
			$this.reInit();
		});			
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.componentClone=function(data)
	{
		$this.sendRequest('component_clone',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;

			$('#'+response.columnId+'>div>ul>li:eq('+(parseInt(response.position)-1)+')').after(response.html);
			
			$this.reInit();			
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.componentRemove=function(data)
	{
		$('#'+data.componentId).remove(); 
		$this.setColumnCaption();
		
		$this.sendRequest('component_remove',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
		});				
	};
	
	/**************************************************************************/

	PageBuilder.prototype.componentAllInColumnRemove=function(data)
	{
		$('#'+data.columnId+'>.pb-content-column-box>ul>li').remove();
		
		$this.setColumnCaption();
		
		$this.sendRequest('component_all_in_column_remove',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
		});				
	};

	/**************************************************************************/
	
	PageBuilder.prototype.componentMove=function(data)
	{
		$this.setColumnCaption(data.prevColumnId);
		
		$this.sendRequest('component_move',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
			
			$('#'+response.columnId+'>div>ul>li:eq('+response.position+')').replaceWith(response.html);
			
			$this.reInit();
		});			
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.componentSave=function(data)
	{
		data.form=$this.serializeForm();
		
		$this.sendRequest('component_save',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
			
			$('#'+response.componentId).find('.pb-component-subheader').html(response.description);
		});				
	};
		
	/**************************************************************************/
	
	PageBuilder.prototype.componentEdit=function(data)
	{
		$this.sendRequest('component_edit',data,function(response) 
		{			
			if(parseInt(response.error)===1) return;
			
			var componentId=response.componentId;
			
			var button=
			[
				{
					id		:	'Cancel',
					text	:	$options.text['cancel'],
					click	:	function() 
					{
							$(this).dialog('close');
					}
				},
				{
					id		:	'Save',
					text	:	$options.text['save'],				
					click	:	function() 
					{
						$(this).dialog('close');
						$this.componentSave({componentId:componentId,complete:function() 
						{

						}});
					}
				}
			];
			
			$this.componentEditDialog(response,'pb-dialog-edit',button);
		});			
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.componentShortcodeEdit=function(data)
	{
		$this.blockPage('block');
		
		data.source=2;
		
		$this.sendRequest('component_shortcode_edit',data,function(response) 
		{	
			$this.blockPage('unblock');
			
			if(parseInt(response.error)===1) return;
			
			var componentId=response.componentId;
			
			var button=
			[
				{
					id		:	'Cancel',
					text	:	$options.text['cancel'],
					click	:	function() 
					{
						$(this).dialog('close');
					}
				},
				{
					id		:	'Create Shortcode',
					text	:	$options.text['create_shortcode'],				
					click	:	function() 
					{
						$(this).dialog('close');
						$this.componentShortcodeBuild({componentId:componentId,complete:function() 
						{

						}});
					}
				}
			];
			
			$this.componentEditDialog(response,'pb-dialog-edit-shortcode',button);			
		});	
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.componentShortcodeBuild=function(data)
	{
		$this.blockPage('block');
		
		data.form=$this.serializeForm();
		
		data.source=2;
		
		$this.sendRequest('component_shortcode_build',data,function(response) 
		{			
			$this.blockPage('unblock');
			
			if(parseInt(response.error)===1) return;
			
			var shortcode=response.shortcode;
			
			parent.tinyMCE.activeEditor.selection.setContent(shortcode);
		});				
	};

	/**************************************************************************/
	/**************************************************************************/
	
	PageBuilder.prototype.componentEditDialog=function(response,dialogId,button)
	{
		var dialog=$('#'+dialogId);
		
		dialog.html('');
		dialog.append(response.html);
		
		$this.createSlider();
		$this.createDropkick();
		$this.createButtonSet();
		$this.createColorPicker();
		$this.createSelectFile();
		$this.createSelectImage();
		$this.createSelectGallery();
		$this.createFAAutocomplete();
		$this.createCSSClassAutocomplete();
		$this.createAccordionMultipleField();
		
		$.ui.dialog.prototype._focusTabbable=$.noop;
	
		$(document).delegate('.ui-dialog','keyup',function(e) 
		{
			if($(e.target).hasClass('ui-autocomplete-input')) return(false);
			
			var fieldName;
			var tagName=e.target.tagName.toLowerCase();
			
			tagName=((tagName==='input') && (e.target.type==='button')) ? 'button' : tagName;
			fieldName=e.target.name;

			if(e.which===$.ui.keyCode.ENTER && tagName!=='textarea' && tagName!=='select' && tagName!=='button' && fieldName!=='css_class') 
			{
				$(this).find('.ui-dialog-buttonset button').eq(1).trigger('click');
				return(false);
			}

			return(true);
		});
		
		dialog.dialog(
		{
			show			:	200,
			hide			:	100,
			modal			:	false,
			title			:	response.window.title,
			resizable		:	false,
			closeOnEscape	:	true,
			dialogClass		:	'pb pb-dialog pb-dialog-edit',
			width			:	typeof(response.window.width)==='undefined' ? 1280 : parseInt(response.window.width),
			height			:	typeof(response.window.height)==='undefined' ? 1024 : parseInt(response.window.height),
			buttons			:	button,
			open			:	function()
			{			
				$('body').append('<div class="ui-widget-overlay ui-front"></div>');
				
				dialog.css('overflow','hidden');
	
				var tab=dialog.find('.pb-tab');
					
				if(tab.length===1)
				{
					tab.tabs(
					{
						heightStyle		:	'fill'
					});
				}
				else dialog.css('overflow-y','auto');
				
				$this.createWPEditor();
				$this.setDialogResponsive(dialog);				
			},
			close			:	function()
			{
				$('body').children('.ui-widget-overlay').remove();
				$this.destroyDialog();
			}
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.setDialogResponsive=function(dialog)
	{
		var margin=100;
		
		$().windowDimensionListener({'change':function(width,height) 
		{
			dialog.each(function() 
			{
				var clientWidth=document.body.clientWidth;
				var clientHeight=document.body.clientHeight;
	
				if(clientWidth-margin<1280)
					$(this).dialog('option','width',clientWidth-margin);
				if(clientHeight-margin<1024)
					$(this).dialog('option','height',clientHeight-margin);
			
				var tab=dialog.find('.pb-tab');
				if(tab.length===1)
				{
					height=parseInt(dialog.actual('outerHeight'))-parseInt(tab.find('.ui-tabs-nav').actual('outerHeight'));
					tab.find('.ui-tabs-panel').height(height);
				}			
			});
		}});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.serializeForm=function()
	{
		try
		{
			tinyMCE.triggerSave();
		}
		catch(e) {}
		
		var data=$('#pb-component-edit-form').serialize();
		
		return(data);
	};
	
	/**************************************************************************/
	/**************************************************************************/
	
	PageBuilder.prototype.sendRequest=function(action,data,complete)
	{
		if(($this.blockRequest) && ($this.useBlockRequest)) return(false);
		if($this.useBlockRequest) $this.block('block');
		
		$this.blockRequest=true;
		
		$this.showPreloader(true);
		
		data.postId=$('#postId').val();
		data.action='page_builder_'+action;
		
		if(typeof(data.source)==='undefined') data.source=1;
		
		jQuery.post(ajaxurl,data,function(response) 
		{
			complete(response);
			
			$this.showPreloader(false);
			$this.blockRequest=false;
			
			if($this.useBlockRequest) $this.block('unblock');
			
		},'json');
		
		return(true);
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.getValueFromClass=function(object,pattern)
	{
		var reg=new RegExp(pattern);
		var className=$(object).attr('class').split(' ');

		for(var i in className)
		{
			if(reg.test(className[i]))
				return(className[i].substring(pattern.length));
		}

		return(false);		
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.showPreloader=function(action)
	{
		$('#pb-preloader').css('display',(action ? 'block' : 'none'));
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.prepareComponentId=function(id)
	{
		var data=id.split('-');
		return(data[data.length-1]);
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createScrollBar=function(selector)
	{
		var component=$(selector+' ul>li');
		$(selector+' ul').width(component.length*component.outerWidth(true));
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createColorPicker=function(selector)
	{
		var self=this;
		
		selector=typeof(selector)==='undefined' ? $('.pb-color-picker') : $(selector);
		
		selector.each(function() 
		{
			var object=$(this);
			object.ColorPicker(
			{
				onChange:function(hsb,hex,rgb) 
				{
					object.val(hex.toUpperCase());
					object.parent().children('.pb-color-picker-sample').css('background-color','#'+hex);	
				},
				onSubmit:function(hsb,hex,rgb,el)
				{
					$(el).val(hex);
					$(el).ColorPickerHide();
				},
				onBeforeShow:function()
				{
					$(this).ColorPickerSetColor(this.value);
				}
			});

			var colorSample=$(document.createElement('span'));

			colorSample.attr('class','pb-color-picker-sample');
			colorSample.css({'background-color':self.getColor(object.val())});

			object.parent().append(colorSample);

			object.change(function() 
			{
				var value=$(this).val();
				var object=$(this).parent().children('.pb-color-picker-sample');

				object.css({'background-color':self.getColor(value)});
			});
		});
	};
	
	/**************************************************************************/
		
	PageBuilder.prototype.getColor=function(value)
	{
		if(/^[0-9A-Fa-f]{6}$/i.test(value)) return('#'+value);
		else if(/^[0-9A-Fa-f]{8}$/i.test(value))
		{
			var rgba=[];

			for(var i=0;i<8;i+=2)
			{
				var number=parseInt(value.charAt(i)+value.charAt(i+1),16);
				rgba.push((number>=549755813888) ? number-1099511627776 : number);
			}

			return('rgba('+rgba[0]+','+rgba[1]+','+rgba[2]+','+(rgba[3]/255)+')');
		}
		else return('#FFFFFF');				
	};	
	
	/**************************************************************************/
	
	PageBuilder.prototype.createButtonSet=function()
	{
		$('.pb .pb-radio-button,.pb .pb-checkbox-button').buttonset();
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createDropkick=function()
	{
		$('.pb select:not(.pb-dropkick-0)').dropkick();
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createSlider=function(selector)
	{
		selector=typeof(selector)==='undefined' ? $('.pb .pb-slider') : $(selector);
		
		selector.each(function() 
		{
			var value=$(this).nextAll('input[type="text"]');
			var option=JSON.parse($(this).nextAll('input[type="hidden"]').val());

			$(this).slider(
			{
				min			:	option.min,
				max			:	option.max,
				range		:	'min',
				value		:	value.val(),
				step		:	(typeof(option.step)==='undefined' ? 1 : option.step),
				slide		:	function(event,ui) 
				{
					value.val(ui.value);
				},
				create		:	function()
				{
					value.val($(this).slider('value'));
				}
			});
		});
	};

	/**************************************************************************/

	PageBuilder.prototype.createSelectFile=function(selector)
	{
		selector=typeof(selector)==='undefined' ? $('.pb .pb-select-file') : $(selector);
		
		selector.bind('click',function()
		{
			var self=$(this);
			
			wp.media.frames.selectFile=wp.media(
			{
				multiple		:	false
			});

			wp.media.frames.selectFile.open();
			
			wp.media.frames.selectFile.on('select',function()
			{
				var selection=wp.media.frames.selectFile.state().get('selection');

				if(!selection) return;

				selection.each(function(attachment)
				{
					var url=attachment.attributes.url;
					self.prev().val(url);
				});
			});	
		});
	};	
	
	
	/**************************************************************************/
	
	PageBuilder.prototype.createSelectGallery=function(selector)
	{
		selector=typeof(selector)==='undefined' ? $('.pb .pb-select-gallery') : $(selector);
		
		selector.on('click',function(e)
		{
			e.preventDefault();
			
			var hidden=$(this).next('input[type="hidden"]').first();
			var shortcode='[gallery ids="'+hidden.val()+'"]';
            
			wp.media.gallery.edit(shortcode).on('update',function(g) 
			{
                var id_array=[];
                $.each(g.models,function(id,img)
				{
					id_array.push(img.id); 
				});
				
				hidden.val(id_array.join(','));
            });
		});
	};
	
	/**************************************************************************/

	PageBuilder.prototype.createSelectImage=function(selector)
	{
		selector=typeof(selector)==='undefined' ? $('.pb .pb-select-image') : $(selector);
		
		selector.bind('click',function()
		{
			var self=$(this);
			
			wp.media.frames.selectImageFrame=wp.media(
			{
				multiple		:	false,
				library			: 
				{
				   type			:	'image'
				}
			});

			wp.media.frames.selectImageFrame.open();
			
			wp.media.frames.selectImageFrame.on('select',function()
			{
				var selection=wp.media.frames.selectImageFrame.state().get('selection');

				if(!selection) return;

				selection.each(function(attachment)
				{
					var url=attachment.attributes.url;
					self.prev().val(url);
				});
			});	
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createWPEditor=function()
	{
		$('.pb-editor').each(function(index,val) 
		{
            var name=$(this).attr('name');
           
            var settings=tinyMCEPreInit.mceInit.content;
			if(typeof(settings)==='undefined') return;
           
            settings.theme='modern';
            settings.selector='textarea[name="'+name+'"]';
            settings.statusbar=false;
           
            settings.plugins=settings.plugins.replace(',wpfullscreen','');
            settings.toolbar1=settings.toolbar1.replace(',shortcode_manager_list','');
           
			settings.wpautop=false;
		   
            $(this).parents('.pb-clear-fix').addClass('tmce-active');
            $(this).before('<div class="wp-editor-tabs" style="display: block;"><button data-wp-editor-id="content_'+index+'" class="wp-switch-editor switch-tmce" id="content-tmce" type="button">Visual</button><button data-wp-editor-id="content_'+index+'" class="wp-switch-editor switch-html" id="content-html" type="button">Text</button></div>');
            $(this).attr('id','content_'+index);
            
			$(this).prevAll('.insert-media.add_media').attr('data-editor','content_'+index);
			
			var qt_settings= 
			{
                id			:	'content_'+index,
                buttons		:	'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close,fullscreen'
            };
			
            quicktags(qt_settings);
            QTags._buttonsInit();
           
            tinyMCE.init(settings);
			
			var target=$(this).parents('.pb-clear-fix').find('.wp-editor-tabs button');
			
			target.bind('click',function() 
			{
				if($(this).hasClass('wp-switch-editor')) 
				{
					var id=$(this).attr('data-wp-editor-id');
					var mode=$(this).hasClass('switch-tmce') ? 'tmce' : 'html';
					var parent=$(this).parents('.pb-clear-fix');
					
					window.switchEditors.go(id,mode);
					
					parent.removeClass('tmce-active').removeClass('html-active').addClass(mode+'-active');
				}
			});
		});
    };
	
	/**************************************************************************/
	
	PageBuilder.prototype.createAccordionMultipleField=function()
	{
		$('.pb-multi-field').each(function() 
		{
			var accordion=$(this);
		
			accordion.accordion(
			{
				icons			:	false,
				active			:	false,
				animate			:	false,
				collapsible		:	true,
				heightStyle		:	'content',
				header			:	'> div > h3'
			}).sortable(
			{
				axis			:	'y',
				handle			:	'h3',
				distance		:	20
			});

			accordion.next('a.pb-link-add').on('click',function(e) 
			{
				e.preventDefault();
				
				accordion.accordion('option','active','false');
				accordion.accordion('refresh');
				
				var section=$(accordion.children('div')[0]).clone(false,false);
	
				section.find('select').each(function() 
				{
					var helper=new PBHelper();
					var select=$(this).clone();
					
					var parent=$(this).parent().parent();
					
					$(this).parent().remove();
	
					parent.append(select);
					
					select.attr('id',select.attr('name')+'_'+helper.getRandomString(16));
				});
	
				accordion.append('<div>'+section.html()+'</div>');
				
				var panel=accordion.children('div:last');
				
				panel.find('input[type="text"],textarea').val('');
				panel.find('.pb-color-picker-sample').remove();
				
				panel.find('select').find('option[selected]').removeAttr('selected');
	
				accordion.find('select').dropkick();
	
				$this.createColorPicker(panel.find('.pb-color-picker'));
	
				$this.createSlider(panel.find('.pb-slider'))
				
				$this.createFAAutocomplete(panel.find('.pb-fa-icon'));
				
				$this.createSelectImage(panel.find('.pb-select-image'));
	
				accordion.accordion('refresh');
			});
			
			accordion.on('click','a.pb-link-remove',function(e) 
			{
				e.preventDefault();
				
				if(accordion.children('div').length===1) return;
				
				$(this).parents('.ui-accordion-content').parent('div').remove();
				accordion.accordion('refresh');
			});
		});
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createCSSClassAutocomplete=function()
	{
		if(!$.isArray($options.cssClass)) return;
		if(!$options.cssClass.length) return;
		
		if(!$('.pb input[name="css_class"]').length) return;
		
		$('.pb input[name="css_class"]').autocomplete(
		{	
			minLength	:	0,
			appendTo	:	'#pb-dialog-edit>.pb',
			source		:	function(request,response)
			{
				response($.ui.autocomplete.filter($options.cssClass,request.term.split(/ \s*/).pop()));
			},
			focus		:	function()
			{
				return(false);
			},
			select		:	function(e,ui) 
			{
				var terms=this.value.split(/ \s*/);
				terms.pop();
				terms.push(ui.item.value);
				terms.push('');
				this.value=terms.join(' ');
				return(false);
			},
			create		:	function()
			{
				$('.ui-autocomplete').addClass('pb');
			}
		}).data('ui-autocomplete')._renderItem=function(ul,item)
		{
			return($('<li>').append('<span class="ui-autocomplete-item-label">'+item.label+'</span><span class="ui-autocomplete-item-description">'+item.description+'</span>').appendTo(ul));
		};
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.createFAAutocomplete=function(selector)
	{
		selector=typeof(selector)==='undefined' ? $('.pb .pb-fa-icon') : $(selector);
		
		if(!$(selector).length) return;
		
		$(selector).autocomplete(
		{	
			appendTo	:	'#pb-dialog-edit',
			create		:	function()
			{
				$('.ui-autocomplete').addClass('pb').addClass('pb-autocomplete-icon-list');
			},
			source		:	function(request,response) 
			{
				$.ajax(
				{
					url			:	ajaxurl ,
					dataType	:	'json',
					data		: 
					{
						query	:	request.term,
						action	:	'page_builder_get_fa'
					},
					success		:	function(data) 
					{
						response($.map(data,function(item) 
						{
							return(item);
						}));
					}
				});
			},
			minLength	:	2
		}).data('ui-autocomplete')._renderItem=function(ul,item ) 
		{
            return($('<li></li>').data('item.autocomplete',item).append(item.label).appendTo(ul));
        };
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.destroyDialog=function()
	{
		try
		{
			$('.pb .pb-editor').each(function() 
			{
				tinyMCE.remove('#'+$(this).attr('id'));
			});
		}
		catch(e) {}
		
		$('.colorpicker').css('display','none');
		$('#pb-dialog-edit').html('');
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.style=function()
	{
		$this.createSlider();
		$this.createDropkick();
		$this.createButtonSet();
		$this.createColorPicker();
		$this.createSelectImage();	
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.block=function(action)
	{
		if(String(action)==='block')
		{
			$('.pb-tab').block(
			{
				baseZ		:	101,
				message		:	false,
				overlayCSS	:	{opacity:'0.1'}
			});
			$('#pb-content').block(
			{
				baseZ		:	99,
				message		:	false,
				overlayCSS	:	{opacity:'0.1'}
			});			
			
		}
		else $('.pb-tab,#pb-content').unblock();
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.blockPage=function(action)
	{
		if(String(action)==='block')
		{
			$.blockUI(
			{
				baseZ		:	101,
				message		:	'',
				overlayCSS	:	{opacity:'0.1'}
			});
		}
		else $.unblockUI();
	};
	
	/**************************************************************************/
	
	PageBuilder.prototype.getStickyMenuOffset=function()
	{
		var height=0;
		var bar=$('#wpadminbar');
		var tab=$('.pb .pb-tab-fixed');
		
		height+=parseInt(bar.height());
		
		if(tab.length===1) height+=parseInt(tab.height());
		
		return(height);
	};
		
	/**************************************************************************/

	$.fn.pageBuilder=function(options) 
	{
		return(new PageBuilder(this,options));
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/