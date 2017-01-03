<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reputes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repute-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Repute', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MR_ID',
            'MR_Code',
            'MR_DocName',
            'MR_Photo',
            'MR_Job',
            // 'MR_WorkPlace',
            // 'MR_Specialty',
            // 'MR_Summary:ntext',
            // 'MR_Order',
            // 'MR_Status',
            // 'MR_HitCount',
            // 'MR_CreateBy',
            // 'MR_CreateOn',
            // 'MR_UpdateBy',
            // 'MR_UpdateOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
