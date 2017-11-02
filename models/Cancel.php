<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Cancel extends Model
{
    /**
     * @inheritdoc
     */
    public $customerId;
    public $journeyId;
    public $regTime;
    public $setSeat;
 
    public $verifyCode; 
   

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['journeyId','regTime', 'customerId'], 'required'],
            [['journeyId'], 'integer'],
            [['regTime'], 'safe'],
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
            'regTime' => 'Registration Time',
            'setSeat' => 'Set Seat',
        ];
    }
}
