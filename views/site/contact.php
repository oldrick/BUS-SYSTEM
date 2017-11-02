<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>
<div class="site-contact">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

    <?php else: ?>
        <p class="col-lg-offset-3 p-font">
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 form-style-6">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <h1><?= Html::encode($this->title) ?></h1>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'region')->dropdownList([
                    'Douala'=>'Douala','Yaounde'=>'Yaounde','Buea'=>'Buea','Bamenda'=>'Bamenda','Bertoua'=>'Bertoua','Dschang'=>'Dschang'
                ], ['prompt'=>'Select the agency region you want to contact']
                );

                ?>
                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <br>
                    <div class="form-group">
                        <h1 style="border-top-left-radius : 0px;border-top-right-radius : 0px;border-bottom-left-radius : 10px;border-bottom-right-radius : 10px"><?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?></h1>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
