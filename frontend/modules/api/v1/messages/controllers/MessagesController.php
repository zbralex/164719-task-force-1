<?php

namespace app\modules\api\v1\messages\controllers;

use frontend\models\Message;
use yii\rest\ActiveController;

class MessagesController extends ActiveController {
	public $modelClass = Message::class;
}
