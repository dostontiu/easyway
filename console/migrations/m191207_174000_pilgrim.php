<?php

use yii\db\Migration;

/**
 * Class m191207_174000_pilgrim
 */
class m191207_174000_pilgrim extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pilgrim', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->null(),
            'birth_date' => $this->date(),
            'gender' => $this->string(10)->null(),
            'p_number' => $this->string(32)->notNull(),
            'p_issue_date' => $this->date(),
            'p_expiry_date' => $this->date(),
            'p_type' => $this->string(10)->null(),
            'p_mrz' => $this->string()->null(),
            'nationality_id' => $this->integer()->null(),
            'region_id' => $this->integer()->null(),
            'marital_status' => $this->tinyInteger(1),
            'mahram_id' => $this->integer()->null(),
            'mahram_name_id' => $this->integer()->null(),
            'group_id' => $this->integer()->null(),
            'status' => $this->tinyInteger(1),
            'pilgrim_type_id' => $this->integer()->null(),
            'personal_number' => $this->bigInteger(),
            'user_id' => $this->integer()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx-pilgrim-nationality_id', 'pilgrim', 'nationality_id');
        $this->addForeignKey('fk-pilgrim-nationality_id', 'pilgrim', 'nationality_id', 'country', 'id', 'RESTRICT');

        $this->createIndex('idx-pilgrim-region_id', 'pilgrim', 'region_id');
        $this->addForeignKey('fk-pilgrim-region_id', 'pilgrim', 'region_id', 'region', 'id', 'RESTRICT');

        $this->createIndex('idx-pilgrim-mahram_id', 'pilgrim', 'mahram_id');
        $this->addForeignKey('fk-pilgrim-mahram_id', 'pilgrim', 'mahram_id', 'pilgrim', 'id', 'RESTRICT');

        $this->createIndex('idx-pilgrim-mahram_name_id', 'pilgrim', 'mahram_name_id');
        $this->addForeignKey('fk-pilgrim-mahram_name_id', 'pilgrim', 'mahram_name_id', 'mahram_name', 'id', 'SET NULL');

        $this->createIndex('idx-pilgrim-group_id', 'pilgrim', 'group_id');
        $this->addForeignKey('fk-pilgrim-group_id', 'pilgrim', 'group_id', 'group', 'id', 'SET NULL');

        $this->createIndex('idx-pilgrim-pilgrim_type_id', 'pilgrim', 'pilgrim_type_id');
        $this->addForeignKey('fk-pilgrim-pilgrim_type_id', 'pilgrim', 'pilgrim_type_id', 'pilgrim_type', 'id', 'SET NULL');

        $this->createIndex('idx-pilgrim-user_id', 'pilgrim', 'user_id');
        $this->addForeignKey('fk-pilgrim-user_id', 'pilgrim', 'user_id', 'user', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pilgrim-nationality_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-nationality_id', 'pilgrim');

        $this->dropForeignKey('fk-pilgrim-region_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-region_id', 'pilgrim');

        $this->dropForeignKey('fk-pilgrim-mahram_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-mahram_id', 'pilgrim');

        $this->dropForeignKey('fk-pilgrim-mahram_name_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-mahram_name_id', 'pilgrim');

        $this->dropForeignKey('fk-pilgrim-group_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-group_id', 'pilgrim');

        $this->dropForeignKey('fk-pilgrim-pilgrim_type_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-pilgrim_type_id', 'pilgrim');

        $this->dropForeignKey('fk-pilgrim-user_id', 'pilgrim');
        $this->dropIndex('idx-pilgrim-user_id', 'pilgrim');

        $this->dropTable('pilgrim');
    }
}
