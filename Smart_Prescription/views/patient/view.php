<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'personal_id',
            'name',
            'surname',
            'prescription:ntext',
            [
                'attribute'=>'create_by',
                'value' => $model->creator->name,
            ],
            'username',
            'password',
            'create_at:dateTime',
            'update_at:dateTime',
        ],
    ]) ?>

    <p>

    <div class="col-lg-offset-10">
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> '.'Update', ['update', 'id' => $model->personal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> '.'Delete', ['delete', 'id' => $model->personal_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    </p>

</div>
