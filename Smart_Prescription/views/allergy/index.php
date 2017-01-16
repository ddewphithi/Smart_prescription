<?php

use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Allergy Report Lists';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Page', 'url' => ['doctor/index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="panel panel-info" >
    <div class="panel-heading"><h4><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Allergy Report Lists</h4></div>
    <div class="panel-body">
        <div class="form-group">

            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'Create Allergy Reports', ['create'], ['class' => 'btn btn-success ']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-user"></i> '.'Manage Allergy Reports', ['admin'], ['class' => 'btn btn-primary ']) ?>

        </div>
    </div>



    <?=
    ListView::widget([

        'dataProvider' => $dataProvider,
        'itemView' => function ($model) {
            return $this->render('_index', ['Allergy' => $model]);
        },
        'summaryOptions' => ['align'=>'right'],

    ]);
    ?>



</div>
</div>


