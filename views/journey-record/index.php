<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JourneyRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journey Records';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journey-record-index">

    <h1 class="head"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('Create Journey Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php else: ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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

    //            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php endif; ?>
</div>
