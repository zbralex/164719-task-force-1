<?php

use yii\db\Migration;

/**
 * Class m201115_071706_geocode_field_task
 */
class m201115_071706_geocode_field_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('task', 'geocode', $this->string()->null());
	    $this->dropColumn('task', 'longitude');
	    $this->dropColumn('task', 'latitude');
    }
}
