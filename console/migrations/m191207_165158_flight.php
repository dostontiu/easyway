<?php

use yii\db\Migration;

/**
 * Class m191207_165158_flight
 */
class m191207_165158_flight extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('flight', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'count_people' => $this->integer(),
            'arrival_date' => $this->dateTime(),
            'depart_date' => $this->dateTime(),
            'arrival_airport_id' => $this->integer()->notNull(),
            'depart_airport_id' => $this->integer()->notNull(),
            'season_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1)
        ]);

        $this->createIndex('idx-flight-arrival_airport_id', 'flight', 'arrival_airport_id');
        $this->addForeignKey('fk-flight-arrival_airport_id', 'flight', 'arrival_airport_id', 'airport', 'id', 'RESTRICT');

        $this->createIndex('idx-flight-depart_airport_id', 'flight', 'depart_airport_id');
        $this->addForeignKey('fk-flight-depart_airport_id', 'flight', 'depart_airport_id', 'airport', 'id', 'RESTRICT');

        $this->createIndex('idx-flight-season_id', 'flight', 'season_id');
        $this->addForeignKey('fk-flight-season_id', 'flight', 'season_id', 'season', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-flight-arrival_airport_id', 'flight');
        $this->dropIndex('idx-flight-arrival_airport_id', 'flight');

        $this->dropForeignKey('fk-flight-depart_airport_id', 'flight');
        $this->dropIndex('idx-flight-depart_airport_id', 'flight');

        $this->dropForeignKey('fk-flight-season_id', 'flight');
        $this->dropIndex('idx-flight-season_id', 'flight');

        $this->dropTable('flight');
    }
}
