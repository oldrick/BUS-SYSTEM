<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Driver */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 form-style-6">

        <?php $form = ActiveForm::begin(); ?>
            <?php if($this->title == 'Update Driver'): ?>
                    <h1><?= Html::encode($this->title.' : '.$model->name) ?></h1>
            <?php else: ?>
                    <h1><?= Html::encode($this->title) ?></h1>
            <?php endif; ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'maxlength' => true]) ?>

            <?= $form->field($model, 'telNo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sex')->dropdownList(
            	['M' => 'M', 'F' => 'F'], ['prompt' => 'Select gender']
            ); ?>

            <?= $form->field($model, 'residence')->dropdownList(
            	['Douala'=>'Douala', 'Yaounde'=>'Yaounde', 'Buea'=>'Buea', 'Garoua'=>'Garoua', 'Ngaoundere'=>'Ngaoundere', 
                    'Maroua'=>'Maroua', 'Bamenda'=>'Bamenda',
                ], ['prompt' => 'Select a town']
            ); ?>

            <?= $form->field($model, 'salary')->textInput(['placeholder' => 'enter salary']) ?>
            
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary center-block' : 'btn btn-primary center-block']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
