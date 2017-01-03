<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Construct */

$this->title = 'Update Construct: ' . ' ' . $model->MC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Constructs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MC_ID, 'url' => ['view', 'id' => $model->MC_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="construct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>