<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Login';

?>
<div class="site-login">
    <div class="col-md-6 col-md-offset-3">
    <div class="text-center">
    <?php if(Yii::$app->session->hasFlash('alert')):?>
        <?= \yii\bootstrap\Alert::widget([
            'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
            'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
        ])?>
    <?php endif; ?>
        </div>
<div class="row">
    <div class="text-center">
    <div class="panel panel-info">
        <div class="panel-heading"><strong><h1><?= Html::encode($this->title) ?> <i class="glyphicon glyphicon-edit"></i></h1></strong></div>
        <div class="panel-body">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-11\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-10">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
            </div>
            </div>
        </div>
</div>
    <?php ActiveForm::end(); ?>


</div>
