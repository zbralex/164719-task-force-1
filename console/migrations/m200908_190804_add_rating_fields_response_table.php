<?php

use yii\db\Migration;

/**
 * Class m200908_190804_add_rating_fields_response_table
 */
class m200908_190804_add_rating_fields_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('response', 'rating', 'integer');
    }

}
