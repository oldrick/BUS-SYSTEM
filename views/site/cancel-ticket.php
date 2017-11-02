<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;
use app\models\Journey;
use app\models\Customer;

$this->title = 'Cancel Your Ticket';
?>
<div class="container c-body">

    <?php if(Yii::$app->session->hasFlash('re-cancel ticket')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-danger'],
                'body' => Yii::$app->session->getFlash('re-cancel ticket'),
            ]);
        ?>   
    <?php endif; ?> 
    <?php if(Yii::$app->session->hasFlash('cancel ticket')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('cancel ticket'),
            ]);
        ?>
        <?php
            $query = Journey::findOne($model1->journeyId);
            //In the actionCancelTicket(site controller),findCustomer(ie query) is called,setSeat is set to off before being saved. 
            //So this query is done to get the exact time at which the above event(setSeat = 'off') was saved.
            $query2 = Customer::findOne($model1->customerId);
        ?>
    <?php/*    <div class="col-lg-offset-3 col-lg-5">
        <h2 style="margin-left:"><?= Html::encode('Your Canceled Ticket') ?></h2>
            <div class="panel panel-default">
                <table class="table table-striped table-bordered center">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Journey Id</td>
                            <td><?= Html::encode($model1->journeyId) ?></td>
                        </tr>
                        <tr>
                            <td>Journey Name</td>
                            <td><?= Html::encode($query->journey) ?></td>
                        </tr>
                        <tr>
                            <td>Customer's Name</td>
                            <td><?= Html::encode($model1->customerName) ?></td>
                        </tr>
                        <tr>
                            <td>Customer's Id</td>
                            <td><?= Html::encode($model1->customerId) ?></td>
                        </tr>
                        <tr>
                            <td>Seat No</td>
                            <td><?= Html::encode($model1->seat) ?></td>
                        </tr>
                        <tr>
                            <td>Registration Time</td>
                            <td><?= Html::encode($model1->regTime) ?></td>
                        </tr>
                        <tr>
                            <td>Cancelation Time</td>
                            <td><?= Html::encode($query2->regTime2) ?></td>
                        </tr>
                    </tbody>
                </table>
                        <?= Html::Button('Download', ['class' => 'btn btn-primary', 'style'=>'float:right']) ?>            
            </div>
        </div> */?>
    <?php else: ?>
    
        <?php if(Yii::$app->session->hasFlash('could not cancel ticket')): ?>
            <?= Alert::widget([
                    'options' => ['class' => 'alert-danger'],
                    'body' => Yii::$app->session->getFlash('could not cancel ticket')    
                ]);
            ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 form-style-6">

                <?php $form = ActiveForm::begin(['id' => 'cancel-ticket-form']); ?>

                    <h1><?= Html::encode($this->title) ?></h1>

                    <?= $form->field($model, 'journeyId')->textInput(['autofocus' => true, 'placeholder' => 'enter the journey\'s id']) ?>

                    <?= $form->field($model, 'customerId')->textInput(['placeholder' => 'enter the customer\'s id']) ?>

                    <?= $form->field($model, 'regTime')->textInput(['placeholder' => 'enter the registration time']) ?>
                    <br>
                    <div class="form-group">
                        <h1 style="border-top-left-radius : 0px;border-top-right-radius : 0px;border-bottom-left-radius : 10px;border-bottom-right-radius : 10px"><?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?></h1>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
