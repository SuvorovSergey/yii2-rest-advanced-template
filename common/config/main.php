<?php

use common\components\web\ErrorHandler;
use yii\caching\FileCache;
use yii\db\Connection;
use yii\symfonymailer\Mailer;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'db' => [
            'class' => Connection::class,
            'dsn' => 'pgsql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => Mailer::class,
            'viewPath' => '@common/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => FileCache::class,
        ],
        'errorHandler' => [
            'class' => ErrorHandler::class,
        ],
    ],
];
