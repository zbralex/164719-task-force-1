<?php

namespace frontend\controllers;


use frontend\models\forms\CreateTaskForm;
use frontend\models\forms\LoginForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;

class CreateController extends Controller {

	public function actionIndex() {
		$model = new CreateTaskForm();

		return $this->render('index', [
			'model' => $model
		]);
	}

}
