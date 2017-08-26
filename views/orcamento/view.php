<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orcamento */

$this->title =  $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Orcamentos', 'url' => ['index']];
$facturas = $model->getFactura();

$totalFacturas = 0;
foreach ($facturas as $f) {
    $totalFacturas += $f->getGasto();
}

?>
<div class="orcamento-view">
    <h1 class="pull-left">
        Orçamento #<?= str_pad($model->id, 5, '0', STR_PAD_LEFT); ?>
        <br/>
        <small>
            <?= $model->valor ?>$00
        </small>
    </h1>

    <p style="clear:both;font-size: 17px;color: #666"> 
        <?= $model->titulo; ?>
    </p>

    <div role="tabpanel" style="">
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="list">
            <div style="padding: 20px">
            <h4 style="margin-bottom: 20px">
                Lista de Facturas

                <a href="#create" class="btn btn-sm pull-right btn-success" 
                    aria-controls="home" role="tab" 
                    data-toggle="tab">
                    adicionar
                </a>
            </h4>

                <?php 
                    echo \Yii::$app->view->renderFile(
                        "@app/views/orcamento/list_fatura.php",
                        ["facturas" => $facturas]
                    ); 
                ?>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="create">
            <div style="padding: 20px">
                <h4 style="">
                    Criar factura
                    <a href="#list" class="btn btn-sm pull-right btn-danger" aria-controls="profile" role="tab" data-toggle="tab">
                        cancelar
                    </a>
                </h4>
                <?php 
                    echo \Yii::$app->view->renderFile(
                        "@app/views/orcamento/create_fatura.php",
                        ['model'=> $facturaModel,
                         'orcamento' => $model]
                    ); 
                ?>
            </div>
        </div>
      </div>
    </div>

</div>
