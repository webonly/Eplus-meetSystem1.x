<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthConstruct */

$this->title = 'Update Ophth Construct: ' . ' ' . $model->MC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Constructs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MC_ID, 'url' => ['view', 'id' => $model->MC_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ophth-construct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
