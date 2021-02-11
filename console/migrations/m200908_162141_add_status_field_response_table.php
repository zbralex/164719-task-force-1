<?php

use yii\db\Migration;

/**
 * Class m200908_162141_add_status_field_response_table
 */
class m200908_162141_add_status_field_response_table extends Migration
{
    public function safeUp()
    {
	    $this->addColumn('response', 'status', 'string');
    }

}
