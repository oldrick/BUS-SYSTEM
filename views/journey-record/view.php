<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JourneyRecord */

$this->title = $model->journeyId;
$this->params['breadcrumbs'][] = ['label' => 'Journey Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journey-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->journeyId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->journeyId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'journeyId',
            'numberCode',
            'setJourney',
            'journey',
            'price',
            'takeOffDate',
            'takeOffTime',
            'arrivalDate',
            'arrivalTime',
            'driver',
            'userName',
            'time',
            'action',
        ],
    ]) ?>

</div>
