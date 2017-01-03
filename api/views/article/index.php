<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MA_ID',
            'MA_Serial',
            'MA_Type',
            'MA_Title',
            'MA_ImgPath',
            // 'MA_Keywords',
            // 'MA_Tag',
            // 'MA_Author',
            // 'MA_Source',
            // 'MA_Summary',
            // 'MA_Content:ntext',
            // 'MA_PublishOn',
            // 'MA_FavorNum',
            // 'MA_HitsCount',
            // 'MA_Order',
            // 'MA_Status',
            // 'MA_CreateBy',
            // 'MA_CreaetOn',
            // 'MA_UpdateBy',
            // 'MA_UpdateOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
