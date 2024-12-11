<?php
defined('MOODLE_INTERNAL') || die();

function longread_supports($feature) {
    switch ($feature) {
        case FEATURE_MOD_ARCHETYPE:
            return MOD_ARCHETYPE_RESOURCE;
        default:
            return null;
    }
}

function longread_add_instance($data, $mform) {
    global $DB;

    debugging('longread_add_instance called', DEBUG_DEVELOPER);

    if (is_array($data)) {
        $data = (object)$data;
    }

    if (isset($data->content) && is_array($data->content)) {
        $data->content = json_encode($data->content);
        if (json_last_error() !== JSON_ERROR_NONE) {
            debugging('Error encoding JSON: ' . json_last_error_msg());
            return false;
        }
    }

    $data->timemodified = time();
    $data->timecreated = time(); // Добавьте это для новых записей

    try {
        $data->id = $DB->insert_record('longread', $data);
    } catch (Exception $e) {
        debugging('Error inserting record: ' . $e->getMessage());
        return false;
    }

    return $data->id;
}

function longread_update_instance($data, $mform) {
    global $DB;

    debugging('longread_update_instance called', DEBUG_DEVELOPER);

    if (is_array($data)) {
        $data = (object)$data;
    }

    if (isset($data->content) && is_array($data->content)) {
        $data->content = json_encode($data->content);
        if (json_last_error() !== JSON_ERROR_NONE) {
            debugging('Error encoding JSON: ' . json_last_error_msg());
            return false;
        }
    }

    $data->timemodified = time();
    $data->id = $data->instance;

    try {
        return $DB->update_record('longread', $data);
    } catch (Exception $e) {
        debugging('Error updating record: ' . $e->getMessage());
        return false;
    }
}

function longread_delete_instance($id) {
    global $DB;

    debugging("Deleting instance with ID: $id");

    if ($DB->record_exists('longread', ['id' => $id])) {
        return $DB->delete_records('longread', ['id' => $id]);
    }

    debugging('Instance not found for deletion.');
    return false;
}
