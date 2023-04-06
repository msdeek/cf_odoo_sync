<?php
// This file is executed during plugin upgrade

defined('MOODLE_INTERNAL') || die();

function xmldb_cfodoosync_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2022040401) {
        // Define the new table to create
        $table = new xmldb_table('cf_odoosync_courses');
        $field = new xmldb_field('odoo_id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'id');

        // Add the new field
        $dbman->add_field($table, $field);

        // Update the plugin version
        upgrade_plugin_savepoint(true, 2022040401, 'cfodoosync');
    }

    return true;
}
