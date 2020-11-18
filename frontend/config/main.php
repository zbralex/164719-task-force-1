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
    'controllerNamespace' => 'frontend\controllers',
	'language' => 'ru-RU',
	'timeZone' => 'Europe/Moscow',
	'components' => [
		'request' => [
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
		],
		'user' => [
			'identityClass' => 'frontend\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
			'loginUrl' => ['/landing']
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				[
					'class' => 'yii\rest\UrlRule',
					'controller' => 'message'
				],
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
