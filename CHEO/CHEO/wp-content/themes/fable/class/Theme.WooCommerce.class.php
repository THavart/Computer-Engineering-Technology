<?php

/******************************************************************************/
/******************************************************************************/

class ThemeWooCommerce
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function addAction()
	{
		remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
		add_action('woocommerce_shop_loop_item_title',array($this,'shopLoopItemTitle'));	
        
        add_action('wp_enqueue_scripts',array($this,'wpEnqueueScripts'));
	}
	
	/**************************************************************************/
	
    function wpEnqueueScripts()
    {
        wp_dequeue_style('select2');
        wp_deregister_style('select2' );

        wp_dequeue_script('select2');
        wp_deregister_script('select2');       
    }
    
    /**************************************************************************/
    
	function addFilter()
	{
		add_filter('loop_shop_columns',array($this,'loopColumn'));
		add_filter('loop_shop_per_page',array($this,'loopShopPerPage'));		
	}
	
	/**************************************************************************/
	
	function loopColumn()
	{
		return(3);
	}
	
	/**************************************************************************/
	
	function loopShopPerPage()
	{
		return(6);
	}
	
	/**************************************************************************/
	
	function shopLoopItemTitle()
	{
		echo '<h6>'.get_the_title().'</h6>';
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/