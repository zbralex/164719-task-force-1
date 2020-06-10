<?php

namespace frontend\controllers;


use frontend\models\Categories;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserCategory;
use frontend\models\UserInfo;
use yii\db\Query;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = UserInfo::find()
            ->with(['userCategories.categories'])
            ->all();

        return $this->render('index', [
        	'users' => $users
        ]);
    }

}
