<?php

use yii\db\Migration;

/**
 * Class m210214_105844_user_info_about_column
 */
class m210214_105844_user_info_about_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_info', 'about', $this->string()->null());
    }
}
