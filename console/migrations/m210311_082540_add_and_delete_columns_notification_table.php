<?php

use yii\db\Migration;

/**
 * Class m210311_082540_add_and_delete_columns_notification_table
 */
class m210311_082540_add_and_delete_columns_notification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('notification', 'icon', $this->string()->null());
        $this->addColumn('notification', 'description', $this->string()->null());
        $this->dropColumn('notification', 'url');
        $this->dropColumn('notification', 'type');
    }
}
