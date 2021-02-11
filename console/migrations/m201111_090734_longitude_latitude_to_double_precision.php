<?php

use yii\db\Migration;

/**
 * Class m201111_090734_longitude_latitude_to_float_not_precision
 */
class m201111_090734_longitude_latitude_to_double_precision extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('task', 'latitude', $this->double(10)->null());
	    $this->alterColumn('task', 'longitude', $this->double(10)->null());
    }
}
