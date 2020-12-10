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
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

	public function actionTasks($task_id)
	{

		return Message::find()->where(['task_id' => $task_id])->all();


	}
}
