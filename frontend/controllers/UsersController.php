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

			$query = UserInfo::find()
				->joinWith('user u')
				->orderBy('u.created_at ASC');
			foreach ($formContent as $key => $item) {
				if ($item) {
					switch ($key) {
						case 'categories':
							$query->joinWith('userCategories uc')->where(['uc.category_id' => $item]);
							break;
						case 'online':
							$query->andWhere(['<=', 'online', date("Y-m-d H:i:s", strtotime("+3 hour"))]);
							$query->andWhere(['>=', 'online', date("Y-m-d H:i:s", strtotime("+150 minutes"))]);
							break;
						case 'isFree':
							$query->joinWith('tasks t');
							$query->andWhere(['t.executor_id' => null]);
							break;
						case 'review':
							$query->joinWith('review r');
							$query->andWhere(['not', ['r.user_id' => null]]);
							break;
						case 'favorite':
							$query->joinWith('favorites f');
							$query->andWhere(['f.user_selected_id' => null]);
							break;
						case 'search':
							$query->andWhere(['LIKE', 'user_info.name', $item]);
							break;
					}
				}
			}

			$users = $query->all();
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
