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
                    'class' => 'app\modules\api\v1\messages\Module'
                ]
            ]
		],
		'request' => [
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
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
			    // http://taskforce.local/api/messages?task_id=100

				'/' => '/landing',
				'user/view/<id:\d+>' => 'users/view',
				'task/view/<id:\d+>' => 'tasks/view',
				'task/refuse/<id:\d+>' => 'tasks/refuse',
				'task/request/<id:\d+>' => 'tasks/request',
			],
		],

		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
	],
    'params' => $params,
];
