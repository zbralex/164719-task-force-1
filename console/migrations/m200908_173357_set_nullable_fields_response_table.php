<?php

use yii\db\Migration;

/**
 * Class m200908_173357_set_nullable_fields_response_table
 */
class m200908_173357_set_nullable_fields_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('response', 'price', $this->string()->null());
	    $this->alterColumn('response', 'comment', $this->string()->null());
    }

}
