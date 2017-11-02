<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $firstName
 * @property string $lastName
 * @property string $userName
 * @property string $telNo
 * @property string $residence
 * @property integer $salary
 * @property string $password
 */
class Password extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            ['password', 'required'],
            [['password'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Password',
        ];
    }

    public function validatePassword($attribute, $params)
    {

    }

    public static function findIdentity($userName)
    {
        return static::findOne($userName);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->userName;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}

