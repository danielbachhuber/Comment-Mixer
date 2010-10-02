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

require_once('php/taxonomies.php');
require_once('php/settings.php');

if ( !class_exists('comment_mixer') ) {

class comment_mixer {
	
	var $options_group = 'comment_mixer_';
	var $options_name = 'comment_mixer_options';
	var $top_level_page = 'comment_mixer';
	var $settings_page = 'comment_mixer_settings';	
	
	function __construct() {
		
	}
	
	/**
	 * @todo normal initialization
	 */
	function init() {
		
		// Initialize all of our classes
		$this->settings = new comment_mixer_settings();
		$this->taxonomies = new comment_mixer_taxonomies();

		$this->taxonomies->init();

		// Save the options to our object
		$this->options = get_option( $this->options_name );
		
		if ( is_admin() ) {
			add_action( 'admin_menu', array(&$this, 'add_admin_menu_items') );
		}
		
	}
	
	/**
	 * @todo admin initialization
	 */
	function admin_init() {
		
		$this->settings->init();
		
	}
	
	/**
	 * Enqueue any admin assets we need
	 * @todo Finish
	 */
	function add_admin_assets() {
		
	}
	
	/**
	 * Any admin menu items we need
	 * @todo Add all of our settings page options
	 */
	function add_admin_menu_items() {
		
		// Top-level Comment Mixer page
		add_menu_page( 'Comment Mixer', 'Comment Mixer', 
						'manage_options', $this->top_level_page, 
						array(&$this->settings, 'settings_page'));
		
		// Taxonomy page			
		add_submenu_page( $this->top_level_page, 'Comment Types',
							'Comment Types', 'manage_options', 'edit-tags.php?taxonomy='.$this->taxonomies->taxonomy_label);
		
	}
	
	/**
	 * Default settings for when the plugin is activated for the first time
	 * @todo Initial settings on install
	 */ 
	function activate_plugin() {
	
	}
	
} // END: class comment_mixer

global $comment_mixer;
$comment_mixer = new comment_mixer();

}

// Core hooks to initialize the plugin
add_action( 'init', array( &$comment_mixer, 'init' ) );
add_action( 'admin_init', array( &$comment_mixer, 'admin_init' ) );

// Hook to perform action when plugin activated
register_activation_hook( COMMENT_MIXER_FILE_PATH, array(&$comment_mixer, 'activate_plugin') );

?>