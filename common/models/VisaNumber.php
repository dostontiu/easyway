<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%visa_number}}".
 *
 * @property int $id
 * @property string $name
 * @property string $p_number
 * @property int $visa
 * @property string $created_at
 */
class VisaNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%visa_number}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visa'], 'string'],
//            [['visa'], 'unique'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['p_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'p_number' => Yii::t('app', 'P Number'),
            'visa' => Yii::t('app', 'Visa'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
