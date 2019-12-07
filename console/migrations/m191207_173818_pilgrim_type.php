<?php

use yii\db\Migration;

/**
 * Class m191207_173818_pilgrim_type
 */
class m191207_173818_pilgrim_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pilgrim_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'role' => $this->integer()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pilgrim_type');
    }
}
