<?php

use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'User Lists';
$this->params['breadcrumbs'][] = ['label' => 'Admin Page', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-info" >
    <div class="panel-heading"><h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Lists</h4></div>
    <div class="panel-body">
    <div class="form-group">

        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'Create User', ['create'], ['class' => 'btn btn-success ']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-user"></i> '.'Manage Users', ['admin'], ['class' => 'btn btn-primary ']) ?>

    </div>
    </div>



    <?=
    ListView::widget([

        'dataProvider' => $dataProvider,
        'itemView' => function ($model) {
        return $this->render('_index', ['User' => $model]);
    },
        'summaryOptions' => ['align'=>'right'],

    ]);
    ?>



</div>
</div>


