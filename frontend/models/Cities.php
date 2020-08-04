<?php

namespace frontend\models;
use  \yii\db\ActiveRecord;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $city
 * @property string|null $latitude
 * @property string|null $longitude
 */
class Cities extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city'], 'required'],
            [['city', 'latitude', 'longitude'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
//	public function getTasks()
//	{
//		return $this->hasMany(Task::className(), ['city_id' => 'id']);
//	}
}
