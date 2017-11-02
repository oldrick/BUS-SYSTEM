<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 form-style-6">
        <?php $form = ActiveForm::begin(); ?>

        <h1><?= Html::encode($this->title.' : '.$model->customerId) ?></h1>
       
        <?= $form->field($model, 'journeyId')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'customerName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telNo')->textInput() ?>

        <?= $form->field($model, 'seat')->textInput() ?>

        <?= $form->field($model, 'regTime')->textInput() ?>

        <?= $form->field($model, 'setSeat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'regTime2')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
