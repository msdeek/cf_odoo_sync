<?php

/**
 * CF Odoo Sync plugin library functions
 *
 * @package    local_cf_odoo_sync
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns true if the CF Odoo Sync plugin is enabled and configured, false otherwise.
 *
 * @return bool
 */
function local_cf_odoo_sync_enabled() {
    global $CFG;

    // Check if the plugin is enabled.
    if (!is_enabled_plugin('local', 'cf_odoo_sync')) {
        return false;
    }

    // Check if the Odoo URL is set.
    if (empty($CFG->local_cf_odoo_sync_odoo_url)) {
        return false;
    }

    // Check if the Odoo API key is set.
    if (empty($CFG->local_cf_odoo_sync_api_key)) {
        return false;
    }

    // Check if the sync interval is set.
    if (empty($CFG->local_cf_odoo_sync_interval)) {
        return false;
    }

    return true;
}

/**
 * Syncs courses between Moodle and Odoo.
 *
 * @return bool true if successful, false otherwise.
 */
function local_cf_odoo_sync_courses() {
    // TODO: Implement course syncing logic.
    return true;
}

/**
 * Syncs course content between Moodle and Odoo.
 *
 * @return bool true if successful, false otherwise.
 */
function local_cf_odoo_sync_course_content() {
    // TODO: Implement course content syncing logic.
    return true;
}
