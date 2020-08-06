<?php

namespace frontend\controllers;


use frontend\models\forms\LoginForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;

class LandingController extends Controller {

	public function actionIndex() {
		$model = new LoginForm();
		$this->layout = 'landing';

		if (Yii::$app->request->getIsPost()) {
			$model->load(\Yii::$app->request->post());

			if ($model->validate()) {
				$user = $model->getUser();

				Yii::$app->user->login($user);

				return $this->goHome();
			}
		}
		return $this->render('index', [

			'model' => $model
		]);
	}

}
