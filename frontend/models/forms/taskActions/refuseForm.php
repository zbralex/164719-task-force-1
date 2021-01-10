<?php

namespace frontend\models\forms\taskActions;

use yii\base\Model;

class refuseForm extends Model
{
    public $refuse;


    public function rules()
    {
        return [
            [['refuse'], 'safe' ],
            ['refuse', 'boolean' ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'refuse' => 'Отказаться',
        ];
    }
}
