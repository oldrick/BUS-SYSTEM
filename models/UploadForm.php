<?php

namespace app\models;

use Yii;
use	yii\base\Model;

class UploadForm extends Model
{
	/**
	*	@var UploadedFile
	*/

	public $numberCode;
	public $capacity;
	public $imageFile;

	public function rules()
	{
		return	[
		            [['numberCode', 'capacity', 'imageFile'], 'required'],
		            [['capacity'], 'integer'],
		            [['numberCode'], 'string', 'max' => 10],
					[['imageFile'],	'image', 'extensions' => 'png, jpg, jpeg, pjpeg, x-png', 'maxSize' => 1024*1024],
				];
	}
}