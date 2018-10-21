<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tags`.
 */
class m181021_144645_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer(),
            'name' => $this->string(),
            'count' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tags');
    }
}
