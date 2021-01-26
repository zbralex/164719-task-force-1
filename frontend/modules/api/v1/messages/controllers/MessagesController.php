<?php

namespace app\modules\api\v1\messages\controllers;

use frontend\models\Message;
use frontend\models\Task;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class MessagesController extends ActiveController {
	public $modelClass = Message::class;
    public $allowedActions = ['index', 'view', 'update', 'create'];

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
        $request = Yii::$app->request;
        $message = new Message();


        // проблема в этом
        $message->task_id = 100;
        $message->user_id = 100;

        $messageCurrent = json_decode(Yii::$app->getRequest()->getRawBody(), true);
        $message->text = $messageCurrent['message'];

        $message->save(false);

    }



	public function actions()
	{

		return [
			'index' => [
				'class' => 'yii\rest\IndexAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'prepareDataProvider' => [$this, 'actionIndex'],
			],

		];
	}

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'create' => ['POST'],
        ];
    }
}
