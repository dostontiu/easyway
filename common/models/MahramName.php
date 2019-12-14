<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mahram_name".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property Pilgrim[] $pilgrims
 */
class MahramName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahram_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPilgrims()
    {
        return $this->hasMany(Pilgrim::className(), ['mahram_name_id' => 'id']);
    }
}
