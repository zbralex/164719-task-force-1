<?php

namespace frontend\models\forms;

use Yii;
use yii\base\Model;

class AccountForm extends Model
{
    public
        $name,
        $user_pic,
        $email,

        $password,
        $re_password,

        $address,
        $hiddenLocation,
        $date_of_birth,
        $about_myself,
        $user_category = [],

        $photos_of_works,

        $phone,
        $skype,
        $another_messenger,

        $show_new_messages,
        $show_actions_of_task,
        $show_new_review,
        $show_my_contacts_customer,
        $hide_account;

    public function rules(): array
    {
        return [
            ['name', 'string', 'min' => 2, 'max' => 256],
            ['email', 'email'],


            ['password', 'string', 'min' => 6],
            ['re_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают" ],

            ['address', 'string', 'min' => 3, 'max' => 256],
            ['date_of_birth', 'date', 'format' => 'php:Y-m-d', 'min' => date('Y-m-d')],
            [['about_myself', 'name'], 'trim'],

            [['photos_of_works'], 'file', 'maxFiles' => 6],
            ['user_pic', 'file', 'maxFiles' => 1],
            [['skype','another_messenger'], 'string', 'max' => 256],
            [['skype','another_messenger'], 'trim'],
            ['phone', 'string', 'min' => 8],
            ['user_category', 'each', 'rule' => ['integer']],

            [
                [
                    'show_new_messages',
                    'show_actions_of_task',
                    'show_new_review',
                    'show_my_contacts_customer',
                    'hide_account'
                ], 'integer'],
        ];
    }
    public function attributeLabels(): array
    {
        return [
            "name" => 'ВАШЕ ИМЯ',
            "email" => 'EMAIL',

            "password" => 'НОВЫЙ ПАРОЛЬ',
            "re_password" => 'ПОВТОР ПАРОЛЯ',

            "address" => 'АДРЕС',
            "date_of_birth" => 'ДЕНЬ РОЖДЕНИЯ',
            "about_myself" => 'ИНФОРМАЦИЯ О СЕБЕ',
            "user_category" => 'Специализации',

            "photos_of_works" => 'Выбрать фотографии',

            "phone" => 'ТЕЛЕФОН',
            "skype" => 'SKYPE',
            "another_messenger" => 'ДРУГОЙ МЕССЕНДЖЕР',

            "show_new_messages" => 'Новое сообщение',
            "show_actions_of_task" => 'Действие по заданию',
            "show_new_review" => 'Новый отзыв',
            "show_my_contacts_customer" => 'Показывать мои контакты только заказчику',
            "hide_account" => 'Не показывать мой профиль',
        ];
    }

    public function upload()
    {
        $dir = Yii::getAlias('@app') . '/web/upload/' . date("Y-m-d") .'_'. date("H-m") . '/';
        $paths = [];

        if(!is_dir($dir)) {
            mkdir($dir, 0777);
        }

        if ($this->validate()) {
            foreach ($this->files as $file) {
                $file->saveAs( $dir . $file->baseName . '.' . $file->extension);
                $paths [] = '/upload/' . date("Y-m-d") .'_'. date("H-m") . '/' . $file->baseName . '.' . $file->extension;
            }
            return $paths;
        } else {
            return false;
        }
    }

}
