<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    ImportToGravityForms
 * @subpackage ImportToGravityForms/includes
 * @author     Jasper Kang <kangzjnet@gmail.com>
 */
class ImportToGravityFormsDeactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$timestamp = wp_next_scheduled( 'bl_cron_hook' );
		wp_unschedule_event( $timestamp, 'bl_cron_hook' );
	}

}
