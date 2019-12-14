<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property int $id
 * @property string $name
 * @property int $count_people
 * @property string $arrival_date
 * @property string $depart_date
 * @property int $arrival_airport_id
 * @property int $depart_airport_id
 * @property int $season_id
 * @property int $status
 *
 * @property Airport $arrivalAirport
 * @property Airport $departAirport
 * @property Season $season
 * @property Group[] $groups
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'arrival_airport_id', 'depart_airport_id', 'season_id'], 'required'],
            [['count_people', 'arrival_airport_id', 'depart_airport_id', 'season_id', 'status'], 'integer'],
            [['arrival_date', 'depart_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['arrival_airport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::className(), 'targetAttribute' => ['arrival_airport_id' => 'id']],
            [['depart_airport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::className(), 'targetAttribute' => ['depart_airport_id' => 'id']],
            [['season_id'], 'exist', 'skipOnError' => true, 'targetClass' => Season::className(), 'targetAttribute' => ['season_id' => 'id']],
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
            'count_people' => Yii::t('app', 'Count People'),
            'arrival_date' => Yii::t('app', 'Arrival Date'),
            'depart_date' => Yii::t('app', 'Depart Date'),
            'arrival_airport_id' => Yii::t('app', 'Arrival Airport ID'),
            'depart_airport_id' => Yii::t('app', 'Depart Airport ID'),
            'season_id' => Yii::t('app', 'Season ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrivalAirport()
    {
        return $this->hasOne(Airport::className(), ['id' => 'arrival_airport_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartAirport()
    {
        return $this->hasOne(Airport::className(), ['id' => 'depart_airport_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeason()
    {
        return $this->hasOne(Season::className(), ['id' => 'season_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['flight_id' => 'id']);
    }
}
