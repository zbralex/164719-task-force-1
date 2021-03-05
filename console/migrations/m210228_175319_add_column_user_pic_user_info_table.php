<?php

use yii\db\Migration;

/**
 * Class m210228_175319_add_column_user_pic_user_info_table
 */
class m210228_175319_add_column_user_pic_user_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_info', 'user_pic', $this->string()->null());
    }

}
