<?php
require_once("$CFG->libdir/formslib.php");

class longread_form extends moodleform {
    // Определение формы
    protected function definition() {
        $mform = $this->_form;

        // Поле для имени
        $mform->addElement('text', 'name', get_string('name', 'longread'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        // Поле для содержимого
        $mform->addElement('editor', 'content', get_string('content', 'longread'));
        $mform->setType('content', PARAM_RAW);

        // Кнопки
        $this->add_action_buttons();
    }

    // Валидация
    public function validation($data, $files) {
        return array(); // Добавьте свою логику валидации при необходимости
    }
}

