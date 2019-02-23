<?php

/******************************************************************************/
/******************************************************************************/

require_once(plugin_dir_path(__FILE__).'define.php');

/******************************************************************************/

require_once(PLUGIN_PAGE_BUILDER_CLASS_PATH.'PB.File.class.php');
require_once(PLUGIN_PAGE_BUILDER_CLASS_PATH.'PB.Include.class.php');
require_once(PLUGIN_PAGE_BUILDER_CLASS_PATH.'PB.PageBuilder.class.php');

PBInclude::includeFileFromDir(PLUGIN_PAGE_BUILDER_CLASS_PATH);

/******************************************************************************/
/******************************************************************************/