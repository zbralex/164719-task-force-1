<?php

use yii\db\Migration;

/**
 * Class m210215_152923_site_settings_new_review_column
 */
class m210215_152923_site_settings_new_review_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('site_settings', 'new_review', $this->tinyInteger()->defaultValue(0));
    }
}
