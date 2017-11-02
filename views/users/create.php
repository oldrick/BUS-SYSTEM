<?php

use yii\helpers\Html;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Add User';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
    <?php if(Yii::$app->session->hasFlash('passwordsNotMatch')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-info'],
                'body' => Yii::$app->session->getFlash('passwordsNotMatch'),
            ]);
        ?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('userExist')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-danger'],
                'body' => Yii::$app->session->getFlash('userExist'),
            ]);
        ?>
    <?php endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
