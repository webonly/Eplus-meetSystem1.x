<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model api\models\Activity */

$this->title = $model->MA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MA_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MA_ID], [
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
            'MA_ID',
            'MA_Code',
            'MA_Name',
            'MA_ImgUrl:url',
            'MA_LinkUrl:url',
            'MA_Summary',
            'MA_PublishOn',
            'MA_FavorNum',
            'MA_HitCount',
            'MA_Status',
            'MA_CreateBy',
            'MA_CreateOn',
            'MA_UpdateBy',
            'MA_UpdateOn',
        ],
    ]) ?>

</div>
