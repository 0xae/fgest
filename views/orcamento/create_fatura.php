<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(['action' => 'index.php?r=factura/create']); ?>

        <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'orcamento_id')->hiddenInput(['value' => $orcamento->id])->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-sm btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
