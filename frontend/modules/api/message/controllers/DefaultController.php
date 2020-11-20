<?php

namespace app\modules\api\message\controllers;

use frontend\models\Message;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `message` module
 */
class DefaultController extends ActiveController
{
	public $modelClass = 'frontend\models\Message';
    /**
     * Renders the index view for the module
     * @return string
     */
	public function actionIndex()
	{

		$dataProvider = new ActiveDataProvider([
			'query' => Message::find(),
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}


}
