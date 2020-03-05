<?php

use yii\db\Migration;

/**
 * Class m200305_195655_change_p_type_on_pilgrim
 */
class m200305_195655_change_p_type_on_pilgrim extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('pilgrim', 'p_type', $this->string(10)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('pilgrim', 'p_type', $this->tinyInteger(1));
    }
}
