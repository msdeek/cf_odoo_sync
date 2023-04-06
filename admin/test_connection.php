<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once($CFG->dirroot . '/local/cf_odoo_sync/lib.php');

// Check that the user is an administrator
require_login();
is_siteadmin() || die;

// Get the plugin settings
$odoo_url = get_config('local_cf_odoo_sync', 'odoo_url');
$odoo_dbname = get_config('local_cf_odoo_sync', 'odoo_dbname');
$odoo_username = get_config('local_cf_odoo_sync', 'odoo_username');
$odoo_password = get_config('local_cf_odoo_sync', 'odoo_password');

// Test the connection to Odoo
if (cf_odoo_sync_test_connection($odoo_url, $odoo_dbname, $odoo_username, $odoo_password)) {
    echo 'Connection successful!';
} else {
    echo 'Connection failed!';
}
