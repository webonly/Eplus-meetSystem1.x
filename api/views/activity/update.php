<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\Activity */

$this->title = 'Update Activity: ' . ' ' . $model->MA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MA_ID, 'url' => ['view', 'id' => $model->MA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
