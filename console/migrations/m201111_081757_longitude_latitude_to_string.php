<?php

use yii\db\Migration;

/**
 * Class m201111_081757_longitude_latitude_to_string
 */
class m201111_081757_longitude_latitude_to_string extends Migration
{
    /**
     * {@inheritdoc}
     */
	public function safeUp()
	{
		$this->alterColumn('task', 'latitude', $this->decimal(2, 10)->null());
		$this->alterColumn('task', 'longitude', $this->decimal(2, 10)->null());
	}
}
