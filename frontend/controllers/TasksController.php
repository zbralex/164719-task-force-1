<?php

namespace frontend\controllers;

use Yii;
use frontend\models\forms\TaskForm;
use frontend\models\Task;
use yii\web\Controller;


class TasksController extends Controller
{
	public function actionIndex()
	{
		$filter = new TaskForm();
        $tasks = Task::find()
	        ->where(['status' => 'new'])
	        ->orderBy('created_at DESC')->all();

		if ($filter->load(Yii::$app->request->post())) {
			$request = Yii::$app->request;
			$formContent = $request->post('TaskForm');
			$task = (new Task)->filterForm($formContent);
			$tasks = $task;

		}
		return $this->render('index', [
			'tasks' => $tasks,
			'filter' => $filter
		]);
	}

	public function actionDetail($id) {
		$detail = Task::findOne($id);
		return $this->render('detail', [
			'detail' => $detail
		]);


	}

}
