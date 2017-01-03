<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\anesth\Repute */

$this->title = 'Create Repute';
$this->params['breadcrumbs'][] = ['label' => 'Reputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
