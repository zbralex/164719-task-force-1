<?php

namespace frontend\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "attachment".
 *
 * @property int $id
 * @property int $task_id
 * @property string $url
 * @property string $name
 * @property Task $task
 */
class Attachment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'url'], 'required'],
            [['task_id'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['name'], 'string', 'max' => 255],
            [['name'], 'string', 'default' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'url' => 'Url',
            'name' => 'Name'
        ];
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
