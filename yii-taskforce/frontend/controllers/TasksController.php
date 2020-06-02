<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class TasksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
