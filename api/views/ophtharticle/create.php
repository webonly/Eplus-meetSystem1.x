<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthArticle */

$this->title = 'Create Ophth Article';
$this->params['breadcrumbs'][] = ['label' => 'Ophth Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
