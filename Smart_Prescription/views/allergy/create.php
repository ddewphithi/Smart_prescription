<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Allergy */

$this->title = 'Create Allergy';
$this->params['breadcrumbs'][] = ['label' => 'Allergies', 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allergy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
