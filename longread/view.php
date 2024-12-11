<?php
require_once('../../config.php');

global $DB;

$id = required_param('id', PARAM_INT);

try {
    $longread = $DB->get_record('mdl_longread', ['id' => $id], '*', MUST_EXIST);
    $sections = $DB->get_records('mdl_longread_sections', ['longreadid' => $id], 'ordernum ASC');
} catch (dml_exception $e) {
    throw new moodle_exception('errorreadinglongread', 'mod_longread', '', $e->getMessage());
}

$PAGE->set_url('/mod/longread/view.php', ['id' => $id]);
$PAGE->set_title($longread->name);
$PAGE->set_heading($longread->name);

echo $OUTPUT->header();
echo $OUTPUT->heading($longread->name);

foreach ($sections as $section) {
    echo html_writer::tag('h3', format_string($section->title));
    echo html_writer::div(format_text($section->content), 'section-content hidden');
}

echo $OUTPUT->footer();
