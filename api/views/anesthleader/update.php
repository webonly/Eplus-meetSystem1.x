<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Repute */

$this->title = 'Update Repute: ' . ' ' . $model->MR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Reputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MR_ID, 'url' => ['view', 'id' => $model->MR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
