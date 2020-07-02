<?php

namespace frontend\controllers;

use frontend\models\Categories;
use Yii;
use frontend\models\forms\UserForm;
use frontend\models\UserInfo;
use yii\web\Controller;
use yii\db\Query;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = UserInfo::find()
            ->with(['userCategories'])
            ->all();

        $categories = Categories::find()->all();

        $filter = new UserForm();

        if ($filter->load(Yii::$app->request->post())) {
            $request = Yii::$app->request;
	        $formContent = $request->post('UserForm');
	        //$formContent->category;
	        $users = UserInfo::find()
		        ->with(['userCategories'])
		        ->where(
                        ['userCategories.category_id' => 1])
		        ->all();
	        var_dump($formContent);
        }

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

    public function actionFilter() {
	    $users = UserInfo::find()
		    ->with(['userCategories'])
		    ->all();

	    $categories = Categories::find()->all();

	    $query = new Query();

	    $filter = new UserForm();

	    if ($filter->load(Yii::$app->request->post())) {
		    $request = Yii::$app->request;
		    $formContent = $request->post('UserForm');

		    $users = $query
			    ->select(['c.id', 'c.name'])
			    ->from(['categories c'])
			    ->join('INNER JOIN', 'user_category uc', 'c.id = uc.category_id')
			    ->where([
				    'c.id' => $formContent['categories']
			    ])
			    ->all();

	    }

	    return $this->render('index', [
		    'users' => $users,
		    'filter' => $filter,
		    'categories' => $categories
	    ]);
    }

}
