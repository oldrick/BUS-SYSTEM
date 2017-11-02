<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt".
 *
 * @property integer $receiptId
 * @property string $customerName
 * @property string $JourneyName
 * @property string $BusNumberCode
 * @property integer $telephoneNo
 * @property integer $seatNo
 * @property integer $price
 * @property string $takeOffDay
 * @property string $takeOffTime
 * @property string $arrivalDay
 * @property string $arrivalTime
 * @property string $registrationTime
 * @property integer $journey_Id
 * @property integer $customer_Id
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerName', 'journeyName', 'busNumberCode', 'telephoneNo', 'seatNo', 'price', 'takeOffDate', 'takeOffTime', 'arrivalDate', 'arrivalTime', 'journey_Id', 'customer_Id'], 'required'],
            [['telephoneNo', 'seatNo', 'price', 'journey_Id', 'customer_Id'], 'integer'],
            [['takeOffDate', 'takeOffTime', 'arrivalDate', 'arrivalTime', 'registrationTime'], 'safe'],
            [['customerName', 'journeyName', 'busNumberCode'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'receiptId' => 'Receipt ID',
            'customerName' => 'Customer Name',
            'journeyName' => 'Journey Name',
            'busNumberCode' => 'Bus Number Code',
            'telephoneNo' => 'Telephone No',
            'seatNo' => 'Seat No',
            'price' => 'Price',
            'takeOffDate' => 'Take Off Day',
            'takeOffTime' => 'Take Off Time',
            'arrivalDate' => 'Arrival Day',
            'arrivalTime' => 'Arrival Time',
            'registrationTime' => 'Registration Time',
            'journey_Id' => 'Journey  ID',
            'customer_Id' => 'Customer  ID',
        ];
    }
}
