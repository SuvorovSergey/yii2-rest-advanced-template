<?php

use yii\symfonymailer\Message;

return [
    'id' => 'app-frontend-tests',
    'components' => [
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
        'mailer' => [
            'messageClass' => Message::class,
        ],
    ],
];
