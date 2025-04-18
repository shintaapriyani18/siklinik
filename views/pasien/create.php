<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Wilayah;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
/* @var $wilayah app\models\Wilayah[] */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tanggal_lahir')->input('date') ?>
    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['L' => 'Laki-laki', 'P' => 'Perempuan']) ?>
    <?= $form->field($model, 'alamat')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'wilayah_id')->dropDownList(
        ArrayHelper::map($wilayah, 'id', 'nama'),
        ['prompt' => '-- Pilih Wilayah --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
