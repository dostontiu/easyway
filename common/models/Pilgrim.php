<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pilgrim".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $birth_date
 * @property int $gender
 * @property string $p_number
 * @property string $p_issue_date
 * @property string $p_expiry_date
 * @property int $p_type
 * @property string $p_mrz
 * @property int $nationality_id
 * @property int $region_id
 * @property int $marital_status
 * @property int $mahram_id
 * @property int $mahram_name_id
 * @property int $group_id
 * @property int $status
 * @property int $pilgrim_type_id
 * @property int $personal_number
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Group $group
 * @property Pilgrim $mahram
 * @property Pilgrim[] $pilgrims
 * @property MahramName $mahramName
 * @property Country $nationality
 * @property PilgrimType $pilgrimType
 * @property Region $region
 * @property User $user
 */
class Pilgrim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pilgrim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'p_number', 'region_id', 'pilgrim_type_id', 'user_id'], 'required'],
            [['birth_date', 'p_issue_date', 'p_expiry_date', 'created_at', 'updated_at'], 'safe'],
            [['gender', 'p_type', 'nationality_id', 'region_id', 'marital_status', 'mahram_id', 'mahram_name_id', 'group_id', 'status', 'pilgrim_type_id', 'personal_number', 'user_id'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'p_mrz'], 'string', 'max' => 255],
            [['p_number'], 'string', 'max' => 32],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['mahram_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pilgrim::className(), 'targetAttribute' => ['mahram_id' => 'id']],
            [['mahram_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => MahramName::className(), 'targetAttribute' => ['mahram_name_id' => 'id']],
            [['nationality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['nationality_id' => 'id']],
            [['pilgrim_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PilgrimType::className(), 'targetAttribute' => ['pilgrim_type_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'gender' => Yii::t('app', 'Gender'),
            'p_number' => Yii::t('app', 'P Number'),
            'p_issue_date' => Yii::t('app', 'P Issue Date'),
            'p_expiry_date' => Yii::t('app', 'P Expiry Date'),
            'p_type' => Yii::t('app', 'P Type'),
            'p_mrz' => Yii::t('app', 'P Mrz'),
            'nationality_id' => Yii::t('app', 'Nationality ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'mahram_id' => Yii::t('app', 'Mahram ID'),
            'mahram_name_id' => Yii::t('app', 'Mahram Name ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'status' => Yii::t('app', 'Status'),
            'pilgrim_type_id' => Yii::t('app', 'Pilgrim Type ID'),
            'personal_number' => Yii::t('app', 'Personal Number'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahram()
    {
        return $this->hasOne(Pilgrim::className(), ['id' => 'mahram_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPilgrims()
    {
        return $this->hasMany(Pilgrim::className(), ['mahram_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahramName()
    {
        return $this->hasOne(MahramName::className(), ['id' => 'mahram_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationality()
    {
        return $this->hasOne(Country::className(), ['id' => 'nationality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPilgrimType()
    {
        return $this->hasOne(PilgrimType::className(), ['id' => 'pilgrim_type_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
