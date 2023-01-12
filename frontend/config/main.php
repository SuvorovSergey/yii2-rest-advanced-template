<?php

use common\models\User;
use yii\log\FileTarget;
use yii\web\JsonParser;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/params.php',
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'homeUrl' => '/',
    'defaultRoute' => 'api',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => 'aaFFMKdQdZ2OUF32Z7ZORHV_JpcBowW7PD',
            'parsers' => [
                'application/json' => JsonParser::class,
            ],
        ],
        'response' => [
            'charset' => 'UTF-8',
            'format' => Response::FORMAT_JSON,
            'formatters' => [
                Response::FORMAT_JSON => [
                    'class' => JsonResponseFormatter::class,
                    'prettyPrint' => YII_DEBUG,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
        ],
        'user' => [
            'identityClass' => User::class,
            'enableSession' => false,
            'enableAutoLogin' => false,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

if (!YII_ENV_TEST && YII_ENV === 'dev') {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'allowedIPs' => ['*'],
    ];
}

return $config;
