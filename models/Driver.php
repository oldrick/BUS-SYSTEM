<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property string $name
 * @property string $telNo
 * @property string $sex
 * @property string $residence
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'telNo', 'sex', 'residence', 'salary'], 'required'],
            [['salary'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['telNo'], 'string', 'min' => 9, 'max' => 9],
            [['sex'], 'string', 'max' => 2],
            [['residence'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'telNo' => 'Tel No',
            'sex' => 'Sex',
            'residence' => 'Residence',
            'salary' => 'Salary',
        ];
    }
}
