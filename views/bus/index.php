<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buses';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container buses-index">
   
    <?php if(Yii::$app->session->hasFlash('busRegistered')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('busRegistered'),
            ]);
        ?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('busDeleted')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('busDeleted'),
            ]);
        ?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('busNotDeleted')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-danger'],
                'body' => Yii::$app->session->getFlash('busNotDeleted'),
            ]);
        ?>
    <?php endif; ?>
    
    <h1 class="head"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    <?php //only the super admin can add and delete a bus from the system ?>
        <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Bus', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?php foreach($model as $model): ?>
        <div class="col-lg-4">
            <h4 style="color:purple"><?= Html::encode($model->numberCode) ?></h4>
            <?= Html::img("@web/images/$model->imageName",['class' => "img-rounded img-responsive img"]) ?>
            <h4>Capacity : <?= $model->capacity ?></h4>
            <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
            <?= Html::a('Delete <span class="glyphicon glyphicon-trash"></span>', ['delete', 'numberCode' => $model->numberCode], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>    
        </div>
    <?php endforeach; ?>

    <?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'numberCode',
            'capacity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
</div>
