<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Tindakan & Obat';
?>

<div class="container my-4">
    <h2>✏️ Update Tindakan & Obat</h2>

    <?php $form = ActiveForm::begin(); ?>

    <div class="card mb-4 shadow">
        <div class="card-header bg-primary text-white">
            <strong>Tindakan Medis</strong>
        </div>
        <div class="card-body">
            <?= $form->field($tindakanMedis, 'tindakan_id')->dropDownList($listTindakan, [
                'prompt' => '-- Pilih Tindakan --'
            ]) ?>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <strong>Resep Obat</strong>
        </div>
        <div class="card-body">
            <?= $form->field($resepObat, 'obat_id')->dropDownList($listObat, [
                'prompt' => '-- Pilih Obat --'
            ]) ?>
            <?= $form->field($resepObat, 'dosis')->textInput() ?>
            <?= $form->field($resepObat, 'aturan_pakai')->textarea() ?>
        </div>
    </div>

    <div class="mt-3">
        <?= Html::submitButton('💾 Simpan Perubahan', ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
