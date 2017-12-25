<?php

/**
 * Theme settings page
 */
class etuts_settings_page_class
{
    public function __construct()
    {
        add_action("admin_menu", array($this, "setup_theme_admin_menus"));
        add_action('admin_init', array($this, "registering_theme_setttings_fields"));
    }
    public function setup_theme_admin_menus()
    {
        add_submenu_page('themes.php',
            __('Theme settings', 'etuts'), __('Theme settings', 'etuts'),
            'manage_options', // cap
            'etuts-settings-page', // id of the settings page
            array($this, 'etuts_settings_page'));
    }
    public function registering_theme_setttings_fields()
    {
        add_settings_section(
            'general_etuts_section',
            'Theme general settings', // title of the section
            array($this, 'general_etuts_section_output') , // the function to output some things before the section fields
            'etuts-settings-page' // id of the settings page
        );

        add_settings_field(
            'general_example_field',
            'Example setting Name',
            array($this, 'general_example_field_output'),
            'etuts-settings-page',
            'general_etuts_section'
        );
        register_setting('etuts-settings-page', 'general_example_field');
    }

    /**
     * sections output callback functions
     */
    public function general_etuts_section_output() {
    	echo "wf";
    }
    
    /**
     * fields output callback functions
     */
    public function general_example_field_output() {
    	echo '<input name="general_example_field" id="general_example_field" type="text" value="' . get_option( 'general_example_field', 'we' ) . '" />';
    }

    /**
     * the page
     */
    public function etuts_settings_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        ?>
		<div class="wrap">
	        <h2><?php _e('Theme settings', 'etuts');?></h2>

	        <form method="POST" action="options.php">
	            <?php settings_fields('etuts-settings-page'); //pass slug name of page, also referred
		        //to in Settings API as option group name
		        do_settings_sections('etuts-settings-page'); //pass slug name of page
		        submit_button();
		        ?>
			</form>
	    </div>
	    <?php
	}
}


if( is_admin() )
    $settings_page = new etuts_settings_page_class();