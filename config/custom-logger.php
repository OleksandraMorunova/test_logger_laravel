<?php

use Om\TestLogger\Classes\Channels\DatabaseChannel;
use Om\TestLogger\Classes\Channels\EmailChannel;
use Om\TestLogger\Classes\Channels\FileChannel;

return [
    'channels' => [
        'email' => [
            'class' => EmailChannel::class,
            'email_to' => env('MAIL_TO_ADDRESS', 'test@example.com'),
            'email_from' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
            'name_from' => env('MAIL_FROM_NAME', 'Test'),
            'secure' => env('MAIL_SECURE', false),
            'port' => env('MAIL_PORT', '1025'),
            'host' => env('MAIL_HOST', 'mailpit'),
            'username' => env('MAIL_USERNAME', ''),
            'password' => env('MAIL_PASSWORD', ''),
        ],
        'file' => [
            'class' => FileChannel::class,
            'file_to' => storage_path(env('FILE_LOG_PATH', 'logs/test.log'))
        ],
        'database' => [
            'class' => DatabaseChannel::class,
            'dsn' => env('DB_LOG_DSN', 'mysql:host=mysql;dbname=laravel'),
            'username' => env('DB_USERNAME', 'sail'),
            'password' => env('DB_PASSWORD', 'password'),
            'sql' => env('DB_LOG_SQL', 'INSERT INTO custom_logging (message) VALUES (:log_message)')
        ]
    ],
    'type' => env('DEFAULT_LOGGER', 'email')
];
