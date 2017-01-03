<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\OphthRepute */

$this->title = 'Update Ophth Repute: ' . ' ' . $model->MR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Reputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MR_ID, 'url' => ['view', 'id' => $model->MR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ophth-repute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
