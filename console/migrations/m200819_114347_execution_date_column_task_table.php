<?php

use yii\db\Migration;

/**
 * Class m200819_114347_execution_date_column_task_table
 */
class m200819_114347_execution_date_column_task_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('task', 'execution_date', $this->date()->null());
    }

    public function safeDown()
    {
        $this->dropColumn('task', 'execution_date');
    }
}
