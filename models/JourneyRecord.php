<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journeyRecord".
 *
 * @property integer $journeyId
 * @property string $numberCode
 * @property integer $setJourney
 * @property string $journey
 * @property integer $price
 * @property string $takeOffDate
 * @property string $takeOffTime
 * @property string $arrivalDate
 * @property string $arrivalTime
 * @property string $driver
 * @property string $userName
 * @property string $time
 * @property string $action
 */
class JourneyRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journeyRecord';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numberCode', 'journey', 'price', 'takeOffDate', 'takeOffTime', 'arrivalDate', 'arrivalTime', 'driver', 'userName', 'action'], 'required'],
            [['setJourney', 'price'], 'integer'],
            [['takeOffDate', 'takeOffTime', 'arrivalDate', 'arrivalTime', 'time'], 'safe'],
            [['numberCode'], 'string', 'max' => 5],
            [['journey', 'driver'], 'string', 'max' => 50],
            [['userName'], 'string', 'max' => 30],
            [['action'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'journeyId' => 'Journey ID',
            'numberCode' => 'Number Code',
            'setJourney' => 'Set Journey',
            'journey' => 'Journey',
            'price' => 'Price',
            'takeOffDate' => 'Take Off Date',
            'takeOffTime' => 'Take Off Time',
            'arrivalDate' => 'Arrival Date',
            'arrivalTime' => 'Arrival Time',
            'driver' => 'Driver',
            'userName' => 'User Name',
            'time' => 'Time',
            'action' => 'Action',
        ];
    }
}
