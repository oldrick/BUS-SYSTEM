<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <?php if(Yii::$app->session->hasFlash('userAdded')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('userAdded'),
            ]);
        ?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('userUpdated')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('userUpdated'),
            ]);
        ?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('userDeleted')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-success'],
                'body' => Yii::$app->session->getFlash('userDeleted'),
            ]);
        ?>
    <?php endif; ?>

    <h1 class="head"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(Yii::$app->user->identity->userName == 'tsaffi'): ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalButton">
                <span class="glyphicon glyphicon-plus"></span> User
            </button>
        <?php endif; ?>
        <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="gridSystemModalLabel" id="modalButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info" style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title center" id="gridSystemModalLabel">Add a driver</h4>
                    <?php $form = ActiveForm::begin(['action' => ['users/create']] ); ?>
              </div><!-- /.modal-header -->
                    <div class="modal-body">

                        <?= $form->field($model, 'firstName')->textInput(['autofocus' => true, 'maxlength' => true, 'placeholder' => 'enter your first name']) ?>

                        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true, 'placeholder' => 'enter your last name']) ?>

                        <?= $form->field($model, 'userName')->textInput(['maxlength' => true, 'placeholder' => 'enter your user name']) ?>
                        
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'enter your password', 'id' => 'pass']) ?>
                        
                        <?= $form->field($model, 'passwordAgain')->passwordInput(['placeholder' => 'enter your password Again','onkeyup' => 'checkPassword()', 'id' => 'passAgain']) ?>
                        <p><span id="match" style="color:red"></span></p>
                        <?= $form->field($model, 'telNo')->textInput(['maxlength' => true, 'placeholder' => 'enter your telephone number']) ?>

                        <?= $form->field($model, 'residence')->dropdownList(
                            ['Douala'=>'Douala', 'Yaounde'=>'Yaounde', 'Buea'=>'Buea','Bamenda'=>'Bamenda', 'Bertoua'=>'Bertoua', 'Dschang'=>'Dschang'], ['prompt' => 'Select a town'] 
                        );
                        ?>
                        
                        <?= $form->field($model, 'salary')->textInput(['placeholder' => 'enter salary']) ?>

                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-info center-block' : 'btn btn-primary center-block']) ?>
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

                'firstName',
                'lastName',
                'userName',
                'telNo',
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

                'firstName',
                'lastName',
                'telNo',
                'residence',
            ],
        ]); ?>
    <?php endif; ?>
</div>
<script>
    function checkPassword(){
        var pass = document.getElementById('pass').value;
        var passAgain = document.getElementById('passAgain').value;
        if(pass === passAgain){
            document.getElementById('match').innerHTML = 'passwords match';
        }else{
            document.getElementById('match').innerHTML = 'passwords do not match';
        }
    }

</script>






