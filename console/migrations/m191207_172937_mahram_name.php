<?php

use yii\db\Migration;

/**
 * Class m191207_172937_mahram_name
 */
class m191207_172937_mahram_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('mahram_name', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mahram_name');
    }
}
