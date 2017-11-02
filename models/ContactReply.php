<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactReply".
 *
 * @property integer $id
 * @property string $sentTime
 * @property string $replyTime
 * @property string $body
 * @property string $admin
 */
class ContactReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactReply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sentTime', 'replyTime'], 'safe'],
            [['body', 'admin'], 'required'],
            [['body'], 'string', 'max' => 500],
            [['admin'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sentTime' => 'Sent Time',
            'replyTime' => 'Reply Time',
            'body' => 'Body',
            'admin' => 'Admin',
        ];
    }
}
