<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Article */

$this->title = 'Update Article: ' . ' ' . $model->MA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MA_ID, 'url' => ['view', 'id' => $model->MA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
