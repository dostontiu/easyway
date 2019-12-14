<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pilgrim_type".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $role
 *
 * @property Pilgrim[] $pilgrims
 */
class PilgrimType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pilgrim_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['role'], 'integer'],
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
            'role' => Yii::t('app', 'Role'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPilgrims()
    {
        return $this->hasMany(Pilgrim::className(), ['pilgrim_type_id' => 'id']);
    }
}
