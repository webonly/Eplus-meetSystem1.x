<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\ophth\OphthRepute */

$this->title = 'Create Ophth Repute';
$this->params['breadcrumbs'][] = ['label' => 'Ophth Reputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-repute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
