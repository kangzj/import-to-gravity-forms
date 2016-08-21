<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ImportToGravityForms
 * @subpackage ImportToGravityForms/admin
 * @author     Your Name <email@example.com>
 */
class ImportToGravityForms_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * the database connection information keys
	 * @var array
	 */
	private $setting_keys;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name  = $plugin_name;
		$this->version      = $version;
		$this->setting_keys = array(
			'host',
			'port',
			'dbname',
			'user',
			'pass',
			'sql',
			'when',
			'interval'
		);

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/import-to-gravity-forms-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/import-to-gravity-forms-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_laydate', plugin_dir_url( __FILE__ ) . 'js/laydate/laydate.js', array( 'jquery' ), $this->version, false );

	}

	public function setting_api_init() {
		foreach ( $this->setting_keys as $val ) {
			$id = "import_to_gravity_forms_setting_db_{$val}";
			register_setting( 'import_to_gravity_forms_setting', $id );
		}

	}

	public function import_to_gravity_forms_admin_menu() {
		add_options_page(
			'Import To Gravity Forms Setting Page',
			'Import Settings',
			'manage_options',
			'import_to_gravity_forms_setting',
			'import_to_gravity_forms_setting_page'
		);
	}

	/**
	 * the cron job
	 * register_deactivation_hook( __FILE__, 'bl_deactivate' );
	 *
	 * function bl_deactivate() {
	 * $timestamp = wp_next_scheduled( 'bl_cron_hook' );
	 * wp_unschedule_event($timestamp, 'bl_cron_hook' );
	 * }
	 */
	public function bl_cron_exec() {
		global $mydb;
		$username = get_option( 'import_to_gravity_forms_setting_db_user' );
		$password = get_option( 'import_to_gravity_forms_setting_db_pass' );
		$database = get_option( 'import_to_gravity_forms_setting_db_dbname' );
		$host     = get_option( 'import_to_gravity_forms_setting_db_host' ) . ':'
		            . get_option( 'import_to_gravity_forms_setting_db_port' );
		$mydb     = new wpdb( $username, $password, $database, $host );
		$results  = $mydb->get_results( "select 1" );
		// do the import work here
		file_put_contents( 'd:/test.log', print_r( $results ) );

	}


}

/**
 * options page callback
 * which will set the cron task as well
 */
function import_to_gravity_forms_setting_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) ) {
		$_REQUEST['settings-updated'] = false;
	}
	if ( $_REQUEST['settings-updated'] ) {
		if ( $timestamp = wp_next_scheduled( 'bl_cron_hook' ) ) {
			wp_unschedule_event( $timestamp, 'bl_cron_hook' );
		}
		$time_picked = get_option( 'import_to_gravity_forms_setting_db_when', false );
		$time        = strtotime( $time_picked );
		if ( $time ) {
			$interval = intval( get_option( 'import_to_gravity_forms_setting_db_interval' ) );
			if ( $interval ) {
				wp_schedule_event( $time, $interval . 'seconds', 'bl_cron_hook' );
			}
		}
	}

	include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/import-to-gravity-forms-admin-display.php';
}