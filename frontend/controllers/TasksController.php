<?php

namespace frontend\controllers;

use frontend\models\Attachment;
use frontend\models\Categories;
use frontend\models\forms\CreateTaskForm;
use frontend\models\forms\TaskForm;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserCategory;
use frontend\models\UserInfo;
use taskForce\classes\utils\CreateTaskService;
use Yii;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class TasksController extends SecuredController
{
	public function actionIndex()
	{
		$model = new TaskForm();
		$tasks = Task::find()
			->with('category', 'cities')
			->where(['status' => \taskForce\classes\Task::STATUS_NEW])
			->orderBy('created_at DESC')->all();

		if (Yii::$app->request->getIsPost()) {

			$model->load(Yii::$app->request->post());
			if (!$model->validate()) {
				$errors = $model->getErrors();
			}
			$request = Yii::$app->request;
			$formContent = $request->post('TaskForm');

			$query = Task::find()
				->orderBy('created_at ASC');


			foreach ($formContent as $key => $item) {

				if ($item) {
					switch ($key) {
						//Группа чекбоксов «Категории» выводит все категории, существующие на сайте.
						case 'categories':
							$query->joinWith('category c')->where(['c.id' => $item]);
							break;

						//Выпадающий список «Период» добавляет к условию фильтрации диапазон времени, когда было создано задание.
						//Доступные значения: за день, за неделю, за месяц, за всё время.
						case 'period':
							switch ($item) {
								case 'day':
									$query->andWhere(['>=', 'created_at', date("Y-m-d H:i:s", strtotime("-1 day +3 hour"))]);
									break;
								case 'week':
									$query->andWhere(['>=', 'created_at', date("Y-m-d H:i:s", strtotime("-1 week +3 hour"))]);
									break;

								case 'month':
									$query->andWhere(['>=', 'created_at', date("Y-m-d H:i:s", strtotime("-1 month +3 hour"))]);
									break;
								case 'all':
									$query->andWhere(['>=', 'created_at', date("Y-m-d H:i:s", strtotime("last year +3 hour"))]);
									break;
							}
							break;

						//«Без откликов» — добавляет к условию фильтрации показ заданий только без откликов исполнителей;
						case 'noResponse':
							$query->joinWith('response r');
							$query->andWhere(['r.task_id' => null]);
							break;

						//«Удалённая работа» — добавляет к условию фильтрации показ заданий без географической привязки.
						case 'remote':
							$query->andWhere(['task.city_id' => null]);
							break;
						case 'search':
							$query->andWhere(['LIKE', 'task.name', $item]);
							break;
					}
				}
			}
			$tasks = $query->all();
		}
		return $this->render('index', [
			'tasks' => $tasks,
			'model' => $model
		]);
	}

	public function actionView($id = null)
	{

		$detail = Task::findOne($id);
        if (empty($detail)) {
            throw new NotFoundHttpException("Задание с № $id не найдено");
        }
		$count_tasks = Task::find()
			->where(['author_id'=> $detail->author_id])
			->count('author_id');


		$user_created_at = User::findOne($detail->author_id);

		return $this->render('view', [
			'detail' => $detail,
			'count_tasks' => $count_tasks,
			'user' => $user_created_at
		]);
	}

	public function actionCreate() {
        // По умолчанию, после регистрации пользователю присваивается роль «Заказчик». Чтобы стать исполнителем необходимо
        // отметить хотя бы одну специализацию у себя в профиле.
        // Соответственно, при отмене всех галочек пользователь вновь становится исполнителем.
	    $speciality = UserCategory::find()->where(['user_id' => Yii::$app->user->id])->column();
        //проверяем, является ли пользователь заказчиком

        if(count($speciality) > 0) {
            return $this->render(Yii::getAlias('@web') . '/site/error', [
                'name' => 'Доступ к созданию задачи запрещен',
                'message' => 'Вы являетесь исполнителем. Пожалуйста, уберите специализацию в настройках профиля'
            ]);
        }


		$model = new CreateTaskForm();
		$task = new Task();
        $categories = Categories::find()->select(['name', 'id'])->indexBy('id')->column();
        $errors = [];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            CreateTaskService::taskHandler($task, $model);
            return $this->redirect('/tasks');
		}
		if(!$model->validate()) {
			$errors = $model->getErrors();
		}



		return $this->render('create', [
			'model' => $model,
            'categories' => $categories,
            'errors' => $errors
		]);
	}

}
