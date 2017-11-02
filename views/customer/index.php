<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use app\models\Customer;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1 class="head"><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'customerId',
                'journeyId',
                'customerName',
                'telNo',
                'seat',
                'regTime',
                'setSeat',
                'regTime2',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php else: ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'customerId',
                'journeyId',
                'customerName',
                'telNo',
                'seat',
                'regTime',
                'setSeat',
                'regTime2',

    //            ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php endif; ?>
   <?php //only the super admin has the right to alter(delete) a customer from the system ?> 
    <?/*php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
        <?php $model = Customer::find()->orderBy(['customerId' => SORT_DESC])->all(); ?>
            <?php foreach($model as $model): ?>
                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id'=>$model->customerId], [
                    'class' => '',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])?>
            <?php endforeach; ?>
    <?php endif; */?>



</div>
