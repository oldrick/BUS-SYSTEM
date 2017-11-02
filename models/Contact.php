<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property string $time
 * @property string $region
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $verifyCode;

    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body', 'region'], 'required'],
            [['time'], 'safe'],
            [['name', 'email', 'region'], 'string', 'max' => 30],
            [['subject'], 'string', 'max' => 100],
            [['body'], 'string', 'max' => 500],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'body' => 'Body',
            'time' => 'Time',
            'region' => 'Region',
            'verifyCode' => 'Verification Code',
        ];
    }
}
