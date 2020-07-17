<?php

namespace frontend\controllers;

use frontend\models\forms\UserForm;
use frontend\models\UserInfo;
use Yii;
use yii\web\Controller;

class UsersController extends Controller
{
	public function actionIndex()
	{
		$users = UserInfo::find()
			->with('userCategories.category')
			->all();

		$filter = new UserForm();

		if (Yii::$app->request->getIsPost()) {
			$filter->load(Yii::$app->request->post());
			if (!$filter->validate()) {
				$errors = $filter->getErrors();
			}

			$request = Yii::$app->request;
			$formContent = $request->post('UserForm');
			$users = (new UserInfo)->filterForm($formContent);
		}

		return $this->render('index', [
			'users' => $users,
			'filter' => $filter
		]);
	}

	public function actionView($id)
	{
		$detail = UserInfo::findOne($id);
		return $this->render('view', [
			'detail' => $detail
		]);
	}
}
