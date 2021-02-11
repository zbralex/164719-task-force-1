<?php

use yii\db\Migration;

/**
 * Class m200825_141244_is_null_price_field_task
 */
class m200825_141244_is_null_price_field_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('task', 'price', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $this->alterColumn('task', 'price', $this->integer()->notNull());
    }

}
