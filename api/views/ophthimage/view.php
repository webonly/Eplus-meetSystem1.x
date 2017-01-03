<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthImage */

$this->title = $model->MI_Id;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MI_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MI_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MI_Id',
            'MI_Image1Path',
            'MI_Image2Path',
            'MI_Image3Path',
            'MI_Image4Path',
            'MI_Image1Url:url',
            'MI_Image2Url:url',
            'MI_Image3Url:url',
            'MI_Image4Url:url',
            'MI_Image1Title',
            'MI_Image2Title',
            'MI_Image3Title',
            'MI_Image4Title',
            'MI_HitCount',
        ],
    ]) ?>

</div>
