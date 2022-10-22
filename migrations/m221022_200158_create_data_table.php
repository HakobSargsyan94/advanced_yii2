<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m221022_200158_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data}}', [
            'id' => $this->primaryKey(),
            'data' => $this->json(),
            'spend_time' => $this->integer(),
            'memory' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data}}');
    }
}
