<?php

namespace frontend\controllers;


use yii\db\Query;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
	    $query = new Query();
	    $query->select(['*'])->from('user u')
		    ->join('INNER JOIN', 'user_info ui', 'u.id = ui.user_id')
		    ->orderBy(['u.created_at' => SORT_DESC]);
	    $users = $query-> all();

        return $this->render('index', [
        	'users' => $users
        ]);
    }

}
