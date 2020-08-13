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
			[['name','description'], 'filter','filter'=>'trim'],
			[['name'], 'string', 'min' => 10, 'message' => 'минимальная длина 10 символов'],
			[['description'], 'string', 'min' => 30, 'message' => 'минимальная длина 30 символов'],
			[['execution_date'], 'date'],
			[['attachment'], 'file', 'maxFiles' => 10],
			[['price'], 'number', 'message' => 'Введите число или оставьте поле пустым'],
			[['price'], 'default', 'value' => null],
			[['name'], 'required', 'message' => 'Поле «Название» обязательно для заполнения'],
			[['description'], 'required', 'message' => 'Поле «Описание» обязательно для заполнения'],
			[['category'], 'required', 'message' => "Это поле должно быть выбрано. Задание должно принадлежать одной из категорий"],
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
