<?php

namespace app\modules\v1\message\api\controllers;

use frontend\models\Message;
use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `message` module
 */
class DefaultController extends ActiveController
{
	public $modelClass = Message::class;


	public function actionMessages($task_id = null)
	{
		if ($task_id) {
			return Message::find()->where(['task_id' => $task_id])->all();
		}
		if(!$task_id) {
			return Message::findAll($task_id);
		}
	}
}
