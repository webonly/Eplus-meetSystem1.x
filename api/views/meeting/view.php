<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model api\models\Meeting */

$this->title = $model->MM_ID;
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MM_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MM_ID], [
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
            'MM_ID',
            'MM_Serial',
            'MM_Name',
            'MM_Type',
            'MM_Source',
            'MM_StartDate',
            'MM_EndDate',
            'MM_Location',
            'MM_Telephone',
            'MM_Faxcode',
            'MM_Contactor',
            'MM_Email:email',
            'MM_Address',
            'MM_Content:ntext',
            'MM_PublishOn',
            'MM_FavorNum',
            'MM_HitCount',
            'MM_Status',
            'MM_CreateBy',
            'MM_CreateOn',
            'MM_UpdateBy',
            'MM_UpdateOn',
        ],
    ]) ?>

</div>
