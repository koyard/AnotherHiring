<?php

use yii\db\Migration;

/**
 * Handles the creation of table `files`.
 */
class m181021_143426_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'uploaded' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('files');
    }
}
