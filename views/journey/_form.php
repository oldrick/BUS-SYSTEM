<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Bus;
use app\models\Driver;
use yii\jui\DatePicker;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $model app\models\Journeys */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row"></div>
    <div class="col-lg-3"></div>
    <div class="col-lg-6 form-style-6">

        <?php $form = ActiveForm::begin(); ?>

        <?php if($this->title == 'Update Journey'): ?>
            <h1><?= Html::encode($this->title.' : '.$model->journeyId) ?></h1>
        <?php else: ?>       
            <h1><?= Html::encode($this->title) ?></h1>
        <?php endif; ?>
        <?= $form->field($model, 'numberCode')->dropdownList(
            Bus::find()->select(['numberCode'])->indexBy('numberCode')->column(),
            ['prompt'=>'Select a bus']
        ); ?>

        <span id="error" class="w3-text-blue w3-large"></span><br>

        <?= $form->field($model, 'setJourney')->dropdownList([
            '0'=>'0', '1'=>'1'
        ], ['prompt'=>'Set the journey']
        );

        ?>
        
        <?php if (Yii::$app->user->identity->userName): ?>

            <?php if(($model2 = Users::findOne(Yii::$app->user->identity->userName)) !== null ): ?>
                <?php 
                    //based on the residence of a user,a user can only assign journeys that start with it's residence name
                    //for eg a user whose residence is yaounde can only assign journeys that start with yaounde
                 ?>
                <?php if($model2->residence == 'Yaounde'): ?>
                    <?= $form->field($model, 'journey')->dropdownList([
                        'Yaounde-Douala'=>'Yaounde-Douala','Yaounde-Buea'=>'Yaounde-Buea','Yaounde-Bamenda'=>'Yaounde-Bamenda','Yaounde-Dschang'=>'Yaounde-Dschang','Yaounde-Bertoua'=>'Yaounde-Bertoua',
                    ], ['prompt'=>'Select a journey']
                    );
                    ?>

                <?php elseif($model2->residence == 'Buea'): ?>
                    <?= $form->field($model, 'journey')->dropdownList([
                        'Buea-Douala'=>'Buea-Douala','Buea-Yaounde'=>'Buea-Yaounde','Buea-Bamenda'=>'Buea-Bamenda','Buea-Dschang'=>'Buea-Dschang','Buea-Bertoua'=>'Buea-Bertoua',
                    ], ['prompt'=>'Select a journey']
                    );
                    ?>

                <?php elseif($model2->residence == 'Douala'): ?>
                    <?= $form->field($model, 'journey')->dropdownList([
                        'Douala-Yaounde'=>'Douala-Yaounde','Douala-Buea'=>'Douala-Buea','Douala-Dschang'=>'Douala-Dschang','Douala-Bamenda'=>'Douala-Bamenda','Douala-Bertoua'=>'Douala-Bertoua',
                    ], ['prompt'=>'Select a journey']
                    );

                    ?>

                <?php elseif($model2->residence == 'Bamenda'): ?>
                    <?= $form->field($model, 'journey')->dropdownList([
                        'Bamenda-Douala'=>'Bamenda-Douala','Bamenda-Yaounde'=>'Bamenda-Yaounde','Bamenda-Buea'=>'Bamenda-Buea','Bamenda-Dschang'=>'Bamenda-Dschang','Bamenda-Bertoua'=>'Bamenda-Bertoua',
                    ], ['prompt'=>'Select a journey']
                    );

                    ?>

                <?php elseif($model2->residence == 'Bertoua'): ?>
                    <?= $form->field($model, 'journey')->dropdownList([
                        'Bertoua-Douala'=>'Bertoua-Douala','Bertoua-Yaounde'=>'Bertoua-Yaounde','Bertoua-Buea'=>'Bertoua-Buea','Bertoua-Bamenda'=>'Bertoua-Bamenda','Bertoua-Dschang'=>'Bertoua-Dschang',
                    ], ['prompt'=>'Select a journey']
                    );

                    ?>

                <?php elseif($model2->residence == 'Dschang'): ?>
                    <?= $form->field($model, 'journey')->dropdownList([
                        'Dschang-Douala'=>'Dschang-Douala','Dschang-Yaounde'=>'Dschang-Yaounde','Dschang-Buea'=>'Dschang-Buea','Dschang-Bamenda'=>'Dschang-Bamenda','Dschang-Bertoua'=>'Dschang-Bertoua',
                    ], ['prompt'=>'Select a journey']
                    );

                    ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?= $form->field($model, 'price')->dropdownList([
            '2000'=>'2000','2500'=>'2500','3000'=>'3000','3500'=>'3500','4000'=>'4000','4500'=>'4500','5000'=>'5000','5500'=>'5500','6000'=>'6000',
            '6500'=>'6500','7000'=>'7000','7500'=>'7500','8000'=>'8000','9000'=>'9000','10000'=>'10000',
            ], ['prompt'=>'Select a price']
        );

        ?>

    <?= $form->field($model, 'takeOffDate')->textInput(['placeholder'=>'take off date eg 2017-04-16'])->hint('Format : yyyy-mm-dd') ?>

        <?= $form->field($model, 'takeOffTime')->textInput(['placeholder'=>'take off time eg 18:15:16'])->hint('Format : hr-min-sec') ?>

        <?= $form->field($model, 'arrivalDate')->textInput(['placeholder'=>'take off date eg 2017-04-16'])->hint('Format : yyyy-mm-dd') ?>

        <?= $form->field($model, 'arrivalTime')->textInput(['placeholder'=>'take off date eg 06:15:56'])->hint('Format : hr-min-sec') ?>

        <?= $form->field($model, 'driver')->dropdownList(
            Driver::find()->select(['name'])->indexBy('name')->column(),
            ['prompt'=>'Select a driver']
        ) ?>

        <?/*= DatePicker::widget([
            'model' =>  $model,
            'attribute' =>  'takeOffDate',
            'language'  =>  'ru',
            'clientOptions' =>  [
            'dateFormat'    =>  'yy-mm-dd',
            ],
        ])*/?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary center-block' : 'btn btn-primary center-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>
