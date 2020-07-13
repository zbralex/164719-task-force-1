<?php

use yii\db\Migration;

/**
 * Class m200713_091801_change_executor_id_default_null
 */
class m200713_091801_change_executor_id_default_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('task', 'executor_id', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->alterColumn('task', 'executor_id', $this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200713_091801_change_executor_id_default_null cannot be reverted.\n";

        return false;
    }
    */
}
