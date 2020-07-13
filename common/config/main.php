<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'language' => 'ru-RU',
	//'timeZone' => 'Europe/Moscow',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'users/<id:\d+>' => 'users/detail',
                'users/filter/<categoryId:\d+>' => 'users/filter',
	            'tasks/<id:\d+>' => 'tasks/detail'
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
