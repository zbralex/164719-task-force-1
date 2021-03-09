<?php

namespace frontend\controllers;

use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\web\Controller;
use yii\widgets\ActiveForm;


class MylistController extends Controller {

    public function actionIndex($param)
    {
        $model = new User();
        $userInfo = new UserInfo();
        $model->load(\Yii::$app->request->post());
        $errors = [];
        $tasks = [];

        switch ($param) {
            case 'new':
                $tasks = Task::find()->where(['status' => 'new'])->all();
                break;
            case 'hidden':
//                $tasks = Task::find()->where(['status' => 'new'])->all();
                break;
            case 'active':
                break;
        }
//        var_dump($tasks);




        if (Yii::$app->request->isAjax) {
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->getIsPost()) {

            if ($model->validate()) {
                $model->setPassword($model->password);
                $model->save(false);


                $userInfo->role_id = 1;
                $userInfo->user_id = $model->id;
                $userInfo->save(false);

                return $this->goHome();
            }

        }

        return $this->render('index', [
            'model' => $model,
            'tasks' => $tasks
        ]);
    }

//    public function actionCompleted() {
//        $model = new User();
//        return $this->render('index', [
//            'model' => $model
//        ]);
//    }
//    public function actionNew() {
//        $model = new User();
//        return $this->render('index', [
//            'model' => $model
//        ]);
//    }
//    public function actionActive() {
//        $model = new User();
//        return $this->render('index', [
//            'model' => $model
//        ]);
//    }
//    public function actionRefused() {
//        $model = new User();
//        return $this->render('index', [
//            'model' => $model
//        ]);
//    }
//    public function actionHidden() {
//        $model = new User();
//        return $this->render('index', [
//            'model' => $model
//        ]);
//    }
}
