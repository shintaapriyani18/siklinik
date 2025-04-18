<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nama_obat')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'jenis')->textInput() ?>
<?= $form->field($model, 'stok')->textInput() ?>
<?= $form->field($model, 'satuan')->textInput() ?>
<?= $form->field($model, 'harga')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
