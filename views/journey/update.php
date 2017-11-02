<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Journeys */

$this->title = 'Update Journey';
//$this->params['breadcrumbs'][] = ['label' => 'Journeys', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->journeyId, 'url' => ['view', 'id' => $model->journeyId]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journeys-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
