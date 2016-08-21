<?php

/**
* Provide a admin area view for the plugin
*
* This file is used to markup the admin-facing aspects of the plugin.
*
* @link       http://kangzj.net
* @since      1.0.0
*
* @package    ImportToGravityForms
* @subpackage ImportToGravityForms/admin/partials
*/
?>
<div class="wrap">

	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Import Options saved!', 'Import' ); ?></strong></p></div>
	<?php endif; ?>

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<div id="poststuff">
		<div id="post-body">
			<div id="post-body-content">
				<form method="post" action="options.php">
					<?php settings_fields( 'import_to_gravity_forms_setting' ); ?>
					<table class="form-table">
						<tr valign="top">
							<th scope="row"><?php _e( 'Insert the Database connection infomation here', 'import_to_gravity_forms' ); ?></th>
							<td>
								Host IP: <input name="import_to_gravity_forms_setting_db_host" value="<?=get_option( 'import_to_gravity_forms_setting_db_host' );?>" />
								<br />
								Port: <input name="import_to_gravity_forms_setting_db_port" value="<?=get_option( 'import_to_gravity_forms_setting_db_port' );?>"/>
								<br />
								Database Name: <input name="import_to_gravity_forms_setting_db_dbname" value="<?=get_option( 'import_to_gravity_forms_setting_db_dbname' );?>" />
								<br />
								User: <input name="import_to_gravity_forms_setting_db_user" value="<?=get_option( 'import_to_gravity_forms_setting_db_user' );?>" />
								<br />
								Password: <input name="import_to_gravity_forms_setting_db_pass" value="<?=get_option( 'import_to_gravity_forms_setting_db_pass' );?>" />
								<br />
								Table: <input name="import_to_gravity_forms_setting_db_table" value="<?=get_option( 'import_to_gravity_forms_setting_db_table' );?>" />
								<br/>
								<!--<label class="description"
								       for="wporg_hide_meta[hide_meta]"><?php _e( 'Toggles whether or not to display post meta under posts.', 'wporg' ); ?></label>-->
								<input type="submit" name="submit">
							</td>
						</tr>
					</table>
				</form>
			</div> <!-- end post-body-content -->
		</div> <!-- end post-body -->
	</div> <!-- end poststuff -->
</div>