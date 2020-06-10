<?php

namespace frontend\controllers;


use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserInfo;
use yii\db\Query;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = UserInfo::find()->all();
        return $this->render('index', [
        	'users' => $users
        ]);
    }

}
