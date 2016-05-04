<?php
error_reporting(-1);
ini_set('display_errors','On');

date_default_timezone_set( 'Europe/Madrid' );

require __DIR__.'/settings_defined.php';

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../logs/app.log',
        ],

        'backwardCompatibility' => true,

        'db' => [
            // Eloquent configuration
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'gpo',
            'username'  => 'root',
            'password'  => '16qyahzn',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => 'view_',
            'limit'     => 100,
        ],
    ],
];
