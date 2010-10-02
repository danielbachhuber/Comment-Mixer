<?php

if ( !class_exists( 'comment_mixer_taxonomies' ) ){
  
/**
 * Class for managing all Comment Mixer taxonomy methods
 */
class comment_mixer_taxonomies
  {
	
	var $taxonomy_label = 'comment_mixer';
  
    function __construct() {
      
    }

	/**
	 * Initialize the plugin taxonomies
	 * @todo Do this
	 */
	function init() {
		
		if ( !taxonomy_exists($this->taxonomy_label) ) {
			
			$labels = array(	'name' => 'Comment Types',
								'singular_name' => 'Comment Type',
								'search_items' => 'Search Comment Types',
								'add_new_item' => 'Add New Comment Type',													
							);
			$args = array(	'label' => 'Comment Type',
							'labels' => $labels,
							'public' => false,
							'show_ui' => true,
							'show_tagcloud' => false,
							'rewrite' => false
						);
			register_taxonomy( $this->taxonomy_label, 'comment', $args );
			
		}
		
	}
	
	/**
	 * Default settings to insert when the plugin is activated for the first time
	 * @todo Establish the settings
	 */
	function activate_once() {
		
	}

}

}


?>