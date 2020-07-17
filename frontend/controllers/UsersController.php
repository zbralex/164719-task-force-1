<?php

namespace frontend\controllers;

use frontend\models\forms\UserForm;
use frontend\models\UserInfo;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UsersController extends Controller
{
	public function actionIndex()
	{
		$users = UserInfo::find()
			->with('userCategories.category')
			->all();

		$model = new UserForm();

		if (Yii::$app->request->getIsPost()) {
			$model->load(Yii::$app->request->post());
			if (!$model->validate()) {
				$errors = $model->getErrors();
			}

			$request = Yii::$app->request;
			$formContent = $request->post('UserForm');
			$users = (new UserInfo)->filterForm($formContent);
		}

		return $this->render('index', [
			'users' => $users,
			'model' => $model
		]);
	}

	public function actionView($id)
	{
		$detail = UserInfo::findOne($id);
		if (empty($detail)) {
			throw new NotFoundHttpException("Пользователь под номером $id не найден");
		}
		return $this->render('view', [
			'detail' => $detail
		]);
	}
}
