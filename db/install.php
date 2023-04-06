<?php
// This file is executed during plugin installation

defined('MOODLE_INTERNAL') || die();

function xmldb_cfodoosync_install() {
    global $DB;

    // Define the new table to create
    $table = new xmldb_table('cf_odoosync_courses');
    $table->add_field('id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    $table->add_field('courseid', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null);
    $table->add_field('odoo_course_id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null);
    $table->add_field('odoo_id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null);

    // Add the primary key and unique keys
    $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
    $table->add_key('cf_odoosync_courses_courseid', XMLDB_KEY_UNIQUE, ['courseid']);

    // Create the table
    $DB->get_manager()->create_table($table);
}
