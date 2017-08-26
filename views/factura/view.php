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
                aria-controls="home" role="tab" 
                data-toggle="tab">
                adicionar
            </a>
        </h4>

        <table style="margin-top: 20px;" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 50%;"><a href="javascript:void(0)">Descrição</a></th>
                    <th><center><a href="javascript:void(0)">Pre&ccedil;o</a></center></th>
                    <th><center><a href="javascript:void(0)">Quantidade</a></center></th>
                    <th><center><a href="javascript:void(0)">Total</a></center></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                    <td><?= $p->descricao;?></td>
                    <td>
                        <center>
                            <?= $p->valor;?>$00
                            <small> (<?= $p->iva ?>% IVA) </small>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?= $p->quantidade;?>un.
                        </center>
                    </td>
                    <td>
                        <center>
                            <?= $p->quantidade * $p->valor;?>$00
                        </center>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <th style="width: 50%;">
                        <center>
                            TOTAL
                        <center>
                    </th>
                    <th>
                        <center>
                            0.00$00
                        </center>
                    </th>
                    <th>
                        <center>
                            0.00$00
                        </center>
                    </th>
                    <th>
                        <center>
                            0.00$00
                        </center>
                    </th>
                </tr>
            </tfoot>
        </table>
    
    </div>

</div>
