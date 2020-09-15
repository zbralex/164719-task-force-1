<?php

namespace frontend\models\forms\taskActions;

use yii\base\Model;

class doneForm extends Model
{
    public $isDone;
    public $comment;
    public $rating;

    public $radioLabels = [
    		0 => 'Да',
		    1 => 'Возникли проблемы'
    ];


    public function rules()
    {
        return [
            ['comment', 'string', 'min' => 10, 'max' => 256],
            ['rating', 'number', 'min' => 1]
        ];
    }

    public function attributeLabels()
    {
        return [
            'isDone' => 'ЗАДАНИЕ ВЫПОЛНЕНО?',
            'comment' => 'Комментарий',
            'rating' => 'Оценка'
        ];
    }
}
