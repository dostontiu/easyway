<?php

use yii\db\Migration;

/**
 * Class m191017_065111_account
 */
class m191017_065111_account extends Migration
{
    public function safeUp()
    {
        $this->createTable('account',[
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'father_name' => $this->string()->null(),
            'date_birth' => $this->date(),
            'user_id' => $this->integer()->notNull(),
            'alias' => $this->string()->notNull(),
            'image' => $this->string(),
            'status' => $this->integer(),
            'telephone' => $this->string()->null(),
            'address' => $this->string()->null(),
            'description' => $this->string()->null(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex('idx-account-user_id','account','user_id');
        $this->addForeignKey('fk-account-user_id','account', 'user_id', 'user', 'id', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-account-user_id', 'account');
        $this->dropIndex('idx-account-user_id','account');
        $this->dropTable('account');
    }
}
