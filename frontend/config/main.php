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
		'message' => [
			'class' => 'app\modules\v1\message\api\Message',
			'components' => [
				'urlManager' => [
					'class' => 'yii\rest\UrlRule',
					'controller' => ['message/v1/api/Message'],
					'rules' => [
						// не работает
//						['class' => 'yii\rest\UrlRule', 'controller' => ['message/v1/api/Message']]
					]
				]
			]

		],
		'user' => [
			'class' => 'app\modules\v2\user\api\Module',
			'components' => [
				'urlManager' => [
					'class' => 'yii\rest\UrlRule',
					'controller' => ['app/modules/v2/user/api/Module'],
					'enablePrettyUrl' => true,
					'enableStrictParsing' => true,
					'showScriptName' => false,
					'rules' => [
						[
							'class' => 'yii\rest\UrlRule',
							'controller' => [
								'user',
								'attachment'
							],
						]
					]
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
				'/' => '/landing',
				'user/view/<id:\d+>' => 'users/view',
				'task/view/<id:\d+>' => 'tasks/view',
				'task/refuse/<id:\d+>' => 'tasks/refuse',
				'task/request/<id:\d+>' => 'tasks/request',

				//http://localhost:84/message/default/messages?task_id=19 - возвращает сообщения с id 19
				//http://localhost:84/message/default/ возвращает все сообщения


			],
		],

		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
	],
    'params' => $params,
];
