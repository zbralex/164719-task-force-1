<?php

namespace app\modules\api\v1\messages\controllers;

use frontend\models\Message;
use frontend\models\Task;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\rest\ActiveController;
use yii\rest\IndexAction;
use yii\web\ForbiddenHttpException;

class MessagesController extends ActiveController
{
    public $modelClass = Message::class;
    public $allowedActions = ['index'];
    public $enableCsrfValidation = false;


    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }

    public function actionIndex(int $task_id = null)
    {
        if (!\Yii::$app->user->id)
            throw new \yii\web\ForbiddenHttpException(sprintf('Доступ только для авторизованных пользователей.'));

        $request = Yii::$app->request;
        if ($request->isGet) {
            if (!$task_id) {
                throw new ForbiddenHttpException();
            }
            return Message::find()->where(['task_id' => $task_id])->all();
        }


        if ($request->isPost) {
            $message = new Message();

            $message->user_id = Yii::$app->user->getId();
            $message_body = json_decode(Yii::$app->getRequest()->getRawBody(), true);
            $message->task_id = $message_body['task_id'];
            $message->text = $message_body['message'];

            $message->save(false);
            Yii::$app->getResponse()->setStatusCode(201);
            return $message;
        }
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD', 'POST'],
        ];
    }
}
