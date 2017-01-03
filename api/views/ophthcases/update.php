<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthCases */

$this->title = 'Update Ophth Cases: ' . ' ' . $model->MC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MC_ID, 'url' => ['view', 'id' => $model->MC_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ophth-cases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
