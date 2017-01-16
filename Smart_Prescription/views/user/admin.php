<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Role;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-admin">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <br />
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summaryOptions' => ['align'=>'right'],
        'columns' => [

            [
                'headerOptions' => ['style'=>'width: 3%', 'class' => 'text-center'],
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['align' => 'center'],


            ],
            'roleId' => [
                'attribute' => 'roleId',
                'headerOptions' => ['style'=>'width: 10%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
                'filter' => ArrayHelper::map(Role::find()->all(), 'id', 'name'),
                'value' => function($model) {
                    return $model->roleName ;
                },
            ],
//            'position' => [
//                'attribute' => 'position',
//                'headerOptions' => ['style'=>'width: 10%','class' => 'text-center'],
//                'contentOptions' => ['align' => 'left'],
//            ],
            'name' => [
                'attribute' => 'name',
                'headerOptions' => ['style'=>'width: 20%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
            ],
            'surname' => [
                'attribute' => 'surname',
                'headerOptions' => ['style'=>'width: 20%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
            ],
            'username' => [
                'attribute' => 'username',
                'headerOptions' => ['style'=>'width: 20%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
            ],



            [
                'header'=>'Options',
                'headerOptions' => ['class'=>'text-center'],
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:10%'],
                'contentOptions' => ['align' => 'center'],
                'buttonOptions'=>['class'=>'btn btn-primary'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
            ],

        ],
    ]); ?>
</div>
