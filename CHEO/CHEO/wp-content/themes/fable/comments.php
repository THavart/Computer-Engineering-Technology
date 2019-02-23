<?php
		global $post;
		if((comments_open()) && (!post_password_required()))
		{	
			$count=get_comments_number($post->ID);
			if($count>0)
			{
?>
		<h5 class="pb-header" id="comments-number">
			<span class="pb-header-content"><?php echo sprintf(__('All comments (%s)',THEME_DOMAIN),$count); ?></span>
		</h5>

		<div id="comments_list" class="theme-clear-fix">

			<ul class="theme-reset-list theme-clear-fix">
<?php
				$Comment=new ThemeComment();
				$Validation=new ThemeValidation();

				wp_list_comments(array('avatar_size'=>70,'page'=>$Comment->page,'callback'=>array($Comment,'createComment')));

				$pagination=paginate_comments_links(array
				(  
					'base'				=>	'#cpage-%#%',  
					'format'			=>	'',
					'add_fragment'		=>	'',
					'current'			=>	$Comment->page,
					'next_text'			=>	__('Next',THEME_DOMAIN),
					'prev_text'			=>	__('Previous',THEME_DOMAIN),
					'echo'				=>	false
				));  
?>
			</ul>
<?php
				if($Validation->isNotEmpty($pagination))
				{
?>
			<div class="theme-comment-pagination-box"> 
				<div class="theme-comment-pagination theme-clear-fix"><?php echo $pagination; ?></div>
			</div>
<?php
				}
?>
		</div>
<?php
			}
		}