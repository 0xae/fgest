<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!-- Modal -->
<div class="modal fade" id="produtoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adicionar produto</h4>
      </div>

      <div class="modal-body">
            <?php $form = ActiveForm::begin(['action' => 'index.php?r=produto/create']); ?>

            <?= $form->field($model, 'descricao')
                     ->textInput(['maxlength' => true])
                     ->label('Descri&ccedil;&atilde;o');
            ?>

            <?= $form->field($model, 'quantidade')->textInput() ?>

            <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'iva')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'factura_id')->hiddenInput(['value' => $factura->id])->label(false) ?>

            <div style="height: 20px" class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'pull-right btn btn-sm btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>
