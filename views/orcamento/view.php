<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orcamento */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orcamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orcamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'valor',
            'data_criacao',
            'data_update',
            'criado_por',
            'updated_por',
        ],
    ]) ?>

</div>