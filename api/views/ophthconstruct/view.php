<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthConstruct */

$this->title = $model->MC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Constructs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-construct-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MC_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MC_ID], [
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
            'MC_ID',
            'MC_Serial',
            'MC_Title',
            'MC_Keywords',
            'MC_Summary',
            'MC_Content:ntext',
            'MC_HitsCount',
            'MC_Order',
            'MC_Status',
            'MC_CreateBy',
            'MC_CreateOn',
            'MC_UpdateBy',
            'MC_UpdateOn',
        ],
    ]) ?>

</div>
