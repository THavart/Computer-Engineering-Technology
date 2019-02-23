<?php

/******************************************************************************/
/******************************************************************************/

define('PLUGIN_THEME_STYLE_SKIN_OPTION_NAME','ft_skin');

$path='/multisite/'.get_current_blog_id().'/style/';

TSData::set('theme_path_multisite_style',get_template_directory().$path);
TSData::set('theme_url_multisite_style',get_template_directory_uri().$path);

/******************************************************************************/
/******************************************************************************/