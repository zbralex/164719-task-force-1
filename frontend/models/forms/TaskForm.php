<?php

namespace frontend\models\forms;
use yii\base\Model;

class TaskForm extends Model {
	public $categories;

	public function attributeLabels()
	{
		return [
			'categories' => ''
		];
	}
}
