<?php

namespace frontend\controllers;

use frontend\models\UserInfo;
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
