<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Journeys */

$this->title = 'Add Journey';
//$this->params['breadcrumbs'][] = ['label' => 'Journeys', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journeys-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
