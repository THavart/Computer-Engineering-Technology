<?php
		$id=(int)ThemeOption::getOption('page_404_page_id');
		
		if($id<=0) wp_redirect(get_home_url());
		else
		{
			$url=get_the_permalink($id);
			
			if($url===false) wp_redirect(get_home_url());
			else wp_redirect($url);
		}