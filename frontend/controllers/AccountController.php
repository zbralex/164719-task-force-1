<?php

namespace frontend\controllers;


use frontend\models\forms\AccountForm;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\widgets\ActiveForm;

class AccountController extends \yii\web\Controller
{
    public function actionIndex()
    {
        var_dump(Yii::$app->user->identity->getId());

        $model = new AccountForm();
        $request = Yii::$app->request;

        $userInfo = UserInfo::findOne(['user_id' => Yii::$app->user->identity->getId()]);
        $user = User::findOne(['id' => Yii::$app->user->identity->getId()]);


        if (Yii::$app->request->getIsPost()) {

            if ($model->validate()) {

                print_r($model->email);


                //$user->email = $model->email;

                //$user->password = Yii::$app->getSecurity()->generatePasswordHash($model->re_password);

//                $userInfo = $model->address;
//                $userInfo = $model->date_of_birth;
//                $userInfo = $model->about_myself;
//                $userInfo = $model->user_category;
//
//                $userInfo = $model->photos_of_works;
//
//                $userInfo = $model->phone;
//                $userInfo = $model->skype;
//                $userInfo = $model->another_messenger;
//
//                $userInfo = $model->show_new_messages;
//                $userInfo = $model->show_actions_of_task;
//                $userInfo = $model->show_new_review;
//                $userInfo = $model->show_my_contacts_customer;
//                $userInfo = $model->hide_account;
                //$user->save(false);
            }

        }


        return $this->render('index', [
            'model' => $model,
            'userInfo' => $userInfo
        ]);
    }
}
