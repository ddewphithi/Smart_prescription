<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
?>
<div xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Hello <?= Html::encode($this->title) ?></h4></div>
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'template'=>'<tr><th>{label}</th><td><i class="glyphicon glyphicon-triangle-right"></i></i> {value}</td></tr>',
                    'attributes' => [
                        [
                            'label' => 'Position',
                            'value' => $model->roleName,
                        ],
                        'name',
                        'surname',
                        'username'
                    ],
                ]) ?>
            </div>

        </div>
    </div>

        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="text-center">
                    <h4>Options</h4>
                        </div>
                </div>
                    <div class="panel-footer">
                        <div class="form-group">
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'Create Users', ['user/create'], ['class' => 'btn btn-success btn-block']) ?>
                        <?= Html::a('<i class="glyphicon glyphicon-user"></i> '.'Manage Users', ['user/admin'], ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </div>
        </div>



