<?php

use yii\db\Migration;

/**
 * Class m191231_040218_visa_number
 */
class m191231_040218_visa_number extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('visa_number', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'p_number' =>  $this->string(10),
            'visa' =>  $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('visa_number');
    }
}
