<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => 'Orçamento #' . str_pad($model->orcamento_id, 5, '0', STR_PAD_LEFT),
    'url' => ['orcamento/view', 'id'=>$model->orcamento_id]
];

$produtos = $model->getProduto();
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

    <div style="padding: 10px;">

        <h4 style="margin-top: 30px">
            Produtos
            <a href="#create" class="btn btn-sm pull-right btn-success" 
                 data-toggle="modal" data-target="#produtoModal"
                 aria-controls="home">
                adicionar
            </a>
        </h4>

        <?php 
            echo \Yii::$app->view->renderFile(
                "@app/views/factura/list_produto.php",
                ['produtos'=> $produtos, 'model' => $model]
            ); 
        ?>

        <?php 
            echo \Yii::$app->view->renderFile(
                "@app/views/factura/create_produto.php",
                ['model' => $produtoModel,
                 'factura' => $model]
            ); 
        ?>
    </div>

</div>
