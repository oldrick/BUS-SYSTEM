<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DriverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'receipt';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-index">
    <h1 class="head"><?= Html::encode($this->title) ?></h1>
        <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="gridSystemModalLabel" id="modalButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info" style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title center" id="gridSystemModalLabel">Fill the information to get your receipt</h4>
                    <?php $form = ActiveForm::begin(['action' => []]); ?>
                </div><!-- /.modal-header -->
                    <div class="modal-body">

                        <?= $form->field($model, 'customerId')?>
                        <?= $form->field($model, 'journeyId')?>

                        <div class="form-group">
                            <?= Html::submitButton('Add', ['class' => 'btn btn-info center-block']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
</div>
