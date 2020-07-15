<?php

namespace frontend\models\forms;

use yii\base\Model;

class UserForm extends Model
{
	public $categories;
	public $additional;
	public $search;
	public $online;
	public $isFree;
	public $review;
	public $favorite;

	public function rules()
	{
		return [
			[['categories', 'isFree', 'online', 'review','favorite', 'search'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'categories' => '',
			'isFree' => 'Сейчас свободен',
			'online' => 'Сейчас онлайн',
			'review' => 'Есть отзывы',
			'favorite' => 'В избранном',
			'search' => 'Поиск по имени',
		];
	}
}
