<?php

use yii\db\Migration;

/**
 * Class m201111_084900_longitude_latitude_to_float_2_10_precision
 */
class m201111_084900_longitude_latitude_to_float_2_10_precision extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('task', 'latitude', $this->float(10)->null());
	    $this->alterColumn('task', 'longitude', $this->float(10)->null());
    }
}
