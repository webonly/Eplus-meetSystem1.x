<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model api\models\anesth\Cases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cases-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MC_Serail')->textInput() ?>

    <?= $form->field($model, 'MC_Title')->textInput() ?>

    <?= $form->field($model, 'MC_ImgPath')->textInput() ?>

    <?= $form->field($model, 'MC_Keywords')->textInput() ?>

    <?= $form->field($model, 'MC_Tag')->textInput() ?>

    <?= $form->field($model, 'MC_Author')->textInput() ?>

    <?= $form->field($model, 'MC_Source')->textInput() ?>

    <?= $form->field($model, 'MC_Summary')->textInput() ?>

    <?= $form->field($model, 'MC_Content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MC_FileCode')->textInput() ?>

    <?= $form->field($model, 'MC_PulishOn')->textInput() ?>

    <?= $form->field($model, 'MC_HitsCount')->textInput() ?>

    <?= $form->field($model, 'MC_Order')->textInput() ?>

    <?= $form->field($model, 'MC_Status')->textInput() ?>

    <?= $form->field($model, 'MC_CreateBy')->textInput() ?>

    <?= $form->field($model, 'MC_CreateOn')->textInput() ?>

    <?= $form->field($model, 'MC_UpdateBy')->textInput() ?>

    <?= $form->field($model, 'MC_UpdateOn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
