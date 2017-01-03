<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ophth Constructs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-construct-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ophth Construct', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MC_ID',
            'MC_Serial',
            'MC_Title',
            'MC_Keywords',
            'MC_Summary',
            // 'MC_Content:ntext',
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
