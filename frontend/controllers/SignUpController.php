<?php

namespace frontend\controllers;


use frontend\models\Cities;
use frontend\models\SiteSettings;
use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\widgets\ActiveForm;

class SignupController extends Controller
{

    public function actionIndex()
	{
	    if(!Yii::$app->user->isGuest) {
            return $this->redirect('/tasks');
        }


        $model = new User();
	    $userInfo = new UserInfo();
	    $siteSettings = new SiteSettings();
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
                $siteSettings->user_id = $model->id;
                $siteSettings->save(false);

                return $this->goHome();
            }

		}

		return $this->render('index', [
			'model' => $model
		]);
	}
}
