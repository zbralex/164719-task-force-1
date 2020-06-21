<?php

namespace frontend\controllers;

use frontend\models\Categories;
use Yii;
use frontend\models\forms\UserForm;
use frontend\models\UserInfo;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = UserInfo::find()
            ->with(['userCategories.category'])
            ->all();

        $categories = Categories::find()->all();

        $filter = new UserForm();

        return $this->render('index', [
            'users' => $users,
            'filter' => $filter,
            'categories' => $categories
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
