<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ophth Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ophth Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MI_Id',
            'MI_Image1Path',
            'MI_Image2Path',
            'MI_Image3Path',
            'MI_Image4Path',
            // 'MI_Image1Url:url',
            // 'MI_Image2Url:url',
            // 'MI_Image3Url:url',
            // 'MI_Image4Url:url',
            // 'MI_Image1Title',
            // 'MI_Image2Title',
            // 'MI_Image3Title',
            // 'MI_Image4Title',
            // 'MI_HitCount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
