<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Repute */

$this->title = $model->MR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Reputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repute-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MR_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MR_ID], [
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
            'MR_ID',
            'MR_Code',
            'MR_DocName',
            'MR_Photo',
            'MR_Job',
            'MR_WorkPlace',
            'MR_Specialty',
            'MR_Summary:ntext',
            'MR_Order',
            'MR_Status',
            'MR_HitCount',
            'MR_CreateBy',
            'MR_CreateOn',
            'MR_UpdateBy',
            'MR_UpdateOn',
        ],
    ]) ?>

</div>
