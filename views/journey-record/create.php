<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JourneyRecord */

$this->title = 'Create Journey Record';
$this->params['breadcrumbs'][] = ['label' => 'Journey Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journey-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
