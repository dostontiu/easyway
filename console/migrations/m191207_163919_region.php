<?php

use yii\db\Migration;

/**
 * Class m191207_163919_region
 */
class m191207_163919_region extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'code' => $this->string(32)->notNull(),
            'zip_code' => $this->string(32)->null(),
            'country_id' => $this->integer()->notNull(),
            'lat' => $this->string(32)->null(),
            'lon' => $this->string(32)->null(),
        ]);

        $this->createIndex('idx-region-country_id', 'region', 'country_id');
        $this->addForeignKey('fk-region-country_id', 'region', 'country_id', 'country', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-region-country_id','region');
        $this->dropIndex('idx-region-country_id', 'region');

        $this->dropTable('region');
    }
}
