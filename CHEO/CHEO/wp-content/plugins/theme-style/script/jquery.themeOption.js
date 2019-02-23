/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var themeOption=function(object,option)
	{
		/**********************************************************************/
		
		var $self=this;
		var $this=$(object);
		
		var $optionDefault=
		{
			submitOneField		:	false,
			ajaxError			:
			{
				enable			:	false,
				text			:
				{
					header		:	'',
					subheader	:	''
				}
			},
			afterSubmit			:	function() { return(true); },
			beforeSubmit		:	function() { return(true); }
		};
		
		var $option=$.extend($optionDefault,option);

		var $response={};

		/**********************************************************************/

		this.build=function() 
		{
			this.createMenu();
			
			var form=$('#to_form');
			var menu=$('#to_menu');
			var panel=$('#to_panel');
			var notice=$('#to_notice');
			
			if(!panel.children('.to-panel-open').length)
			{
				var firstMenuElement=this.getFirstMenuPosition(menu);
				window.location.hash=firstMenuElement.attr('href');
				$(window).trigger('hashchange');
			}
			
			if($option.ajaxError.enable)
			{
				$(document).ajaxError(function(event,jqxhr,settings,thrownError) 
				{
					$self.blockPanel('unblock',function() 
					{
						var html='';
					
						html+='<div><b>[jqxhr.status]</b>: '+jqxhr.status+'</div>';
						html+='<div><b>[jqxhr.statusText]</b>: '+jqxhr.statusText+'</div>';
						html+='<div><b>[jqxhr.responseText]</b>: '+jqxhr.responseText+'</div>';
					
						html='<div class="to-notice to-notice-error"><span></span><h4>'+$option.ajaxError.text.header+'</h4><h6>'+$option.ajaxError.text.subheader+'</h6></div><div class="to-buffer-output">'+html+'</div>';
		
						notice.html(html).css('display','block');
				
						console.log(event);
						console.log(jqxhr);
						console.log(settings);
						console.log(thrownError);
					});
				});
			};
			
			form.submit(function() 
			{
				if($option.beforeSubmit())
				{
					try
					{
						tinyMCE.triggerSave();
					}
					catch(e) {}

					notice.html('').css('display','none');
					menu.find('a').removeClass('to-menu-error');

					$('li>h5').qtip('destroy');
					$('.colorpicker').css('display','none');

					$self.scrollToTop();
					$self.blockPanel('block');

					$self.postRequest(null);
				}
				
				return(false);
			});
            
            $this.css('display','block');
		};
		
		/**********************************************************************/
		
		this.postRequest=function(prevResponse)
		{
			var data={};
						
			if($option.submitOneField)
			{
				data.action=$('#action').val();
				data.value=$('#to_form').serialize();
				if(prevResponse!==null)
				{
					data.value.code=prevResponse.code;
					data.value.buffer=prevResponse.buffer;
				}
			}
			else 
			{	
				data=$('#to_form').serialize();
				if(prevResponse!==null)
				{
					data+='&code='+prevResponse.code;
					data+='&buffer='+prevResponse.buffer;
				}
			}
			
			$.post(ajaxurl,data,function(currResponse) 
			{		
				if(currResponse.code>0)
				{
					$self.postRequest(currResponse);
				}
				else
				{
					$self.blockPanel('unblock',function() 
					{
						$response=currResponse;

						$('#to_notice').html(currResponse.global.notice).css('display','block');

						$self.createQtip();
						
						$option.afterSubmit();
					});
				}
				
				return(false);
						
			},'json');			
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

						if(object.parents('.to-panel-open').length)
						{
							object.qtip(
							{
								style			: 		
								{ 
									classes		:	'to-qtip to-qtip-error'
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
						var menuElement=$('#to_menu').find('a[href="#'+panelId+'"]');

						menuElement.addClass('to-menu-error');
						menuElement.parents('ul').prev('a').addClass('to-menu-error');
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
				
				var panel=$('#to_panel');
				var panelOpen=$(hash);
				
				var menu=$('#to_menu');
				var menuOpen=menu.find('a[href="'+hash+'"]');
				
				if(menuOpen.length!==1) return(false);
				
				menu.find('li>ul').removeClass('to-menu-open');
				
				menuOpen.nextAll('ul').addClass('to-menu-open');
				menuOpen.parents('ul').addClass('to-menu-open');
				
				menu.find('a').removeClass('to-menu-select');
				menuOpen.addClass('to-menu-select');
				
				if(panelOpen.length!==1) return(false);
				
				$('li>h5').qtip('destroy');
			
				panel.children().removeClass('to-panel-open');
				panelOpen.addClass('to-panel-open');
				
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
	
	$.fn.themeOption=function(option) 
	{
		var panel=new themeOption(this,option);
		panel.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/