<?php

use yii\db\Migration;

/**
 * Class m200903_072527_null_columns_user_info
 */
class m200903_072527_null_columns_user_info extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('user_info', 'name', $this->string()->null());
        $this->alterColumn('user_info', 'surname', $this->string()->null());
        $this->alterColumn('user_info', 'city_id', $this->integer()->null());
        $this->alterColumn('user_info', 'date_birth', $this->date()->null());
        $this->alterColumn('user_info', 'phone', $this->string()->null());
        $this->alterColumn('user_info', 'telegram', $this->string()->null());
        $this->alterColumn('user_info', 'skype', $this->string()->null());
    }

    public function safeDown()
    {
        $this->alterColumn('user_info', 'name', $this->string()->notNull());
        $this->alterColumn('user_info', 'surname', $this->string()->notNull());
        $this->alterColumn('user_info', 'city_id', $this->integer()->notNull());
        $this->alterColumn('user_info', 'date_birth', $this->date()->notNull());
        $this->alterColumn('user_info', 'phone', $this->string()->notNull());
        $this->alterColumn('user_info', 'telegram', $this->string()->notNull());
        $this->alterColumn('user_info', 'skype', $this->string()->notNull());
    }
}
