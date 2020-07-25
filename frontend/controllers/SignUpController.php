<?php

namespace frontend\controllers;

use frontend\models\forms\SignupForm;

class SignupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new SignupForm();
        return $this->render('index', [
            'model' => $model
        ]);
    }

}
