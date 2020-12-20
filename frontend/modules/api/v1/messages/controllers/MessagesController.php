<?php

namespace app\modules\api\v1\messages\controllers;

use frontend\models\Message;
use frontend\models\Task;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class MessagesController extends ActiveController {
	public $modelClass = Message::class;

	public function actionIndex()
	{
		$task_id = Yii::$app->request->get('task_id');
		if (!$task_id) {
			throw new ForbiddenHttpException();
		}
		return Message::find()->where(['task_id' => $task_id])->all();

	}
	public function actionCreate()
	{
		$model = new Message();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->task_id = Yii::$app->request->post('task_id');
			$model->user_id = Yii::$app->user->id;
			$model->text = Yii::$app->request->post('message');
		}

	}


	public function actions()
	{
		$actions = parent::actions();
		unset($actions['create']);
		return [
			'index' => [
				'class' => 'yii\rest\IndexAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'prepareDataProvider' => [$this, 'actionIndex'],
			],
			'create' => [
				'class' => 'yii\rest\CreateAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'prepareDataProvider' => [$this, 'actionCreate'],
			],
		];
	}


}
