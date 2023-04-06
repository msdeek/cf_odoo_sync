<?php
// This file defines the plugin settings

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Define the settings page
    $settings = new admin_settingpage('local_cf_odoo_sync', get_string('pluginname', 'local_cf_odoo_sync'));

    // Add a heading to the settings page
    $settings->add(new admin_setting_heading('cf_odoo_sync_settings_heading',
        get_string('pluginsettings', 'local_cf_odoo_sync'),
        get_string('pluginsettingsdesc', 'local_cf_odoo_sync')));

    // Add a text input for the Odoo server URL
    $settings->add(new admin_setting_configtext('local_cf_odoo_sync/odoo_url',
        get_string('odoo_url', 'local_cf_odoo_sync'),
        get_string('odoourl_desc', 'local_cf_odoo_sync'),
        'http://localhost'));

    // Add a text input for the Odoo database name
    $settings->add(new admin_setting_configtext('local_cf_odoo_sync/odoo_dbname',
        get_string('odoo_dbname', 'local_cf_odoo_sync'),
        get_string('odoodbname_desc', 'local_cf_odoo_sync'),
        'odoo'));

    // Add a text input for the Odoo username
    $settings->add(new admin_setting_configtext('local_cf_odoo_sync/odoo_username',
        get_string('odoo_username', 'local_cf_odoo_sync'),
        get_string('odoo_username_desc', 'local_cf_odoo_sync'),
        'admin'));

    // Add a password input for the Odoo password
    $settings->add(new admin_setting_configpasswordunmask('local_cf_odoo_sync/odoo_password',
        get_string('odoo_password', 'local_cf_odoo_sync'),
        get_string('odoopassword_desc', 'local_cf_odoo_sync'),
        ''));

    // Add a custom HTML element to display the button
$button = '<div id="test-connection-button" class="form-group row">
<div class="col-md-3 offset-md-3">
    <button type="button" class="btn btn-secondary">' . get_string('test_connection', 'local_cf_odoo_sync') . '</button>
</div>
</div>';
$settings->add(new admin_setting_heading('test_connection_heading', '', $button));

// Add JavaScript to handle the button click event and perform the AJAX call
$PAGE->requires->js(new moodle_url('/local/cf_odoo_sync/amd/src/init_test_connection_button.js'));


    // Add the plugin settings page to the administration tree
    $ADMIN->add('localplugins', $settings);

    

}
