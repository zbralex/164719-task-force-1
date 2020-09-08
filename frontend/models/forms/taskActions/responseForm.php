<?php

namespace frontend\models\forms\taskActions;

use yii\base\Model;

class responseForm extends Model
{
    public $price;
    public $comment;


    public function rules()
    {
        return [
            [['price', 'comment'], 'required'],
            ['price', 'number', 'integerOnly' => true, 'min' => '1'],
            ['comment', 'string', 'min' => 10, 'max' => 256]
        ];
    }

    public function attributeLabels()
    {
        return [
            'price' => 'Ваша цена',
            'comment' => 'Комментарий',
        ];
    }
}
