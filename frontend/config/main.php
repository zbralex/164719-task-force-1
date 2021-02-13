<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'modules' => [
		'api' => [
			'class' => 'app\modules\api\v1\messages\Module',
            'modules' => [
                // версионирование
                'v1' => [
                    // http://taskforce.local/api/v1/messages?task_id=100
                    'class' => 'app\modules\api\v1\messages\Module'
                ]
            ]
		],
		'request' => [
			'parsers' => [
				'application/json' => \yii\web\JsonParser::class,
			]
		]
	],
    'controllerNamespace' => 'frontend\controllers',
	'language' => 'ru-RU',
	'timeZone' => 'Europe/Moscow',
	'components' => [

		'user' => [
			'identityClass' => 'frontend\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
			'loginUrl' => ['/landing']
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
                //['class' => 'yii\rest\UrlRule', 'controller' => ['api/v1/messages/controllers/MessagesController'], 'pluralize' => false],
                '/' => '/landing',
				'user/view/<id:\d+>' => 'users/view',
				'task/view/<id:\d+>' => 'tasks/view',
				'task/refuse/<id:\d+>' => 'tasks/refuse',
				'task/request/<id:\d+>' => 'tasks/request',
                'mylist' => 'mylist/index',
			],
		],

		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
	],
    'params' => $params,
];
