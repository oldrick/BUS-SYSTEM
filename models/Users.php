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
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
    public $passwordAgain;    
    
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'userName', 'telNo', 'residence', 'salary', 'password', 'passwordAgain'], 'required'],
            [['salary'], 'integer'],
            [['firstName', 'lastName', 'userName'], 'string', 'max' => 30],
            [['telNo'], 'string', 'min' => 9, 'max' => 9],
            [['residence'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 200],
//            ['passwordAgain', 'compare', 'compareAttribute'=>'password', 'message'=>'Passwords don\'t match'],
//            ['password', 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'userName' => 'User Name',
            'telNo' => 'Tel No',
            'residence' => 'Residence',
            'salary' => 'Salary',
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

