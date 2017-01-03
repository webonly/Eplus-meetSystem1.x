<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\Meeting */

$this->title = 'Create Meeting';
$this->params['breadcrumbs'][] = ['label' => 'Meetings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
