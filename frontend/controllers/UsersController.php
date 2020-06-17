<?php

namespace frontend\controllers;

use frontend\models\UserCategory;
use frontend\models\UserInfo;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = UserInfo::find()
            ->with(['userCategories.category'])
            ->all();



        return $this->render('index', [
        	'users' => $users
        ]);
    }

    public function actionDetail($id)
    {
        $detail = UserInfo::findOne($id);
        return $this->render('detail', [
            'detail' => $detail
        ]);
    }

}
