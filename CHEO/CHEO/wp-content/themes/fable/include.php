<?php

/******************************************************************************/
/******************************************************************************/

require_once('define.php');

/******************************************************************************/

require_once(THEME_PATH_CLASS.'Theme.File.class.php');
require_once(THEME_PATH_CLASS.'Theme.Include.class.php');

require_once(THEME_PATH_CLASS.'Theme.Widget.class.php');

ThemeInclude::includeClass(THEME_PATH_CLASS.'Walker_Nav_Menu.php',array('Walker_Nav_Menu_Edit_Custom'));

ThemeInclude::includeFileFromDir(THEME_PATH_CLASS,array('Walker_Nav_Menu.php'));

ThemeInclude::includeClass(THEME_PATH_LIBRARY.'mobileDetect/Mobile_Detect.php',array('Mobile_Detect'));
ThemeInclude::includeClass(THEME_PATH_LIBRARY.'tgm_plugin_activation/class-tgm-plugin-activation.php',array('TGM_Plugin_Activation'));

/******************************************************************************/
/******************************************************************************/