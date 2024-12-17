<?php
use Om\TestLogger\Classes\Channels\DatabaseChannel;
use Om\TestLogger\Classes\Channels\EmailChannel;
use Om\TestLogger\Classes\Channels\FileChannel;

return [
    'channels' => [
        'email' => [
            'class' => EmailChannel::class,
            'email_to' => 'test@gmail.com',
            'email_from' => 'hello@example.com',
            'name_from' => 'Test',
            'secure' => false,
            'port' => 1025,
            'host' => 'mailpit',
            'username' => '',
            'password' => '',
        ],
        'file' => [
            'class' => FileChannel::class,
            'file_to' => storage_path('logs/test.log')
        ],
        'database' => [
            'class' => DatabaseChannel::class,
            'dsn' => 'mysql:host=mysql;dbname=laravel',
            'username' => 'sail',
            'password' => 'password',
            'sql' => 'INSERT INTO custom_logging (message) VALUES (:log_message)'
        ]
    ],
    'type' => 'email'
];
