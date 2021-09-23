<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              devmaverick.com
 * @since             1.0.0
 * @package           Code_Snippet_Dm
 *
 * @wordpress-plugin
 * Plugin Name:       Code Snippet DM
 * Plugin URI:
 * Description:       Display your code snippets in a stylish way inside your content. The plugin uses shortcodes and also very intuitive TinyMCE interface.
 * Version:           1.3.2
 * Author:            George Cretu
 * Author URI:        devmaverick.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       code-snippet-dm
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CSDM_PLUGIN_NAME_VERSION', '1.3.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-code-snippet-dm-activator.php
 */
function csdm_activate_code_snippet_dm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-code-snippet-dm-activator.php';
	CSDM_Activator::csdm_activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-code-snippet-dm-deactivator.php
 */
function csdm_deactivate_code_snippet_dm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-code-snippet-dm-deactivator.php';
	CSDM_Deactivator::csdm_deactivate();
}

register_activation_hook( __FILE__, 'csdm_activate_code_snippet_dm' );
register_deactivation_hook( __FILE__, 'csdm_deactivate_code_snippet_dm' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-code-snippet-dm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function csdm_run_code_snippet_dm() {

	$plugin = new CSDM_Code_Snippet_Dm();
	$plugin->csdm_run();

}
csdm_run_code_snippet_dm();
