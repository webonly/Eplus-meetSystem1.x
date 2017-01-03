<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\ophth\ophthImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ophth-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MI_Image1Path')->textInput() ?>

    <?= $form->field($model, 'MI_Image2Path')->textInput() ?>

    <?= $form->field($model, 'MI_Image3Path')->textInput() ?>

    <?= $form->field($model, 'MI_Image4Path')->textInput() ?>

    <?= $form->field($model, 'MI_Image1Url')->textInput() ?>

    <?= $form->field($model, 'MI_Image2Url')->textInput() ?>

    <?= $form->field($model, 'MI_Image3Url')->textInput() ?>

    <?= $form->field($model, 'MI_Image4Url')->textInput() ?>

    <?= $form->field($model, 'MI_Image1Title')->textInput() ?>

    <?= $form->field($model, 'MI_Image2Title')->textInput() ?>

    <?= $form->field($model, 'MI_Image3Title')->textInput() ?>

    <?= $form->field($model, 'MI_Image4Title')->textInput() ?>

    <?= $form->field($model, 'MI_HitCount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
