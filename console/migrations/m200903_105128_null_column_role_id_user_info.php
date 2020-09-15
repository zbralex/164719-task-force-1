<?php

use yii\db\Migration;

/**
 * Class m200903_105128_null_column_role_id_user_info
 */
class m200903_105128_null_column_role_id_user_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user_info', 'role_id', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('user_info', 'role_id', $this->integer()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200903_105128_null_column_role_id_user_info cannot be reverted.\n";

        return false;
    }
    */
}
