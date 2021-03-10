<?php

namespace frontend\controllers;

use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\widgets\ActiveForm;


class MylistController extends Controller {

    public function actionIndex($param = null)
    {
        $statuses = [
            'new' => 'Новый',
            'cancelled' => 'Отменено',
            'progress' => 'В работе',
            'failed' => 'Провалено',
            'completed' => 'Завершено'
        ];
        $model = new User();
        $userInfo = new UserInfo();
        $model->load(\Yii::$app->request->post());
        $errors = [];
        $tasks = [];
        if (!$param) {
            Yii::$app->response->redirect(Url::to('/mylist/new'));
        }

        switch ($param) {
            case 'new':
                $tasks = Task::find()->where(['status' => 'new'])
                    ->with(['category'])
                    ->andWhere(['or',
                        ['author_id' => Yii::$app->user->identity->getId()],
                        ['executor_id' => Yii::$app->user->identity->getId()]])
                    ->all();
                break;
            case 'hidden':
                $tasks = Task::find()->where(['status' => 'failed'])
                    ->with(['category'])
                    ->andWhere(['or',
                        ['author_id' => Yii::$app->user->identity->getId()],
                        ['executor_id' => Yii::$app->user->identity->getId()]])
                    ->all();
                break;
            case 'active':
                $tasks = Task::find()->where(['status' => 'progress'])
                    ->with(['category'])
                    ->andWhere(['or',
                        ['author_id' => Yii::$app->user->identity->getId()],
                        ['executor_id' => Yii::$app->user->identity->getId()]])
                    ->all();
                break;
            case 'canceled':
                $tasks = Task::find()->where(['status' => 'cancelled'])
                    ->with(['category'])
                    ->andWhere(['or',
                        ['author_id' => Yii::$app->user->identity->getId()],
                        ['executor_id' => Yii::$app->user->identity->getId()]])
                    ->all();
                break;
            case 'done':
                $tasks = Task::find()->with(['category'])->where(['status' => 'completed'])
                    ->with(['category'])
                    ->andWhere(['or',
                        ['author_id' => Yii::$app->user->identity->getId()],
                        ['executor_id' => Yii::$app->user->identity->getId()]])
                    ->all();
                break;
        }





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
            'tasks' => $tasks,
            'status'=>$statuses,
            'param' => $param
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
