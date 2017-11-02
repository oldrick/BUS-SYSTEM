<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Customer;

$this->title = 'receipt';
?>
    <?php if(Yii::$app->session->hasFlash('seat booked')): ?>
        <div class="alert alert-success">
            Your seat have been booked successfully.
        </div>

<div class="container">
	<div class="col-lg-offset-3 col-lg-5 panel panel-default">
        <h2 style="margin-left:"><?= Html::encode('Your '.$this->title) ?></h2>
        <table class="table table-striped table-bordered center">
    	<thead class="book bookjourney">

        </thead>
        <tbody>
            <tr>
                <td>Journey Id</td>
                <td><?= Html::encode($model->journeyId) ?></td>
            </tr>
            <tr>
                <td>Journey Name</td>
                <td><?= Html::encode($model1->journey) ?></td>
            </tr>
            <tr>
                <td>Bus NumberCode</td>
                <td><?= Html::encode($model1->numberCode) ?></td>
            </tr>
            <tr>
                <td>Customer's Name</td>
                <td><?= Html::encode($model->customerName) ?></td>
            </tr>
        	<tr>
                <td>Customer's Id</td>
                <td><?= Html::encode($model->customerId) ?></td>
            </tr>
        	<tr>
                <td>Telephone No</td>
                <td><?= Html::encode($model->telNo) ?></td>
            </tr>
        	<tr>
                <td>Seat No</td>
                <td><?= Html::encode($model->seat) ?></td>
            </tr>
            <tr>
            	<td>Price</td>
                <td><?= Html::encode($model1->price) ?></td>
            </tr>
        	<tr>
                <td>Take Off Day</td>
                <td><?= Html::encode($model1->takeOffDate) ?></td>
            </tr>
        	<tr>
                <td>Take Off Time</td>
                <td><?= Html::encode($model1->takeOffTime) ?></td>
            </tr>
        	<tr>
                <td>Extdected Arrival Day</td>
                <td><?= Html::encode($model1->arrivalDate) ?></td>
            </tr>
            <tr>
                <td>Extdected Arrival Time</td>
                <td><?= Html::encode($model1->arrivalTime) ?></td>
            </tr>
            <?php 
            // query customer table to obtain the customer's regTime
                $customerRegTime = Customer::findOne($model->customerId);
            ?>    	
            <tr>
                <td>Registration Time</td>
                <td><?= Html::encode($customerRegTime->regTime) ?></td>
            </tr>
            <?php if($query > 1): ?> 
                <td>Ticket No : <?= Html::encode($query + 1) ?></td>
            <?php endif; ?>
    </tbody>
    </table>
            <?= Html::a('Downlaod', ['site/download'/*, 'id'=>$id*/], ['class' => 'btn btn-primary']) ?>
            <? //= Html::submitButton('Download',['class' => 'btn btn-primary', 'style'=>'float:right'],  ['site/downlaod']) ?>
    </div>
</div>
    <?php endif; ?>
