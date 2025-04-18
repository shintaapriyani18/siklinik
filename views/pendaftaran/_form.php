<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<h4>Data Pasien</h4>
<?= $form->field($pasien, 'nama') ?>
<?= $form->field($pasien, 'nik') ?>
<?= $form->field($pasien, 'tanggal_lahir')->input('date') ?>
<?= $form->field($pasien, 'jenis_kelamin')->dropDownList(['L' => 'Laki-laki', 'P' => 'Perempuan']) ?>
<?= $form->field($pasien, 'alamat')->textarea() ?>
<?= $form->field($pasien, 'wilayah_id')->dropDownList($wilayahList, ['prompt' => 'Pilih wilayah']) ?>

<h4>Jenis Kunjungan</h4>
<?= $form->field($kunjungan, 'jenis')->dropDownList(['baru' => 'Baru', 'kontrol' => 'Kontrol']) ?>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
