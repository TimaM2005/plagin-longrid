<?php
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->dirroot/course/moodleform_mod.php"); // Подключаем класс moodleform_mod

class mod_longread_mod_form extends moodleform_mod {
    protected function definition() {
        $mform = $this->_form;

        // Основные параметры курса
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Имя лонгрида
        $mform->addElement('text', 'name', get_string('name', 'longread'), array('size' => '64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        // Поле для содержимого
        $mform->addElement('editor', 'content', get_string('content', 'longread'));
        $mform->setType('content', PARAM_RAW);

        // Стандартные элементы формы курса (например, доступность, ID)
        $this->standard_coursemodule_elements();

        // Кнопки
        $this->add_action_buttons();
    }
}

