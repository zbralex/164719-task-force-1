<?php

use yii\db\Migration;

/**
 * Class m200706_083022_add_online_column_to_userInfo
 */
class m200706_083022_add_online_column_to_userInfo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->addColumn('user_info', 'online', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user_info', 'online');
    }
}
