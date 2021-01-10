<?php

use yii\db\Migration;

/**
 * Class m200727_062409_add_name_column_table_user
 */
class m200727_062409_add_name_column_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('user', 'name', $this->string()->null());
    }

    public function safeDown()
    {
	    $this->dropColumn('user', 'name');
    }
}
