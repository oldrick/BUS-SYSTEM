<?php

namespace app\models;

class Login extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
/*
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

*/
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['userName','password'], 'required'],
            [['userName'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userName' => 'User Name',
            'password' => 'Password',
        ];
    }
        
    public static function findIdentity($userName)
    {
        return static::findOne($userName);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $identity = Users::findOne(['userName'=>$username]);
        return $identity;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->userName;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */

/*    public function validatePassword($password)
    {
//        return $this->password === $password;
        return true;
    }
*/
}
