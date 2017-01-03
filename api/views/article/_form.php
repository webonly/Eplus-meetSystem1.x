<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MA_Serial')->textInput() ?>

    <?= $form->field($model, 'MA_Type')->textInput() ?>

    <?= $form->field($model, 'MA_Title')->textInput() ?>

    <?= $form->field($model, 'MA_ImgPath')->textInput() ?>

    <?= $form->field($model, 'MA_Keywords')->textInput() ?>

    <?= $form->field($model, 'MA_Tag')->textInput() ?>

    <?= $form->field($model, 'MA_Author')->textInput() ?>

    <?= $form->field($model, 'MA_Source')->textInput() ?>

    <?= $form->field($model, 'MA_Summary')->textInput() ?>

    <?= $form->field($model, 'MA_Content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MA_PublishOn')->textInput() ?>

    <?= $form->field($model, 'MA_FavorNum')->textInput() ?>

    <?= $form->field($model, 'MA_HitsCount')->textInput() ?>

    <?= $form->field($model, 'MA_Order')->textInput() ?>

    <?= $form->field($model, 'MA_Status')->textInput() ?>

    <?= $form->field($model, 'MA_CreateBy')->textInput() ?>

    <?= $form->field($model, 'MA_CreaetOn')->textInput() ?>

    <?= $form->field($model, 'MA_UpdateBy')->textInput() ?>

    <?= $form->field($model, 'MA_UpdateOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
