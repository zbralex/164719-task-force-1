<?php

use yii\db\Migration;

/**
 * Class m200715_145000_author_id_column_review_table
 */
class m200715_145000_author_id_column_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn('review', 'author_id', $this->integer()->null());
    }

    public function safeDown()
    {
	    $this->dropColumn('review', 'author_id');
    }

}
