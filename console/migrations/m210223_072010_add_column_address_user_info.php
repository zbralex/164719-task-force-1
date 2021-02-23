<?php

use yii\db\Migration;

/**
 * Class m210223_072010_add_column_address_user_info
 */
class m210223_072010_add_column_address_user_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_info', 'address', $this->string()->null());
    }

}
