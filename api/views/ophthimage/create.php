<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthImage */

$this->title = 'Create Ophth Image';
$this->params['breadcrumbs'][] = ['label' => 'Ophth Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
