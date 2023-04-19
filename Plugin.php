<?php

	/**
* Plugin Name: Wp-custom-api-plugin
* Plugin URI: http://192.168.0.77/sidharth/neword/
* Description: Api-Test.
* Version: 0.1
* Author: Sidharth
* Author URI: http://192.168.0.77/sidharth/neword/
**
/*
 * Add my new menu to the Admin Control Panel
 */
// Hook the 'admin_menu' action hook, run the function named 'mfp_Add_My_Admin_Link()'



// function custom_plugin_register_settings() {
 
// register_setting('custom_plugin_options_group', 'first_field_name');
 
// register_setting('custom_plugin_options_group', 'second_field_name');
 
// register_setting('custom_plugin_options_group', 'third_field_name');
 
// }
// add_action('admin_init', 'custom_plugin_register_settings');

add_action( 'admin_menu', 'plugin_add_admin_menu' );
add_action( 'admin_init', 'plugin_settings_init' );


function plugin_add_admin_menu(  ) { 

	add_menu_page( 'Wp-api-fields', 'Wp-api-fields', 'manage_options', 'wp-api-fields', 'plugin_options_page' );

}


function plugin_settings_init(  ) { 

	register_setting( 'pluginPage', 'plugin_settings' );

	add_settings_section(
		'plugin_pluginPage_section', 
		__( 'Your section description', 'sffsffsffs' ), 
		'plugin_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'plugin_text_field_0', 
		__( 'Post Title', 'sffsffsffs' ), 
		'plugin_text_field_0_render', 
		'pluginPage', 
		'plugin_pluginPage_section' 
	);

	add_settings_field( 
		'plugin_text_field_1', 
		__( 'Author', 'sffsffsffs' ), 
		'plugin_text_field_1_render', 
		'pluginPage', 
		'plugin_pluginPage_section' 
	);

	add_settings_field( 
		'plugin_textarea_field_2', 
		__( 'Post Content', 'sffsffsffs' ), 
		'plugin_textarea_field_2_render', 
		'pluginPage', 
		'plugin_pluginPage_section' 
	);


}


function plugin_text_field_0_render(  ) { 

	$options = get_option( 'plugin_settings' );
	?>
	<input type='text' name='plugin_settings[plugin_text_field_0]' value='<?php echo $options['plugin_text_field_0']; ?>'>
	<?php

}


function plugin_text_field_1_render(  ) { 

	$options = get_option( 'plugin_settings' );
	?>
	<input type='text' name='plugin_settings[plugin_text_field_1]' value='<?php echo $options['plugin_text_field_1']; ?>'>
	<?php

}


function plugin_textarea_field_2_render(  ) { 

	$options = get_option( 'plugin_settings' );
	?>
	<textarea cols='40' rows='5' name='plugin_settings[plugin_textarea_field_2]'> 
		<?php echo $options['plugin_textarea_field_2']; ?>
 	</textarea>
	<?php

}


function plugin_settings_section_callback(  ) { 

	echo __( 'This section description', 'sffsffsffs' );

}


function plugin_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Wp-api-fields</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}


