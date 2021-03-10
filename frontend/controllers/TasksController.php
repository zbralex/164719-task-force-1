<?php

namespace frontend\controllers;


use frontend\models\Categories;
use frontend\models\forms\CreateTaskForm;
use frontend\models\forms\taskActions\doneForm;
use frontend\models\forms\taskActions\refuseForm;
use frontend\models\forms\taskActions\responseForm;
use frontend\models\forms\TaskForm;
use frontend\models\PortfolioPhoto;
use frontend\models\Response;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserCategory;

use taskForce\classes\uploader\Uploader;
use taskForce\services\CreateTaskService;
use taskForce\services\FilterTaskService;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class TasksController extends SecuredController

{
    public $enableCsrfValidation = false;

    public function actionUploadFile() {
        $fileName = 'Attach';
        Uploader::uploadFiles($fileName);
    }
	public function actionIndex()
	{
		$model = new TaskForm();
        $query = Task::find()
			->with('category', 'cities')
			->where(['status' => \taskForce\classes\Task::STATUS_NEW])
			->orderBy('created_at DESC');

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $tasks = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

		if (Yii::$app->request->getIsPost()) {

			$model->load(Yii::$app->request->post());
			if (!$model->validate()) {
				$errors = $model->getErrors();
			}
			$request = Yii::$app->request;
			$formContent = $request->post('TaskForm');

			$tasks = FilterTaskService::taskFilter($formContent)->all();
		}
		return $this->render('index', [
			'tasks' => $tasks,
			'model' => $model,
            'pages' => $pages
		]);
	}

	public function actionView($id = null)
	{

		$detail = Task::findOne($id);
		$resp = Response::find()
			->where(['user_id' => Yii::$app->user->id, 'task_id' => $detail->id, 'status' => 'new'])
			->count();
		if (empty($detail)) {
			throw new NotFoundHttpException("Задание с № $id не найдено");
		}
		$count_tasks = Task::find()
			->where(['author_id' => $detail->author_id])
			->count('author_id');


		$user_created_at = User::findOne($detail->author_id);

		$actionResponseForm = new responseForm();
		$actionRefuseForm = new refuseForm();
		$actionDoneForm = new doneForm();


		if (Yii::$app->request->getIsPost()) {

			$actionResponseForm->load(Yii::$app->request->post());
			$actionRefuseForm->load(Yii::$app->request->post());
			$actionDoneForm->load(Yii::$app->request->post());

			$request = Yii::$app->request;

			$formResponse = $request->post('responseForm');
			$formDone = $request->post('doneForm');
			$formRefuse = $request->post('refuseForm');
			$response = new Response();

			if ($formResponse) {

				$actionResponseForm->load(Yii::$app->request->post());
				$response->user_id = Yii::$app->user->id;
				$response->price = empty($formResponse['price']) ? $detail->price : $formResponse['price'];
				$response->comment = $formResponse['comment'];
				$response->task_id = $detail->id;
				$response->status = 'new';

				$response->save(false);
				return $this->refresh();
			}


			if ($formRefuse) {
				$response->status = 'failed';
				$response->user_id = Yii::$app->user->id;
				$response->task_id = $detail->id;

				$response->save(false);
				return $this->refresh();
			}

			if ($formDone) {
				$response->user_id = Yii::$app->user->id;
				$response->task_id = $detail->id;

				$response->status = $formDone['isDone'] == 0 ? 'completed' : 'failed';
				$response->rating = $_POST['rating'];
				$response->comment = $formDone['comment'];

				$response->save(false);
				return $this->refresh();

			}

		}

		// меняем местами широту и долготу, т.к. сохраняется из API в обратном порядке
		$geocodeReverse = implode(' ', array_reverse(explode(' ', $detail->geocode)));
		// вставляем в строку запятую и пробел для запроса к API и отрисовки карты
		$geocode = str_ireplace(" ", ", ", $geocodeReverse);

		return $this->render('view', [
			'detail' => $detail,
			'count_tasks' => $count_tasks,
			'user' => $user_created_at,
			'actionResponseForm' => $actionResponseForm,
			'actionRefuseForm' => $actionRefuseForm,
			'actionDoneForm' => $actionDoneForm,
			'resp' => $resp,
			'geocode' => $geocode
		]);
	}


	public function actionRefuse($id = null)
	{


		if (Yii::$app->request->getIsPost()) {
			$user_id = Yii::$app->request->post('user_refused');
			$response = Response::findOne(['task_id' => $id, 'user_id' => $user_id]);

			if (null === $response) {
				throw new NotFoundHttpException("Задание с № $id для пользователя $user_id не найдено");
			}

			$response->status = 'cancelled';
			$response->save(false);
			return $this->redirect(['../task/view/' . $id]);
		}
	}

	public function actionRequest($id = null)
	{
		$detail = Task::findOne($id);

		if (empty($detail)) {
			throw new NotFoundHttpException("Задание с № $id не найдено");
		}

		if (Yii::$app->request->getIsPost()) {
			$executor_id = Yii::$app->request->post('executor');
			$detail->status = 'progress';
			$detail->executor_id = $executor_id;
			$detail->save(false);
			return $this->redirect(['../task/view/' . $id]);
		}
	}



	public function actionCreate()
	{
		// По умолчанию, после регистрации пользователю присваивается роль «Заказчик». Чтобы стать исполнителем необходимо
		// отметить хотя бы одну специализацию у себя в профиле.
		// Соответственно, при отмене всех галочек пользователь вновь становится исполнителем.
		$speciality = UserCategory::find()->where(['user_id' => Yii::$app->user->id])->column();
		//проверяем, является ли пользователь заказчиком

		if (count($speciality) > 0) {
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
		if (!$model->validate()) {
			$errors = $model->getErrors();
		}


		return $this->render('create', [
			'model' => $model,
			'categories' => $categories,
			'errors' => $errors
		]);
	}


}
