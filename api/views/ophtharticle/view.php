<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthArticle */

$this->title = $model->MA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-article-view">

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
            'MA_Serial',
            'MA_Type',
            'MA_Title',
            'MA_ImgPath',
            'MA_Keywords',
            'MA_Tag',
            'MA_Author',
            'MA_Source',
            'MA_Summary',
            'MA_Content:ntext',
            'MA_PublishOn',
            'MA_HitsCount',
            'MA_Order',
            'MA_Status',
            'MA_CreateBy',
            'MA_CreaetOn',
            'MA_UpdateBy',
            'MA_UpdateOn',
            'MA_IsHot',
        ],
    ]) ?>

</div>
