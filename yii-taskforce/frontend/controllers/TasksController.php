<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\db\Query;

class TasksController extends Controller
{
    public function actionIndex()
    {
	    $query = new Query();
	    $query->select(['*'])->from('task t')
		    ->join('INNER JOIN', 'categories c', 'c.id = t.category_id')
		    ->orderBy(['t.created_at' => SORT_DESC]);
	    $tasks = $query-> all();


        return $this->render('index', [
        	'tasks'=> $tasks
        ]);
    }

}
