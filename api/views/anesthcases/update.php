<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Cases */

$this->title = 'Update Cases: ' . ' ' . $model->MC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MC_ID, 'url' => ['view', 'id' => $model->MC_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
