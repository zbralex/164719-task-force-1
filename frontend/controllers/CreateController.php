<?php

namespace frontend\controllers;


use frontend\models\forms\CreateTaskForm;
use frontend\models\forms\LoginForm;
use taskForce\classes\Task;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\widgets\ActiveForm;

class CreateController extends Controller {

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					]
				],
			],
		];
	}

	public function actionIndex() {
		$model = new CreateTaskForm();
		$model->load(\Yii::$app->request->post());

		if (Yii::$app->request->isAjax) {
			return ActiveForm::validate($model);
		}

		if (Yii::$app->request->getIsPost()) {

			if ($model->validate()) {
				print("все данные корректны");
			}
		}

		return $this->render('index', [
			'model' => $model
		]);
	}


}
