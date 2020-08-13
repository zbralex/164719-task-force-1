<?php
namespace frontend\models\forms;

use yii\base\Model;

class CreateTaskForm extends Model {
	public $name;
	public $description;
	public $category;
	public $attachment;
	//public $location;
	public $price;
	public $execution_date;

	public function rules()
	{
		return [
			[['name', 'description', 'category'], 'required'],
			[['name','description'], 'trim'],
			[['name'], 'string', 'min' => 10],
			[['description'], 'string', 'min' => 30],
			[['execution_date'], 'date'],
			[['attachment'], 'file', 'maxFiles' => 10]
		];
	}
	public function attributeLabels()
	{
		return [
			'name' => 'Мне нужно',
			'description' => 'Подробности задания',
			'category' => 'Категория',
			'attachment' => 'Файлы',
			//'location' => 'Локация',
			'price' => 'Бюджет',
			'execution_date' => 'Срок исполнения'
		];
	}
}
