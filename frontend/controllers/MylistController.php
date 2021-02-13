<?php

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\web\Controller;
use yii\widgets\ActiveForm;


class MylistController extends Controller {

    public function actionIndex()
    {

        $model = new User();
        $userInfo = new UserInfo();
        $model->load(\Yii::$app->request->post());
        $errors = [];


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
            'model' => $model
        ]);
    }
}
