<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drivers';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <?php if(Yii::$app->session->hasFlash('driverAdded')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('driverAdded'),
            ]);
        ?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('driverNotAdded')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-danger'],
                'body' => Yii::$app->session->getFlash('driverNotAdded'),
            ]);
        ?>
    <?php endif; ?>

    <h1 class="head"><?= Html::encode($this->title) ?></h1>
    <p>
        <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalButton">
              <span class="glyphicon glyphicon-plus"></span> Driver
            </button>
        <?php endif; ?>
        <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="gridSystemModalLabel" id="modalButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info" style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title center" id="gridSystemModalLabel">Add a driver</h4>
                    <?php $form = ActiveForm::begin(['action' => ['driver/create']]); ?>
                </div><!-- /.modal-header -->
                    <div class="modal-body">
 
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'maxlength' => true]) ?>

                        <?= $form->field($model, 'telNo')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'sex')->dropdownList(
                            ['M' => 'M', 'F' => 'F'], ['prompt' => 'Select gender']
                        ); ?>

                        <?= $form->field($model, 'residence')->dropdownList(
                                                    ['Douala'=>'Douala', 'Yaounde'=>'Yaounde', 'Buea'=>'Buea', 'Garoua'=>'Garoua', 'Ngaoundere'=>'Ngaoundere', 
                                'Maroua'=>'Maroua', 'Bamenda'=>'Bamenda',
                            ], ['prompt' => 'Select a town']
                        ); ?>
                       
                        <?= $form->field($model, 'salary')->textInput(['placeholder' => 'enter salary']) ?>
                        
                        <div class="form-group">
                            <?= Html::submitButton('Add', ['class' => 'btn btn-info center-block']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div><!-- /.modal-body -->
<!--              <div class="modal-footer"> -->
<!--              </div> -->
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </p>

    <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'telNo',
                'sex',
                'residence',
                'salary',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php else: ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'telNo',
                'sex',
                'residence',
            ],
        ]); ?>
    <?php endif; ?>
</div>
