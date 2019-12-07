<?php

use yii\db\Migration;

/**
 * Class m191207_170408_group
 */
class m191207_170408_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'flight_id' => $this->integer()->notNull(),
            'count_people' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'user_id' => $this->integer()->notNull()->comment('Created by'),
        ]);

        $this->createIndex('idx-group-region_id', 'group', 'region_id');
        $this->addForeignKey('fk-group-region_id', 'group', 'region_id', 'region', 'id', 'CASCADE');

        $this->createIndex('idx-group-flight_id', 'group', 'flight_id');
        $this->addForeignKey('fk-group-flight_id', 'group', 'flight_id', 'flight', 'id', 'CASCADE');

        $this->createIndex('idx-group-user_id', 'group', 'user_id');
        $this->addForeignKey('fk-group-user_id', 'group', 'user_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-group-region_id', 'group');
        $this->dropIndex('idx-group-region_id', 'group');

        $this->dropForeignKey('fk-group-flight_id', 'group');
        $this->dropIndex('idx-group-flight_id', 'group');

        $this->dropForeignKey('fk-group-user_id', 'group');
        $this->dropIndex('idx-group-user_id', 'group');

        $this->dropTable('group');
    }
}
