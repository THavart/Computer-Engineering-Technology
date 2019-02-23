<?php
		/* Template Name: Main */

		get_header(); 
		
		global $fable_parentPost;
		
		the_post();
		
		the_content();
		
		get_footer();