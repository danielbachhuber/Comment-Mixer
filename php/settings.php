<?php

if ( !class_exists( 'comment_mixer_settings' ) ){
  
/**
 * Class for managing all Comment Mixer settings views
 */
class comment_mixer_settings
  {
  
    function __construct() {
      
    }

	/**
	 * Initialize the plugin settings
	 * @todo Do this
	 */
	function init() {
		global $comment_mixer;
		
		register_setting( $comment_mixer->options_group, $comment_mixer->options_name, array(&$this, 'validate_settings') );
		
		/* General */
		add_settings_section( 'general', 'General', array(&$this, 'general_setting_section'), $comment_mixer->top_level_page );
		add_settings_field( 'enable', 'Enable Comment Mixing', array(&$this, 'enable_option'), $comment_mixer->top_level_page, 'general' );
		
	}
	
	function general_setting_section() {
		
	}
	
	/**
	 * Option: Enable or disable Comment Mixer
	 */ 
	function enable_option() {
		global $comment_mixer;
		
		echo '<select id="enabled" name="' . $comment_mixer->options_name . '[enabled]">';
		echo '<option value="0">Disabled</option>';
		echo '<option value="1"';
		if ( $options['enabled'] == 1 ) { echo ' selected="selected"'; }
		echo '>Enabled</option>';
		echo '</select>';
				
	}
	
	function settings_page() {
		global $comment_mixer;

		?>                                   
		<div class="wrap">
			<div class="icon32" id="icon-options-general"><br/></div>

			<h2><?php _e('Comment Mixer', 'comment-mixer') ?></h2>

				<form action="options.php" method="post">

				<?php settings_fields( $comment_mixer->options_group ); ?>
				<?php do_settings_sections( $comment_mixer->settings_page ); ?>

				<p class="submit"><input name="submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>

				</form>
			</div>

		<?php
	}
	
	/**
	 * Validate any settings we have
	 */
	function validate_settings() {
		
	}

} // END: comment_mixer_settings

}


?>