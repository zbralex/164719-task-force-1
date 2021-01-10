<?php

namespace app\modules\api\v1\messages\controllers;

use frontend\models\Message;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class MessagesController extends ActiveController {
	public $modelClass = Message::class;
    public $allowedActions = ['index', 'view', 'update', 'create', 'delete'];

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
        $message = new Message();
        $message_text = Yii::$app->request->post('message');
        $task_id = Yii::$app->request->get('task_id');
        $message->task_id = $task_id;
        $message->user_id = Yii::$app->user->id;
        $message->text = $message_text;
        $message->save(false);

        //return Message::find()->where(['task_id' => $task_id])->all();

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
