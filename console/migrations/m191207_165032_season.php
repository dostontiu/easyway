<?php

use yii\db\Migration;

/**
 * Class m191207_165032_season
 */
class m191207_165032_season extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('season', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'from' => $this->date()->notNull(),
            'to' => $this->date()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('season');
    }

}
