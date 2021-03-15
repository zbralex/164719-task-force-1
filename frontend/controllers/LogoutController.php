<?php
namespace  frontend\controllers;

use Yii;
use yii\filters\AccessControl;

class LogoutController extends SecuredController
{

	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}
}
