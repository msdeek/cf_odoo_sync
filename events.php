<?php

/**
 * CF Odoo Sync plugin event handlers
 *
 * @package    local_cf_odoo_sync
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Event handler for the course_created event.
 *
 * @param \core\event\course_created $event The course_created event object.
 */
function local_cf_odoo_sync_course_created_handler(\core\event\course_created $event) {
    // TODO: Implement course creation syncing logic.
}

/**
 * Event handler for the course_updated event.
 *
 * @param \core\event\course_updated $event The course_updated event object.
 */
function local_cf_odoo_sync_course_updated_handler(\core\event\course_updated $event) {
    // TODO: Implement course update syncing logic.
}

/**
 * Event handler for the course_deleted event.
 *
 * @param \core\event\course_deleted $event The course_deleted event object.
 */
function local_cf_odoo_sync_course_deleted_handler(\core\event\course_deleted $event) {
    // TODO: Implement course deletion syncing logic.
}
