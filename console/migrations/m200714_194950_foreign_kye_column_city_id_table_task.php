<?php

use yii\db\Migration;

/**
 * Class m200714_194950_foreign_kye_column_city_id_table_task
 */
class m200714_194950_foreign_kye_column_city_id_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addForeignKey(
		    'task_ibfk_4',
		    'task',
		    'city_id',
		    'cities',
		    'id',
		    'RESTRICT'
	    );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropForeignKey(
		    'task_ibfk_4',
		    'task'
	    );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200714_194950_foreign_kye_column_city_id_table_task cannot be reverted.\n";

        return false;
    }
    */
}
