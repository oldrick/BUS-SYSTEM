<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JourneysSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journeys-search">

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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
