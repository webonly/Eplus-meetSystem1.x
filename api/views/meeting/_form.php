<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\Meeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MM_Serial')->textInput() ?>

    <?= $form->field($model, 'MM_Name')->textInput() ?>

    <?= $form->field($model, 'MM_Type')->textInput() ?>

    <?= $form->field($model, 'MM_Source')->textInput() ?>

    <?= $form->field($model, 'MM_StartDate')->textInput() ?>

    <?= $form->field($model, 'MM_EndDate')->textInput() ?>

    <?= $form->field($model, 'MM_Location')->textInput() ?>

    <?= $form->field($model, 'MM_Telephone')->textInput() ?>

    <?= $form->field($model, 'MM_Faxcode')->textInput() ?>

    <?= $form->field($model, 'MM_Contactor')->textInput() ?>

    <?= $form->field($model, 'MM_Email')->textInput() ?>

    <?= $form->field($model, 'MM_Address')->textInput() ?>

    <?= $form->field($model, 'MM_Content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MM_PublishOn')->textInput() ?>

    <?= $form->field($model, 'MM_FavorNum')->textInput() ?>

    <?= $form->field($model, 'MM_HitCount')->textInput() ?>

    <?= $form->field($model, 'MM_Status')->textInput() ?>

    <?= $form->field($model, 'MM_CreateBy')->textInput() ?>

    <?= $form->field($model, 'MM_CreateOn')->textInput() ?>

    <?= $form->field($model, 'MM_UpdateBy')->textInput() ?>

    <?= $form->field($model, 'MM_UpdateOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
