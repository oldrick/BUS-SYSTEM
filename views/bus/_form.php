<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Bus;

/* @var $this yii\web\View */
/* @var $model app\models\Buses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 form-style-6">

        <?php $form = ActiveForm::begin(['id' => 'bus-form', 'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]); ?>

        <h1><?= Html::encode($this->title) ?></h1>

        <?=	$form->field($model, 'imageFile')->fileInput() ?>

        <?= $form->field($model, 'numberCode')->textInput(['autofocus' => true, 'maxlength' => true]) ?>

        <?= $form->field($model, 'capacity')->dropdownList(
        	['30'=>'30', '50'=>'50', '70'=>'70', '90'=>'90'],['prompt'=>'Select the capacity']
        ); ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary center-block' : 'btn btn-primary center-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>