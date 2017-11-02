<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 */
class UpdateUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'users';
    }

    public $passwordAgain;    
    public $currentPassword;    
    public $password;    
    
    public function rules()
    {
        return [
            [['currentPassword','password', 'passwordAgain'], 'required'],
            [['password', 'currentPassword', 'passwordAgain'], 'string', 'max' => 200],
            ['passwordAgain', 'compare', 'compareAttribute'=>'password', 'message'=>'Passwords don\'t match'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'currentPassword' => 'Current Password',
            'password' => 'Password',
            'passwordAgain' => 'Password Again',
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

