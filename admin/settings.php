<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Define the root category
    $settings = new admin_category('cfodoosync', get_string('pluginname', 'local_cfodoosync'));

    // Define the connection settings subcategory
    $connection = new admin_subcategory('cfodoosync_connection', get_string('connectionsettings', 'local_cfodoosync'));
    $settings->add($connection);

    // Add the connection settings fields
    $connection->add(new admin_setting_configtext('local_cfodoosync/odoo_url',
        get_string('odoo_url', 'local_cfodoosync'), get_string('odoo_url_desc', 'local_cfodoosync'), '',
        PARAM_URL));
    $connection->add(new admin_setting_configtext('local_cfodoosync/odoo_dbname',
        get_string('odoo_dbname', 'local_cfodoosync'), get_string('odoo_dbname_desc', 'local_cfodoosync'), '',
        PARAM_TEXT));
    $connection->add(new admin_setting_configtext('local_cfodoosync/odoo_username',
        get_string('odoo_username', 'local_cfodoosync'), get_string('odoo_username_desc', 'local_cfodoosync'), '',
        PARAM_TEXT));
    $connection->add(new admin_setting_configpasswordunmask('local_cfodoosync/odoo_password',
        get_string('odoo_password', 'local_cfodoosync'), get_string('odoo_password_desc', 'local_cfodoosync'), '',
        PARAM_RAW));
    
    // Define the course settings subcategory
    $course = new admin_subcategory('cfodoosync_course', get_string('coursesettings', 'local_cfodoosync'));
    $settings->add($course);

    // Add the course settings fields
    $course->add(new admin_setting_configtext('local_cfodoosync/default_category',
        get_string('default_category', 'local_cfodoosync'), get_string('default_category_desc', 'local_cfodoosync'), '',
        PARAM_INT));
    $course->add(new admin_setting_configcheckbox('local_cfodoosync/auto_create_courses',
        get_string('auto_create_courses', 'local_cfodoosync'), get_string('auto_create_courses_desc', 'local_cfodoosync'), 1));
    
    // Add the plugin settings to the admin block
    $ADMIN->add('localplugins', $settings);
}

function cf_odoo_sync_save_settings($data) {
    global $CFG, $OUTPUT;

    // Clean the output buffer
    ob_clean();

    // Save the settings
    foreach ($data as $name => $value) {
        set_config($name, $value, 'local_cfodoosync');
    }

    // Redirect back to the settings page
    redirect($CFG->wwwroot . '/admin/settings.php?section=local_cfodoosync');
}
