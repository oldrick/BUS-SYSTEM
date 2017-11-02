<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Login;

/**
* 
*/
class GetReceipt extends Model
{
	public $customerId;
	public $journeyId;

	public function rules()
	{
		return [
			[['customerId', 'journeyId'], 'required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'customerId' => 'CustomerId',
			'journeyId' => 'JourneyId',
		];
	}
}