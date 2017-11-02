<?php

use yii\helpers\Html;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Buses */

$this->title = 'Add Bus';
//$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buses-create">

    <?php if(Yii::$app->session->hasFlash('busExist')): ?>
        <?= Alert::widget([
                'options' => ['class' => 'alert-danger'],
                'body' => Yii::$app->session->getFlash('busExist'),
            ]);
        ?>
    <?php endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
