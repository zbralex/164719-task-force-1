<?php

use yii\db\Migration;

/**
 * Class m200714_191333_drop_and_add_column_city_id_table_task
 */
class m200714_191333_drop_and_add_column_city_id_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
	public function safeUp()
	{
		$this->dropForeignKey(
			'task_ibfk_4',
			'task'
		);
		$this->alterColumn('task', 'city_id', $this->string()->null());
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->alterColumn('task', 'city_id', $this->integer()->null());
	}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200714_191333_drop_and_add_column_city_id_table_task cannot be reverted.\n";

        return false;
    }
    */
}
