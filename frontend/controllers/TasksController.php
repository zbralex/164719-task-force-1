<?php

namespace frontend\controllers;

use frontend\models\Task;
use frontend\models\Categories;
use yii\web\Controller;
use const Grpc\STATUS_OK;

class TasksController extends Controller
{
	public function actionIndex()
	{
        $tasks = Task::find()->with('categories')->where(['status' => 'new'])->orderBy('created_at DESC')->all();

		return $this->render('index', [
			'tasks' => $tasks,
		]);
	}

}
