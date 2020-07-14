<?php

namespace frontend\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property int $price
 * @property int $category_id
 * @property int $author_id
 * @property int $executor_id
 * @property int $city_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $created_at
 * @property string|null $finished_at
 *
 * @property Attachment[] $attachments
 * @property Message[] $messages
 * @property Notification[] $notifications
 * @property Response[] $responses
 * @property Review[] $reviews
 * @property Categories $category
 * @property User $author
 * @property User $executor
 * @property Cities $city
 */
class Task extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status', 'price', 'category_id', 'author_id', 'executor_id', 'city_id'], 'required'],
            [['price', 'category_id', 'author_id', 'executor_id', 'city_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['created_at', 'finished_at'], 'safe'],
            [['name', 'description', 'status'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['executor_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
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
            'description' => 'Description',
            'status' => 'Status',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'author_id' => 'Author ID',
            'executor_id' => 'Executor ID',
            'city_id' => 'City ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'created_at' => 'Created At',
            'finished_at' => 'Finished At',
        ];
    }

    /**
     * Gets query for [[Attachments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttachments()
    {
        return $this->hasMany(Attachment::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Responses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Executor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(User::className(), ['id' => 'executor_id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    public function getUserInfo() {
    	return $this->hasOne(UserInfo::className(), ['user_id' => 'executor_id']);
    }
	public function filterForm($value)
	{
		$query = Task::find()
			//->joinWith('user u')
			->limit(5)->orderBy('created_at ASC');
		//На странице показывается максимум пять исполнителей.
		// При большем числе записей следует показывать их через пагинацию.
		foreach ($value as $key => $item) {
			if ($item) {
				switch ($key) {
					case 'categories':
						$query->joinWith('category c')->where(['c.id' => $item]);
						break;
					case 'period':
						$query->andWhere(['<=', 'online', date("Y-m-d H:i:s", strtotime("+3 hour"))]);
						$query->andWhere(['>=', 'online', date("Y-m-d H:i:s", strtotime("+150 minutes"))]);
						break;
//					case 'noResponse':
//						$query->joinWith('response r');
//						$query->andWhere(['r.user_id' => null]);
//						break;
//					case 'review':
//						$query->joinWith('review r');
//						$query->andWhere(['not', ['r.user_id' => null]]);
//						break;
//					case 'favorite':
//						$query->joinWith('favorites f');
//						$query->andWhere(['f.user_selected_id'=>null]);
//						break;
					case 'search':
						$query->andWhere(['LIKE', 'name', $item]);
						break;
				}
			}
		}
		return $query->all();
	}
}
