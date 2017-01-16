<?php

use yii\helpers\Html;
use app\models\User;

?>


<div class="panel panel-info"></div>
<dl class="dl-horizontal">

    <dd>

        <!--    <div-->
        <!--        <br>--><?//= Html::label('ID : ', 'id') ?>
        <!--    --><?//= Html::a(Html::getAttributeValue($User, 'id'),['id'])?><!--<br />-->

        <div
        <br><?= Html::label('Personal ID : ', 'personal_id') ?>
        <?= Html::getAttributeValue($Allergy,'personal_id') ?><br />

        <div
        <br><?= Html::label('Name : ', 'name', ['class' => 'align-center']) ?>
        <?= Html::getAttributeValue($Allergy,'name') ?><br />

        <div
        <br><?= Html::label('Surname : ', 'surname') ?>
        <?= Html::getAttributeValue($Allergy,'surname') ?><br />

        <div
        <br><?= Html::label('Reporter : ', 'reporter') ?>
        <?= Html::getAttributeValue($Allergy,'reporter') ?><br />



</dl>









