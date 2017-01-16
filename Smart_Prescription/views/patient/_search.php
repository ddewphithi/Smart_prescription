<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['admin'],
        'method' => 'get',
        'options' => ['data-pjax' => true]
    ]); ?>
    <div class="input-group">
        <?= Html::activeTextInput($model, 'patients',['class'=>'form-control','placeholder'=>'Search by Personal ID, Name, or Surname ...']) ?>
        <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> Search</button>
      </span>
    </div>






    <?php ActiveForm::end(); ?>

</div>
