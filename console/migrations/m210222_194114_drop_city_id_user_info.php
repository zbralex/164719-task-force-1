<?php

use yii\db\Migration;

/**
 * Class m210222_194114_drop_city_id_user_info
 */
class m210222_194114_drop_city_id_user_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_info', 'geocode', $this->string()->null());
    }

}
