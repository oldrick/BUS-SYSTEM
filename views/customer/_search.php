<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customerId') ?>

    <?= $form->field($model, 'journeyId') ?>

    <?= $form->field($model, 'customerName') ?>

    <?= $form->field($model, 'telNo') ?>

    <?= $form->field($model, 'seat') ?>

    <?php // echo $form->field($model, 'regTime') ?>

    <?php // echo $form->field($model, 'setSeat') ?>

    <?php // echo $form->field($model, 'regTime2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
