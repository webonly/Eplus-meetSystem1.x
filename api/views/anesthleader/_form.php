<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Repute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MR_Code')->textInput() ?>

    <?= $form->field($model, 'MR_DocName')->textInput() ?>

    <?= $form->field($model, 'MR_Photo')->textInput() ?>

    <?= $form->field($model, 'MR_Job')->textInput() ?>

    <?= $form->field($model, 'MR_WorkPlace')->textInput() ?>

    <?= $form->field($model, 'MR_Specialty')->textInput() ?>

    <?= $form->field($model, 'MR_Summary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MR_Order')->textInput() ?>

    <?= $form->field($model, 'MR_Status')->textInput() ?>

    <?= $form->field($model, 'MR_HitCount')->textInput() ?>

    <?= $form->field($model, 'MR_CreateBy')->textInput() ?>

    <?= $form->field($model, 'MR_CreateOn')->textInput() ?>

    <?= $form->field($model, 'MR_UpdateBy')->textInput() ?>

    <?= $form->field($model, 'MR_UpdateOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
