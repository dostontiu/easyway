<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "airport".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $region_id
 * @property string $lat
 * @property string $lon
 *
 * @property Region $region
 * @property Flight[] $flights
 * @property Flight[] $flights0
 */
class Airport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'airport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code', 'lat', 'lon'], 'string', 'max' => 32],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
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
            'code' => Yii::t('app', 'Code'),
            'region_id' => Yii::t('app', 'Region ID'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'Lon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::className(), ['arrival_airport_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlights0()
    {
        return $this->hasMany(Flight::className(), ['depart_airport_id' => 'id']);
    }
}
