<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => 'Orçamento #' . str_pad($model->orcamento_id, 5, '0', STR_PAD_LEFT),
    'url' => ['orcamento/view', 'id'=>$model->orcamento_id]
];
?>
<div class="factura-view">

    <h1>
        Factura #<?= str_pad($model->id, 5, '0', STR_PAD_LEFT); ?>
        <br/>
        <small>
        <span style="font-size:14px" class="glyphicon glyphicon-th-list"> </span>
        <?= $model->titulo ?> <?= $model->descricao ?>
        </small>
    </h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'titulo',
            'descricao:ntext',
            'orcamento_id',
            'data_criacao',
            'data_update',
            'criado_por',
            'updated_por',
        ],
    ]) ?>

</div>
