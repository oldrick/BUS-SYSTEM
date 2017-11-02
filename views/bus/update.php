<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Buses */

$this->title = 'Update Buses: ' . $model->numberCode;
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numberCode, 'url' => ['view', 'id' => $model->numberCode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
