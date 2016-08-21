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

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<div id="poststuff">
		<div id="post-body">
			<div id="post-body-content">
				<form method="post" action="options.php">
					<?php settings_fields( 'import_to_gravity_forms_setting' ); ?>
					<table class="import_to_gfs_dbtable">
						<tr valign="top">
							<th scope="row"><?php _e( 'Host IP:', 'import_to_gravity_forms' ); ?></th>
							<td width="70%">
								<input name="import_to_gravity_forms_setting_db_host"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_host' ); ?>"/>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e( 'Port:', 'import_to_gravity_forms' ); ?></th>
							<td>
								<input name="import_to_gravity_forms_setting_db_port"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_port' ); ?>"/>
								<br/>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e( 'Database Name:', 'import_to_gravity_forms' ); ?></th>
							<td>
								<input name="import_to_gravity_forms_setting_db_dbname"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_dbname' ); ?>"/>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e( 'User:', 'import_to_gravity_forms' ); ?></th>
							<td>
								<input name="import_to_gravity_forms_setting_db_user"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_user' ); ?>"/>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e( 'Password:', 'import_to_gravity_forms' ); ?></th>
							<td>
								<input name="import_to_gravity_forms_setting_db_pass"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_pass' ); ?>"/>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php _e( 'SQL:', 'import_to_gravity_forms' ); ?></th>
							<td>
								<textarea
									name="import_to_gravity_forms_setting_db_sql"><?= get_option( 'import_to_gravity_forms_setting_db_sql' ); ?></textarea>
							</td>
						</tr>
					</table>
					<table class="import_to_gfs_dbtable">
						<tr valign="top">
							<th scope="row"><?php _e( 'When to Fire:', 'import_to_gravity_forms' ); ?></th>
							<td width="70%">
								<input name="import_to_gravity_forms_setting_db_when"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_when' ); ?>"
								       onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"/><br/>
								<label class="description"
								       for="import_to_gravity_forms_setting_db_when"><?php _e( 'when to fire the cron task, example: 2016-08-21 11:00:00', 'import_to_gravity_forms' ); ?></label>
							</td>
						<tr>
							<th scope="row"><?php _e( 'Interval:', 'import_to_gravity_forms' ); ?></th>
							<td width="70%">
								<input name="import_to_gravity_forms_setting_db_interval"
								       value="<?= get_option( 'import_to_gravity_forms_setting_db_interval' ); ?>"/><br/>
								<label class="description"
								       for="import_to_gravity_forms_setting_db_interval"><?php _e( 'in <b>seconds</b>, when set to 0, it will be fired only once', 'import_to_gravity_forms' ); ?></label>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit">
							</td>
						</tr>
					</table>
				</form>
			</div> <!-- end post-body-content -->
		</div> <!-- end post-body -->
	</div> <!-- end poststuff -->

</div>
