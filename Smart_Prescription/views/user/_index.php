<?php

use yii\helpers\Html;
use app\models\User;

?>


<div class="panel panel-info"></div>
<dl class="dl-horizontal">

<dd>

    <div
        <br><?= Html::label('ID : ', 'id') ?>
<!--    --><?//= Html::a(Html::getAttributeValue($User, 'id'),['id'])?><!--<br />-->
    <?= Html::a(Html::getAttributeValue($User, 'id'), ['user/view', 'id' => $User->id], ['class' => 'profile-link']) ?>
<div
<br><?= Html::label('Position : ', 'position') ?>
    <?= Html::getAttributeValue($User,'position') ?><br />

<div
<br><?= Html::label('Name : ', 'name', ['class' => 'align-center']) ?>
    <?= Html::getAttributeValue($User,'name') ?><br />

<div
<br><?= Html::label('Surname : ', 'surname') ?>
    <?= Html::getAttributeValue($User,'surname') ?><br />



</dl>









