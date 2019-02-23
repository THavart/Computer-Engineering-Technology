<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('wp_ep_fitness_widget')) {
   /**
	* Widget Boilerplate
	*/
	class wp_ep_fitness_widget extends WP_Widget
	{

	  /**
	   * Constructor
	   *
	   * Registers the widget details with the parent class
	   */
	  function __construct()
	  {
		 // widget actual processes
	  //	parent::__construct($id = 'wp_pb_widget', $name = ' Form', $options = array('description' => __('r Form', 'wp-pb')));
	  }

	  /**
	   * Creates a form in the theme widgets page
	   * @param $instance
	   */
	  

	  /**
	   * Update the form on submit
	   *
	   * @param $new_instance
	   * @param $old_instance
	   * @return array
	   */
	  function update($new_instance, $old_instance)
	  {
	  	$instance = $old_instance;
	  	$instance['field'] = strip_tags($new_instance['field']);
	  	return $instance;
	  }

	  /**
	   * Displays the widget
	   *
	   * @param $args
	   * @param $instance
	   */
	  function widget($args, $instance)
	  {
		 // Extract the content of the widget
	  
	  	
	  }

	}
}
