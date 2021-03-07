<?php

namespace frontend\models\forms;

use Yii;
use yii\base\Model;

class AccountForm extends Model
{

    public $name;
    public $userPic;
    public $email;

    public $password;
    public $re_password;

    public $address;
    public $hiddenLocation;
    public $date_of_birth;
    public $about_myself;
    public $user_category;

    public $attaches;

    public $phone;
    public $skype;
    public $another_messenger;

    public $show_new_messages;
    public $show_actions_of_task;
    public $show_new_review;
    public $show_my_contacts_customer;
    public $hide_account;

    public function rules(): array
    {
        return [
            ['name', 'string', 'min' => 2, 'max' => 256],
            ['email', 'email'],


            ['password', 'string', 'min' => 6],
            ['re_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают" ],

            ['address', 'string', 'min' => 3, 'max' => 256],
            ['date_of_birth', 'date', 'format' => 'php:Y-m-d'],
            [['about_myself', 'name'], 'trim'],

            [['attaches'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 6],

            [['userPic'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 1],
            [['skype','another_messenger'], 'string', 'max' => 256],
            [['skype','another_messenger'], 'trim'],
            ['phone', 'string', 'min' => 8],
            ['user_category', 'safe'],

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
            "userPic" => 'Сменить аватар',

            "password" => 'НОВЫЙ ПАРОЛЬ',
            "re_password" => 'ПОВТОР ПАРОЛЯ',

            "address" => 'АДРЕС',
            "date_of_birth" => 'ДЕНЬ РОЖДЕНИЯ',
            "about_myself" => 'ИНФОРМАЦИЯ О СЕБЕ',
            "user_category" => 'Специализации',

            "attaches" => 'Выбрать фотографии',

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

        if(!is_dir($dir)) {
            mkdir($dir, 0777);
        }

        if ($this->validate()) {
            $this->userPic->saveAs( $dir . $this->userPic->baseName . '.' . $this->userPic->extension);
            return true;
        } else {
            return false;
        }
    }

    public function uploadAttaches() {
        $dir = Yii::getAlias('@app') . '/web/upload/' . date("Y-m-d") .'_'. date("H-m") . '/';

        if(!is_dir($dir)) {
            mkdir($dir, 0777);
        }


        if ($this->validate()) {
            foreach ($this->attaches as $file) {
                $file->saveAs( $dir . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

}
