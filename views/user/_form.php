<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$roles = ['admin' => 'Admin', 'pendaftaran' => 'Pendaftaran', 'dokter' => 'Dokter', 'kasir' => 'Kasir'];

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
<?= $form->field($model, 'role')->dropDownList($roles, ['prompt' => 'Pilih Role']) ?>
<?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
