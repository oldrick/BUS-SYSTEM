<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Journey;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JourneysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journeys';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left:auto; margin-right:auto; width:100%">

    <h1 class="head"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Journey', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
            [
            'class'=>'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

    <?/*php
        $douala = array('Douala-Yaounde','Douala-Buea','Douala-Dschang','Douala-Bamenda','Douala-Bertoua');
        $yaounde = array('Yaounde-Douala','Yaounde-Buea','Yaounde-Bamenda','Yaounde-Dschang','Yaounde-Bertoua');
        $buea = array('Buea-Douala','Buea-Yaounde','Buea-Bamenda','Buea-Dschang','Buea-Bertoua');
        $bamenda = array('Bamenda-Douala','Bamenda-Yaounde','Bamenda-Buea','Bamenda-Dschang','Bamenda-Bertoua');
        $bertoua = array('Bertoua-Douala','Bertoua-Yaounde','Bertoua-Buea','Bertoua-Bamenda','Bertoua-Dschang');
        $dschang = array('Dschang-Douala','Dschang-Yaounde','Dschang-Buea','Dschang-Bamenda','Dschang-Bertoua');
        //obtains the residence of a user and uses it know which journeys he can assign. A user from Douala can only
        //crud(delete and update) journeys that start with Douala.and so on....He can only view the others without having power to
        //crud them
            $user = Yii::$app->user->identity->residence;
            if($user == 'Douala'){
                $town = $douala;
            }elseif($user == 'Bamenda'){
                $town = $bamenda;
            }elseif($user == 'Yaounde'){
                $town = $yaounde;
            }elseif($user == 'Buea'){
                $town = $buea;
            }elseif($user == 'Bertoua'){
                $town = $bertoua;
            }elseif($user == 'Dschang'){
                $town = $dschang;
            }
            if (($model = Journey::find()->indexBy('journeyId')->all())) {
                foreach ($model as $model){
                    foreach ($town as $value) {
                        if ($value == $model->journey){
    ?>                        
                           <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->journeyId], ['class' => '']) ?>
                           <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete','id'=>$model->journeyId], [
                                'class' => '',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])?>
    <?php
                        }
                    }
                }
            }           
    */?>

</div>
