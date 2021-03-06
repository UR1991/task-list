<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'en-US',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xUdB_Wjvolg04QzW8MpiLKt4GzLf1WYf',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
              'class' => 'Swift_SmtpTransport',
              //Set the host
              'host' => 'smtp.yandex.ru',
              //Set the username
              'username' => 'kirillov.example@yandex.ru',
              //Set the password
              'password' => 'example1234',
              //Set the port
              'port' => '465',
              //Set the encryption type
              'encryption' => 'ssl',
            ]
        ],
        //Using internationalization(i18n)
        'i18n' => [
          'translations' => [
            'app*' => [
              'class' => 'yii\i18n\PhpMessageSource',
              //Path to translations files
              'basePath' => '@app/messages',
              //In what language we write the app
              'sourceLanguage' => 'ru-RU',
              //'fileMap' => [
              //  'app' => 'app.php',
              //  'app/error' => 'error.php',
            //  ],
            ],
          ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            //Set "true" for Pretty URL
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            //Use different urlManager
            'class' => 'codemix\localeurls\UrlManager',
            //What languages we are using
            'languages' => ['en', 'ru'],
            'enableDefaultLanguageUrlCode' => true,

            'rules' => [
              '<controller>/<action>' => '<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
