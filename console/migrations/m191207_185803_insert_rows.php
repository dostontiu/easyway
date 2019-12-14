<?php

use yii\db\Migration;

/**
 * Class m191207_185803_insert_rows
 */
class m191207_185803_insert_rows extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*$this->insert('user', [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => '-yFqenz67ekxN68bXV0sqr57ehSXVkV5',
            'password_view' => '123456',
            'access_token' => 'admin',
            'password_hash' => '$2y$13$YUXq6.WjkQqhYYryUsW/Vuao2ivMnSqNCNHkNhsZgENIvhgO8uePC',
            'password_reset_token' => null,
            'email' => 'dostonberuniy@gmail.com',
            'status' => 10,
            'created_at' => '1570989753',
            'updated_at' => '1570989753',
            'verification_token' => 'dxQb3X86iGZeroKHp_562HAdjN1ZPcoF_1570989753',
        ]);*/

        /*$this->insert('account', [
            'first_name' => 'Doston',
            'last_name' => 'Ismailov',
            'father_name' => 'Nishanovich',
            'date_birth' => '1995-03-14',
            'user_id' => 1,
            'alias' => 'doston',
            'image' => '',
            'status' => 1,
            'telephone' => '8977458090',
            'address' => 'Beruniy tumani',
            'description' => 'Web developer',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        $this->insert('country', [
            'id' => 1,
            'name' => 'Uzbekistan',
            'code' => 'UZB',
            'zip_code' => '00012032',
        ]);

        $this->insert('country', [
            'id' => 1,
            'name' => 'Saudia',
            'code' => 'SAP',
            'zip_code' => '06512032',
        ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191207_185803_insert_rows cannot be reverted.\n";

        return false;
    }
}
