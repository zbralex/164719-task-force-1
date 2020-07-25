<?php

namespace frontend\models\forms;

use yii\base\Model;

class SignupForm extends Model {
    public $email;
    public $password;
    public $nameSurname;
    public $city;


    public function rules()
    {
        return [
            [['email', 'password'], 'required']
        ];
    }
    public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'nameSurname' => 'Ваше имя',
            'city' => 'Город проживания',
        ];
    }
}
