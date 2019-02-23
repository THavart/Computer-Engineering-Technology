<?php

/******************************************************************************/
/******************************************************************************/

define('PLUGIN_THEME_INSTALLER_THEME_CONTEXT','ft');
define('PLUGIN_THEME_INSTALLER_THEME_CLASS_PREFIX','');
define('PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX','ft_option');

define('PLUGIN_THEME_INSTALLER_SKIN_OPTION_NAME','ft_skin');

/***/

TIData::set('import','option',array('widget_data','content_data','theme_option'));

/***/

TIData::set('meta','post_menu',array('post_title'=>'Home - Scrolling One Page','post_type'=>'page','menu_title'=>'Scrolling One Page','meta_name'=>'menu_top'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_widget_area_sidebar_woocommerce',array('title'=>'Shop','postType'=>PLUGIN_THEME_INSTALLER_THEME_CONTEXT.'_widget_area'));

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_widget_area_footer',array('title'=>'Footer','postType'=>PLUGIN_THEME_INSTALLER_THEME_CONTEXT.'_widget_area'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_widget_area_footer_woocommerce',array('title'=>'Footer','postType'=>PLUGIN_THEME_INSTALLER_THEME_CONTEXT.'_widget_area'));

TIData::set('term_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_menu_top',array('title'=>'Main','taxonomy'=>'nav_menu'));
TIData::set('term_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_menu_top_woocommerce',array('title'=>'Main','taxonomy'=>'nav_menu'));

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_header_background_image_src',array('title'=>'pattern','postType'=>'attachment'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_category_post_id',array('title'=>'Blog Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_archive_post_id',array('title'=>'Blog Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_search_post_id',array('title'=>'Blog Right Sidebar','postType'=>'page'));
TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_blog_author_post_id',array('title'=>'Blog Right Sidebar','postType'=>'page'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_maintenance_mode_post_id',array('title'=>'Maintenance Mode','postType'=>'page'));

/***/

TIData::set('post_id',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_page_404_page_id',array('title'=>'Page Not Found','postType'=>'page'));

/***/

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_footer_top_background_image_src',array('title'=>'pattern','postType'=>'attachment'));

/***/

TIData::set('path',PLUGIN_THEME_INSTALLER_THEME_OPTION_PREFIX.'_menu_logo_src',array('title'=>'logo','postType'=>'attachment'));

/***/	

TIData::set('post_id','page_on_front',array('title'=>'Home Style I','postType'=>'page'));

TIData::set('option','show_on_front','page');
TIData::set('option','posts_per_page',5);
TIData::set('option','thread_comments',1);
TIData::set('option','thread_comments_depth',2);
TIData::set('option','page_comments',1);
TIData::set('option','comments_per_page',5);
TIData::set('option','permalink_structure','/%postname%/');

TIData::set('option','show_avatars',1);
TIData::set('option','avatar_default','mystery');

TIData::set('option','date_format','F d, Y');

TIData::set('option','blogname','Fable - Children Kindergarten WordPress Theme');
TIData::set('option','blogdescription','');

/******************************************************************************/
/******************************************************************************/