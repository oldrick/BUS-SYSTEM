<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property string $numberCode
 * @property integer $capacity
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;

    public static function tableName()
    {
        return 'bus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numberCode', 'capacity'], 'required'],
            [['capacity'], 'integer'],
            [['numberCode'], 'string', 'max'=> 5 ],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg, pjpeg, x-png, gif'],
//            ['numberCode', 'validateNumberCode'],
        ];
    }


    /**
     * @inheritdoc
     */
    
    /**
     * Validates the numberCode.
     * This method serves as the inline validation for numberCode.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
/*    public function validateNumberCode($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(($model = $this->findOne($this->numberCode)) === null ){
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
*/
    public function attributeLabels()
    {
        return [
            'numberCode' => 'Number Code',
            'capacity' => 'Capacity',
            'imageFile' => 'Image File'
        ];
    }
}
