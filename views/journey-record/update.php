<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JourneyRecord */

$this->title = 'Update Journey Record: ' . $model->journeyId;
$this->params['breadcrumbs'][] = ['label' => 'Journey Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journeyId, 'url' => ['view', 'id' => $model->journeyId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journey-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
