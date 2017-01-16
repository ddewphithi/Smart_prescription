<?php

use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Patient Lists';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Page', 'url' => ['doctor/index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="panel panel-info" >
    <div class="panel-heading"><h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Patient Lists</h4></div>
    <div class="panel-body">
        <div class="form-group">

            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'Create Patient', ['create'], ['class' => 'btn btn-success ']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> '.'Manage Patients', ['admin'], ['class' => 'btn btn-primary ']) ?>

        </div>
    </div>



    <?=
    ListView::widget([

        'dataProvider' => $dataProvider,
        'itemView' => function ($model) {
            return $this->render('_index', ['Patient' => $model]);
        },
        'summaryOptions' => ['align'=>'right'],

    ]);
    ?>



</div>
</div>


