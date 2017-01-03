<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthCases */

$this->title = 'Create Ophth Cases';
$this->params['breadcrumbs'][] = ['label' => 'Ophth Cases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-cases-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
