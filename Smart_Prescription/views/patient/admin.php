<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <br />
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summaryOptions' => ['align'=>'right'],
        'columns' => [
            [
                'headerOptions' => ['style'=>'width: 3%', 'class' => 'text-center'],
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['align' => 'center'],
            ],

            'personal_id'=>[
                'attribute' => 'personal_id',
                'headerOptions' => ['style'=>'width: 10%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
            ],
            'name'=>[
                'attribute' => 'name',
                'headerOptions' => ['style'=>'width: 15%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
            ],
            'surname'=>[
                'attribute'=>'surname',
                'headerOptions' => ['style'=>'width: 15%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
            ],
            'create_by' => [
                'attribute' => 'create_by',
                'headerOptions' => ['style'=>'width: 10%','class' => 'text-center'],
                'contentOptions' => ['align' => 'left'],
                'filter' => ArrayHelper::map(User::find()->all(),'id', 'name'),
                'value' => function($model) {
                    return $model->creator->name;
                },
            ],
            'create_at'=>[
                'attribute' => 'create_at',
                'headerOptions' => ['style'=>'width: 10%','class' => 'text-center'],
                'contentOptions' => ['align' => 'center'],
                'format' =>'html',
                'value'=>function($model, $key, $index, $column){
                    return Yii::$app->formatter->asDate($model->create_at,'medium');

                }],



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
<?php Pjax::end(); ?></div>
