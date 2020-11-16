<?php

use yii\db\Migration;

/**
 * Class m201111_084558_longitude_latitude_to_float
 */
class m201111_084558_longitude_latitude_to_float extends Migration
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
