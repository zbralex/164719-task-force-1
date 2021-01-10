<?php

use yii\db\Migration;

/**
 * Class m200908_070545_remove_status_field_response_table
 */
class m200908_070545_remove_status_field_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->dropColumn('response', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->addColumn('response', 'status', 'string');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200908_070545_remove_status_field_response_table cannot be reverted.\n";

        return false;
    }
    */
}
