<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthConstruct */

$this->title = 'Create Ophth Construct';
$this->params['breadcrumbs'][] = ['label' => 'Ophth Constructs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ophth-construct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
