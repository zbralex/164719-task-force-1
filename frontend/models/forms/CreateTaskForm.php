<?php

namespace frontend\models\forms;

use Yii;
use yii\base\Model;

class CreateTaskForm extends Model
{
    public $name;
    public $description;
    public $category;
    public $files;
    //public $location;
    public $price;
    public $execution_date;


    public function rules()
    {
        return [
            ['category', 'safe'],
            [['description', 'name'], 'required'],
            [['description', 'name'], 'trim'],
            ['name', 'string', 'min' => 10, 'max' => 256],
            ['description', 'string', 'min' => 30, 'max' => 256],
            ['execution_date', 'date', 'format' => 'php:Y-m-d', 'min' => date('Y-m-d')],
            [['files'], 'file', 'maxFiles' => 10],
            ['price', 'number', 'integerOnly' => true, 'min' => '1'],
            ['price', 'default', 'value' => null]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Мне нужно',
            'description' => 'Подробности задания',
            'category' => 'Категория',
            'files' => 'Файлы',
            //'location' => 'Локация',
            'price' => 'Бюджет',
            'execution_date' => 'Срок исполнения'
        ];
    }

    public function upload()
    {
        $dir = Yii::getAlias('@app') . '/upload/' . date("Y-m-d") .'_'. date("H-m-s") . '/';
        $paths = [];

        if(!is_dir($dir)) {
            mkdir($dir, 0777);
        }

        if ($this->validate()) {
            foreach ($this->files as $file) {
                $file->saveAs( $dir . $file->baseName . '.' . $file->extension);
                $paths [] = '/upload/' . $file->baseName . '.' . $file->extension;
            }
            return $paths;
        } else {
            return false;
        }
    }
}
