<?php

namespace frontend\controllers;


use frontend\models\forms\taskActions\doneForm;
use frontend\models\forms\taskActions\refuseForm;
use frontend\models\forms\taskActions\responseForm;
use frontend\models\Response;
use taskForce\services\CreateTaskService;
use Yii;
use frontend\models\Categories;
use frontend\models\forms\CreateTaskForm;
use frontend\models\forms\TaskForm;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserCategory;
use taskForce\services\FilterTaskService;
use yii\web\NotFoundHttpException;


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

			$tasks = FilterTaskService::taskFilter($formContent)->all();
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

        $actionResponseForm = new responseForm();
        $actionRefuseForm = new refuseForm();
		$actionDoneForm = new doneForm();

		$responseTask = new Response();

		if (Yii::$app->request->getIsPost()) {

			$actionResponseForm->load(Yii::$app->request->post());
			$request = Yii::$app->request;
			$formResponse = $request->post('responseForm');



			$responseTask->user_id = Yii::$app->user->id;
			$responseTask->price = empty($formResponse['price']) ? 0 : $formResponse['price'];
			$responseTask->comment = $formResponse['comment'];
			$responseTask->task_id = $detail->id;

			$responseTask->save(false);
			return  $this->refresh();

		}

		return $this->render('view', [
			'detail' => $detail,
			'count_tasks' => $count_tasks,
			'user' => $user_created_at,
            'actionResponseForm' => $actionResponseForm,
            'actionRefuseForm' => $actionRefuseForm,
            'actionDoneForm' => $actionDoneForm
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
