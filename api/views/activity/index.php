<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MA_ID',
            'MA_Code',
            'MA_Name',
            'MA_ImgUrl:url',
            'MA_LinkUrl:url',
            // 'MA_Summary',
            // 'MA_PublishOn',
            // 'MA_FavorNum',
            // 'MA_HitCount',
            // 'MA_Status',
            // 'MA_CreateBy',
            // 'MA_CreateOn',
            // 'MA_UpdateBy',
            // 'MA_UpdateOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
