<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'mod/longread:addinstance' => [
        'captype' => 'write',
        'contextlevel' => CONTEXT_MODULE,
        'archetypes' => [
            'manager' => CAP_ALLOW,
            'teacher' => CAP_ALLOW
        ]
    ],
];
