<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model api\models\anesth\Construct */

$this->title = 'Create Construct';
$this->params['breadcrumbs'][] = ['label' => 'Constructs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="construct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
