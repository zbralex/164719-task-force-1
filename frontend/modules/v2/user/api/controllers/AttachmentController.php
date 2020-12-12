<?php

namespace app\modules\v2\user\api\controllers;

use frontend\models\Attachment;
use yii\rest\ActiveController;

class AttachmentController extends ActiveController {
	public $modelClass = Attachment::class;
}
