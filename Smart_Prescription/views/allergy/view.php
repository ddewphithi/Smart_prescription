<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Allergy */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Allergies', 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allergy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'allergy_id',
            'personal_id',
            'name',
            'surname',
            'allergy_drug:ntext',
            [
                'attribute'=>'reporter',
                'value' => $model->reporterName->name,
            ],
            'create_at:dateTime',
            'update_at:dateTime',
        ],
    ]) ?>

    <p>
    <div class="col-lg-offset-10">
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> '.'Update', ['update', 'id' => $model->allergy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> '.'Delete', ['delete', 'id' => $model->allergy_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </p>

</div>
