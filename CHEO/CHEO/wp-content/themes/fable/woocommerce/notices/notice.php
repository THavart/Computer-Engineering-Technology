<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/notice.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if(!defined('ABSPATH')) exit;
if(!$messages) return;

$secondLine=null;

foreach ($messages as $message)
{
    if(!is_null($secondLine)) $secondLine.='<br>';
    $secondLine.=$message;
}

$shortcode=
'
    [pb_notice icon="chat_alt.png" icon_bg_color="FE6500" css_class="pb-margin-bottom-50"]
    [pb_notice_first_line]'.__('Information',THEME_DOMAIN).'[/pb_notice_first_line]
    [pb_notice_second_line]'.$secondLine.'[/pb_notice_second_line]
    [/pb_notice]		
';

echo do_shortcode($shortcode);