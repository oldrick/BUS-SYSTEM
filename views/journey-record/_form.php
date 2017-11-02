<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JourneyRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journey-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numberCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setJourney')->textInput() ?>

    <?= $form->field($model, 'journey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'takeOffDate')->textInput() ?>

    <?= $form->field($model, 'takeOffTime')->textInput() ?>

    <?= $form->field($model, 'arrivalDate')->textInput() ?>

    <?= $form->field($model, 'arrivalTime')->textInput() ?>

    <?= $form->field($model, 'driver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
