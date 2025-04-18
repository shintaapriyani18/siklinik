<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="card" style="padding: 20px; margin-bottom: 20px; background-color: #f7f7f7; border-radius: 10px;">
    <?php $form = ActiveForm::begin(); ?>

    <h4><i class="fas fa-stethoscope"></i> Tindakan Medis</h4>
    <?= $form->field($tindakan, 'nama_tindakan')->textInput(['placeholder' => 'Misal: Pemeriksaan fisik']) ?>
    <?= $form->field($tindakan, 'keterangan')->textarea(['rows' => 3]) ?>

    <hr>

    <h4><i class="fas fa-pills"></i> Resep Obat</h4>
    <?= $form->field($resep, 'nama_obat')->textInput(['placeholder' => 'Misal: Paracetamol']) ?>
    <?= $form->field($resep, 'dosis')->textInput(['placeholder' => '3x1']) ?>
    <?= $form->field($resep, 'aturan_pakai')->textarea(['rows' => 3]) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('💾 Simpan Transaksi', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
