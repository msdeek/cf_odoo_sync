<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/lib.php');

$context = context_system::instance();
$url = new moodle_url('/admin/settings.php', ['section' => 'cf_odoosync']);
$PAGE->set_url($url);
$PAGE->set_context($context);

$settings = new admin_settingpage('cf_odoosync', get_string('pluginname', 'local_cf_odoosync'));

$settings->add(new admin_setting_heading('cf_odoosync_general', get_string('general', 'local_cf_odoosync'), ''));
$settings->add(new admin_setting_configtext('cf_odoosync/api_key', get_string('api_key', 'local_cf_odoosync'), '', '', PARAM_RAW));
$settings->add(new admin_setting_configtext('cf_odoosync/odoo_url', get_string('odoo_url', 'local_cf_odoosync'), '', '', PARAM_URL));
$settings->add(new admin_setting_configtext('cf_odoosync/moodle_url', get_string('moodle_url', 'local_cf_odoosync'), '', '', PARAM_URL));

echo $OUTPUT->header();
echo $settings->output();
echo $OUTPUT->footer();
