<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\generated\models\DefCode */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="def-code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'from')->textInput() ?>

    <?php echo $form->field($model, 'to')->textInput() ?>

    <?php echo $form->field($model, 'capacity')->textInput() ?>

    <?php echo $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('defcode', 'Create') : Yii::t('defcode', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
