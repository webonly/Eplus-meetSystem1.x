<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cases', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MC_ID',
            'MC_Serail',
            'MC_Title',
            'MC_ImgPath',
            'MC_Keywords',
            // 'MC_Tag',
            // 'MC_Author',
            // 'MC_Source',
            // 'MC_Summary',
            // 'MC_Content:ntext',
            // 'MC_FileCode',
            // 'MC_PulishOn',
            // 'MC_HitsCount',
            // 'MC_Order',
            // 'MC_Status',
            // 'MC_CreateBy',
            // 'MC_CreateOn',
            // 'MC_UpdateBy',
            // 'MC_UpdateOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
