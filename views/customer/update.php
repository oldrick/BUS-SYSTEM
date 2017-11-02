<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Update Customer';
//$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->customerId, 'url' => ['view', 'id' => $model->customerId]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
