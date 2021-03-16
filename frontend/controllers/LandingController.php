<?php

namespace frontend\controllers;


use frontend\models\forms\LoginForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;

class LandingController extends Controller
{

    public function actionIndex()
    {

        if(!Yii::$app->user->isGuest) {
            return $this->redirect('/tasks');
        }

		$model = new LoginForm();
		$this->layout = 'landing';

		if (Yii::$app->request->getIsPost()) {
			$model->load(\Yii::$app->request->post());

			if ($model->validate()) {
				$user = $model->getUser();

				Yii::$app->user->login($user);

				return $this->goBack('/tasks');
			}
		}
		return $this->render('index', [
			'model' => $model
		]);
	}

}
