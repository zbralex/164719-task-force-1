<?php

namespace frontend\models;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 */
class Categories extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'required'],
            [['name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'icon' => 'Icon',
        ];
    }

    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['category_id' => 'id']);
    }

	public function getUserCategories()
	{
		return $this->hasMany(UserCategory::className(), ['category_id' => 'id']);
	}


}
