<?php

namespace frontend\models\forms;

use yii\base\Model;

class LoginForm extends Model
{
	public $email;
	public $password;

	public function rules()
	{
		return [
			[['email', 'password'], 'safe'],
			['email', 'email'],
		];
	}

	public function attributeLabels()
	{
		return [
			'email' => 'E-mail',
			'password' => 'Пароль',
		];
	}
}
