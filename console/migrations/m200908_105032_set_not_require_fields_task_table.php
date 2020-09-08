<?php

use yii\db\Migration;

/**
 * Class m200908_105032_set_not_require_fields_task_table
 */
class m200908_105032_set_not_require_fields_task_table extends Migration
{
	public function safeUp()
	{
		$this->alterColumn('task', 'name', $this->string()->null());
		$this->alterColumn('task', 'description', $this->string()->null());
		$this->alterColumn('task', 'category_id', $this->integer()->null());
		$this->alterColumn('task', 'author_id', $this->integer()->null());
	}

	public function safeDown()
	{
		$this->alterColumn('task', 'name', $this->string()->notNull());
		$this->alterColumn('task', 'description', $this->string()->notNull());
		$this->alterColumn('task', 'category_id', $this->integer()->notNull());
		$this->alterColumn('task', 'author_id', $this->integer()->notNull());
	}
}
