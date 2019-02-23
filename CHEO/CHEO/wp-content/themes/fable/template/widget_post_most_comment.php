<?php
		$Post=new ThemePost();
		
		$query=$Post->getPostMostComment($this->data['instance']);
		
		if($query)
		{
			$id='widget_theme_widget_post_most_comment_'.ThemeHelper::createId();
			
			echo $this->data['html']['start']; 
?>
			<div class="widget_theme_widget_post_most_comment theme-clear-fix" id="<?php echo esc_attr($id); ?>">
				
				<ul class="theme-reset-list">
<?php
			global $post;
			$bPost=$post;

			while($query->have_posts())
			{
				$query->the_post();
?>
					<li class="theme-clear-fix">
<?php
				if(has_post_thumbnail())
				{
?>
						<a href="<?php the_permalink(); ?>" title="<?php echo sprintf(esc_attr('View post "%s"',THEME_DOMAIN),get_the_title()); ?>"><?php echo get_the_post_thumbnail(get_the_ID(),'thumbnail'); ?></a>
<?php					
				}
?>
						<h6><a href="<?php the_permalink(); ?>" title="<?php echo sprintf(esc_attr('View post "%s"',THEME_DOMAIN),get_the_title()); ?>"><?php the_title(); ?></a></h6>
						<span><?php comments_number(); ?></span>
					</li>			
<?php
			}
		
			$post=$bPost;
?>
				</ul>
				
			</div>
<?php
			echo $this->data['html']['stop']; 
		}