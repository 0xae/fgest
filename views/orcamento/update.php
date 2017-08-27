<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orcamento */

$this->title = 'Update Orcamento: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orcamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->titulo;
?>
<div class="orcamento-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

