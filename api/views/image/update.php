<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Image */

$this->title = 'Update Image: ' . ' ' . $model->MI_Id;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MI_Id, 'url' => ['view', 'id' => $model->MI_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
