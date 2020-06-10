<?php

namespace frontend\controllers;

use frontend\models\Task;
use frontend\models\Categories;
use yii\web\Controller;

class TasksController extends Controller
{
	public function actionIndex()
	{
        $tasks = Task::find()->with('category')->orderBy('created_at')->all();

		return $this->render('index', [
			'tasks' => $tasks,
		]);
	}

}
