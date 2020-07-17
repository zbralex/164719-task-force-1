<?php

namespace frontend\controllers;

use frontend\models\forms\TaskForm;
use frontend\models\Task;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class TasksController extends Controller
{
	public function actionIndex()
	{
		$model = new TaskForm();
		$tasks = Task::find()
			->where(['status' => 'new'])
			->orderBy('created_at DESC')->all();

		if (Yii::$app->request->getIsPost()) {

			$model->load(Yii::$app->request->post());
			if (!$model->validate()) {
				$errors = $model->getErrors();
			}
			$request = Yii::$app->request;
			$formContent = $request->post('TaskForm');
			$tasks = (new Task)->filterForm($formContent);
		}
		return $this->render('index', [
			'tasks' => $tasks,
			'model' => $model
		]);
	}

	public function actionView($id = null)
	{
		$detail = Task::findOne($id);

		if (empty($detail)) {
			throw new NotFoundHttpException("Задание с № $id не найдено");
		}

		return $this->render('view', [
			'detail' => $detail,
		]);
	}

}
