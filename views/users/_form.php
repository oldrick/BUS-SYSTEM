<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 form-style-6">

        <?php $form = ActiveForm::begin(); ?>
        <?php if(Yii::$app->user->identity == 'tsaffi'): ?>
            <h1><?= Html::encode($this->title.' : '.$model->userName) ?></h1>
        <?php else: ?>
            <h1><?= Html::encode($this->title) ?></h1>
        <?php endif; ?>
        <?= $form->field($model, 'firstName')->textInput(['autofocus' => true, 'maxlength' => true, 'placeholder' => 'enter your first name']) ?>

        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true, 'placeholder' => 'enter your last name']) ?>

        <?= $form->field($model, 'userName')->textInput(['maxlength' => true, 'placeholder' => 'enter your user name']) ?>
        
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'enter your password']) ?>

        <?= $form->field($model, 'passwordAgain')->passwordInput(['placeholder' => 'enter your password Again', 'onkeyup' => 'checkPassword()','id' => 'passAgain']) ?>

        <?= $form->field($model, 'telNo')->textInput(['maxlength' => true, 'placeholder' => 'enter your telephone number']) ?>

        <?= $form->field($model, 'residence')->dropdownList(
            ['Douala'=>'Douala', 'Yaounde'=>'Yaounde', 'Buea'=>'Buea','Bamenda'=>'Bamenda', 'Bertoua'=>'Bertoua', 'Dschang'=>'Dschang'], ['prompt' => 'Select a town'] 
        );
            ?>

        <?= $form->field($model, 'salary')->textInput(['placeholder' => 'enter salary']) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary center-block' : 'btn btn-primary center-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>