<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use app\models\Contact;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reply';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
    	$model2 = Contact::findOne(['time' => $model->sentTime]);
    ?>

    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model2, 'email')->label('To')->textInput(['readonly' => true]) ?>

	    <?= $form->field($model2, 'subject')->textInput(['maxlength' => true, 'readonly' => true]) ?>

	    <?= $form->field($model, 'body')->textArea(['rows' => 6, 'autofocus' => true]) ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Send <span class="glyphicon glyphicon-send"></span>' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

    <?php ActiveForm::end(); ?>







</div>