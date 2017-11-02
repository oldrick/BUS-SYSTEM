<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JourneyRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journey-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'journeyId') ?>

    <?= $form->field($model, 'numberCode') ?>

    <?= $form->field($model, 'setJourney') ?>

    <?= $form->field($model, 'journey') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'takeOffDate') ?>

    <?php // echo $form->field($model, 'takeOffTime') ?>

    <?php // echo $form->field($model, 'arrivalDate') ?>

    <?php // echo $form->field($model, 'arrivalTime') ?>

    <?php // echo $form->field($model, 'driver') ?>

    <?php // echo $form->field($model, 'userName') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'action') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
