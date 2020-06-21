<?php

namespace frontend\controllers;


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

        $filter = new UserForm();

        return $this->render('index', [
            'users' => $users,
            'filter' => $filter
        ]);
    }

    public function actionDetail($id)
    {
        $detail = UserInfo::findOne($id);
        return $this->render('detail', [
            'detail' => $detail
        ]);
    }

    public function actionFilter(array $ids) {
        $model = new UserForm();
    }

}
