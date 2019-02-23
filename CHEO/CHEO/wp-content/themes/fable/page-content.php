<?php
		if(have_posts())
		{
			while(have_posts())
			{
				the_post();
				the_content();
?>
		<div class="theme-blog-pagination-box">
			<div class="theme-blog-pagination">
<?php 
				wp_link_pages(array
				(
					'before'		=>	null,
					'after'			=>	null,
					'link_before'	=> '<span>',
					'link_after'	=> '</span>'
				)); 
?>
			</div>
		</div>
<?php
				get_template_part('comment');
			}
		}