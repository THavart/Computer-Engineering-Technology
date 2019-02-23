/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var pluginOption=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		var $this=$(object);
		
		var $optionDefault=
		{
			submitOneField		:	false,
			beforeSubmit		:	function() { return(true); }
		};
		
		var $option=$.extend($optionDefault,option);

		var $response={};

		/**********************************************************************/

		this.build=function() 
		{
			this.createMenu();
			
			var form=$('#pb_plugin_option_form');
			var menu=$('#pb_plugin_option_menu');
			var panel=$('#pb_plugin_option_panel');
			var notice=$('#pb_plugin_option_notice');
			
			if(!panel.children('.pb-plugin-option-panel-open').length)
			{
				var firstMenuElement=this.getFirstMenuPosition(menu);
				window.location.hash=firstMenuElement.attr('href');
				$(window).trigger('hashchange');
			}
			
			form.submit(function() 
			{
				if($option.beforeSubmit())
				{
					try
					{
						tinyMCE.triggerSave();
					}
					catch(e) {}

					notice.html('');
					menu.find('a').removeClass('pb-plugin-option-menu-error');

					$('li>h5').qtip('destroy');
					$('.colorpicker').css('display','none');

					$self.scrollToTop();
					$self.blockPanel('block');

					var data;
						
					if($option.submitOneField)
					{
						data={};
						
						data.action=$('#action').val();
						data.value=$(this).serialize();
					}
					else data=$(this).serialize();

					$.post(ajaxurl,data,function(response) 
					{		
						$self.blockPanel('unblock',function() 
						{
							$response=response;
							
							$('#pb_plugin_option_notice').html(response.global.notice);
							
							$self.createQtip();
						});
						return(false);
					},'json');
				}
				
				return(false);
			});
		};
		
		/**********************************************************************/
		
		this.createQtip=function()
		{	
			try
			{
				$('li>h5').qtip('destroy');
				
				if($response.global.error)
				{
					for(var index in $response.local)
					{
						var object=$('[name="'+$response.local[index][0]+'"]').parents('li').children('h5').first();

						if(object.parents('.pb-plugin-option-panel-open').length)
						{
							object.qtip(
							{
								style			: 		
								{ 
									classes		:	'pb-qtip pb-qtip-error'
								},
								content			: 	
								{ 
									text		:	$response.local[index][1]
								},
								position		: 	
								{ 
									my			:	'left center',
									at			:	'right center',
									container	:	object.parents('li').first(),
									effect		:	false
								},
								hide			:	false
							}).qtip('show');
						}

						var panelId=object.parents('ul:first').parent('div').attr('id');
						var menuElement=$('#pb_plugin_option_menu').find('a[href="#'+panelId+'"]');

						menuElement.addClass('pb-plugin-option-menu-error');
						menuElement.parents('ul').prev('a').addClass('pb-plugin-option-menu-error');
					}
				}	
			}
			catch(e) {}
		};
		
		/**********************************************************************/
		
		this.createMenu=function()
		{
			$(window).bind('hashchange',function(e) 
			{
				e.preventDefault();
				
				var hash=window.location.hash;
				
				var panel=$('#pb_plugin_option_panel');
				var panelOpen=$(hash);
				
				var menu=$('#pb_plugin_option_menu');
				var menuOpen=menu.find('a[href="'+hash+'"]');
				
				if(menuOpen.length!==1) return(false);
				
				menu.find('li>ul').removeClass('pb-plugin-option-menu-open');
				
				menuOpen.nextAll('ul').addClass('pb-plugin-option-menu-open');
				menuOpen.parents('ul').addClass('pb-plugin-option-menu-open');
				
				menu.find('a').removeClass('pb-plugin-option-menu-select');
				menuOpen.addClass('pb-plugin-option-menu-select');
				
				if(panelOpen.length!==1) return(false);
				
				$('li>h5').qtip('destroy');
			
				panel.children().removeClass('pb-plugin-option-panel-open');
				panelOpen.addClass('pb-plugin-option-panel-open');
				
				$self.createQtip();
				$self.scrollToTop();
				
				return(false);
			});
		};
		
		/**********************************************************************/
		
		this.getFirstMenuPosition=function(menu)
		{
			var link=menu.children('li:first').children('a');
			var submenu=link.nextAll('ul');
			
			if(submenu.length===1) return(this.getFirstMenuPosition(submenu));
			else return(link);
		};
		
		/**********************************************************************/
		
		this.blockPanel=function(action,callback)
		{
			if(String(action)==='block') $this.block({message:false,overlayCSS:{opacity:'0.3'}});
			else $this.unblock({onUnblock:function() { callback(); }});			
		};
		
		/**********************************************************************/
		
		this.scrollToTop=function()
		{
			$(window).scrollTop(0);
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.pluginOption=function(option) 
	{
		var panel=new pluginOption(this,option);
		panel.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/