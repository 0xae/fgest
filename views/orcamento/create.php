<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orcamento */

$this->title = 'Criar Orçamento';
$this->params['breadcrumbs'][] = ['label' => 'Orcamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orcamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
