<?php

use yii\db\Migration;

/**
 * Class m200303_171127_change_flight_id_on_group
 */
class m200303_171127_change_flight_id_on_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('group', 'flight_id', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('group', 'flight_id', $this->integer()->notNull());
    }
}
