<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\Meeting */

$this->title = 'Update Meeting: ' . ' ' . $model->MM_ID;
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MM_ID, 'url' => ['view', 'id' => $model->MM_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meeting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
