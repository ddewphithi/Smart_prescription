<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Allergy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allergy-form">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-body">

    <?php $form = ActiveForm::begin(['layout'=>'horizontal',
    'enableAjaxValidation' => true,]); ?>

    <?=$form->field($model, 'personal_id')->widget(MaskedInput::className(),[
        'mask'=>'9-9999-99999-99-9' ])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'allergy_drug')->textarea(['rows' => 6]) ?>





    <div class="form-group">
        <div class="col-lg-offset-8">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
