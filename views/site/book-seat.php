<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Bus;
use yii\bootstrap\Modal;
use yii\bootstrap\Alert;
use yii\helpers\Url;
// use yii\grid\GridView;

$this->title = 'Book-seat';
?>

<div class="container">
    <?php foreach($journey as $journey): ?>

        <?php if(($bus = Bus::findOne($journey->numberCode)) !== null): ?>
              <div class="col-lg-3 panel panel-default">  
                    <h4><?= Html::encode($journey->numberCode) ?></h4> 
                        <?= Html::img("@web/images/$bus->imageName", ["class" => "img-rounded img-responsive img"]) ?>
                        
                    <table class="table table-striped table-bordered center">
                        <thead class="book bookjourney">
                            <th>Journey</th>
                            <th><?= Html::encode($journey->journey) ?></th>
                        </thead>
                        <tbody>
                            <tr class="book">
                                <td>Price </td>
                                <td> <?= Html::encode($journey->price) ?></td>
                            </tr>
                            <tr class="book">
                                <td>TakeOffDay </td>
                                <td><?= Html::encode($journey->takeOffDate) ?></td>
                            </tr>
                            <tr class="book">
                                <td>ArrivalDate</td>
                                <td><?= Html::encode($journey->arrivalDate)  ?></td>
                            </tr>      
                            <tr class="book">
                                <td>ArrivalTime</td>
                                <td><?= Html::encode($journey->arrivalTime) ?></td>
                            </tr>
                            <tr class="book">
                                <td>Capacity</td>
                                <td><?= Html::encode($bus->capacity) ?></td>
                            </tr>
                        </tbody>
                    </table>
                            <?= Html::a('Select', ['bbook-seat', 'id' => $journey->journeyId], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
                </div>       
        <?php endif; ?>
    <?php endforeach; ?>

</div>
