/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var themeOptionElement=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		
		var $optionDefault=
		{
			init		:	false
		};
		
		var $option=$.extend($optionDefault,option);

		/**********************************************************************/
		
		this.create=function()
		{
			if(!$option.init) return;
			
			this.createDropkick();
			this.createButtonSet();
			this.createColorPicker();
			this.createInfieldLabel();
			this.createDatePicker();
			this.createTimePicker();
			this.createTab();

			$this.css({'display':'block'});
		};

		/**********************************************************************/
		
		this.createColorPicker=function()
		{
			var self=this;
			
			$this.find('.to-color-picker').each(function() 
			{
				var object=$(this);
				object.ColorPicker(
				{
					onChange:function(hsb,hex,rgb) 
					{
						object.val(hex.toUpperCase());
						object.parent().children('.to-color-picker-sample').css('background-color','#'+hex);	
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

				colorSample.attr('class','to-color-picker-sample');
				colorSample.css({'background-color':self.getColor(object.val())});

				object.parent().append(colorSample);

				object.change(function() 
				{
					var value=$(this).val();
					var object=$(this).parent().children('.to-color-picker-sample');
					
					object.css({'background-color':self.getColor(value)});
				});
			});
		};
		
		/**********************************************************************/
		
		this.getColor=function(value)
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
		
		/**********************************************************************/
		
		this.createDatePicker=function()
		{
			$this.on('focusin','.to-datepicker',function()
			{
				$(this).datepicker(
				{ 
					inline														:	true,
					dateFormat													:	'dd-mm-yy'
				});
			});
		};
		
		/**********************************************************************/
		
		this.createTimePicker=function()
		{
			$this.on('focusin','.to-timepicker',function()
			{
				var width=$(this).outerWidth();
				
				$(this).timepicker(
				{ 
					timeFormat													:	'H:i',
					appendTo													:	$(this).parent()
				});
				
				$(this).on('showTimepicker', function() {

					$(this).next('.ui-timepicker-wrapper').width(width);
				});

			});
		};
		
		/**********************************************************************/
		
		this.createInfieldLabel=function()
		{
			$this.find('.to-infield').inFieldLabels();
		};
		
		/**********************************************************************/
		
		this.createDropkick=function()
		{
			$this.find('select:not(.to-dropkick-disable)').dropkick();
		};
		
		/**********************************************************************/
		
		this.createButtonSet=function()
		{
			var buttonset=$this.find('.to-radio-button,.to-checkbox-button');
			if(buttonset.length) buttonset.buttonset();			
		};
		
		/**********************************************************************/
		
		this.createSlider=function(selector,min,max,value,step)
		{
			$this.find(selector).slider(
			{
				min		:	min,
				max		:	max,
				range	:	'min',
				value	:	value,
				step	:	(typeof(step)==='undefined' ? 1 : step),
				slide	:	function(event,ui) 
				{
					$(this).nextAll('input').val(ui.value);
				},
				create	:	function()
				{
					$(this).nextAll('input').val($(this).slider('value'));
				}
			});		
		};
		
		/**********************************************************************/
		
		this.bindBrowseMedia=function(selector)
		{
			$this.find(selector).bind('click',function()
			{
				var self=$(this);

				wp.media.frames.selectImageFrame=wp.media(
				{
					multiple		:	false,
					library			: 
					{
					   type			:	'image',
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

		/**********************************************************************/

		this.createGoogleFontAutocomplete=function(selector)
		{
			$this.find(selector).autocomplete(
			{
				appendTo	:	$('.to:first'),
				source		:	function(request,response) 
				{
					$.ajax(
					{
						url			:	ajaxurl,
						dataType	:	'json',
						data		: 
						{
							query	:	request.term,
							action	:	'autocomplete_google_font'
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
			});
		};
		
		/**********************************************************************/
		
		this.createTab=function()
		{
			$this.find('.ui-tabs').tabs();
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.themeOptionElement=function(option) 
	{
		var element=new themeOptionElement(this,option);
		element.create();
		
		return(element);
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/