<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nama_tindakan')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'deskripsi')->textarea(['rows' => 4]) ?>
<?= $form->field($model, 'harga')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
