<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orcamento */

$this->title =  $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Orcamentos', 'url' => ['index']];
$facturas = $model->getFactura();
?>
<div class="orcamento-view">

    <h1>
        <?= $model->titulo; ?>
        <br />
        <small> <?= $model->valor; ?>$00 </small>
    </h1>

    <div role="tabpanel">
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="list">
            <h4 style="">
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

        <div role="tabpanel" class="tab-pane" id="create">
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
