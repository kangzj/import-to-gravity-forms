<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://kangzj.net
 * @since             1.0.0
 * @package           ImportToGravityForms
 *
 * @wordpress-plugin
 * Plugin Name:       Import To Gravity Forms
 * Plugin URI:        https://github.com/kangzj/ImportToGravityForms
 * Description:       Import entries from outer database
 * Version:           1.0.0
 * Author:            Jasper Kang
 * Author URI:        http://kangzj.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ImportToGravityForms
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activateImportToGravityForms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/import-to-gravity-forms-activator.php';
    ImportToGravityFormsActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivateImportToGravityForms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/import-to-gravity-forms-deactivator.php';
    ImportToGravityFormsDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activateImportToGravityForms' );
register_deactivation_hook( __FILE__, 'deactivateImportToGravityForms' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/import-to-gravity-forms.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function runImportToGravityForms() {

	$plugin = new ImportToGravityForms();
	$plugin->run();

}
runImportToGravityForms();
