<?php

use yii\db\Migration;

/**
 * Class m201111_123721_rask_address_description
 */
class m201111_123721_rask_address_description extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('task', 'address_description', $this->string()->null());
    }
}
