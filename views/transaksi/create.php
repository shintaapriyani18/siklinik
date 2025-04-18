<?php
// File: views/transaksi/create.php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h2>Tambah Tindakan & Obat</h2>

<?php $form = ActiveForm::begin(); ?>
<h4>Tindakan Medis</h4>
<?= $form->field($tindakanMedis, 'tindakan_id')->dropDownList($listTindakan, ['prompt' => '-- Pilih Tindakan --']) ?>

<h4>Resep Obat</h4>
<?= $form->field($resepObat, 'obat_id')->dropDownList($listObat, ['prompt' => '-- Pilih Obat --']) ?>
<?= $form->field($resepObat, 'dosis')->textInput() ?>
<?= $form->field($resepObat, 'aturan_pakai')->textarea() ?>

<?= Html::submitButton('Simpan Transaksi', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
