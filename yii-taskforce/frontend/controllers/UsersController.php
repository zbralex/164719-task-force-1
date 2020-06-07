<?php

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\UserInfo;

use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
	    $query = new Query();
	    $query->select(['*'])->from('user u')
		    ->join('INNER JOIN', 'user_info ui', 'u.id = ui.user_id')
		    ->orderBy(['u.created_at' => SORT_ASC]);
	    $users = $query-> all();

        return $this->render('index', [
        	'users' => $users
        ]);
    }

}
