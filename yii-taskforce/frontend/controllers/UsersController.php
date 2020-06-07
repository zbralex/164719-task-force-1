<?php

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\UserInfo;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
	    $users = UserInfo::find()
		    ->joinWith('user')
		    ->where('id' == 'user_id')
		    ->orderBy('user.created_at')
		    ->all();

        return $this->render('index', [
        	'users' => $users
        ]);
    }

}
