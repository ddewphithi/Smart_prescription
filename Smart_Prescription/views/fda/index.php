
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->name;
?>
<div xmlns="http://www.w3.org/1999/html">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-asterisk" ></i> Hello <?= Html::encode($this->title) ?></h4></div>
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
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4>Allergy Options <i class="glyphicon glyphicon-list-alt" ></i></h4>
            </div>
            <div class="panel-footer">
                <div class="button-group">
                    <?= Html::a('<i class="glyphicon glyphicon-list-alt"></i> '.'View Report Lists', ['allergy/fda'], ['class' => 'btn btn-primary btn-block']) ?>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


</div>
