<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MA_Code')->textInput() ?>

    <?= $form->field($model, 'MA_Name')->textInput() ?>

    <?= $form->field($model, 'MA_ImgUrl')->textInput() ?>

    <?= $form->field($model, 'MA_LinkUrl')->textInput() ?>

    <?= $form->field($model, 'MA_Summary')->textInput() ?>

    <?= $form->field($model, 'MA_PublishOn')->textInput() ?>

    <?= $form->field($model, 'MA_FavorNum')->textInput() ?>

    <?= $form->field($model, 'MA_HitCount')->textInput() ?>

    <?= $form->field($model, 'MA_Status')->textInput() ?>

    <?= $form->field($model, 'MA_CreateBy')->textInput() ?>

    <?= $form->field($model, 'MA_CreateOn')->textInput() ?>

    <?= $form->field($model, 'MA_UpdateBy')->textInput() ?>

    <?= $form->field($model, 'MA_UpdateOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
