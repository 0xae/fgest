<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Orçamentos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="orcamento-index">
    <div style="margin-bottom: 10px;">
        <h1 style="display: inline">
            <?= Html::encode($this->title) ?>
        </h1>

        <p class="pull-right">
            <?= Html::a('Criar Orcamento', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th><a href="javascript:void(0)">T&iacute;tulo</a></th>
                <th><a href="javascript:void(0)">Descri&ccedil;&atilde;o</a></th>
                <th><a href="javascript:void(0)">Valor</a></th>
                <th><a href="javascript:void(0)">Data cria&ccedil;&atilde;o</a></th>
                <th><a href="javascript:void(0)">Data modifica&ccedil;&atilde;o</a></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $row): ?>
                <tr>
                    <td> <?= $row->titulo ?>  </td>
                    <td> <?= $row->descricao ?>  </td>
                    <td> <?= $row->valor ?>$00  </td>
                    <td> <?= $row->data_criacao ?>  </td>
                    <td> <?= $row->data_update ?>  </td>
                    <td>
                        <a href="index.php?r=orcamento/view&id=<?= $row->id ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
