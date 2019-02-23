jQuery(document).ready(function($) 
{	
	tinymce.PluginManager.add('shortcode_manager',function(editor,url)  
	{
		var object=JSON.parse(tinyMceShortcode.list);

		editor.addButton('shortcode_manager_list', 
		{
			type		:	'listbox',
			text		:	object.title,
			values		:	object.component,
			classes		:	'pb-tinymce-shortcode-list',
			width		:	200,
			onselect	:	function(e) 
			{
				var value=this.value();
				
				if($.trim(value).length==0) return;

				var pb=$().pageBuilder({init:false});
				var data={};

				this.value(-1);

				data.componentId=value;

				pb.componentShortcodeEdit(data);
			}
		});
	});
});