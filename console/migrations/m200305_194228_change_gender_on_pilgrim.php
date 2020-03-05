<?php

use yii\db\Migration;

/**
 * Class m200305_194228_change_gender_on_pilgrim
 */
class m200305_194228_change_gender_on_pilgrim extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('pilgrim', 'gender', $this->string(10)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('pilgrim', 'gender', $this->tinyInteger(1));
    }
}
