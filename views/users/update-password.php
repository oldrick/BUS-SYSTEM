<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Update Your Password';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

	<?php if(Yii::$app->session->hasFlash('password updated')): ?>
	        <?= Alert::widget([
	                'options' => ['class' => 'alert-success'],
	                'body' => Yii::$app->session->getFlash('password updated'),
	            ]);
	        ?>
	<?php else: ?>
		<?php if(Yii::$app->session->hasFlash('password not updated')): ?>
		        <?= Alert::widget([
		                'options' => ['class' => 'alert-danger'],
		                'body' => Yii::$app->session->getFlash('password not updated'),
		            ]);
		        ?>
		<?php endif; ?>
		<div class="row"></div>
			<div class="col-lg-3"></div>
			<div class="col-lg-6 form-style-6">
			    <?php $form = ActiveForm::begin(); ?>
				
			    	<h1><?= $this->title ?></h1>

				    <?= $form->field($model, 'currentPassword')->passwordInput(['autofocus' => true, 'placeholder' => 'enter your current password']) ?>

				    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'enter your new password']) ?>

				    <?= $form->field($model, 'passwordAgain')->passwordInput(['maxlength' => true, 'placeholder' => 'enter your password again']) ?>

				    <div class="form-group">
				        <?= Html::submitButton('Update', [
				        	'class' => 'btn btn-primary',        
				        	'data' => [
				                'confirm' => 'Are you sure you want to update your password?',
				                'method' => 'post',
				        	],
						]) ?>
				    </div>
			    <?php ActiveForm::end(); ?>
			</div>
		</div>
	<?php endif; ?>
</div>