<?php
		if((comments_open()) && (!post_password_required()))
		{
?>
			<div id="comments">
				<?php comments_template(); ?>
			</div>
<?php
			$Comment=new ThemeComment();

			$commenter=wp_get_current_commenter();
			$req=get_option('require_name_email');
			$aria_req=($req ? ' aria-required=\'true\'' : '');

			$field=array();

			$field['author']=
			'
				<p class="theme-clear-fix">
					<label for="author" class="theme-infield-label">'.__('Name',THEME_DOMAIN).($req ? ' <span class="required">*</span>' : '').'</label>
					<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.'/>
				</p>
			';

			$field['email']=
			'
				<p class="theme-clear-fix">
					<label for="email" class="theme-infield-label">'.__('Email',THEME_DOMAIN).($req ? ' <span class="required">*</span>' : '').'</label>
					<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.'/>
				</p>
			';

			$field['url']=
			'
				<p class="theme-clear-fix">
					<label for="url" class="theme-infield-label">'.__('Website',THEME_DOMAIN).'</label>
					<input id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"/>
				</p>
			';

			$commentField=
			'
				<p class="theme-clear-fix">
					<label for="comment" class="theme-infield-label">'.__('Comment',THEME_DOMAIN).' <span class="required">*</span></label>
					<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				</p>	
			';

			$argument=array
			(
				'id_form'				=>	'comment-form',
				'title_reply'			=>	'<span class="pb-header-content">'.__('Leave Your Reply',THEME_DOMAIN).'</span>',
				'cancel_reply_link'		=>	__('Cancel reply',THEME_DOMAIN),
				'comment_field'			=>	$commentField,
				'fields'				=>	apply_filters('comment_form_default_fields',$field),
				'label_submit'			=>	__('Post comment',THEME_DOMAIN)
			);

			comment_form($argument); 
?>			
			<script type="text/javascript">
				jQuery(document).ready(function($) 
				{
					$().ThemeComment({'requestURL':'<?php echo admin_url('admin-ajax.php'); ?>','page':<?php echo $Comment->page; ?>});
				});
			</script>
<?php
		}
?>