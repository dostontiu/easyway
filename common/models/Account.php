<?php

namespace common\models;

use phpDocumentor\Reflection\File;
use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $father_name
 * @property string $date_birth
 * @property int $user_id
 * @property string $alias
 * @property string $image
 * @property int $status
 * @property string $telephone
 * @property string $address
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property File $file
 * @property User $user
 */
class Account extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'user_id', 'alias'], 'required'],
            [['date_birth', 'created_at', 'updated_at', 'file'], 'safe'],
            [['user_id', 'status'], 'integer'],
            [['first_name', 'last_name', 'father_name', 'alias', 'image', 'telephone', 'address', 'description'], 'string', 'max' => 255],
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
            'father_name' => Yii::t('app', 'Father Name'),
            'date_birth' => Yii::t('app', 'Date Birth'),
            'user_id' => Yii::t('app', 'User ID'),
            'alias' => Yii::t('app', 'Alias'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'telephone' => Yii::t('app', 'Telephone'),
            'address' => Yii::t('app', 'Address'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
