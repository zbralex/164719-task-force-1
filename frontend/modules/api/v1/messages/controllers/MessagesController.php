<?php

namespace app\modules\api\v1\messages\controllers;

use frontend\models\Message;
use frontend\models\Task;
use Yii;
use yii\db\Exception;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class MessagesController extends ActiveController
{
    public $modelClass = Message::class;
    public $allowedActions = ['index', 'view', 'update', 'create'];
    public $enableCsrfValidation = false;


//    public function actionCreate($task_id)
//    {
//        $request = Yii::$app->request;
//        $message = new Message();
//        $task_id = $this->actionTask();
//
//
//
//        $message->task_id = $task_id;
//        $message->user_id = Yii::$app->user->getId();
//
//        $message_body = json_decode(Yii::$app->getRequest()->getRawBody(), true);
//        $message->text = $message_body['message'];
//
//        $message->save(false);
//
//        return $message;
//
//    }


    public function actions()
    {

        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'prepareDataProvider' => [$this, 'prepareDataProvider'],
            ],

        ];
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD', 'POST'],
            'create' => ['POST'],
        ];
    }

    public function prepareDataProvider()
    {
        $task_id = Yii::$app->request->get('task_id');
        if (!$task_id) {
            throw new ForbiddenHttpException();
        }
        return Message::find()->where(['task_id' => $task_id])->all();
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'index') {
            if (!\Yii::$app->user->id)
                throw new \yii\web\ForbiddenHttpException(sprintf('Доступ только для авторизованных пользователей.', $action));
        }
    }
}
