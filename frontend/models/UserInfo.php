<?php

namespace frontend\models;

use yii\db\ActiveRecord;


/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $surname
 * @property int $city_id
 * @property string|null $edited_at
 * @property string $date_birth
 * @property string $user_pic
 * @property int $role_id
 * @property float|null $rating
 * @property string $phone
 * @property string $telegram
 * @property string $skype
 * @property string $about
 * @property string $address
 *
 * @property UserCategory[] $userCategories
 * @property User $user
 * @property Cities $city
 */
class UserInfo extends ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'user_info';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['user_id', 'name', 'surname', 'city_id', 'date_birth', 'role_id', 'phone', 'telegram', 'skype'], 'required'],
			[['user_id', 'city_id', 'role_id'], 'integer'],
			[['edited_at', 'date_birth'], 'safe'],
			[['rating'], 'number'],
			[['name', 'surname', 'telegram', 'skype'], 'string', 'max' => 255],
			[['phone'], 'string', 'max' => 11],
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
			[['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::class, 'targetAttribute' => ['city_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_id' => 'User ID',
			'name' => 'Name',
			'surname' => 'Surname',
			'city_id' => 'City ID',
			'edited_at' => 'Edited At',
			'date_birth' => 'Date Birth',
			'role_id' => 'Role ID',
			'rating' => 'Rating',
			'phone' => 'Phone',
			'telegram' => 'Telegram',
			'skype' => 'Skype',
		];
	}

	/**
	 * Gets query for [[UserCategories]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getUserCategories()
	{
		return $this->hasMany(UserCategory::class, ['user_id' => 'user_id']);
	}

	/**
	 * Gets query for [[User]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return $this->hasOne(User::class, ['id' => 'user_id']);
	}

	public function getTasks()
	{
		return $this->hasMany(Task::class, ['executor_id' => 'user_id']);
	}

	public function getReview()
	{
		return $this->hasMany(Review::class, ['user_id' => 'user_id']);
	}

	public function getFavorites()
	{
		return $this->hasMany(FavoriteList::class, ['user_who_select_id' => 'user_id']);
	}

	/**
	 * Gets query for [[City]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getCities()
	{
		return $this->hasOne(Cities::class, ['id' => 'city_id']);
	}
    public function getPortfolioPhoto()
    {
        return $this->hasMany(PortfolioPhoto::class, ['user_id' => 'user_id']);
    }
    public function getSiteSettings()
    {
        return $this->hasOne(SiteSettings::class, ['user_id' => 'user_id']);
    }
}
