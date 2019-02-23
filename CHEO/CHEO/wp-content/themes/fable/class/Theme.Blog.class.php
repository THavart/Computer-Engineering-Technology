<?php

/******************************************************************************/
/******************************************************************************/

class ThemeBlog
{
	/**************************************************************************/
	
	function __construct()
	{
		$this->sortPostBlogField=array
		(
			'post_id'		=>	array(__('Post ID',THEME_DOMAIN)),
			'post_date'		=>	array(__('Post date',THEME_DOMAIN)),
			'title'			=>	array(__('Post title',THEME_DOMAIN))
		);

		$this->sortDirection=array
		(
			'asc'			=>	array(__('Ascending',THEME_DOMAIN)),
			'desc'			=>	array(__('Descending',THEME_DOMAIN))
		);		
	}
	
	/**************************************************************************/
	
	function getPost()
	{
		global $fable_parentPost;
		
		$Validation=new ThemeValidation();
		
		$argument=array();
		
		$s=get_query_var('s');
		$tag=get_query_var('tag');
        $author=get_query_var('author');
		$year=(int)get_query_var('year');
		$month=(int)get_query_var('monthnum');
		$categoryId=(int)get_query_var('cat');
		
		$argument['post_type']='post';
		
		if($Validation->isNotEmpty($s))
		{
			$argument['s']=$s;
			$argument['post_type']=array('post','page');
		}
		if($Validation->isNotEmpty($tag))
			$argument['tag']=$tag;
        if($Validation->isNotEmpty($author))
            $argument['author']=$author;
		if($categoryId>0)
			$argument['cat']=(int)$categoryId;
		elseif(($year>0) && ($month>0))
		{
			$argument['year']=$year;
			$argument['monthnum']=$month;
		}
		
		if(!($categoryId>0))
		{
			$option=ThemeOption::getPostMeta($fable_parentPost->post);
			ThemeHelper::removeUIndex($option,'post_category');

			if(is_array($option['post_category']))
			{
				if(count($option['post_category']))
					$argument['cat']=implode(',',array_map('intval',$option['post_category']));
			}
		}
	
		$default=array
		(
			'post_status'		=>	'publish',
			'posts_per_page'	=>	(int)get_option('posts_per_page'),
			'paged'				=>	(int)ThemeHelper::getPageNumber(),
			'orderby'			=>	ThemeOption::getOption('blog_sort_field'),
			'order'				=>	ThemeOption::getOption('blog_sort_direction')		
		);
	
		if($Validation->isNotEmpty($s))
		{
			include_once(ABSPATH.'wp-admin/includes/plugin.php');

			if(is_plugin_active('page-builder/page-builder.php'))
			{
				function posts_clauses($clauses)
				{
					global $wpdb;
					
					$s=get_query_var('s');
								
					$clauses['where']=$wpdb->prepare('AND ('.$wpdb->prefix.'posts.post_title LIKE %s OR '.$wpdb->prefix.'posts.post_excerpt LIKE %s OR '.$wpdb->prefix.'posts.post_content LIKE %s OR ('.$wpdb->prefix.'postmeta.meta_key=\''.PLUGIN_PAGE_BUILDER_CONTEXT.'\' AND CAST('.$wpdb->prefix.'postmeta.meta_value AS CHAR) LIKE %s)) AND '.$wpdb->prefix.'posts.post_type IN (\'post\',\'page\') AND (('.$wpdb->prefix.'posts.post_status=\'publish\'))','%'.$s.'%','%'.$s.'%','%'.$s.'%','%'.$s.'%');

					return($clauses);
				}
				
				$argument['meta_query']=array
				(
					array
					(
						
						'key'		=>	PLUGIN_PAGE_BUILDER_CONTEXT,
						'value'		=>	$s,
						'compare'	=>	'LIKE'			
					)
				);
				
				add_filter('posts_clauses','posts_clauses');
			}

			$argument['s']=$s;
		}

		$query=new WP_Query(array_merge($argument,$default));
		
		if(is_plugin_active('page-builder/page-builder.php'))
			remove_filter('posts_clauses','posts_clauses');

		return($query);
	}
	
	/**************************************************************************/
	
	function createPagination($query)
	{
		global $wp_rewrite;  
		
		$total=$query->max_num_pages; 
		$current=max(1,ThemeHelper::getPageNumber()); 
		
		$Validation=new ThemeValidation();
		
		$pagination=array
		(
			'base'			=>	add_query_arg('paged','%#%'),
			'format'		=>	'',
			'current'		=>	$current,  
			'total'			=>	$total,  
			'next_text'		=>	__('Next',THEME_CONTEXT),
			'prev_text'		=>	__('Previous',THEME_CONTEXT)
		);

		if($wp_rewrite->using_permalinks() )
			$pagination['base']=user_trailingslashit(trailingslashit(remove_query_arg('s',get_pagenum_link(1))).'page/%#%/','paged');

		if(is_search()) $pagination['add_args']=array('s'=>urlencode(get_query_var('s')));

		$html=paginate_links($pagination);
		
		if($Validation->isNotEmpty($html))
		{
			$html=
			'
				<div class="theme-blog-pagination-box">
					<div class="theme-blog-pagination">
						'.$html.'
					</div>
				</div>
			';
		}
		
		return($html);
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/