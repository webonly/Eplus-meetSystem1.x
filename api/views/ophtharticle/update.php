<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthArticle */

$this->title = 'Update Ophth Article: ' . ' ' . $model->MA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ophth Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MA_ID, 'url' => ['view', 'id' => $model->MA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ophth-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
