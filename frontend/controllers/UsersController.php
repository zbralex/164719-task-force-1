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
			->joinWith('userCategories')
			->all();

		$filter = new UserForm();

		if ($filter->load(Yii::$app->request->post())) {
			$request = Yii::$app->request;
			$formContent = $request->post('UserForm');


			if ($formContent['categories']) {
				$users = UserInfo::find()
					->joinWith('userCategories')->where(['category_id' => $formContent['categories']])
					->all();
			}
			if($formContent['online']) {
				$users = UserInfo::find()
					->joinWith('userCategories')
					->where(['category_id' => $formContent['categories']])
					->andWhere(['>', 'online', date("Y-m-d H:i:s", strtotime("-1 hour"))])
					->all();
			}

		}

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
}
