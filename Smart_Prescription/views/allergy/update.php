<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Allergy */

$this->title = 'Update Allergy: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Allergies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->allergy_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="allergy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
