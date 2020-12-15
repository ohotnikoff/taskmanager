<?php

return [
    /**
     * Настройка DB
     */
    'db' => [
        'db_name' => 'taskmanager',
        'db_user' => 'root',
        'db_password' => '',
        'db_host' => 'localhost',
    ],

    /**
     * Настройка маршрутов
     */
    'routes' => [
        '' => [
            'controller' => 'site',
            'action' => 'index',
        ],
        'staff' => [
            'controller' => 'staff',
            'action' => 'index',
        ]
    ],
];
