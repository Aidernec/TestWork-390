<?php

/**
 * Functions and definitions.
 */

/**
 * Get all the include files for the theme.
 */
function get_theme_include_files() {
	return array(
		'inc/styles-and-scripts.php', // Load styles and scripts.
		'inc/my-menu.php', // Load my menu
		'inc/custom-scripts.php', // Load my menu
	);
}

foreach ( get_theme_include_files() as $include ) {
	require trailingslashit( get_template_directory() ) . $include;
}
