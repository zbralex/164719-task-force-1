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
 * @property int $role_id
 * @property float|null $rating
 * @property string $phone
 * @property string $telegram
 * @property string $skype
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
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
		return $this->hasMany(UserCategory::className(), ['user_id' => 'user_id']);
	}

	/**
	 * Gets query for [[User]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}

	public function getTasks()
	{
		return $this->hasMany(Task::className(), ['executor_id' => 'user_id']);
	}

	public function getReview()
	{
		return $this->hasMany(Review::className(), ['user_id' => 'user_id']);
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

	public function filterForm($value)
	{
		$query = UserInfo::find()
			->joinWith('user u')

			->limit(5)->orderBy('u.created_at ASC');
		//На странице показывается максимум пять исполнителей.
		// При большем числе записей следует показывать их через пагинацию.
		foreach ($value as $key => $item) {
			if ($item) {
				if ($key === 'categories') {
					$query->joinWith('userCategories uc')->where(['uc.category_id' => $item]);
				}
				//«Сейчас онлайн» — добавляет к условию фильтрации показ исполнителей,
				// время последней активности которых было не больше получаса назад
				if ($key === 'online') {
					$query->andWhere(['<=', 'online', date("Y-m-d H:i:s", strtotime("+3 hour"))]);
					$query->andWhere(['>=', 'online', date("Y-m-d H:i:s", strtotime("+150 minutes"))]);
				}

				//«Сейчас свободен» — добавляет к условию фильтрации показ исполнителей,
				// для которых сейчас нет назначенных активных заданий
				if ($key === 'isFree') {
					$query->joinWith('tasks t');
					$query->andWhere(['t.executor_id' => null]);
				}

				//«Есть отзывы» — добавляет к условию фильтрации показ исполнителей с отзывами
				if ($key === 'review') {
					$query->joinWith('review r');
					$query->andWhere(['not', ['r.user_id' => null]]);
				}

				//«В избранном» — добавляет к условию фильтрации показ пользователей, которые были добавлены в избранное
				if ($key === 'favorite') {
					$query->andWhere(['<', 'online', date("Y-m-d H:i:s")]);
				}

				//Поле «Поиск по имени» сбрасывает все выбранные фильтры и
				// ищет пользователя с нестрогим совпадением по его имени.
				if ($key === 'search') {
					$query->andWhere(['<', 'online', date("Y-m-d H:i:s")]);
				}
			}

		}
		return $query->all();
	}
}
