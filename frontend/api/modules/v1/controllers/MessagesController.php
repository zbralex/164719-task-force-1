<?php
namespace frontend\api\modules\v1\controllers;

use yii\rest\ActiveController;

class MessagesController extends ActiveController {
	public $modelClass = 'frontend\models\Message';
}
