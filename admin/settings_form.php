<?php

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

class cf_oodo_sync_settings_form extends moodleform {

    public function definition() {
        global $CFG, $DB;

        $mform = $this->_form;
        $mform->addElement('header', 'general', get_string('general', 'form'));
        $mform->addElement('text', 'odoo_url', get_string('odoo_url', 'cf_oodo_sync'));
        $mform->setType('odoo_url', PARAM_URL);
        $mform->addRule('odoo_url', get_string('required'), 'required');
        $mform->addElement('text', 'odoo_dbname', get_string('odoo_dbname', 'cf_oodo_sync'));
        $mform->setType('odoo_dbname', PARAM_TEXT);
        $mform->addRule('odoo_dbname', get_string('required'), 'required');
        $mform->addElement('text', 'odoo_username', get_string('odoo_username', 'cf_oodo_sync'));
        $mform->setType('odoo_username', PARAM_TEXT);
        $mform->addRule('odoo_username', get_string('required'), 'required');
        $mform->addElement('passwordunmask', 'odoo_password', get_string('odoo_password', 'cf_oodo_sync'));
        $mform->setType('odoo_password', PARAM_TEXT);
        $mform->addRule('odoo_password', get_string('required'), 'required');

        // Get all Moodle categories and display them as checkboxes
        $categoryoptions = array();
        $categories = $DB->get_records('course_categories');
        foreach ($categories as $category) {
            $categoryoptions[$category->id] = $category->name;
        }
        $mform->addElement('header', 'categoriesheader', get_string('categoriesheader', 'cf_oodo_sync'));
        $mform->addElement('checkboxes', 'moodle_categories', get_string('moodle_categories', 'cf_oodo_sync'), $categoryoptions);
        $mform->addRule('moodle_categories', get_string('required'), 'required', null, 'client');

        // Add a submit button
        $this->add_action_buttons();
    }

    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        // Check if the given Odoo URL is valid
        if (!empty($data['odoo_url'])) {
            $url = parse_url($data['odoo_url']);
            if (empty($url['scheme']) || empty($url['host'])) {
                $errors['odoo_url'] = get_string('invalidurl', 'cf_oodo_sync');
            }
        }

        return $errors;
    }

}
