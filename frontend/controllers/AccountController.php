<?php
namespace frontend\controllers;


use frontend\models\forms\AccountForm;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\widgets\ActiveForm;

class AccountController extends \yii\web\Controller {
    public function actionIndex()
    {

        $model = new AccountForm();
        $userInfo = UserInfo::findOne(Yii::$app->user->id);


        if (Yii::$app->request->isAjax) {
            return ActiveForm::validate($model);
        }



        return $this->render('index', [
            'model' => $model,
            'userInfo' => $userInfo
        ]);
    }
}
