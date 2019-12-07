<?php

use yii\db\Migration;

/**
 * Class m191207_164638_airport
 */
class m191207_164638_airport extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('airport', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'code' => $this->string(32)->notNull(),
            'region_id' => $this->integer()->notNull(),
            'lat' => $this->string(32)->null(),
            'lon' => $this->string(32)->null(),
        ]);

        $this->createIndex('idx-airport-region_id', 'airport', 'region_id');
        $this->addForeignKey('fk-airport-region_id', 'airport', 'region_id', 'region', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-airport-region_id', 'airport');
        $this->dropIndex('idx-airport-region_id', 'airport');

        $this->dropTable('airport');
    }
}
