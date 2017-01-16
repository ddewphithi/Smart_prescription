<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['admin'],
        'method' => 'get',
        'options' => ['data-pjax' => true]
    ]); ?>

    <div class="input-group">
        <?= Html::activeTextInput($model, 'users',['class'=>'form-control','placeholder'=>'Search by Name, Surname or Username...']) ?>
        <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> Search</button>
      </span>
    </div>



<!--    <div class="form-group">-->
<!--        <?//= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>-->
<!--        <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>-->
<!--    </div>-->

    <?php ActiveForm::end(); ?>

</div>
