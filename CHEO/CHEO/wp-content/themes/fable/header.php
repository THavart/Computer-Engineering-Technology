<?php ob_start(); ?>
<!DOCTYPE html>
<?php
		global $post,$fable_parentPost;
		
		$Theme=new Theme();
		
		$Post=new ThemePost();
		$Page=new ThemePage();
		$Menu=new ThemeMenu();
		$Validation=new ThemeValidation();
		
		if(($fable_parentPost=$Post->getPost())===false) 
		{
			$fable_parentPost=new stdClass();
			$fable_parentPost->post=$post;
		}
		
		$meta=ThemeOption::getPostMeta($post);
		ThemeHelper::removeUIndex($meta,'page_background_color');
?>
		<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

			<head>

				<title><?php wp_title('|'); ?></title> 
				<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
				<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
				<meta name="format-detection" content="telephone=no"/>
<?php
		if(ThemeOption::getOption('responsive_mode_enable')==1)
		{
?>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<?php
		}
?>
				<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
				<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<?php				
		if($Validation->isNotEmpty(ThemeOption::getOption('favicon_url')))
		{
?>
				<link rel="shortcut icon" href="<?php echo ThemeHelper::esc_attr(ThemeOption::getOption('favicon_url')); ?>" />
<?php
		}
					
		wp_head(); 
?>
			</head>

			<body <?php body_class($Theme->getFooterStickyClass()); ?>>
				
				<?php echo $Menu->create(); ?>

				<div class="theme-page"<?php echo ThemeHelper::createStyleAttribute(array('background-color'=>ThemeColor::getColor($meta['page_background_color']))); ?>>
<?php
					echo $Page->displayHeader($fable_parentPost->post);
				
					$template=$Page->getCurrentTemplate();
					
					if($template=='main.php')
					{
?>
					<div class="theme-page-content theme-clear-fix">
<?php					
					}
					else
					{
						$WidgetArea=new ThemeWidgetArea();
						
						$widgetAreaData=$WidgetArea->getWidgetAreaByPost($fable_parentPost->post,true,true);
						$class=$WidgetArea->getWidgetAreaCSSClass($widgetAreaData);		
?>
					<div class="theme-page-content theme-clear-fix theme-main <?php echo $class; ?>">
<?php
						if($widgetAreaData['location']==1)
						{
?>
						<div class="theme-column-left"><?php $WidgetArea->create($widgetAreaData); ?></div>
						<div class="theme-column-right">
<?php
						}
						elseif($widgetAreaData['location']==2)
						{
?>
						<div class="theme-column-left">
<?php
						}
					}