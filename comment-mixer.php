<?php
/*
Plugin Name: Comment Mixer
Plugin URI: http://github.com/danielbachhuber/Comment-Mixer
Description: Structured commenting for WordPress
Author: Daniel Bachhuber et al
Version: 0.1
Author URI: http://www.danielbachhuber.com/
*/

define('COMMENT_MIXER_FILE_PATH', __FILE__);

if ( !class_exists('comment_mixer') ) {

class comment_mixer {
	
	var $options_group = 'comment_mixer_';
	var $options_group_name = 'comment_mixer_options';
	var $settings_page = 'comment_mixer_settings';	
	
	function __construct() {

	}
	
	/**
	 * @todo normal initialization
	 */
	function init() {

		// Save the options to our object
		$this->options = get_option( $this->options_group_name );
		
		
	}
	
	/**
	 * @todo admin initialization
	 */
	function admin_init() {
		
	}
	
	/**
	 * Default settings for when the plugin is activated for the first time
	 * @todo Initial settings on install
	 */ 
	function activate_plugin() {
	
	}
	
	/**
	 * Any admin menu items we need
	 * @todo Add all of our settings page options
	 */
	function add_admin_menu_items() {		
		
	}
	
} // END: class comment_mixer

global $comment_mixer;
$comment_mixer = new comment_mixer();

// Core hooks to initialize the plugin
add_action( 'init', array( &$comment_mixer, 'init' ) );
add_action( 'admin_init', array( &$comment_mixer, 'admin_init' ) );

// Hook to perform action when plugin activated
register_activation_hook( COMMENT_MIXER_FILE_PATH, array(&$comment_mixer, 'activate_plugin') );

}

?>