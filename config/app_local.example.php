<?php
return [
    'Security' => [
        // 'salt' => ''
    ],
	'debug' => true,
    'Datasources' => [
        'default' => [
            'host' => 'db',
            'username' => 'user',
            'password' => 'pass',
            'database' => 'project',
        ],
        'test' => [
            'host' => 'db',
            'username' => 'user',
            'password' => 'pass',
            'database' => 'test_project',
        ],
    ],
    'EmailTransport' => [
        'default' => [
            'className' => 'Smtp',
            'host' => 'mailhog',
            'port' => 1025,
            'timeout' => 30,
            'tls' => null,
        ],
    ],
];
