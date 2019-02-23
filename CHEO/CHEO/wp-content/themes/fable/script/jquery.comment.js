/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var ThemComment=function(object,option)
	{
		/**********************************************************************/
		
		var $option=option;
		
		var $respond=$('#respond');
		var $comment=$('#comments');
		var $commentForm=$('#comment-form');
		
		var $commentFormPage;
		
		var $commentFormPostId=$('#comment_post_ID');
		var $commentFormParentCommentId=$('#comment_parent');
	
		var $commentFormCancelReply=$('#cancel-comment-reply-link');

		/**********************************************************************/

		this.build=function() 
		{
			var self=this;
			
			$commentForm.find(':input').each(function() 
			{
				if($(this).parent('span.theme-block').length!==1)
					$(this).wrap('<span class="theme-block">');
			});

			$commentForm.submit(function()
			{
				self.addComment();
				return(false);
			});

			$commentFormPage=$(document.createElement('input')).attr('type','hidden').attr('name','cpage').attr('id','cpage').val($option.page);
			$commentForm.append($commentFormPage);

			this.bindEvent();

			$(window).bind('hashchange',function()
			{
				if(location.hash.substr(1,6)==='cpage-')
				{
					var data={};

					data.cpage=parseInt(location.hash.substr(7));
					data.comment_form_post_id=parseInt($commentFormPostId.val());

					if(data.cpage===$commentFormPage.val()) return;
					
					data.action='comment_get';

					$('#comments').css('opacity','0.5');

					jQuery.ajax(
					{
						url				:	$option.requestURL,
						data			:	data,
						type			:	'GET',
						success			:	self.getCommentResponse,
						dataType		:	'json',
						contextObject	:	self
					});
				}
			});

			$(window).trigger('hashchange');
			$commentForm.find('label.theme-infield-label').inFieldLabels();
		};
		
		/**********************************************************************/
		
		this.getCommentResponse=function(response)
		{
			$comment.html(response.html);
	
			$commentFormPage.val(response.cpage);
			
			this.contextObject.bindEvent();

			$.scrollTo($comment,400,{easing:'easeOutQuint'});
			
			$('#comments').css('opacity','1.0');
		};
		
		/**********************************************************************/
		
		this.bindEvent=function()
		{
			var clickEventType=((document.ontouchstart!==null) ? 'click' : 'touchstart');
			
			jQuery('.theme-comment-reply').bind(clickEventType,function(e)
			{
				e.preventDefault();

				$commentFormCancelReply.css('display','block');
				$commentFormParentCommentId.val(jQuery(this).attr('href').substr(9));
				
				$.scrollTo($respond,400,{easing:'easeOutQuint'});
			});

			jQuery('.comment-in-reply').bind(clickEventType,function(e) 
			{
				e.preventDefault();
				$.scrollTo($($(this).attr('href')),400,{easing:'easeOutQuint'});
			});

			$commentFormCancelReply.bind(clickEventType,function(e) 
			{
				e.preventDefault();

				$commentFormParentCommentId.val(0);

				$(this).css('display','none');
				$.scrollTo($comment,400,{easing:'easeOutQuint'});
			});	
			
			$comment.find('>#comments_list .theme-comment-pagination>a').each(function()
			{
				$(this).attr('href',$(this).attr('href').substr($(this).attr('href').indexOf('#')));
			});
		};
		
		/**********************************************************************/
		
		this.addComment=function()
		{			
			var data=$commentForm.serialize()+'&action=comment_add';
			
			this.blockForm('block');
			
			$.ajax(
			{
				url				:	$option.requestURL,
				data			:	data,
				type			:	'POST',
				success			:	this.addCommentResponse,
				dataType		:	'json',
				contextObject	:	this
			});
		};

		/**********************************************************************/
	
		this.addCommentResponse=function(response)
		{
			this.contextObject.blockForm('unblock');

			if(parseInt(response.error)===0) $comment.html(response.html);

			$commentForm.find('p').qtip('destroy');

			if(typeof(response.info)!=='undefined')
			{	
				if(response.info.length)
				{	
					for(var key in response.info)
					{
						$('#'+response.info[key].fieldId).parent('.theme-block').qtip(
						{
							style			:      
							{
								classes		:	(parseInt(response.error)===1 ? 'pb-qtip pb-qtip-error' : 'pb-qtip pb-qtip-success')
							},
							content			: 	
							{
								text		:	response.info[key].message
							},
							position		: 	
							{
								my			:	'bottom right',
								at			:	'top right',
								container	:	$commentForm
							}
						}).qtip('show');				
					}
				}
			}

			if(parseInt(response.error)===0) 
			{
				$commentFormParentCommentId.val(0);
				$commentFormCancelReply.css('display','none');

				$.scrollTo('#comment-'+response.commentId,400,{easing:'easeOutQuint'});
			
				$('#author,#email,#url,#comment').val('').blur();

				this.contextObject.bindEvent();

				if(response.changeURL.length!==0) location.href=response.changeURL;
			}	
		};
		
		/**********************************************************************/
		
		this.blockForm=function(action)
		{
			if(action==='block') 
			{				
				$commentForm.find('.theme-block').block(
				{
					message		:	false,
					overlayCSS	:	
					{
						opacity	:	'0.3'
					}
				});
			}
			else $commentForm.find('.theme-block').unblock();	
		};	
		
		/**********************************************************************/
	}
	
	/**************************************************************************/
	
	$.fn.ThemeComment=function(option) 
	{
		var comment=new ThemComment(this,option);
		comment.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/