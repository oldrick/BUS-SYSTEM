<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customerId
 * @property integer $journeyId
 * @property string $customerName
 * @property string $telNo
 * @property integer $seat
 * @property string $regTime
 * @property string $setSeat
 * @property string $regTime2
 * @property string $idCard
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $verifyCode; 
    
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['journeyId', 'customerName', 'telNo', 'seat', 'setSeat', 'idCard'], 'required'],
            [['journeyId', 'seat'], 'integer'],
            [['regTime', 'regTime2'], 'safe'],
            [['customerName', 'idCard'], 'string', 'max' => 100],
            [['telNo'], 'string', 'max' => 9],
            [['setSeat'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerId' => 'Customer ID',
            'journeyId' => 'Journey ID',
            'customerName' => 'Customer Name',
            'telNo' => 'Tel No',
            'seat' => 'Seat',
            'regTime' => 'Reg Time',
            'setSeat' => 'Set Seat',
            'regTime2' => 'Reg Time2',
            'idCard' => 'Id Card',
        ];
    }
}
