<?php

namespace frontend\controllers;

use frontend\models\forms\TaskForm;
use frontend\models\Task;
use Yii;
use yii\web\Controller;


class TasksController extends Controller
{
	public function actionIndex()
	{
		$filter = new TaskForm();
		$tasks = Task::find()
			->where(['status' => 'new'])
			->orderBy('created_at DESC')->all();

		if (Yii::$app->request->getIsPost()) {

			$filter->load(Yii::$app->request->post());
			if (!$filter->validate()) {
				$errors = $filter->getErrors();
				var_dump($errors);
				die;
			}
			$request = Yii::$app->request;
			$formContent = $request->post('TaskForm');
			$tasks = (new Task)->filterForm($formContent);
		}
		return $this->render('index', [
			'tasks' => $tasks,
			'filter' => $filter
		]);
	}

	public function actionView($id = null)
	{
		$detail = Task::findOne($id);
		return $this->render('view', [
			'detail' => $detail
		]);
	}

}
