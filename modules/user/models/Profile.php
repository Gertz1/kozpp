<?php

namespace app\modules\user\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $fullname
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $gender
 * @property string $address_id
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['fullname', 'surname', 'patronymic', 'gender', 'address_id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'user_id' => Yii::t('user', 'User ID'),
            'created_at' => Yii::t('user', 'Created At'),
            'updated_at' => Yii::t('user', 'Updated At'),
            'fullname' => Yii::t('user', 'Fullname'),
            'name' => Yii::t('user', 'Name'),
            'surname' => Yii::t('user', 'Surname'),
            'patronymic' => Yii::t('user', 'Patronymic'),
            'gender' => Yii::t('user', 'Gender'),
            'address_id' => Yii::t('user', 'Address ID'),
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
