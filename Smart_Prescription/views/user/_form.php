<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\widgets\ActiveField;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-body">

    <?php $form = ActiveForm::begin(['layout'=>'horizontal',
        'enableAjaxValidation' => true,
        ]); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password2')->passwordInput(['maxlength' => true]) ?>
    <div class="row">
    <div class="col-lg-12 col-lg-12">
        <?= $form->field($model, 'roleId')->inline()->radioList($model->getItemRole()) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-8">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
