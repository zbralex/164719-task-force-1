<?php

namespace frontend\controllers;

use DateTime;
use frontend\models\forms\UserForm;
use frontend\models\UserInfo;
use taskForce\services\FilterUserService;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class UsersController extends SecuredController
{
	public function actionIndex()
	{
		$query = UserInfo::find()
			->with('userCategories.category');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $users = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

		$model = new UserForm();

		if (Yii::$app->request->getIsPost()) {
			$model->load(Yii::$app->request->post());
			if (!$model->validate()) {
				$errors = $model->getErrors();
			}

			$request = Yii::$app->request;
			$formContent = $request->post('UserForm');

            $users = FilterUserService::formFilter($formContent)->all();
		}

		return $this->render('index', [
			'users' => $users,
			'model' => $model,
            'pages' => $pages
		]);
	}

	public function actionView($id)
	{
        function getFullYears($birthdayDate) {
            $datetime = new DateTime($birthdayDate);
            $interval = $datetime->diff(new DateTime(date("Y-m-d")));
            return $interval->format("%Y");
        }

		$detail = UserInfo::findOne($id);
        $dateOfBirth = getFullYears($detail->date_birth);
		if (empty($detail)) {
			throw new NotFoundHttpException("Пользователь под номером $id не найден");
		}
		return $this->render('view', [
			'detail' => $detail,
            'dateOfBirth' => $dateOfBirth
		]);
	}
}
