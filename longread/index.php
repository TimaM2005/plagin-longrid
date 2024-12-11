<?php
require_once('../../config.php');

$PAGE->set_url('/mod/longread/index.php');
$PAGE->set_title(get_string('pluginname', 'mod_longread'));
$PAGE->set_heading(get_string('pluginname', 'mod_longread'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'mod_longread'));
echo $OUTPUT->footer();
