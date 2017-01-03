<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meetings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Meeting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MM_ID',
            'MM_Serial',
            'MM_Name',
            'MM_Type',
            'MM_Source',
            // 'MM_StartDate',
            // 'MM_EndDate',
            // 'MM_Location',
            // 'MM_Telephone',
            // 'MM_Faxcode',
            // 'MM_Contactor',
            // 'MM_Email:email',
            // 'MM_Address',
            // 'MM_Content:ntext',
            // 'MM_PublishOn',
            // 'MM_FavorNum',
            // 'MM_HitCount',
            // 'MM_Status',
            // 'MM_CreateBy',
            // 'MM_CreateOn',
            // 'MM_UpdateBy',
            // 'MM_UpdateOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
