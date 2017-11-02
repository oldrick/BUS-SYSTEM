<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journey".
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
 */
class Journey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journey';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numberCode', 'journey', 'price', 'driver', 'takeOffDate', 'takeOffTime', 'arrivalDate', 'setJourney', 'arrivalTime'], 'required'],
            [['setJourney', 'price'], 'integer'],
            [['takeOffDate', 'takeOffTime', 'arrivalDate', 'arrivalTime'], 'safe'],
            [['numberCode'], 'string', 'max' => 5],
            [['journey', 'driver'], 'string', 'max' => 50],
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
        ];
    }
}
