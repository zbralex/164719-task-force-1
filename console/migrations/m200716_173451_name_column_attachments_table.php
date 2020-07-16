<?php

use yii\db\Migration;

/**
 * Class m200716_173451_name_column_attachments_table
 */
class m200716_173451_name_column_attachments_table extends Migration
{
    public function safeUp()
    {
		$this->addColumn('attachment', 'name', $this->string()->null());
    }

    public function safeDown()
    {
        $this->dropColumn('attachment', 'name');
    }

}
