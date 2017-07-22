<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factura Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Factura Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descricao',
            'quantidade',
            'valor',
            'data',
            // 'iva',
            // 'factura_id',
            // 'data_criacao',
            // 'data_update',
            // 'criado_por',
            // 'updated_por',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
