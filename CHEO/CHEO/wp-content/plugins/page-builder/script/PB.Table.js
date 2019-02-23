/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBTable=function(object)
	{
		/**********************************************************************/
		
		var $this=$(object);
		
		var $buttonAdd=$this.next('div').find('.pb-table-button-add');
		var $buttonRemove=$this.find('.pb-table-button-remove');

		/**********************************************************************/

		this.build=function() 
		{
			var self=this;
			
			var count=$this.children('tbody').find('tr>th').length;
			
			$this.children('tbody').find('tr>th').width((100/count)+'%');
			
			$buttonRemove.on('click',function(e) 
			{ 
				e.preventDefault(); 
				self.removeLine(this); 
			});
			
			$buttonAdd.on('click',function(e) 
			{ 
				e.preventDefault(); 
				self.addLine(); 
			});

			self.addLine();
		};
		
		/**********************************************************************/
		
		this.addLine=function()
		{
			var line=$this.children('tbody').children('tr+tr').first().clone(true,true).removeClass('pb-hidden');
			$this.append(line.fadeIn(50));

			line.find('select.pb-dropkick-0').each(function() 
			{
				var helper=new PBHelper();
				var string=helper.getRandomString(16);
				
				$(this).attr('id',$(this).attr('id')+'_'+string).removeClass('pb-dropkick-0');
			});

			var object=$().pageBuilder();
			object.style();
		};
		
		/**********************************************************************/
		
		this.removeLine=function(object)
		{
			var lineCount=$(object).parents('tbody:first').children('tr').length;
			
			if(lineCount<=3) return;
			
			$(object).parents('tr').first().fadeOut(200,function() 
			{ 
				$(this).remove(); 
			});
		};
		
		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBTable=function() 
	{
		var table=new PBTable(this);
		table.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/