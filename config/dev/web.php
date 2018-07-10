<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'catchAll' => [
    //    'index/index',
    //],
//    'controllerMap' => [
//        'index2' => 'app\controllers\IndexController',
//    ],
    'language' => 'zh_CN',
    'sourceLanguage' => 'zh_CN',
    'timeZone' => 'Asia/Shanghai',
    'name' => 'yiidemo',
    'defaultRoute' => 'index',
    'viewPath' => ROOT . '/views',
    'vendorPath' => ROOT . '/vendor',
    'modules' => [
        'demo' => [
            'class' => 'app\modules\demo\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\User',
        ],
    ],
//    'as behavior' => [
//        'class' => 'app\components\ActionTimeFilter',
//    ],
    'container' => [
        'definitions' => [
            'yii\widgets\LinkPager' => ['maxButtonCount' => 5]
        ],
        'singletons' => [
            
        ]
    ],
    'aliases' => [
        '@app' => dirname(dirname(__DIR__)),
        '@runtime' => '@app/runtime',
        '@web' => '@app/web',
        '@vendor' => '@app/vendor',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ul7jAfAK9L3Ly_TBQFPVnPGPJBpJptOo',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => require ROOT . '/config/rewrite.php',
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'assetManager' => [
            'bundles' => [
                'converter' => [
                    'class' => 'yii\web\AssetConverter',
                    'commands' => [
                        'less' => ['css', 'lessc {from} {to} --no-color'],
                        'ts' => ['js', 'tsc --out {to} {from}'],
                    ],
                ],
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [['jquery.js', 'position' => \yii\web\View::POS_HEAD]],
                ]
            ],
            'assetMap' => [
                'jquery.js' => '@web/js/jquery.min.js',
//                'yii.js' => '@web/js/yii.js',
                'bootstrap.js' => '@web/js/bootstrap.js'
            ],
            'appendTimestamp' => true,
        ],
        'view' => [
            'class' => 'yii\web\View',
            'defaultExtension' => 'twig',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => [
                        'Url' => ['class' => '\yii\helpers\Url'],
                        'Html' => ['class' => '\yii\helpers\Html'],
                        'Breadcrumbs' => ['class' => '\yii\widgets\Breadcrumbs'],
                    ],
                    'functions' => require ROOT . '/config/functions.php',
                    'filters' => require ROOT . '/config/filters.php',
                    'uses' => ['yii\bootstrap', 'yii\captcha\Captcha'],
                ],
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
        'allowedIPs' => ['127.0.0.1', '::1', '10.10.16.136'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '10.10.16.136'],
    ];
}

return $config;
