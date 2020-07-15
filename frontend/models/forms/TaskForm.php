<?php

namespace frontend\models\forms;

use yii\base\Model;

class TaskForm extends Model
{
	public $categories;
	public $noResponse;
	public $remote;
	public $period;
	public $search;

	public function attributeLabels()
	{
		return [
			'categories' => '',
			'noResponse' => 'Без откликов',
			'remote' => 'Удалённая работа',
			'period' => 'Период',
			'search' => 'Поиск по названию'
		];
	}

	public function attributeLabelsPeriod()
	{
		return [
			'day' => 'За день',
			'week' => 'За неделю',
			'month' => 'За месяц',
			'all' => 'За всё время',
		];
	}
}
