<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'nip')->textInput() ?>
<?= $form->field($model, 'jabatan')->textInput() ?>
<?= $form->field($model, 'no_hp')->textInput() ?>
<?= $form->field($model, 'alamat')->textarea(['rows' => 4]) ?>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
